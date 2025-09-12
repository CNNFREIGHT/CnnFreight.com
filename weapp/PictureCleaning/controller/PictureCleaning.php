<?php
/**
 * 易优CMS
 * ============================================================================
 * 版权所有 2016-2028 海南赞赞网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.eyoucms.com
 * ----------------------------------------------------------------------------
 * 如果商业用途务必到官方购买正版授权, 以免引起不必要的法律纠纷.
 * ============================================================================
 * Author: 陈风任 <491085389@qq.com>
 * Date: 2018-12-11
 */

namespace weapp\PictureCleaning\controller;

use think\Page;
use think\AjaxPage;
use think\Db;
use think\Config;
use app\common\controller\Weapp;

/**
 * 插件的控制器
 */
class PictureCleaning extends Weapp
{
    /**
     * 实例化对象
     */
    private $db;

    /**
     * 插件基本信息
     */
    private $weappInfo;

    /**
     * 构造方法
     */
    public function __construct() {
        parent::__construct();
        $this->db = Db::name('WeappPictureCleaning');

        /*插件基本信息*/
        $this->weappInfo = $this->getWeappInfo();
        $this->assign('weappInfo', $this->weappInfo);
        /*--end*/

        // 预定清理的图片格式
        $this->picFormatArray = ['.gif', '.jpeg', '.png', '.bmp', '.jpg', '.ico', '.webp'];
    }

    /**
     * 插件使用说明
     */
    public function doc()
    {
        return $this->fetch('doc');
    }

    // 插件首页
    public function index()
    {
        return $this->fetch('index');
    }

    // 获取未使用文件个数并存入数据库记录
    public function picture_query()
    {
        ini_set("memory_limit", "-1");

        $file_image = $mysql_image = $result = [];

        // 获取项目文件中的图片
        $file_image  = $this->get_file_image();

        // 获取数据库中的所有图片路径
        $mysql_image = $this->get_mysql_image();

        // 对比处理图片，返回差集
        $result = array_diff($file_image, $mysql_image);

        // 图片数据处理
        if (is_array($result) && !empty($result)) {
            // 删除数据库所有未被清理的图片
            $this->db->where('status', 0)->delete(true);

            $saveData = [];
            foreach ($result as $value) {
                $nowData = [
                    'url' => handle_subdir_pic($value),
                    'add_time' => getTime(),
                    'update_time' => getTime()
                ];
                array_push($saveData, $nowData);
                $nowData = [];
                if (count($saveData) >= 3000) {
                    // 3000张图片为一个断点，执行添加数据库后继续循环操作
                    $this->savePicData($saveData);
                    $saveData = [];
                }
            }
        }

        // 存在相片且不足3000时执行
        if (!empty($saveData)) $this->savePicData($saveData);

        // 返回结果
        $count = count($result);
        $this->success('正在加载图片', null, ['count' => $count]);
    }

    // AJAX查看文件-未清理
    public function picture_list()
    {
        // 查询条件
        $where['status'] = 0; // 未清理数据

        // 查询分页
        $count = $this->db->where($where)->order('id asc')->count('id');
        $pageObj = new AjaxPage($count, 56); // config('paginate.list_rows')

        // 查询图片数据并处理
        $resultData = $this->db->where($where)->order('id asc')->limit($pageObj->firstRow.','.$pageObj->listRows)->select();
        foreach ($resultData as $key => $value) {
            $picSuffix = $this->getPicSuffix($value['url']);
            if (!in_array($picSuffix, $this->picFormatArray)) {
                $resultData[$key]['url'] = ROOT_DIR . '/public/static/common/images/Archive.png';
            }
        }
        $this->assign('times',  date('Ymd'));
        $this->assign('result', $resultData);
        $this->assign('Page', $pageObj->show());

        // 查询剩余未处理的图片数量
        $surplusCount = $this->db->where($where)->count('id');
        $this->assign('surplus_count', $surplusCount);
        return $this->fetch('picture_list');
    }

    // 移动选中图片至插件本身的回收站
    public function image_deal_with()
    {
        if (IS_AJAX_POST) {
            $post = input('post.');
            if (empty($post) || empty($post['pic_arr']) || empty($post['type'])) $this->error("请正确选择操作");
            
            // 查询图片清理查询数据表数据，已扫描但未处理文件
            $where = [
                'status' => 0,
                'id' => ['IN', $post['pic_arr']]
            ];
            $ResultData = $this->db->field('id, url')->where($where)->select();

            // 执行图片删除或移动操作
            $DelNum = 0;
            $DeleteID = [];
            // 删除操作
            if ('Delete' == $post['type']) {
                if (is_array($ResultData) && !empty($ResultData)) {
                    foreach ($ResultData as $value) {
                        if (!empty($value['url'])) {
                            // 处理文件的路径
                            $url = substr($value['url'], strlen(ROOT_DIR));
                            $url = iconv('UTF-8', 'GB2312', ROOT_PATH . $url);
                            if (@unlink($url)) {
                                $DelNum++;
                                array_push($DeleteID, $value['id']);
                            }
                        }
                    }
                    if (!empty($DelNum) && !empty($DeleteID)) {
                        // 删除数据中的数据
                        $where['id'] = ['IN', $DeleteID];
                        $this->db->where($where)->delete(true);
                        // 直接删除图片库指定图片
                        $this->handleUploads($ResultData, 'delete');
                        // 返回提示
                        $this->success('成功删除' . $DelNum . '个文件');
                    }
                } else {
                    $this->error("请选择需要删除的文件");
                }
            }
            // 移动操作
            else if ('CleanUp' == $post['type']) {
                if (is_array($ResultData) && !empty($ResultData)) {
                    // 移动相片的目录
                    $times = date('Ymd');

                    // 处理文件移动
                    foreach ($ResultData as $value) {
                        // 处理文件的路径
                        $url = substr($value['url'], strlen(ROOT_DIR));
                        $url = iconv('UTF-8', 'GB2312', ROOT_PATH . $url);

                        // 获取需要创建的文件夹路径
                        $path  = substr($value['url'], 0, strrpos($value['url'], "/"));
                        $datapath = DATA_PATH . 'tempimg/' . $times . $path;

                        // 创建文件夹，权限0777，true表示创建多级文件夹
                        @mkdir($datapath, 0777, true);

                        // 移动文件夹
                        if (@rename($url, DATA_PATH . 'tempimg/' . $times . $value['url'])) {
                            $DelNum++;
                            array_push($DeleteID, $value['id']);
                        }
                    }
                    if (!empty($DeleteID) && !empty($DelNum)) {
                        // 修改数据中的数据
                        $where['id'] = ['IN', $DeleteID];
                        $saveData = [
                            'status' => '1',
                            'update_time' => getTime(),
                            'table_of_ontents' => $times
                        ];
                        $this->db->where($where)->update($saveData);
                        // 处理图片库指定图片
                        $this->handleUploads($ResultData, 'cleanUp');
                        // 返回提示
                        $this->success('成功移动' . $DelNum . '个文件');
                    }
                } else {
                    $this->error("请选择需要移动的文件");
                }
            }
        }
    }

    // 处理图片库指定图片
    private function handleUploads($result = [], $type = '')
    {   
        $where = [
            'image_url' => ['IN', get_arr_column($result, 'url')]
        ];
        if ('delete' == $type) {
            Db::name('uploads')->where($where)->delete(true);
        } else if ('cleanUp' == $type) {
            // 更新图片库指定图片为删除标记
            $update = [
                'is_del' => 1,
                'update_time' => getTime(),
            ];
            Db::name('uploads')->where($where)->update($update);
        } else if ('recovery' == $type) {
            // 更新图片库指定图片为删除标记
            $update = [
                'is_del' => 0,
                'update_time' => getTime(),
            ];
            Db::name('uploads')->where($where)->update($update);
        }
    }

    // 获取项目文件中的图片
    private function get_file_image()
    {
        $filenames = [];

        // 搜索公共的图片路径
        $public_path = 'public/upload/';
        if (is_dir($public_path)) {
            $upload    = $this->getDirFile($public_path, '/public/upload');
            $filenames = $upload;
        }

        // 搜索图片目录
        $uploads_path = 'uploads/';
        if (is_dir($uploads_path)) {
            $uploads   = $this->getDirFile($uploads_path, '/uploads');
            $filenames = $uploads;
        }

        // 两个目录都有则合并
        if (!empty($upload) && !empty($uploads)) $filenames = array_merge($upload, $uploads);

        // 文件处理，匹配出图片文件
        if (!empty($filenames)) {
            $returnFiles = [];
            foreach ($filenames as $key => $value) {
                $picSuffix = $this->getPicSuffix($value);
                if (in_array($picSuffix, $this->picFormatArray)) array_push($returnFiles, $value);
            }
            return $returnFiles;
        } else {
            return $filenames;
        }
    }

    // 递归读取文件夹文件
    private function getDirFile($directory = '', $dir_name = '', &$arr_file = array())
    {
        if (!file_exists($directory)) return false;

        $mydir = dir($directory);
        while($file = $mydir->read())
        {
            if ('weapp' != $file && 'thumb' != $file) {
                if((is_dir("$directory/$file")) AND ($file != ".") AND ($file != "..")) {
                    if (!empty($dir_name)) {
                        getDirFile("$directory/$file", "$dir_name/$file", $arr_file);
                    } else {
                        getDirFile("$directory/$file", "$file", $arr_file);
                    }
                    unset($file);
                } else if(($file != ".") AND ($file != "..")) {
                    if (!empty($dir_name)) {
                        $arr_file[] = "$dir_name/$file";
                    } else {
                        $arr_file[] = "$file";
                    }
                }
            }
            unset($file);
        }
        $mydir->close();
        return $arr_file;
    }

    // 获取数据库中的所有图片路径
    private function get_mysql_image()
    {
        // 获取数据库表名和字段
        $array = $this->get_array();
        // 获取数据中指定数据表的图片和文件路径
        $database_data = $this->getDatabaseData($array);
        // 获取自定义字段单图和多图数据图片
        $database_data = $this->getCustomFieldsData($database_data);
        // 返回数据
        return $database_data;
    }

    // 拼装数据库表和字段
    private function get_array()
    {
        // 自定义字段获取逻辑
        $where = 'a.ifsystem = 0 and (a.dtype = "img" || a.dtype = "imgs" || a.dtype = "htmltext")';
        $result = Db::name('channelfield')->field('a.channel_id, a.name as field, a.dtype, b.table')
            ->alias('a')
            ->join('__CHANNELTYPE__ b', 'a.channel_id = b.id', 'LEFT')
            ->order('a.channel_id desc')
            ->where($where)
            ->select();
        foreach ($result as $key => $value) {
            if (Config::get('global.arctype_channel_id') == $value['channel_id']) { 
                $result[$key]['table'] = 'arctype'; 
            } else {
                $result[$key]['table'] = $value['table'] . '_content';
            }
        }

        // 获取内置的config配置中的数据表和字段
        $array = Config::get('global.get_tablearray');

        // 积分商城、导航、商品评价图片字段
        $sqlArr = [
            19 => [
                'table' => 'memgift',
                'field' => 'litpic',
            ],
            20 => [
                'table' => 'memgift',
                'field' => 'content',
            ],
            21 => [
                'table' => 'nav_list',
                'field' => 'nav_pic',
            ],
            22 => [
                'table' => 'shop_order_comment',
                'field' => 'upload_img',
            ],
            23 => [
                'table' => 'shop_order_service',
                'field' => 'upload_img',
            ],
            24 => [
                'table' => 'product_spec_data',
                'field' => 'spec_image',
            ],
            25 => [
                'table' => 'product_spec_data_handle',
                'field' => 'spec_image',
            ],
            26 => [
                'table' => 'quickentry',
                'field' => 'litpic',
            ],
            27 => [
                'table' => 'admin_theme',
                'field' => 'theme_pic',
            ],
            28 => [
                'table' => 'admin_theme',
                'field' => 'login_logo',
            ],
            29 => [
                'table' => 'admin_theme',
                'field' => 'login_bgimg',
            ],
            30 => [
                'table' => 'admin_theme',
                'field' => 'admin_logo',
            ],
        ];

        // 合并数组
        $data_new = array_merge($result, $array, $sqlArr);

        // 返回结果集
        return $data_new;
    }

    // 获取数据中指定数据表的图片和文件路径
    private function getDatabaseData($array = [])
    {
        // 更新数据表结构
        schemaAllTable();
        // 全站数据表
        $dbtables = Db::query('SHOW TABLE STATUS');
        $tableList = array();
        foreach ($dbtables as $k => $v) {
            if (preg_match('/^'.PREFIX.'/i', $v['Name'])) {
                $tableList[] = preg_replace('/^'.PREFIX.'/i', '', $v['Name']);
            }
        }
        // 插件逻辑
        $data = $hello = array();
        $i = 0;
        foreach ($array as $value) {
            if (!in_array($value['table'], $tableList)) {
                continue;
            } else {
                $tableFieldArr = M($value['table'])->getTableInfo(PREFIX.$value['table'], 'fields');
                if (!in_array($value['field'], $tableFieldArr)) {
                    continue;
                }
            }
            $where  = $value['field'] . "<> '' ";
            $result = M($value['table'])->field($value['field'])->where($where)->select();
            // 查找多余未使用文件
            foreach ($result as $vv) {
                if ('litpic' == $value['field']) {
                    $path = parse_url($vv['litpic']);
                    if ($path['host']) {
                        $data[$i] = $path['path'];
                    } else {
                        $data[$i] = $this->images_remove_sub($path['path']);
                    }
                    $i++;
                } else if ('image_url' == $value['field']) {
                    $path = parse_url($vv['image_url']);
                    if ($path['host']) {
                        $data[$i] = $path['path'];
                    } else {
                        $data[$i] = $this->images_remove_sub($path['path']);
                    }
                    $i++;
                } else if ('logo' == $value['field']) {
                    $path = parse_url($vv['logo']);
                    if ($path['host']) {
                        $data[$i] = $path['path'];
                    } else {
                        $data[$i] = $this->images_remove_sub($path['path']);
                    }
                    $i++;
                } else if ('file_url' == $value['field']) {
                    $path = parse_url($vv['file_url']);
                    if ($path['host']) {
                        $data[$i] = $path['path'];
                    } else {
                        $data[$i] = $this->images_remove_sub($path['path']);
                    }
                    $i++;
                } else if ('head_pic' == $value['field']) {
                    $path = parse_url($vv['head_pic']);
                    if ($path['host']) {
                        $data[$i] = $path['path'];
                    } else {
                        $data[$i] = $this->images_remove_sub($path['path']);
                    }
                    $i++;
                } else if ('nav_pic' == $value['field']) {
                    $path = parse_url($vv['nav_pic']);
                    if ($path['host']) {
                        $data[$i] = $path['path'];
                    } else {
                        $data[$i] = $this->images_remove_sub($path['path']);
                    }
                    $i++;
                } else if ('upload_img' == $value['field']) {
                    if ('shop_order_service' == $value['table']) {
                        $upload_img = !empty($vv['upload_img']) ? explode(',', $vv['upload_img']) : [];
                    } else {
                        $upload_img = !empty($vv['upload_img']) ? explode(',', unserialize($vv['upload_img'])) : [];
                    }
                    foreach ($upload_img as $img) {
                        $path = parse_url($img);
                        if ($path['host']) {
                            $data[$i] = $path['path'];
                        } else {
                            $data[$i] = $this->images_remove_sub($path['path']);
                        }
                        $i++;
                    }
                } else if ('intro' == $value['field']) {
                    $str = htmlspecialchars_decode($vv['intro']);
                    $str = strip_tags($str, '<img>');
                    preg_match_all('/\<img(.*?)src\=[\'|\"]([\w:\/\.\-]+)[\'|\"]/i', $str, $matches);
                    $match = $matches[2];
                    foreach ($match as $vvv) {
                        $data[$i] = $this->images_remove_sub($vvv);
                        $i++;
                    }
                } else if ('content' == $value['field']) {
                    $str = htmlspecialchars_decode($vv['content']);
                    $str = strip_tags($str, '<img>');
                    preg_match_all('/\<img(.*?)src\=[\'|\"]([\w:\/\.\-]+)[\'|\"]/i', $str, $matches);
                    $match = $matches[2];
                    foreach ($match as $vvv) {
                        $data[$i] = $this->images_remove_sub($vvv);
                        $i++;
                    }
                } else if ('config' == $value['table']) {
                    $strlen = strlen(ROOT_DIR);
                    if (substr($vv['value'], $strlen, 7 ) == '/public' || substr($vv['value'], $strlen, 7 ) == '/upload') {
                        $data[$i] = $this->images_remove_sub($vv['value']);
                        $i++;
                    }
                } else if ('ui_config' == $value['table']) {
                    $values = json_decode($vv['value'],true);
                    $str = htmlspecialchars_decode($values['info']['value']);
                    $str = strip_tags($str, '<img>');
                    preg_match_all('/\<img(.*?)src\=[\'|\"]([\w:\/\.\-]+)[\'|\"]/i', $str, $matches);
                    $match = $matches[2];
                    foreach ($match as $vvv) {
                        $data[$i] = $this->images_remove_sub($vvv);
                        $i++;
                    }
                } else if ($value['channel_id']) {
                    if ('imgs' == $value['dtype']) {
                        $fields_img = !empty($vv[$value['field']]) ? unserialize($vv[$value['field']]) : [];
                        if (!empty($fields_img)) {
                            foreach ($fields_img as $img) {
                                $path = parse_url($img['image_url']);
                                if ($path['host']) {
                                    $data[$i] = $path['path'];
                                } else {
                                    $data[$i] = $this->images_remove_sub($path['path']);
                                }
                                $i++;
                            }
                        } else {
                            $hello = explode(',', $vv[$value['field']]);
                        }
                    } else if ('img' == $value['dtype']) {
                        $path = parse_url($vv[$value['field']]);
                        if ($path['host']) {
                            $data[$i] = $path['path'];
                        } else {
                            $data[$i] = $this->images_remove_sub($path['path']);
                        }
                        $i++;
                    } else if ('htmltext' == $value['dtype']) {
                        $str = htmlspecialchars_decode($vv[$value['field']]);
                        $str = strip_tags($str, '<img>');
                        preg_match_all('/\<img(.*?)src\=[\'|\"]([\w:\/\.\-]+)[\'|\"]/i', $str, $matches);
                        $match = $matches[2];
                        foreach ($match as $vvv) {
                            $data[$i] = $this->images_remove_sub($vvv);
                            $i++;
                        }
                    }
                }
            }
        }

        $data = array_merge($data, $hello);
        $data = array_unique($data);
        return $data;
    }

    // 获取自定义字段单图和多图数据图片
    private function getCustomFieldsData($database_data = [])
    {
        // 查询会员自定义字段ID(单图和多图)
        $where = [
            'dtype' => ['IN', ['img', 'imgs']]
        ];
        $para_id = Db::name('users_parameter')->where($where)->column('para_id');
        $usersPicArr = [];
        if (!empty($para_id)) {
            // 查询会员自定义字段(单图和多图)上传的图片并处理
            $where = [
                'para_id' => ['IN', $para_id]
            ];
            $infoArr = Db::name('users_list')->where($where)->column('info');
            foreach ($infoArr as $key => $value) {
                $valueArr = !empty($value) ? explode(',', $value) : [];
                $usersPicArr = array_merge($usersPicArr, $valueArr);
            }
            foreach ($usersPicArr as $key => $value) {
                $value = $this->images_remove_sub($value);
                $usersPicArr[$key] = $value;
            }
        }
        // 合并需要处理的图片
        $database_data = !empty($usersPicArr) ? array_merge($database_data, $usersPicArr) : $database_data;

        // 查询栏目自定义字段ID(单图和多图)
        $where = [
            'channel_id' => '-99',
            'name' => ['NEQ', 'litpic'],
            'dtype' => ['IN', ['img', 'imgs']]
        ];
        $fields = Db::name('channelfield')->where($where)->column('name');
        $arctypePicArr = [];
        if (!empty($fields)) {
            // 查询栏目自定义字段(单图和多图)上传的图片并处理
            $fieldArr = Db::name('arctype')->field($fields)->select();
            foreach ($fieldArr as $value) {
                foreach ($value as $value_1) {
                    $value_2 = unserialize($value_1);
                    if (!empty($value_1) && empty($value_2)) {
                        $valueArr = [$this->images_remove_sub($value_1)];
                        $arctypePicArr = array_merge($arctypePicArr, $valueArr);
                    } else if (is_array($value_2) && !empty($value_2[0])) {
                        foreach ($value_2 as $value_3) {
                            $valueArr = [$this->images_remove_sub($value_3['image_url'])];
                            $arctypePicArr = array_merge($arctypePicArr, $valueArr);
                        }
                    }
                }
            }
        }
        // 合并需要处理的图片
        $database_data = !empty($arctypePicArr) ? array_merge($database_data, $arctypePicArr) : $database_data;

        // 查询留言自定义字段(单图和多图)
        $where = [
            'attr_input_type' => ['IN', [5, 11]]
        ];
        $attr_id = Db::name('guestbook_attribute')->where($where)->column('attr_id');
        $guestbookPicArr = [];
        if (!empty($attr_id)) {
            // 查询留言自定义字段(单图和多图)上传的图片并处理
            $where = [
                'attr_id' => ['IN', $attr_id]
            ];
            $attrValue = Db::name('guestbook_attr')->where($where)->column('attr_value');
            foreach ($attrValue as $key => $value) {
                $valueArr = !empty($value) ? explode(',', $value) : [];
                $guestbookPicArr = array_merge($guestbookPicArr, $valueArr);
            }
            foreach ($guestbookPicArr as $key => $value) {
                $value = $this->images_remove_sub($value);
                $guestbookPicArr[$key] = $value;
            }
        }
        // 合并需要处理的图片
        $database_data = !empty($guestbookPicArr) ? array_merge($database_data, $guestbookPicArr) : $database_data;

        // 返回数据
        return $database_data;
    }

    // 在图片清理插件读取数据库图片时，删除子目录前缀
    private function images_remove_sub($images = null)
    {
        $images = preg_replace('#^(/[/\w]+)?(/public/upload/|/uploads/)#i', '$2', $images);
        return $images;
    }

    // 批量添加传入的图片
    private function savePicData($saveData = [])
    {
        if (!empty($saveData)) $this->db->insertAll($saveData);
    }

    // 图片回收站列表页
    public function lists()
    {
        $list = array();
        $keywords = input('keywords/s');

        $map = array();
        if (!empty($keywords)) {
            $map['table_of_ontents'] = array('LIKE', "%{$keywords}%");
        }

        $map['status'] = 1; // status=1为被清理数据

        $count = $this->db->where($map)
            ->group('table_of_ontents')
            ->count('id');// 查询满足要求的总记录数
        $pageObj = new Page($count, config('paginate.list_rows'));// 实例化分页类 传入总记录数和每页显示的记录数
        $result = $this->db->field('*, count(id) AS count')
            ->where($map)
            ->group('table_of_ontents')
            ->order('id desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        $pageStr = $pageObj->show(); // 分页显示输出
        $this->assign('result', $result); // 赋值数据集
        $this->assign('pageStr', $pageStr); // 赋值分页输出
        $this->assign('pageObj', $pageObj); // 赋值分页对象

        return $this->fetch('lists');
    }

    // 查看文件-已清理
    public function clean_up_list()
    {
        $table_of_ontents = (int)input('param.table_of_ontents');
        if (!empty($table_of_ontents)) {
            // 查询条件
            $where = [
                // 已清理数据
                'status' => 1,
                // 查看目录
                'table_of_ontents' => $table_of_ontents,
            ];

            // 查询分页
            $count = $this->db->where($where)->order('id asc')->count('id');
            $pageObj = new Page($count, 56); // config('paginate.list_rows')

            // 查询图片数据并处理
            $resultData = $this->db->where($where)->order('id asc')->limit($pageObj->firstRow.','.$pageObj->listRows)->select();
            foreach ($resultData as $key => $value) {
                $picSuffix = $this->getPicSuffix($value['url']);
                if (in_array($picSuffix, $this->picFormatArray)) {
                    $resultData[$key]['url'] = ROOT_DIR . '/data/tempimg/' . $table_of_ontents . $value['url'];
                } else {
                    $resultData[$key]['url'] = ROOT_DIR . '/public/static/common/images/Archive.png';
                }
            }
            $this->assign('path', 'data/tempimg/' . $table_of_ontents);
            $this->assign('result', $resultData);
            $this->assign('Page', $pageObj->show());
        }
        return $this->fetch('clean_up_list');
    }

    // 还原文件
    public function recovery()
    {
        $table_of_ontents = input('param.table_of_ontents');
        if (!empty($table_of_ontents)) {
            // 查询要还原的图片
            $where = [
                "table_of_ontents" => $table_of_ontents
            ];
            $result = $this->db->where($where)->select();
            // 删除图片清理表数据
            $deleteID = $this->db->where($where)->delete(true);
            if (!empty($deleteID)) {
                // 复制图片回原地方
                recurse_copy(DATA_PATH . 'tempimg/' . $table_of_ontents . ROOT_DIR, ROOT_PATH);
                // 删除指定文件夹
                delFile(DATA_PATH . 'tempimg/' . $table_of_ontents . ROOT_DIR, true);
                // 处理图片库指定图片
                $this->handleUploads($result, 'recovery');
                // 返回结束
                $this->success('还原成功！');
            } else {
                $this->error('还原失败！');
            }
        } else {
            $this->error('参数错误！');
        }
    }
    
    // 单个删除文件
    public function del()
    {
        $table_of_ontents = input('param.table_of_ontents');
        if (!empty($table_of_ontents)) {
            // 查询要删除的图片
            $where = [
                "table_of_ontents" => $table_of_ontents
            ];
            $result = $this->db->where($where)->select();
            // 删除图片清理表数据
            $deleteID = $this->db->where($where)->delete(true);
            if (!empty($deleteID)) {
                // 删除指定文件夹
                delFile(DATA_PATH . 'tempimg' . DS . $table_of_ontents, true);
                // 处理图片库指定图片
                $this->handleUploads($result, 'delete');
                // 返回结束
                $this->success('删除成功！');
            } else {
                $this->error('删除失败！');
            }
        } else {
            $this->error('参数错误！');
        }
    }

    // 批量删除文件
    public function batch_del()
    {
        $table_arr = input('param.table_of_ontents/a');
        $table_arr = eyIntval($table_arr);
        if (!empty($table_arr)) {
            // 查询要删除的图片
            $where = [
                "table_of_ontents" => ['IN', $table_arr]
            ];
            $result = $this->db->where($where)->select();
            // 删除图片清理表数据
            $deleteID = $this->db->where($where)->delete(true);
            if (!empty($deleteID)) {
                // 删除指定文件夹
                foreach ($table_arr as $value) {
                    delFile(DATA_PATH . 'tempimg' . DS . $value, true);
                }
                // 处理图片库指定图片
                $this->handleUploads($result, 'delete');
                // 返回结束
                $this->success("操作成功!");
            } else {
                $this->error("操作失败!");
            }
        } else {
            $this->error("参数有误!");
        }
    }

    // 获取图片完整后缀 --- (.png)
    private function  getPicSuffix($path = '')
    {
        return !empty($path) ? strtolower(strrchr($path, '.')) : '';
    }
}