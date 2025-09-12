<?php
/**
 * 易优CMS
 * ============================================================================
 * 版权所有 2016-2028 海南赞赞网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.eyoucms.com
 * ----------------------------------------------------------------------------
 * 如果商业用途务必到官方购买正版授权, 以免引起不必要的法律纠纷.
 * ============================================================================
 * Author: 小虎哥 <1105415366@qq.com>
 * Date: 2018-06-28
 */

namespace weapp\Systemdoctor\controller;

use think\Backup;
use think\Config;
use think\Db;
use think\Page;
use think\Request;
use weapp\Systemdoctor\model\AdminLogModel;
use app\common\model\Weapp as WeappModel;
use app\admin\logic\FilemanagerLogic;
use weapp\Systemdoctor\logic\BomLogic;
use weapp\Systemdoctor\logic\SystemdoctorLogic;

/**
 * 插件的控制器
 */
class Systemdoctor extends Base
{
    // 在线模板管理
    public $filemanagerLogic;
    public $baseDir = '';
    public $maxDir = '';
    public $globalTpCache = array();
    public $bomLogic;
    public $weappInfo;
    public $systemdoctorLogic;

    /**
     * 构造方法
     */
    public function __construct()
    {
        parent::__construct();
        /*插件基本信息*/
        $this->weappInfo = $this->getWeappInfo();
        $this->assign('weappInfo', $this->weappInfo);
        /*--end*/
        $this->filemanagerLogic = new FilemanagerLogic;
        $this->systemdoctorLogic = new SystemdoctorLogic;
        $this->bomLogic = new BomLogic;
        $this->globalTpCache = $this->filemanagerLogic->globalTpCache;
        $this->baseDir = $this->filemanagerLogic->baseDir; // 服务器站点根目录绝对路径
        $this->maxDir = $this->filemanagerLogic->maxDir; // 默认文件管理的最大级别目录
        // 是否需要密保验证，0=否，1=是
        $is_security_check = $this->systemdoctorLogic->is_security_check();
        $this->assign('is_security_check', $is_security_check);
        // 是否开启密保问题
        $security_ask_open = (int)tpSetting('security.security_ask_open');
        $this->assign('security_ask_open', $security_ask_open);
    }

    /**
     * 文档链接提取
     * @return [type] [description]
     */
    public function extract_archives_index()
    {
        //防止数据过程超时
        function_exists('set_time_limit') && set_time_limit(0);
        @ini_set('memory_limit','-1');

        if (IS_POST) {
            $post = input('post.');
            if (empty($post['typeid'])) {
                $this->error('请选择栏目…！');
            }
            $post['startid'] = intval($post['startid']);
            $post['endid'] = intval($post['endid']);

            // 要处理的文档
            $where = [];
            if (!empty($post['typeid'])) {
                $where['a.typeid'] = intval($post['typeid']);
            }
            if (!empty($post['startid']) && !empty($post['endid'])) {
                $where['a.aid'] = array('between', "{$post['startid']}, {$post['endid']}");
            }
            $where['a.status'] = 1;
            $where['a.is_del'] = 0;
            $list = Db::name('archives')->field('b.*, a.*')
                ->alias('a')
                ->join('arctype b','a.typeid=b.id','LEFT')
                ->where($where)
                ->select();
            if (empty($list)) {
                $this->error('没有符合条件的文档');
            }

            $arr = [];
            $seo_pseudo = tpCache('seo.seo_pseudo');
            $seo_pseudo_format = tpCache('seo.seo_pseudo_format');
            $channelRow = Db::name('channeltype')->field('id,ctl_name')->where(['is_del'=>0])->getAllWithIndex('id');
            foreach ($list as $key => $val) {
                // 文档链接
                if ($val['is_jump'] == 1) {
                    $arcurl = $val['jumplinks'];
                } else {
                    $arcurl = arcurl('home/'.$channelRow[$val['channel']]['ctl_name'].'/view', $val, true, true, $seo_pseudo, $seo_pseudo_format);
                }
                if (1 == $post['output_type']) {
                    $str = "{$val['title']}={$arcurl}";
                } else {
                    $str = "{$arcurl}";
                }
                $arr[] = $str;
            }
            $content = implode(PHP_EOL, $arr);
            $this->success("操作成功", null, ['content'=>$content]);
        }
        /*允许发布文档列表的栏目*/
        $arctype_html = allow_release_arctype(0, []);
        $assign_data['arctype_html'] = $arctype_html;
        /*--end*/

        $this->assign($assign_data);
        return $this->fetch();
    }

    /**
     * 病毒扫描
     */
    public function virus_scan()
    {
        if (IS_POST) {
            //防止超时/内存溢出
            function_exists('set_time_limit') && set_time_limit(0);
            @ini_set('memory_limit','-1');
            tpSetting('weapp', ['weapp_Systemdoctor_1644659535'=>''], 'cn');

            $list = [];
            $assgin_list  = [];   //可疑文件
            /*----------存放生成静态html的目录 start-----------*/
            $html_dir_list = [];
            $html_arcdir = tpCache("seo.seo_html_arcdir"); // 检测页面保存目录
            if (!empty($html_arcdir)) {
                $html_dir_list[] = $html_arcdir;
            }
            $arctype_list = Db::name('arctype')->field('dirpath,diy_dirpath')->select();
            if (!empty($arctype_list)) {
                foreach ($arctype_list as $key => $val) {
                    $dirpath = trim($val['dirpath'], '/');
                    $dirpathArr = explode('/', $dirpath);
                    $dirpath_tmp = current($dirpathArr);
                    if (!empty($dirpath_tmp) && !in_array($dirpath_tmp, $html_dir_list)) {
                        $html_dir_list[] = $dirpath_tmp;
                    }

                    $diy_dirpath = trim($val['diy_dirpath'], '/');
                    $diy_dirpathArr = explode('/', $diy_dirpath);
                    $diy_dirpath_tmp = current($diy_dirpathArr);
                    if (!empty($diy_dirpath_tmp) && !in_array($diy_dirpath_tmp, $html_dir_list)) {
                        $html_dir_list[] = $diy_dirpath_tmp;
                    }
                }
            }
            //查看所有静态模板文件，里面不允许存在htm之外的其他类型文件
            $allow_files = 'html|jpg|gif|png|bmp|jpeg|ico|php|exe|asp|jsp';  //查看文件类型
            foreach ($html_dir_list as $value){
                $files = $this->getfiles('.'.$value,$allow_files,'');
                foreach ($files as $val){
                    if (preg_match('/\.html$/i', $val['url'])){
                        $list[] = $val['url'];
                    }else if (!preg_match('/\.htaccess/i', $val['url'])){      //不允许其他类型文件存在
                        $redata = $this->set_assgin_data(-1,$val['url'],'静态文件目录中存在非静态文件，建议直接删掉');
                        list($arr_key,$assgin_list_data) = $this->set_assgin_list_data($val['url'],$redata);
                        $assgin_list[$arr_key] = $assgin_list_data;
                    }
                }
            }
            /*----------存放生成静态html的目录 end-----------*/
            $allrootdir = glob(ROOT_PATH.'*'); // 获取根目录里的一级目录
            foreach ($allrootdir as $key => $filepath) {
                $filepath_tmp = str_replace('\\', '/', $filepath);
                $arr_tmp = explode('/', $filepath_tmp);
                $dirname = end($arr_tmp); // 目录名或文件名
                if (is_dir($filepath)) {
                    if (in_array($dirname, ['public','static'])) { // 不允许存在php文件的目录
                        $data = getDirFile($filepath);
                        foreach ($data as $v) {
                            if (preg_match('/\.php$/i', $v) && !in_array($v, ['plugins/ckeditor/ckeditor.php','plugins/ckeditor/ckeditor_php4.php','plugins/ckeditor/ckeditor_php5.php'])) {
//                                $list[] = './' . $dirname . '/' . $v;
                                $redata = $this->set_assgin_data(-1,'./' . $dirname . '/' . $v,'非法php文件，建议直接删掉');
                                list($arr_key,$assgin_list_data) = $this->set_assgin_list_data('./' . $dirname . '/' . $v,$redata);
                                $assgin_list[$arr_key] = $assgin_list_data;
                            }
                        }
                    }
                    else if ('template' == $dirname) {
                        $data = getDirFile($filepath);
                        foreach ($data as $v) {
                            if (preg_match('/\.php$/i', $v)) { // 不允许存在php文件的目录
//                                $list[] = './' . $dirname . '/' . $v;
                                $redata = $this->set_assgin_data(-1,'./' . $dirname . '/' . $v,'模板目录存在php文件，建议直接删掉');
                                list($arr_key,$assgin_list_data) = $this->set_assgin_list_data('./' . $dirname . '/' . $v,$redata);
                                $assgin_list[$arr_key] = $assgin_list_data;
                            } else if (preg_match('/\.htm$/i', $v)) { // htm模板文件也有可能被篡改
                                $list[] = './' . $dirname . '/' . $v;
                            }
                        }
                    }
                    else if ('data' == $dirname) {
                        $data = getDirFile($filepath);
                        foreach ($data as $v) {
                            if (preg_match('/^(backup|conf)\//i', $v)) { // 不允许存在php文件的目录
                                if (preg_match('/\.php$/i', $v)) {
                                    $redata = $this->set_assgin_data(-1,'./' . $dirname . '/' . $v,'非法php文件，建议直接删掉');
                                    list($arr_key,$assgin_list_data) = $this->set_assgin_list_data('./' . $dirname . '/' . $v,$redata);
                                    $assgin_list[$arr_key] = $assgin_list_data;
//                                    $list[] = './' . $dirname . '/' . $v;
                                }
                            } else if (preg_match('/\.php$/i', $v)) {
                                $list[] = './' . $dirname . '/' . $v;
                            }
                        }
                    } else {
                        $data = getDirFile($filepath);
                        foreach ($data as $v) {
                            if (preg_match('/\.php$/i', $v)) {
                                $list[] = './' . $dirname . '/' . $v;
                            }
                        }
                    }
                } else {
                    if (preg_match('/\.php$/i', $dirname)) {
                        $list[] = './' . $dirname;
                    }
                }
            }

            //检测代码特征
            foreach ($list as $key => $value){
                if (preg_match('/(\\\|\/)FilemanagerModel\.php$/i', $value)) {
                    @unlink($value);
                } else {
                    $redata = $this->checkCodeFeatures($value);
                    if (1 != $redata['code']) {
                        list($arr_key,$assgin_list_data) = $this->set_assgin_list_data($value,$redata);
                        $assgin_list[$arr_key] = $assgin_list_data;
                    }
                }
            }

            if (empty($assgin_list)) {
                $this->success('没发现疑似木马文件！', null, '', 2);
            } else {
                tpSetting('weapp', ['weapp_Systemdoctor_1644659535' => json_encode($assgin_list)], 'cn');
            }

            /*重新生成全部数据表字段缓存文件*/
            try {
                $this->schemaAllTable();
            } catch (\Exception $e) {}
            /*--end*/

            $this->assign('list', $assgin_list);
        }

        return $this->fetch();
    }
    /*
     *  生成可疑文件数据
     */
    private function set_assgin_data($code,$filepath,$type = '异常文件'){
        $filepath_new = @iconv("gb2312//IGNORE", "utf-8", $filepath);
        return [
            'code'  => $code,
            'type'  =>  $type,  //'<font class="red">异常文件</font>',
            'filepath'   => !empty($filepath_new) ? $filepath_new : $filepath,
            'filename'  => preg_replace('/^(.*)\/([^\/]+)$/i', '${2}', $filepath),
            'activepath'  => preg_replace('/^\.(.*)\/([^\/]+)$/i', '${1}', $filepath),
        ];
    }
    /*
     * 生成可以数据
     */
    private function set_assgin_list_data($value,$redata){
        $arr_key = md5($value);
        $assgin_list_data = [
            'code'  => $redata['code'],
            'type'  => $redata['type'],
            'filepath'   => $redata['filepath'],
            'filename'   => $redata['filename'],
            'activepath'   => $redata['activepath'],
        ];

        return [$arr_key,$assgin_list_data];
    }

    /**
     * 重新生成全部数据表缓存字段文件
     */
    private function schemaAllTable()
    {
        $dbtables = \think\Db::query('SHOW TABLE STATUS');
        $tableList = [];
        foreach ($dbtables as $k => $v) {
            if (preg_match('/^'.PREFIX.'/i', $v['Name'])) {
                /*调用命令行的指令*/
                \think\Console::call('optimize:schema', ['--table', $v['Name']]);
                /*--end*/
            }
        }
    }
    //检测文件里面的病毒代码特征
    private function checkCodeFeatures($filepath = '')
    {
//        $filepath_new = @iconv("gb2312//IGNORE", "utf-8", $filepath);

        if (preg_match('/\.php$/i', $filepath)) {
            $content = @php_strip_whitespace($filepath);
            if (!empty($content)) {
                $content = preg_replace('/([ \t]*)/i', '', $content);
            } else {
                $content = @file_get_contents($filepath);
                $content = preg_replace('/([ \r\n\t]*)/i', '', $content);
            }

            if (!empty($content) && preg_match('/((FilemanagerModel\.php)|(\$qaz(\s*)=(\s*)\$qwe)|(include(\s*)\((\s*)([\"\']+)\/tmp\/)|(\$content'.'_mb(\s*)=(\s*))|(file_get_contents(\s*)\((\s*)\$auth_role_admin(\s*)\)))/i', $content)) {
                return $this->set_assgin_data(-1,$filepath,'下载官方相同版本包解压对比查看是否存在注入病毒代码');
            }else if (2 == count(explode('/', $filepath))) {
                static $web_adminbasefile = null;
                if ($web_adminbasefile === null) {
                    $web_adminbasefile = tpCache('web.web_adminbasefile');
                    $arr = explode('/', $web_adminbasefile);
                    $web_adminbasefile = end($arr);
                }

                if (!in_array($filepath, ['./index.php','./'.$web_adminbasefile])) {
                    return $this->set_assgin_data(-2,$filepath,'根目录下只允许存在index.php和login.php(后台入口文件)，其他非自己添加的文件，可以删除掉');
                }
            }
        }
        else if (preg_match('/\.htm$/i', $filepath) || preg_match('/\.html$/i', $filepath)) {
            $content = @file_get_contents($filepath);
            $content = preg_replace('/([ \r\n\t]*)/i', '', $content);

            if (!empty($content) && preg_match('/((FilemanagerModel\.php)|(\$qaz(\s*)=(\s*)\$qwe)|(include(\s*)\((\s*)([\"\']+)\/tmp\/)|(\$content'.'_mb(\s*)=(\s*))|(file_get_contents(\s*)\((\s*)\$auth_role_admin(\s*)\)))/i', $content)) {
                return $this->set_assgin_data(-1,$filepath,'模板文件可能存在非法代码，请仔细检查修改掉（非自己添加）！');
            }
        }

        return $this->set_assgin_data(1,$filepath,'正常文件');
    }

    /**
     * 清理多余文件
     * @return [type] [description]
     */
    public function clear_invalidfile()
    {
        if (IS_POST) {
            //防止超时/内存溢出
            function_exists('set_time_limit') && set_time_limit(0);
            @ini_set('memory_limit','-1');

            // 清除缓存
            delFile(RUNTIME_PATH, true);
            // 清除源码备份文件
            $backupArr = glob('./data/backup/*');
            foreach ($backupArr as $key => $filepath) {
                $filepath_tmp = str_replace('\\', '/', $filepath);
                $arr = explode('/', $filepath_tmp);
                $filename_tmp = end($arr);
                if (!in_array($filename_tmp, ['.htaccess','.','..'])) {
                    if (is_dir($filepath)) {
                        delFile($filepath, true);
                    } else if (is_file($filepath)) {
                        @unlink($filepath);
                    }
                }
            }
            // 清除数据表缓存文件
            $schemaArr = glob('./data/schema/*');
            foreach ($schemaArr as $key => $filepath) {
                $filepath_tmp = str_replace('\\', '/', $filepath);
                $arr = explode('/', $filepath_tmp);
                $filename_tmp = end($arr);
                if (!in_array($filename_tmp, ['.htaccess','.','..'])) {
                    if (is_dir($filepath)) {
                        delFile($filepath, true);
                    } else if (is_file($filepath)) {
                        @unlink($filepath);
                    }
                }
            }
            // 清除数据库备份目录的多余文件
            $sqldataArr = glob('./data/sqldata*/*');
            foreach ($sqldataArr as $key => $filepath) {
                $filepath_tmp = str_replace('\\', '/', $filepath);
                $arr = explode('/', $filepath_tmp);
                $filename_tmp = end($arr);
                if (!in_array($filename_tmp, ['.htaccess','.','..'])) {
                    if (is_dir($filepath)) {
                        delFile($filepath, true);
                    } else if (is_file($filepath) && !preg_match('/^\d{8,8}-\d{6,6}-\d+-v\d+\.\d+\.\d+(.*)\.sql(?:\.gz)?$/', $filename_tmp)) {
                        @unlink($filepath);
                    }
                }
            }
        }
        $this->success('清理完成');
    }
    /*
         * 删除uploads疑似病毒文件
         */
    public function delete_uploads_file(){
        if (IS_AJAX) {
            $filename = input('filename/s');
            $files_serialize = cache("uploads_files_serialize");
            if (!empty($files_serialize)){
                $result   = unserialize($files_serialize);
            }else{
                $result = [];
            }
            $filename = !empty($result[$filename]['filepath']) ? $result[$filename]['filepath'] : '';
            if (!empty($filename) && file_exists($filename)) {
                //删除文件
                if (@unlink($filename)) {
                    $this->success("删除成功");
                }
            }
        }
        $this->error("删除失败，请手动去文件夹手动删除");
    }
    /**
     * 病毒扫描删除文件++++清除缓存
     */
    public function delete_file()
    {
        if (IS_AJAX) {
            $filename = input('filename/s');
            $result = tpSetting('weapp.weapp_Systemdoctor_1644659535');
            $result = json_decode($result, true);
            $filename = !empty($result[$filename]['filepath']) ? $result[$filename]['filepath'] : '';
            if (!empty($filename) && file_exists($filename)) {
                //删除文件
                if (@unlink($filename)) {
                    $this->success("删除成功");
                }
            }
        }
        $this->error("删除失败，请手动去文件夹手动删除");
    }

    /*---------------木马图片扫描 start ----------------*/

    /*
     * 扫码图片目录木马
     */
    public function virus_upload(){

        return $this->fetch();
    }
    /*
     *  弹窗检查
     */
    public function virus_channel(){
        return $this->fetch();
    }
    /*
     *  循环执行
     */
    public function buildChannel(){
        function_exists('set_time_limit') && set_time_limit(0);
        \think\Session::pause(); // 暂停session，防止session阻塞机制
        $achievepage = input("param.achieve/d", 0);  //已经执行完成的条数
        if (empty($achievepage)){
            cache("uploads_files_serialize",null);
            $this->clear_files_cache();
        }

        $data = $this->handleBuildChannelList($achievepage);
        $result = $data[1];

        $this->success($data[0], null,$result);
    }
    /*
     * 处理生成栏目页
     * $achievepage   已完成页数
     * $limit         单个栏目一次执行最多生成页数
     */
    private function handleBuildChannelList($achievepage = 0,$limit = 100){
        $result = $this->set_files_cache();
        $msg = '';
        $pagetotal = $result['pagetotal'];
        $files = $result['files'];
        $dir_directory = './';   //根目录

        $files_serialize = cache("uploads_files_serialize");
        if (!empty($files_serialize)){
            $upload_files   = unserialize($files_serialize);
        }else{
            $upload_files = [];
        }
        while ($limit && $pagetotal > $achievepage) {
            $url = $files[$achievepage]['url'];
            $image_type = $this->get_image_type($dir_directory.$url);
            if (!in_array($image_type, [1, 2, 3, 4, 6, 13,17])){
                $url = $this->change_encoding($url);
                $arr_key = md5($url);
                $assgin_list_data = $this->set_assgin_data(-1,$url,'非法图片文件，建议删除');
                $upload_files[$arr_key] = $assgin_list_data;
                $msg .= '<div style="display: flex;justify-content:space-between;padding: 3px 0;border-bottom: 1px dotted #B8E6A2;font-size: 12px;width: 50%;">
                        <div >可疑文件：'.$url.'</div>
                        <div >
                             <a class="btn red" style="font-size: 12px;padding: 0;" href="javascript:void(0);" data-filename="'.$arr_key.'" onClick="delete_uploads_file(this);"><i class="fa fa-trash-o"></i>删除</a>
                        </div>
                    </div>';
            }else if (false === $this->check_illegal($dir_directory.$url)){
                $url = $this->change_encoding($url);
                $arr_key = md5($url);
                $assgin_list_data = $this->set_assgin_data(-1,$url,'非法图片文件，建议删除');
                $upload_files[$arr_key] = $assgin_list_data;
                $msg .= '<div style="display: flex;justify-content:space-between;padding: 3px 0;border-bottom: 1px dotted #B8E6A2;font-size: 12px;width: 50%;">
                        <div >可疑文件：'.$url.'</div>
                        <div >
                             <a class="btn red" style="font-size: 12px;padding: 0;" href="javascript:void(0);" data-filename="'.$arr_key.'" onClick="delete_uploads_file(this);"><i class="fa fa-trash-o"></i>删除</a>
                        </div>
                    </div>';

            }
            $limit--;
            $achievepage++;
        }
        $data['allpagetotal'] = $pagetotal;
        $data['achieve'] = $achievepage;
        cache("uploads_files_serialize", serialize($upload_files));


        return [$msg, $data];
    }

    /*
     * 转换文件名称格式
     */
    private function change_encoding($msg){
        if (!empty($msg)){
            $out_string = mb_detect_encoding($msg, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
            if ($out_string !== "UTF-8") {
                $msg = mb_convert_encoding($msg,'UTF-8',$out_string);
            }
        }

        return $msg;
    }
    /*
     *  获取所有文件写入缓存
     */
    private function set_files_cache(){
        $files_serialize = cache("channel_files_serialize");
        if (empty($info_serialize)){
            $allow_files = 'jpg|gif|png|bmp|jpeg|ico|php|exe|asp|jsp';  //查看文件类型
            $dir_name = './uploads/';      //检索文件目录
            $files = $this->getfiles($dir_name, $allow_files, '');
            $dir_name1 = './public/upload/';      //检索文件目录
            $files1 = $this->getfiles($dir_name1, $allow_files, '');
            if (!empty($files1)){
                $files = array_merge($files,$files1);
            }
            $pagetotal        = count($files);
            cache("channel_files_serialize", serialize($files));
            cache("channel_files_total_serialize", $pagetotal);
        }else {
            $files   = unserialize($files_serialize);
            $pagetotal = cache("channel_files_total_serialize");
        }

        return ['files' => $files,'pagetotal' => $pagetotal];
    }
    /*
     * 清除缓存
     */
    private function clear_files_cache(){
        cache("channel_files_serialize", null);
        cache("channel_files_total_serialize", null);
    }
    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    private function getfiles($path, $allowFiles, $key, &$files = array()){
        if (!is_dir($path)) return null;
        if(substr($path, strlen($path) - 1) != '/') $path .= '/';
        $handle = opendir($path);
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $path2 = $path . $file;
                if (is_dir($path2)) {
                    $this->getfiles($path2, $allowFiles, $key, $files);
                } else {
                    if (preg_match("/\.(".$allowFiles.")$/i", $file) && preg_match("/.*". $key .".*/i", $file)) {
                        if ($this->is_gb2312($path2)){
                            $path2 = mb_convert_encoding ($path2,'UTF-8','GBK');
                        }
                        $files[] = array(
                            'url'=> $path2,//ROOT_DIR.'/'.$path2, // 支持子目录
                            'name'=> $file,
                            'mtime'=> filemtime($path2)
                        );
                    }
                }
            }
        }
        return $files;
    }
    private function is_gb2312($str)
    {
        for($i=0; $i<strlen($str); $i++) {
            $v = ord( $str[$i] );
            if( $v > 127) {
                if( ($v >= 228) && ($v <= 233) )
                {
                    if( ($i+2) >= (strlen($str) - 1)) return true; // not enough characters
                    $v1 = ord( $str[$i+1] );
                    $v2 = ord( $str[$i+2] );
                    if( ($v1 >= 128) && ($v1 <=191) && ($v2 >=128) && ($v2 <= 191) ) // utf编码
                        return false;
                    else
                        return true;
                }
            }
        }
        return true;
    }
    //获取图片的类型
    private function get_image_type($image)
    {
        if (function_exists('exif_imagetype')) {
            return exif_imagetype($image);
        }
        try {
            $info = getimagesize($image);
            return $info ? $info[2] : false;
        } catch (\Exception $e) {
            return false;
        }
    }
    //检测文件内部是否存在病毒
    private function check_illegal($image){
        if (file_exists($image)) {
            $resource = fopen($image, 'rb');
            $fileSize = filesize($image);
            fseek($resource, 0);
            $hexCode = fread($resource, $fileSize);
            fclose($resource);
            if (preg_match('#__HALT_COMPILER()#i', $hexCode) || preg_match('#/script>#i', $hexCode) || preg_match('#<([^?]*)\?php#i', $hexCode) || preg_match('#<\?\=(\s+)#i', $hexCode)) {
                return false;
            }
        }
    }
    /*---------------木马图片扫描 end ----------------*/


    /**
     * 检测当前版本的数据库是否与官方一致
     */
    public function check_database()
    {
        if (IS_AJAX_POST) {
            /*------------------检测目录读写权限----------------------*/
            $tmp_str     = 'L2luZGV4LnBocD9tPWFwaSZjPVNlcnZpY2UmYT1nZXRfZGF0YWJhc2VfdHh0';
            $service_url = base64_decode(config('service_ey')) . base64_decode($tmp_str);
            $url         = $service_url . '&version=' . getCmsVersion();
            $context     = stream_context_set_default(array('http' => array('timeout' => 3, 'method' => 'GET')));
            $response    = @file_get_contents($url, false, $context);
            $params      = json_decode($response, true);
            if (false == $params) {
                $this->error('连接升级服务器超时，请刷新重试，或者联系技术支持！', null, ['code' => 2]);
            }

            if (is_array($params)) {
                if (1 == intval($params['code'])) {
                    /*------------------组合本地数据库信息----------------------*/
                    $dbtables       = Db::query('SHOW TABLE STATUS');
                    $local_database = array();
                    foreach ($dbtables as $k => $v) {
                        $table = $v['Name'];
                        if (preg_match('/^' . PREFIX . '/i', $table)) {
                            $local_database[$table] = [
                                'name'  => $table,
                                'field' => [],
                            ];
                        }
                    }
                    /*------------------end----------------------*/

                    /*------------------组合官方远程数据库信息----------------------*/
                    $info      = $params['info'];
                    $info      = preg_replace("#[\r\n]{1,}#", "\n", $info);
                    $infos     = explode("\n", $info);
                    $infolists = [];
                    foreach ($infos as $key => $val) {
                        if (!empty($val)) {
                            $arr                = explode('|', $val);
                            $infolists[$arr[0]] = $val;
                        }
                    }
                    /*------------------end----------------------*/

                    /*------------------校验数据库是否合格----------------------*/
                    foreach ([1] as $testk => $testv) {
                        $error = '';
                        // 对比数据表字段数量
                        foreach ($infolists as $k1 => $v1) {
                            $arr1 = explode('|', $v1);

                            if (1 >= count($arr1)) {
                                continue; // 忽略不对比的数据表
                            }

                            $fieldArr = explode(',', $arr1[1]);
                            $table    = preg_replace('/^ey_/i', PREFIX, $arr1[0]);
                            //判断是否缺少表
                            if (empty($local_database[$table])) {
                                $error .= $table . ' 数据表缺失!</br>';
                                continue;
                            }
                            $local_fields                    = Db::getFields($table); // 本地数据表字段列表
                            $local_database[$table]['field'] = $local_fields;
                            if (count($local_fields) < count($fieldArr)) {
                                //对比缺少的字段
                                $err_field = '';
                                foreach ($fieldArr as &$k2) {
                                    if (empty($local_fields[$k2])) {
                                        $err_field .= $k2 . '，';
                                    }
                                }
                                $error .= $table . ' 数据表缺失字段 ' . trim($err_field, '，') . '</br>';
                            }
                        }
                        if ($error != '') {
                            $this->error($error, null, ['code' => 2]);
                        } else {
                            $this->success('检测通过!');
                        }
                    }
                    /*------------------end----------------------*/
                } else if (2 == intval($params['code'])) {
                    $this->error('官方缺少版本号' . getCmsVersion() . '的数据库比较文件，请第一时间联系技术支持！', null, ['code' => 2]);
                }
            }

        }
        /*------------------end----------------------*/

        return $this->fetch('check_database');
    }

    /**
     * SQL命令行
     */
    public function sql_command()
    {
        $data = Db::query("SHOW TABLE STATUS");
        foreach ($data as $key => $val) {
            $data[$key]['count'] = Db::table($val['Name'])->count();
        }
        return $this->fetch('sql_command', ['data' => $data]);
    }

    /**
     * SQL命令行-获取详细表结构
     */
    public function sql_details()
    {
        if (IS_AJAX) {
            $table = input('table/s');
            if (empty($table)) {
                $this->error('没有指定数据表');
            }
            $data = Db::query("show create table " . $table);
            $info = $data[0]['Create Table'];
            $info = "<xmp>" . trim($info) . "</xmp>";

            $this->success('成功', '', $info);
        }
        $this->error('非法访问');
    }

    /**
     * SQL命令行运行
     */
    public function run_sql()
    {
        if (IS_AJAX) {
            $command = input('command/s');
            if (empty($command)) {
                $this->error('没有运行命令');
            }
            
            // 转换换行符为空格
            $command     = trim($command);
            $str_command     = str_replace(array("\r\n", "\r", "\n"), " ", $command);
            /* 
            // 检查是否是查询语句
            $command_type = strtoupper(substr(trim($str_command), 0, 6));
            
            // 白名单验证 - 只允许SELECT和SHOW语句
            $allowed_commands = ['SELECT', 'SHOW T'];
            $is_allowed = false;
            
            foreach ($allowed_commands as $allowed) {
                if (strpos($command_type, $allowed) === 0) {
                    $is_allowed = true;
                    break;
                }
            }
            
            if (!$is_allowed) {
                $this->error('为了系统安全，只允许执行SELECT和SHOW开头的SQL语句');
            }
             */
            
            // 禁止危险关键字
            $dangerous_keywords = [
                'DELETE', 'DROP', 'TRUNCATE', 
                'REPLACE', 'CREATE', 'RENAME', 'GRANT', 'REVOKE', 'UNION', 
                'OUTFILE', 'DUMPFILE', 'INTO', 'LOAD_FILE', 'SLEEP', 'BENCHMARK',
                'INFORMATION_SCHEMA', 'LOAD DATA'
                // , 'ALTER', 'UPDATE', 'INSERT'
            ];
            
            foreach ($dangerous_keywords as $keyword) {
                if (stripos($str_command, $keyword) !== false) {
                    $this->error('SQL语句包含禁止使用的关键字: ' . $keyword);
                }
            }

            if ($this->startsWith($str_command, 'DELETE') || $this->startsWith($str_command, 'DROP')) {
                $this->error('删除\'数据表\'或\'数据库\'的语句不允许在这里执行');
            }

            $select = $this->startsWith($str_command, 'SELECT');
            if ($select) {
                try {
                    // 启动事务
                    Db::startTrans();
                    // 查询限制 - 最多返回50条记录
                    if (stripos($str_command, 'LIMIT') === false) {
                        $command .= ' LIMIT 50';
                    }
                    $data = Db::query($command);
                    // 提交事务
                    Db::commit();

                    if (count($data) <= 0) {
                        $info['msg'] = "运行SQL：" . htmlspecialchars($command) . " 成功，无返回记录！";
                    } else {
                        if (count($data) > 50) {
                            $data = array_splice($data, 50);
                        }
                        $info['msg'] = "运行SQL：" . htmlspecialchars($command) . "成功，共有" . count($data) . "条记录，最大返回50条！";
                        foreach ($data as $key => $val) {
                            $info['msg'] .= "</br>第 " . ($key + 1) . " 条<hr>";
                            foreach ($val as $k => $v) {
                                $info['msg'] .= htmlspecialchars($k) . "：" . htmlspecialchars($v) . "</br>";
                            }
                        }
                    }
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    $this->error('SQL执行错误: ' . $e->getMessage());
                }
            } else {
                //更新/插入
                $arr_command = explode(";", $str_command);
                $i = 0;
                $err_msg = '';
                foreach ($arr_command as $val){
                    if (!empty($val)){
                        try {
                            // 启动事务
                            Db::startTrans();
                            Db::query($val);
                            // 提交事务
                            Db::commit();
                            $i+=1;
                        } catch (\Exception $e) {
                            // 回滚事务
                            Db::rollback();
                            $err_msg .= '错误未执行语句：'.$val .'</br>';
                            continue;
                        }
                    }
                }
                if ( $i > 0 ) {
                    $info['msg'] = '成功执行 '. $i .' 条SQL语句</br>'.$err_msg;
                }else{
                    $info['msg'] = $err_msg;
                }
            }
            $this->success('执行成功', '', $info);
        }
        $this->error('非法访问');
    }

    /**
     * 插件后台管理 - 列表
     */
    public function index()
    {
        // 上传图片检测木马
        $trojan_horse = tpCache('weapp.weapp_check_illegal_open');
        $this->assign('trojan_horse', $trojan_horse);
        $cms_version = getCmsVersion();
        $this->assign('cms_version', $cms_version);
        return $this->fetch('index');
    }

    /**
     * 诊断数据表
     */
    public function check_table()
    {
        if (IS_POST) {
            $r = Db::name('admin_log')->where("admin_id is NULL OR admin_id = ''")
                ->update([
                    'admin_id' => 0,
                    'log_time' => getTime(),
                ]);
            if ($r) {
                $this->success('修复成功');
            }
            $this->error('修复失败');
        }
        $this->error('非法访问');
    }

    /**
     * 上传sql文件
     */
    public function restoreUpload()
    {
        if (IS_POST) {
            $file = request()->file('sqlfile');
            if (empty($file)) {
                $this->error('请上传sql文件');
            }
            // 移动到框架应用根目录/data/sqldata/ 目录下
            $path                    = tpCache('global.web_sqldatapath');
            $path                    = !empty($path) ? $path : config('DATA_BACKUP_PATH');
            $path                    = trim($path, '/');
            $image_upload_limit_size = intval(tpCache('basic.file_size') * 1024 * 1024);
            $info                    = $file->validate(['size' => $image_upload_limit_size, 'ext' => 'sql,gz'])->move($path, $_FILES['sqlfile']['name']);
            if ($info) {
                //上传成功 获取上传文件信息
                $file_path_full = $info->getPathName();
                if (file_exists($file_path_full)) {
                    $sqls = Backup::parseSql($file_path_full);
                    if (Backup::install($sqls)) {
                        /*清除缓存*/
                        delFile(RUNTIME_PATH);
                        /*--end*/
                        $this->success("执行sql成功");
                    } else {
                        $this->error('执行sql失败');
                    }
                } else {
                    $this->error('sql文件上传失败');
                }
            } else {
                //上传错误提示错误信息
                $this->error($file->getError());
            }
        }
    }

    /**
     * 检测站点根目录权限
     */
    public function check_permission()
    {
        if (IS_AJAX) {
            /*------------------检测目录读写权限----------------------*/
            $filelist = glob('*', GLOB_ONLYDIR);
            $dirs     = array();
            $i        = -1;
            foreach ($filelist as $filename) {
                $curdir = $filename;
                if (!isset($dirs[$curdir])) {
                    $dirs[$curdir] = $this->TestIsFileDir($curdir);
                }
                if ($dirs[$curdir]['isdir'] == FALSE) {
                    continue;
                } else {
                    @tp_mkdir($curdir, 0777);
                    $dirs[$curdir] = $this->TestIsFileDir($curdir);
                }
                $i++;
            }

            if ($i > -1) {
                $n        = 0;
                $dirinfos = '';
                foreach ($dirs as $curdir) {
                    $dirinfos .= $curdir['name'] . "&nbsp;&nbsp;状态：";
                    if ($curdir['writeable']) {
                        $dirinfos .= "<font color='green'>[√正常]</font>";
                    } else {
                        $n++;
                        $dirinfos .= "<font color='red'>[×不可写]</font>";
                    }
                    $dirinfos .= "<br />";
                }
                $title = "已检测站点有 <font color='red'>{$n}</font> 处没有写入权限：<br />";
                $title .= "<font color='red'>问题分析（如有问题，请咨询技术支持）：<br />";
                $title .= "1、检查站点目录的用户组与所有者，禁止是 root ;<br />";
                $title .= "2、检查站点目录的读写权限，一般权限值是 0755 ;<br />";
                $title .= "</font><br />站点根目录列表如下：<br />";
                $msg   = $title . $dirinfos;
                $this->error($msg);
            }
        }

        return $this->fetch('check_permission');
    }

    /**
     * 测试目录路径是否有读写权限
     * @param string $dirname 文件目录路径
     * @return array
     */
    private function TestIsFileDir($dirname)
    {
        $dirs         = array('name' => '', 'isdir' => FALSE, 'writeable' => FALSE);
        $dirs['name'] = $dirname;
        tp_mkdir($dirname);
        if (is_dir($dirname)) {
            $dirs['isdir']     = TRUE;
            $dirs['writeable'] = $this->TestWriteAble($dirname);
        }
        return $dirs;
    }

    /**
     * 测试目录路径是否有写入权限
     * @param string $d 目录路劲
     * @return boolean
     */
    private function TestWriteAble($d)
    {
        $tfile = '_eyout.txt';
        $fp    = @fopen($d . $tfile, 'w');
        if (!$fp) {
            return false;
        } else {
            fclose($fp);
            $rs = @unlink($d . $tfile);
            return true;
        }
    }

    private function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        $haystack = trim($haystack);
        $command_type = strtoupper(substr($haystack, 0, $length));
        return ($command_type === strtoupper($needle));
    }

    /**
     * 检测重复文档
     */
    public function repeat_archives_index()
    {
        $assign_data = array();
        $testing = input('param.testing/d');

        if (!empty($testing)) {
            $condition = array();
            // 获取到所有GET参数
            $param = input('param.');

            // 应用搜索条件
            foreach (['keywords','channel'] as $key) {
                if (isset($param[$key]) && $param[$key] !== '') {
                    if ($key == 'keywords') {
                        $condition['a.title'] = array('LIKE', "%{$param[$key]}%");
                    } else if ($key == 'channel' && !empty($param[$key])) {
                        $condition['a.channel'] = $param[$key];
                    } else {
                        $condition['a.'.$key] = array('eq', $param[$key]);
                    }
                }
            }

            // 多语言
            $condition['a.lang'] = array('eq', $this->admin_lang);
            // 回收站
            $condition['a.is_del'] = array('eq', 0);

            $pagesize = input('param.size/d', 100);
            $row = Db::name('archives')->alias('a')->field('GROUP_CONCAT(aid) as aids, count(aid) as nums,a.title')
                ->where($condition)
                ->group('a.title')
                ->having('count(a.aid) > 1')
                ->order('aid asc')
                ->limit($pagesize)
                ->select();
            $assign_data['list'] = $row;

            $count = 0;
            foreach ($row as $key => $val) {
                $count += $val['nums'];
            }
            $assign_data['count'] = $count;
        }

        /* 模型 */
        $map = [
            'id'    => ['NOT IN', [6,8]],
            'status'    => 1,
        ];
        $channeltype_list = model('Channeltype')->getAll('id,title,nid', $map, 'id');
        $assign_data['channeltype_list'] = $channeltype_list;

        $assign_data['testing'] = $testing;
        $deltype = input('param.deltype/s');
        $assign_data['deltype'] = $deltype;
        $recycle_switch = tpSetting('recycle.recycle_switch');//回收站开关
        $this->assign('recycle_switch', $recycle_switch);
        $this->assign($assign_data);
        
        return $this->fetch('repeat_archives_index');
    }
    
    /**
     * 删除文档
     */
    public function repeat_archives_del()
    {
        if (IS_POST) {
            $post = input();
            $del_id = [];
            if (is_array($post['del_id'])){
                foreach ($post['del_id'] as $k => $v) {
                    $arr = explode(",",$v);
                    sort($arr);
                    if ('delnew' == $post['deltype']){//保留最旧的一条
                        unset($arr[0]);
                    }else{//保留最新的一条
                        unset($arr[count($arr)-1]);
                    }
                    $del_id = array_merge($del_id,$arr);
                }
            }else{
                $arr = explode(",",$post['del_id']);
                sort($arr);
                if ('delnew' == $post['deltype']){//保留最旧的一条
                    unset($arr[0]);
                }else{//保留最新的一条
                    unset($arr[count($arr)-1]);
                }
                $del_id = array_merge($del_id,$arr);
            }
            
            $recycle_switch = tpCache('web.recycle_switch');
            if (!empty($recycle_switch)) {
                $thorough = 1;
            } else {
                $thorough = 0;
            }
            $archivesLogic = new \app\admin\logic\ArchivesLogic;
            $archivesLogic->del($del_id, $thorough);
        }
    }

    /**
     * SQL命令行
     */
    public function sql_reset()
    {
        if (IS_AJAX_POST){
            $post = input('post.');
            $table = $post['table'];
            $table = htmlspecialchars_decode($table);
            $table = json_decode($table,true);
            foreach ($table as $k) {
                $sql = 'alter table '.$k.' AUTO_INCREMENT 1';
                Db::execute($sql);
            }
            return true;
        }
        $data = Db::query("SHOW TABLE STATUS");
        foreach ($data as $key => $val) {
            $data[$key]['count'] = Db::table($val['Name'])->count();
        }
        $this->assign('prefix', PREFIX);
        return $this->fetch('sql_reset', ['data' => $data]);
    }

    /**
     * 后台操作日志
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function admin_log()
    {
        $list = array();
        $keywords = I('keywords/s');

        $map = array();
        if (!empty($keywords)) {
            $map['log_info'] = array('LIKE', "%{$keywords}%");
        }
        $map['admin_id'] = ['gt', 0];

        $count = AdminLogModel::where($map)->count('log_id');// 查询满足要求的总记录数
        $pageObj = new Page($count, config('paginate.list_rows'));// 实例化分页类 传入总记录数和每页显示的记录数
        $list = AdminLogModel::with('admin')->where($map)->order('log_id desc')->limit($pageObj->firstRow.','.$pageObj->listRows)->select();
        $pageStr = $pageObj->show(); // 分页显示输出
        $this->assign('list', $list); // 赋值数据集
        $this->assign('pageStr', $pageStr); // 赋值分页输出
        $this->assign('pageObj', $pageObj); // 赋值分页对象

        return $this->fetch('admin_log');
    }

    /**
     * 删除后台操作日志
     */
    public function del_admin_log()
    {
        $id_arr = I('del_id/a');
        $id_arr = eyIntval($id_arr);
        if(!empty($id_arr)){
            $r = AdminLogModel::where("log_id",'IN',$id_arr)->delete();
            if($r){
                adminLog('日志清除');
                $this->success("操作成功!");
            }else{
                $this->error("操作失败!");
            }
        }else{
            $this->error("参数有误!");
        }
    }
    
    /**
     * 操作日志的配置
     */
    public function admin_log_conf()
    {
        $row = $this->systemdoctorLogic->getConfData('admin_log');
        if (!isset($row['data']['day'])) $row['data']['day'] = 30;

        if (IS_AJAX_POST) {
            $post = input('post.');
            $data = $row['data'];
            $data['day'] = empty($post['day']) ? $post['day'] : intval($post['day']);
            if (empty($row['id'])) {
                $r = Db::name('weapp_systemdoctor')->insert([
                        'code' => 'admin_log',
                        'data' => json_encode($data),
                        'add_time' => getTime(),
                    ]);
            } else {
                $r = Db::name('weapp_systemdoctor')->where(['id'=>$row['id']])->update([
                        'data' => json_encode($data),
                        'update_time' => getTime(),
                    ]);
            }

            if ($r !== false) {
                \think\Cache::clear('hooks');
                $this->success("操作成功", weapp_url('Systemdoctor/Systemdoctor/admin_log_conf'));
            }
            $this->error("操作失败");
        }

        $this->assign('data', $row['data']);
        return $this->fetch('admin_log_conf');
    }

    /**
     * 插件后台管理 - 列表
     */
    public function data_replace_index()
    {
        $keywords = I('keywords/s');

        $map = array();
        if (!empty($keywords)) {
            $map['title'] = array('LIKE', "%{$keywords}%");
        }
        //获取数据表
        $dbtables = Db::query('SHOW TABLE STATUS');
        $list = array();
        foreach ($dbtables as $k => $v) {
            if (preg_match('/^'.PREFIX.'/i', $v['Name'])) {
                $list[$k] = $v;
            }
        }
        $tables = get_arr_column($list, 'Name');

        $this->assign('tables',$tables);
        return $this->fetch('data_replace_index');
    }

    /**
     * 根据表名获取字段列表
     */
    public function getTableField()
    {
        $name = Request::instance()->param('table_name');
        $fieldArr = Db::getTableFields($name);
        if($fieldArr)
        {
            $this->success("操作成功!",'',['targetTable'=>$name,'fields'=>$fieldArr]);
        }
    }

    /**
     * 内容替换主方法
     */
    public function th()
    {
        $data = Request::instance()->param();
        //字段安全过滤
        $field = $this->filter($data['rpfield']);
        switch($data['rptype'])
        {
            case "replace":
            case "ｒｅｐｌａｃｅ":
                $this->replace($data['tables'],$field,$data['rpstring'],$data['tostring'],$data['condition']);
                break;
            case "regex":
                $this->regex();
                break;
        }
    }

    /**
     * 普通替换
     */
    public function replace($table,$field,$rpstring,$tostring,$condition){
        if($condition)
        {
            $sql = "update {$table} set {$field}=REPLACE({$field},'{$rpstring}','{$tostring}') where $condition;";

        }else{
            $sql = "update {$table} set {$field}=REPLACE({$field},'{$rpstring}','{$tostring}');";
        }
        $res = Db::execute($sql);
        if ($res)
        {
            $this->success("普通替换成功,{$res}行受到影响");
        }else{
            $this->error("替换未成功,没有受到任何影响");
        }
    }

    /**
     * 正则替换
     */
    public function regex(){
        $this->success("正则替换");
    }

    /**
     * 过滤掉重要字段
     */
    public function filter($field)
    {
        $ban = ['id'];
        for($i=0; $i<count($ban); $i++){
            if(in_array($field,$ban)){
                $this->error("存在非法字段,不可替换");
            }
        }
        return $field;
    }

    /**
     * 验证码管理
     */
    public function vertify()
    {
        // 获取插件数据
        $row = WeappModel::get(array('code' => $this->weappInfo['code']));
        if ($this->request->isPost()) {
            // 获取post参数
            $inc_type = input('inc_type/s', 'admin_login');
            $param = $this->request->only('captcha');
            $config = json_decode($row->data, true);
            if ('default' == $inc_type) {
                if (isset($config[$inc_type])) {
                    $config['captcha'][$inc_type] = array_merge($config['captcha'][$inc_type], $param['captcha'][$inc_type]);
                } else {
                    $config['captcha'][$inc_type] = $param['captcha'][$inc_type];
                }
            } else {
                $config['captcha'][$inc_type]['is_on'] = $param['captcha'][$inc_type]['is_on'];
                if (isset($config['captcha'][$inc_type]['config'])) {
                    $config['captcha'][$inc_type]['config'] = array_merge($config['captcha'][$inc_type]['config'], $param['captcha'][$inc_type]['config']);
                } else {
                    $config['captcha'][$inc_type]['config'] = $param['captcha'][$inc_type]['config'];
                }
            }
            // 转json赋值
            $row->data = json_encode($config);
            // 更新数据
            $r = $row->save();

            if ($r !== false) {
                adminLog('编辑验证码：插件配置'); // 写入操作日志
                $this->success("操作成功!", weapp_url('Systemdoctor/Systemdoctor/vertify', ['inc_type'=>$inc_type]));
            }
            $this->error("操作失败!");
        }

        $inc_type = input('param.inc_type/s', 'admin_login');
        $inc_type = preg_replace('/([^\w\-]+)/i', '', $inc_type);

        // 获取配置JSON信息转数组
        $config = json_decode($row->data, true);
        $baseConfig = Config::get("captcha");
        if ('default' == $inc_type) {
            $row = isset($config['captcha']) ? $config['captcha'] : $baseConfig;
        } else {
            if (isset($config['captcha'][$inc_type])) {
                $row = $config['captcha'][$inc_type];
            } else {
                $baseConfig[$inc_type]['config'] = !empty($config['captcha']['default']) ? $config['captcha']['default'] : $baseConfig['default'];
                $row = $baseConfig[$inc_type];
            }
        }
        $this->assign('row', $row);
        $this->assign('inc_type', $inc_type);
        return $this->fetch('vertify_'.$inc_type);
    }

    /**
     * 模板管理首页
     */
    public function filemanager_index()
    {
        // 获取到所有GET参数
        $param = input('param.', '', null);
        $activepath = input('param.activepath', '', null);
        $activepath = $this->filemanagerLogic->replace_path($activepath, ':', true);

        /*当前目录路径*/
        $activepath = !empty($activepath) ? $activepath : $this->maxDir;
        $tmp_max_dir = preg_replace("#\/#i", "\/", $this->maxDir);
        if (!preg_match("#^".$tmp_max_dir."#i", $activepath)) {
            $activepath = $this->maxDir;
        }
        /*--end*/

        $inpath = "";
        $activepath = str_replace("..", "", $activepath);
        $activepath = preg_replace("#^\/{1,}#", "/", $activepath); // 多个斜杆替换为单个斜杆
        if($activepath == "/") $activepath = "";

        if(empty($activepath)) {
            $inpath = $this->baseDir.$this->maxDir;
        } else {
            $inpath = $this->baseDir.$activepath;
        }

        $list = $this->filemanagerLogic->getDirFile($inpath, $activepath);
        $assign_data['list'] = $list;

        /*文件操作*/
        $assign_data['replaceImgOpArr'] = $this->filemanagerLogic->replaceImgOpArr;
        $assign_data['editOpArr'] = $this->filemanagerLogic->editOpArr;
        $assign_data['renameOpArr'] = $this->filemanagerLogic->renameOpArr;
        $assign_data['delOpArr'] = $this->filemanagerLogic->delOpArr;
        $assign_data['moveOpArr'] = $this->filemanagerLogic->moveOpArr;
        /*--end*/

        $assign_data['activepath'] = $activepath;

        $this->assign($assign_data);
        return $this->fetch();
    }
    /**
     * 替换图片
     */
    public function filemanager_replace_img()
    {
        if (IS_POST) {
            $post = input('post.', '', null);
            $activepath = !empty($post['activepath']) ? trim($post['activepath']) : '';
            if (empty($activepath)) {
                $this->error('参数有误');
                exit;
            }

            $file = request()->file('upfile');
            if (empty($file)) {
                $this->error('请选择上传图片！');
                exit;
            } else {
                $image_type = tpCache('basic.image_type');
                $fileExt = !empty($image_type) ? str_replace('|', ',', $image_type) : config('global.image_ext');
                $image_upload_limit_size = intval(tpCache('basic.file_size') * 1024 * 1024);
                $result = $this->validate(
                    ['file' => $file],
                    ['file'=>'image|fileSize:'.$image_upload_limit_size.'|fileExt:'.$fileExt],
                    ['file.image' => '上传文件必须为图片','file.fileSize' => '上传文件过大','file.fileExt'=>'上传文件后缀名必须为'.$fileExt]
                );
                if (true !== $result || empty($file)) {
                    $this->error($result);
                    exit;
                }
            }

            $res = $this->filemanagerLogic->upload('upfile', $activepath, $post['filename'], 'image');
            if ($res['code'] == 1) {
                $this->success('操作成功！',weapp_url('Systemdoctor/Systemdoctor/filemanager_index', array('activepath'=>$this->filemanagerLogic->replace_path($activepath, ':', false))));
            } else {
                $this->error($res['msg'],weapp_url('Systemdoctor/Systemdoctor/filemanager_index', array('activepath'=>$this->filemanagerLogic->replace_path($activepath, ':', false))));
            }
        }

        $filename = input('param.filename/s', '', null);

        $activepath = input('param.activepath/s', '', null);
        $activepath = $this->filemanagerLogic->replace_path($activepath, ':', true);
        if ($activepath == "") $activepathname = "根目录";
        else $activepathname = $activepath;

        $info = array(
            'activepath'    => $activepath,
            'activepathname'    => $activepathname,
            'filename'  => $filename,
        );
        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * 新建文件
     */
    public function filemanager_newfile()
    {
        if (IS_POST) {
            $post = input('post.', '', null);
            $content = input('post.content', '', null);
            $filename = !empty($post['filename']) ? trim($post['filename']) : '';
            $content = !empty($content) ? $content : '';
            $activepath = !empty($post['activepath']) ? trim($post['activepath']) : '';

            if (empty($filename) || empty($activepath)) {
                $this->error('参数有误');
                exit;
            }

            $r = $this->filemanagerLogic->editFile($filename, $activepath, $content);
            if ($r === true) {
                $this->success('操作成功！',weapp_url('Systemdoctor/Systemdoctor/filemanager_index', array('activepath'=>$this->filemanagerLogic->replace_path($activepath, ':', false))));
                exit;
            } else {
                $this->error($r);
                exit;
            }
        }

        $activepath = input('param.activepath/s', '', null);
        $activepath = $this->filemanagerLogic->replace_path($activepath, ':', true);
        $filename = 'newfile.htm';
        $content = "";
        $info = array(
            'filename'  => $filename,
            'activepath'=> $activepath,
            'content'   => $content,
            'extension' => 'text/html',
        );
        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * 模板管理编辑
     */
    public function filemanager_edit()
    {
        if (IS_POST) {
            $post = input('post.', '', null);
            $content = input('post.content', '', null);
            $filename = !empty($post['filename']) ? trim($post['filename']) : '';
            $content = !empty($content) ? $content : '';
            $activepath = !empty($post['activepath']) ? trim($post['activepath']) : '';

            if (empty($filename) || empty($activepath)) {
                $this->error('参数有误');
                exit;
            }

            $r = $this->filemanagerLogic->editFile($filename, $activepath, $content);
            if ($r === true) {
                $this->success('操作成功！',weapp_url('Systemdoctor/Systemdoctor/filemanager_index', array('activepath'=>$this->filemanagerLogic->replace_path($activepath, ':', false))));
                exit;
            } else {
                $this->error($r);
                exit;
            }
        }

        $activepath = input('param.activepath/s', '', null);
        $activepath = $this->filemanagerLogic->replace_path($activepath, ':', true);

        $filename = input('param.filename/s', '', null);

        $activepath = str_replace("..", "", $activepath);
        $filename = str_replace("..", "", $filename);
        $path_parts  = pathinfo($filename);
        $path_parts['extension'] = strtolower($path_parts['extension']);

        /*不允许越过指定最大级目录的文件编辑*/
        $tmp_max_dir = preg_replace("#\/#i", "\/", $this->filemanagerLogic->maxDir);
        if (!preg_match("#^".$tmp_max_dir."#i", $activepath)) {
            $this->error('没有操作权限！');
            exit;
        }
        /*--end*/

        /*允许编辑的文件类型*/
        if (!in_array($path_parts['extension'], $this->filemanagerLogic->editExt)) {
            $this->error('只允许操作文件类型如下：'.implode('|', $this->filemanagerLogic->editExt));
            exit;
        }
        /*--end*/

        /*读取文件内容*/
        $file = $this->baseDir."$activepath/$filename";
        $content = "";
        if(is_file($file))
        {
            $filesize = filesize($file);
            if (0 < $filesize) {
                $fp = fopen($file, "r");
                $content = fread($fp, $filesize);
                fclose($fp);
                if ('css' != $path_parts['extension']) {
                    $content = htmlspecialchars($content, ENT_QUOTES);
                    $content = preg_replace("/(@)?eval(\s*)\(/i", 'intval(', $content);
                    // $content = preg_replace("/\?\bphp\b/i", "？ｍｕｍａ", $content);
                }
            }
        }
        /*--end*/

        if($path_parts['extension'] == 'js'){
            $extension = 'text/javascript';
        } else if($path_parts['extension'] == 'css'){
            $extension = 'text/css';
        } else {
            $extension = 'text/html';
        }

        $info = array(
            'filename'  => $filename,
            'activepath'=> $activepath,
            'extension' => $extension,
            'content'   => $content,
        );
        $this->assign('info', $info);
        return $this->fetch();
    }

    // 上传图片检测木马
    public function trojan_horse()
    {
        $value = input('post.value/d');
        
        tpCache('weapp', ['weapp_check_illegal_open' => $value]);

        $this->success('操作成功！');
    }

    /**
     * 特殊符号/字体
     */
    public function special_char_index()
    {
        $Prefix = config('database.prefix');
        if (IS_POST) {
            //读取数据库配置文件，替换数据库编码
            $databaseConfig = @file_get_contents(APP_PATH . 'database.php');
            if (empty($databaseConfig)) {
                $this->error("可能存在以下问题：<br/>1.检查 application/database.php 的权限是否为755<br/>2.检查php环境是否支持file_get_contents函数");
            }
            $databaseConfig = str_ireplace(["'utf8'",'"utf8"'], "'utf8mb4'", $databaseConfig);           
            @chmod(APP_PATH . 'database.php',0755); //配置文件的地址
            $rd = @file_put_contents(APP_PATH . 'database.php', $databaseConfig); //配置文件的地址

            $r = true;
            // 文档主表
            $sql = "ALTER TABLE `{$Prefix}archives` MODIFY COLUMN `title`  varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '标题';";
            $r = @Db::execute($sql);
            $tableInfo = Db::query("SHOW COLUMNS FROM {$Prefix}archives");
            $tableInfo = get_arr_column($tableInfo, 'Field');
            if (!empty($tableInfo) && in_array('subtitle', $tableInfo)){
                $sql = "ALTER TABLE `{$Prefix}archives` MODIFY COLUMN `subtitle`  varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '副标题';";
                $r = @Db::execute($sql);
            }

            // 文档附表
            $allow_release_channel = config('global.allow_release_channel');
            $channeltype_list = Db::name('channeltype')->where(['id'=>['IN',$allow_release_channel]])->order('id asc')->select();
            foreach ($channeltype_list as $key => $val) {
                if ('ask' == $val['table']) {
                    continue;
                }
                $tableInfo = Db::query("SHOW COLUMNS FROM {$Prefix}{$val['table']}_content");
                $tableInfo = get_arr_column($tableInfo, 'Field');
                if (!empty($tableInfo)){
                    if (in_array('content', $tableInfo)){
                        $sql = "ALTER TABLE `{$Prefix}{$val['table']}_content` MODIFY COLUMN `content`  longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '内容详情';";
                        $r = @Db::execute($sql);
                    }
                    if (in_array('content_ey_m', $tableInfo)){
                        $sql = "ALTER TABLE `{$Prefix}{$val['table']}_content` MODIFY COLUMN `content_ey_m`  longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '手机端内容详情';";
                        $r = @Db::execute($sql);
                    }
                }
            }

            // 会员主表
            $sql = "ALTER TABLE `{$Prefix}users` MODIFY COLUMN `username`  varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户名' AFTER `users_id`;";
            $r = @Db::execute($sql);
            $sql = "ALTER TABLE `{$Prefix}users` MODIFY COLUMN `nickname`  varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '昵称' AFTER `password`;";
            $r = @Db::execute($sql);

            if ($r !== false) {
                if ($rd === false) {
                    $this->success('数据表处理完成，数据库文件修改失败<br/>请<a href="https://www.eyoucms.com/uploads/system/20210615/20230320173508.png" target="_blank" style="color:red;">查看教程</a>修改文件 application/database.php ');
                }
                $this->success('操作成功');
            }
            $this->error('操作失败');
        }
        
        $tableList = [
            'users' => [
                'table' => "{$Prefix}users",
                'name'  => "会员主表",
            ],
            'archives' => [
                'table' => "{$Prefix}archives",
                'name'  => "文档主表",
            ],
        ];

        // 文档附表
        $allow_release_channel = config('global.allow_release_channel');
        $channeltype_list = Db::name('channeltype')->where(['id'=>['IN',$allow_release_channel]])->order('id asc')->select();
        foreach ($channeltype_list as $key => $val) {
            if ('ask' == $val['table']) {
                continue;
            }
            $tableList[$val['table']] = [
                'table' => "{$Prefix}{$val['table']}_content",
                'name'  => "{$val['ntitle']}内容表",
            ];
        }

        $this->assign('tableList', $tableList);

        return $this->fetch('special_char_index');
    }

    /*-----------------------检查bom头部信息 start-----------------------*/

    /**
     * 检查bom头部信息
     * @return [type] [description]
     */
    public function bom_index()
    {
        $this->assign('conf_data', $this->bomLogic->getConfData());
        $this->assign('tpl_theme', $this->bomLogic->get_tpl_path());
        return $this->fetch('bom_index');
    }
    
    public function bom_conf()
    {
        if (IS_POST) {
            $post = input('post.');
            $row = $this->systemdoctorLogic->getConfData('bom');
            $data = empty($row['data']) ? [] : $row['data'];
            $data['is_autoclear'] = $post['is_autoclear'];
            $data['is_backup'] = $post['is_backup'];
            if (empty($row['id'])) {
                $r = Db::name('weapp_systemdoctor')->insert([
                        'code' => 'bom',
                        'data' => json_encode($data),
                        'add_time' => getTime(),
                    ]);
            } else {
                $r = Db::name('weapp_systemdoctor')->where(['id'=>$row['id']])->update([
                        'data' => json_encode($data),
                        'update_time' => getTime(),
                    ]);
            }

            if ($r !== false) {
                \think\Cache::clear('hooks');
                $this->success("操作成功", weapp_url('Systemdoctor/Systemdoctor/bom_conf'));
            }
            $this->error("操作失败");
        }

        $conf_data = $this->bomLogic->getConfData();
        $this->assign('conf_data', $conf_data);

        return $this->fetch('bom_conf');
    }

    /**
     * 扫描
     * @return [type] [description]
     */
    public function bom_scan()
    {
        //防止超时/内存溢出
        function_exists('set_time_limit') && set_time_limit(0);
        @ini_set('memory_limit','-1');
        \think\Session::pause(); // 暂停session，防止session阻塞机制
        if (IS_POST) {
            Db::name('weapp_systemdoctor_bom_log')->where(['id'=>['gt',0]])->delete();
            
            $conf_data = $this->bomLogic->getConfData();
            $is_autoclear = input('post.is_autoclear/d', 0);
            $conf_data['is_autoclear'] = $is_autoclear;

            $start=getTime();
            $list = [];
            $html = '';
            $dir = $this->bomLogic->get_tpl_path();
            if (!is_readable($dir)) {
                $dir = str_replace('\\', '/', $dir);
                $dir = rtrim($dir, '/');
            }
            $total = $num_ky = $scanned = 0;
            $auth_code = tpCache('system.system_auth_code');
            $this->bomLogic->bom_getDirFile($dir, $dir, $list, $total);
            foreach ($list as $key => $file_name) {
                $md5key = md5($file_name.$auth_code);
                $file_name = realpath($file_name);
                $fp = fopen($file_name, "r");
                $scanned +=1;
                $is_suspicious = 0;
                $return = $this->bomLogic->bom_checkCode($file_name, $conf_data);
                if (empty($return['code'])) {
                    $num_ky += 1;
                    $j = $num_ky % 2 + 1;
                    $is_suspicious = 1;
                    $str_handle = "";
                    if (empty($conf_data['is_autoclear'])) {
                        $str_handle = "<td id='act_{$md5key}'><a href='javascript:void(0);' data-md5key='{$md5key}' onclick='bom_clear(this);'>立即修复</a></td>";
                    } else {
                        $str_handle = "<td id='act_{$md5key}'><a href='javascript:void(0);' data-md5key='{$md5key}' style='color: #555;'>已修复</a></td>";
                    }
                    $html .= <<<EOF
<tr class='alt{$j}' onmouseover='this.className="focus";' onmouseout='this.className="alt{$j}";'>
    <td align="center">{$num_ky}</td>
    <td>{$file_name}</td>
    <td id='msg_{$md5key}'>{$return['msg']}</td>
    {$str_handle}
</tr>
EOF;
                }
                fclose($fp);

                Db::name('weapp_systemdoctor_bom_log')->insert([
                    'md5key'    => $md5key,
                    'file_name'   => base64_encode($file_name),
                    'file_num'    => $scanned,
                    'file_total'  => $total,
                    'file_num_ky'    => $num_ky,
                    'is_suspicious'=>$is_suspicious,
                    'html'        => htmlspecialchars($html),
                    'add_time'      => getTime(),
                ]);
            }
            $end = getTime();
            $spent = ($end - $start);
            $spent_str = '';
            $hours = intval($spent/3600);
            if (!empty($hours)) {
                $spent_str .= $hours."小时";
            }
            if ($spent >= 60) {
                $spent_str .= gmdate('i分', $spent);
            }
            $spent_str .= gmdate('s秒', $spent);

            $msg = "扫描完成，没有发现bom头部信息";
            if (empty($num_ky)) {
$html = <<<EOF
<tr>
    <td class="no-data" style="width: auto !important;" align="center" axis="col0" colspan="5">
        <i class="fa fa-exclamation-circle"></i>没有发现bom头部信息
    </td>
</tr>
EOF;
            } else {
                if (empty($conf_data['is_autoclear'])) {
                    $msg = "扫描完成，请在操作里点击立即修复，系统将会自动去除BOM头";
                } else {
                    $msg = "扫描完成，已自动处理";
                }
            }

            $data = [
                'scanned'  => $scanned,
                'num_ky'  => $num_ky,
                'spent'  => $spent_str,
                'html'  => $html,
            ];
            $this->success($msg, null, $data);
        }
    }

    /**
     * 扫描进度
     * @return [type] [description]
     */
    public function bom_progressd()
    {
        \think\Session::pause(); // 暂停session，防止session阻塞机制
        if (IS_AJAX) {
            $progress = 0;
            $result = [];
            $init = input('param.init/d');
            if (empty($init)) {
                Db::name('weapp_systemdoctor_bom_log')->where(['id'=>['gt',0]])->delete();
            } else {
                $result = Db::name('weapp_systemdoctor_bom_log')->field('id, file_num, file_total, file_num_ky, html')->order('id desc')->find();
            }
            if (!empty($result)) {
                $progress = $result['file_num'] / $result['file_total'];
                $progress = floor($progress*100)/100;
                if ($progress >= 1) {
                    Db::name('weapp_systemdoctor_bom_log')->where(['id'=>['gt',0], 'is_suspicious'=>0])->delete();
                }
                $progress = strval($progress * 100);
                if (empty($result['file_num_ky'])) {
                    $html = <<<EOF
<tr>
    <td class="no-data" style="width: auto !important;" align="center" axis="col0" colspan="5">
        <i class="fa fa-exclamation-circle"></i>正在扫描中
    </td>
</tr>
EOF;
                } else {
                    $html = htmlspecialchars_decode($result['html']);
                }
                $this->success('请求成功', null, ['progress'=>$progress,'file_num'=>$result['file_num'],'file_num_ky'=>$result['file_num_ky'],'html'=>$html]);
            } else {
                $this->success('请求成功', null, ['progress'=>$progress]);
            }
        }
    }

    /**
     * 去除bom头部信息
     * @return [type] [description]
     */
    public function bom_clear()
    {
        if (IS_AJAX) {
            $md5key = input('param.md5key/s');
            $result = Db::name('weapp_systemdoctor_bom_log')->where(['md5key'=>$md5key, 'is_suspicious'=>1])->find();
            if (empty($result)) {
                $this->success('操作成功');
            }

            $file_name = base64_decode($result['file_name']);
            $filename = !empty($file_name) ? trim($file_name, '/') : '';
            if (!empty($filename) && is_file($filename)) {
                $conf_data = $this->bomLogic->getConfData();
                $this->bomLogic->rewrite($filename, $conf_data);
                $this->success('操作成功');
            }
        }
        $this->error('操作失败');
    }
    /*-----------------------检查bom头部信息 end-----------------------*/

 

   /**
    * 文档批量设置
    */
   public function paymode_index()
   {
       //防止数据过程超时
       function_exists('set_time_limit') && set_time_limit(0);
       @ini_set('memory_limit','-1');
        
       if (IS_POST) {
           $post = input('post.');
           $channel = input('post.channel/d');
           if (empty($channel)) {
               $this->error('请求url缺少模型参数');
           }
           $post['startid'] = intval($post['startid']);
           $post['endid'] = intval($post['endid']);

           if (in_array($channel, [1,3,4,5])) {
               $restricData = restric_type_logic($post, $channel);
               if (isset($restricData['code']) && empty($restricData['code'])) {
                   $this->error($restricData['msg']);
               }
           }

           // 要处理的文档
           $where = ['channel'=>$channel];
           if (!empty($post['typeid'])) {
               $where['typeid'] = intval($post['typeid']);
           }
           if (!empty($post['startid']) && !empty($post['endid'])) {
               $where['aid'] = array('between', "{$post['startid']}, {$post['endid']}");
           }
           $list = Db::name('archives')->field('aid,channel')->where($where)->select();
           if (empty($list)) {
               $this->error('没有符合条件的文档');
           }

           $saveData = [];
           foreach ($list as $key => $val) {
               $info = [
                'aid' => $val['aid'],
            ];
            $info = array_merge($post, $info);

            // 文档浏览量
            if (isset($post['other_arcclick']) && !empty($post['other_arcclick'])) {
                $arcclick_arr = explode("|", $post['other_arcclick']);
                if (count($arcclick_arr) > 1) {
                    $info['click'] = mt_rand($arcclick_arr[0], $arcclick_arr[1]);
                } else {
                    $info['click'] = intval($arcclick_arr[0]);
                }
            }
            
            if (isset($post['author']) && !empty($post['author'])) {
              $info['author'] = $post['author'];
            }
            
            // 文档下载数
            if (4 == $val['channel']) {
                if (isset($post['other_arcdownload']) && !empty($post['other_arcdownload'])) {
                    $arcdownload_arr = explode("|", $post['other_arcdownload']);
                    if (count($arcdownload_arr) > 1) {
                        $info['downcount'] = mt_rand($arcdownload_arr[0], $arcdownload_arr[1]);
                    } else {
                        $info['downcount'] = intval($arcdownload_arr[0]);
                    }
                }
            }

            if (isset($info['typeid'])) {
                unset($info['typeid']);
            }
            if (isset($info['channel'])) {
                unset($info['channel']);
            }

            $saveData[] = $info;
        }
        $archivesModel = new \app\admin\model\Archives;
        $r = $archivesModel->saveAll($saveData);
        if ($r !== false) {
            // 新添加的逻辑
            foreach ($saveData as $data) {
                if (!empty($post['restric_type']) && 0 < $post['restric_type']) {
                    if (empty($post['size'])) {$post['size'] = 1;}
                    $free_content = !empty($post['free_content']) ? $post['free_content'] : '';
                    if (!empty($post['part_free']) && 2 == $post['part_free']){
                        $free_content = htmlspecialchars_decode($post['addonFieldExt']['content']);
                        $free_content = $this->SpLongBody($free_content, $post['size']);
                        // $free_content = $this->SpLongBody($free_content,$post['size']*1024);
                        $free_content = htmlspecialchars($free_content);
                    }
                    $is_in = Db::name('article_pay')->where('aid',$data['aid'])->find();
                    $article_pay_data = [
                        'part_free' => isset($post['part_free']) ? intval($post['part_free']) : 0,
                        'size'=> $post['size'],
                        'free_content' => $free_content
                    ];
                    if (empty($is_in)){
                        $article_pay_data['aid'] = $data['aid'];
                        $article_pay_data['add_time'] = getTime();
                        Db::name('article_pay')->insert($article_pay_data);
                    }else{
                        $article_pay_data['update_time'] = getTime();
                        Db::name('article_pay')->where('aid',$data['aid'])->update($article_pay_data);
                    }
                }
            }
            $this->success("操作成功");
        }
        $this->error("操作失败");
    }

    $channel = input('param.channel/d', 1);
    $assign_data['channel'] = $channel;

    /*允许发布文档列表的栏目*/
    $arctype_html = allow_release_arctype(0, array($channel));
    $assign_data['arctype_html'] = $arctype_html;
    /*--end*/

    $channelRow = Db::name('channeltype')->where('id', $channel)->find();
    if(!empty($channelRow)){
        $channelRow['data'] = json_decode($channelRow['data'], true);
    }
    $assign_data['channelRow'] = $channelRow;

    /*会员等级信息*/
    $assign_data['users_level'] = Db::name('users_level')->where(['lang'=>$this->main_lang])->order('level_value asc, level_id asc')->select();
    /*--end*/

    $this->assign($assign_data);

    return $this->fetch('paymode_index');
}



 //自动截取方法
    public function SpLongBody($mybody, $spsize)
    {
        // 新的字符截取逻辑 --- chenfy
        return $this->handleFreeContent($mybody, $spsize);
        exit;
        if (strlen($mybody) < $spsize) {
            return $mybody;
        }
        $mybody    = stripslashes($mybody);
        $bds       = explode('<', $mybody);
        $npageBody = '';
        $istable   = 0;
        $ret = '';
        foreach ($bds as $i => $k) {
            if ($i == 0) {
                $npageBody .= $bds[$i];
                continue;
            }
            $bds[$i] = "<" . $bds[$i];
            if (strlen($bds[$i]) > 6) {
                $tname = substr($bds[$i], 1, 5);
                if (strtolower($tname) == 'table') {
                    $istable++;
                } else if (strtolower($tname) == '/tabl') {
                    $istable--;
                }
                if ($istable > 0) {
                    $npageBody .= $bds[$i];
                    continue;
                } else {
                    $npageBody .= $bds[$i];
                }
            } else {
                $npageBody .= $bds[$i];
            }
            if (strlen($npageBody) > $spsize) {
                $ret = $npageBody;
                break;
            }
        }
        return $ret;
    }

    private function handleFreeContent($content = '', $freeSize = 0, $encoding = 'utf-8')
    {
        // 如果要截取的内容字数小于限制数字则原内容返回
        if (mb_strlen($content, $encoding) < $freeSize) return $content;
        $content = explode('<', stripslashes($content));
        $isp = 0;
        $istable = 0;
        $result = '';
        $freeContent = '';
        foreach ($content as $key => $value) {
            if (0 === intval($key) && !empty($value)) {
                $freeContent .= $value;
                continue;
            }
            $value = "<" . $value;
            if (mb_strlen($value, $encoding) >= 4 && (false !== stripos($value, '<p>'))) {
                if (false !== stripos($value, '<p>')) {
                    $value = preg_replace('/<p>/i', '', $value);
                    $strLength = mb_strlen($value, $encoding);
                    $freeStrLength = '<' === $freeContent ? mb_strlen(preg_replace('/</i', '', $freeContent), $encoding) : mb_strlen($freeContent, $encoding);
                    if (!empty($freeStrLength)) $freeSize = intval($freeSize) - intval($freeStrLength);
                    if (intval($strLength) > intval($freeSize)) {
                        $freeContent .= '<p>' . mb_substr($value, 0, $freeSize, 'utf-8') . '</p>';
                    } else {
                        $freeContent .= '<p>' . $value . '</p>';
                    }
                }
                if (mb_strlen($freeContent, $encoding) > $freeSize) {
                    $result = $freeContent;
                    break;
                }
            } else {
                if (strlen($value) > 6) {
                    $tname = substr($value, 1, 5);
                    if (strtolower($tname) == 'table') {
                        $istable++;
                    } else if (strtolower($tname) == '/tabl') {
                        $istable--;
                    }
                    if ($istable > 0) {
                        $freeContent .= $value;
                        continue;
                    } else {
                        $freeContent .= $value;
                    }
                } else {
                    $freeContent .= $value;
                }
                if (strlen($freeContent) > $freeSize) {
                    $result = $freeContent;
                    break;
                }
            }
        }
        $result = preg_replace('/<</i', '<', $result);
        return $result;
    }

    //获取免费阅读部分
    public function free_content($aid=0)
    {
        $free_content = '';
        if (!empty($aid)){
            $free_content = Db::name('article_pay')->where('aid',$aid)->value('free_content');
        }
        $this->assign('free_content', $free_content);
        return $this->fetch();
    }
	
	
	
	// =======================











    /**
     * 正版系统升级补丁
     * @return [type] [description]
     */
    public function upgrade_patch()
    {
        $cms_version = getCmsVersion();
        if (IS_POST) {
            // 下载异常升级包
            $result = $this->download_upgrade_version();
            if (!isset($result['code']) || $result['code'] != 1) {
                $this->error("<font color='red'>操作失败：{$result['msg']}</font>");
            }
            $src = ROOT_PATH.'weapp/Systemdoctor/backup/upgrade_patch';
            $dst = preg_replace('/(\/|\\\)$/i', '', ROOT_PATH);
            $ignore_files = [];
            if ($cms_version < 'v1.4.6') {
                $ignore_files[] = 'application/admin/controller/Weapp.php';
            }
            $msg = $this->systemdoctorLogic->recurse_copy($src, $dst, $ignore_files);
            if (true === $msg) {
                $src = ROOT_PATH.'weapp/Systemdoctor/backup/upgrade_version/'.$cms_version;
                if (is_dir($src)) {
                    $this->systemdoctorLogic->recurse_copy($src, $dst);
                    delFile($src.DS, true);
                }
                $this->success('操作成功');
            } else {
                $this->error("<font color='red'>操作失败：{$msg}</font>");
            }
        }
        $this->assign('cms_version', $cms_version);
        return $this->fetch('upgrade_patch');
    }
 
    /**
     * 下载异常升级包
     * @return [type]          [description]
     */
    private function download_upgrade_version()
    {
        $cms_version = getCmsVersion();
        $fileUrl = "http://update.eyoucms.com/other/升级异常补丁/{$cms_version}.zip";
        $domain = preg_replace('/^(http(s)?:)?(\/\/)?([^\/\:]*)(.*)$/i', '${4}', $fileUrl);
        $headers = [
            "Host: {$domain}",
            "Origin: http://{$domain}",
            "Referer: http://{$domain}",
        ];

        $downFileName = explode('/', $fileUrl);    
        $downFileName = end($downFileName);
        $saveDir = ROOT_PATH.'weapp/Systemdoctor/backup/upgrade_version'.DS.$downFileName; // 保存目录
        tp_mkdir(dirname($saveDir));
        if (false && stristr('https://', request()->scheme().':')) {
            $fileUrl = str_replace('http://update', 'https://update', $fileUrl);
        } else {
            $fileUrl = str_replace('https://update', 'http://update', $fileUrl);
        }
        $content = @httpRequest($fileUrl, 'GET', [], $headers);
        if (empty($content) || false === $content) {
            $content = @file_get_contents($fileUrl, 0, null, 0, 1);
        }

        if(!$content){
            return ['code' => 0, 'msg' => '异常升级包不存在！']; // 文件存在直接退出
        }

        if (!stristr($fileUrl, 'https://update')) {
            $ch = curl_init($fileUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $file = curl_exec ($ch);
            curl_close ($ch);  
        } else {
            $file = httpRequest($fileUrl, 'GET', [], $headers);
        }

        if (preg_match('#__HALT_COMPILER()#i', $file)) {
            return ['code' => 0, 'msg' => '下载异常升级包损坏，请联系官方客服！'];
        }
                                                          
        $fp = fopen($saveDir,'w');
        fwrite($fp, $file);
        fclose($fp);
        if(!eyPreventShell($saveDir) || !file_exists($saveDir))
        {
            return ['code' => 0, 'msg' => '下载保存异常升级包失败，请检查所有目录的权限以及用户组不能为root'];
        }

        $folderName = preg_replace("/\.([a-z]+)$/i", '', $downFileName);

        /*解压之前，删除已重复的文件夹*/
        delFile(dirname($saveDir).DS.$folderName.DS);
        /*--end*/

        /*解压文件*/
        $zip = new \ZipArchive();//新建一个ZipArchive的对象
        if ($zip->open($saveDir) != true) {
            return ['code' => 0, 'msg' => "升级包读取失败!"];
        }
        $zip->extractTo(dirname($saveDir).DS.$folderName.DS);//假设解压缩到在当前路径下backup文件夹内
        $zip->close();//关闭处理的zip文件
        /*--end*/

        @unlink($saveDir);

        return ['code' => 1, 'msg' => '下载成功'];
    }    
}