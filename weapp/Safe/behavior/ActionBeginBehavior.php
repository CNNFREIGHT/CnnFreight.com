<?php

namespace weapp\Safe\behavior;

use think\Db;
use weapp\Safe\model\SafeModel;

/**
 * 系统行为扩展：新增/更新/删除之后的后置操作
 */
load_trait('controller/Jump');
class ActionBeginBehavior {
    use \traits\controller\Jump;
    protected static $actionName;
    protected static $controllerName;
    protected static $moduleName;
    protected static $method;

    /**
     * 构造方法
     * @param Request $request Request对象
     * @access public
     */
    public function __construct()
    {

    }

    // 行为扩展的执行入口必须是run
    public function run(&$params){
        self::$actionName = strtolower(request()->action());
        self::$controllerName = request()->controller();
        self::$moduleName = request()->module();
        self::$method = strtoupper(request()->method());
        $this->_initialize();
    }

    private function _initialize() {
        $this->sys_opt_check();
    }

    private function sys_opt_check()
    {
        $safeModel = new SafeModel;
        $rdata = $safeModel->is_pass_blockip();
        if (!empty($rdata['code'])) {
            return true;
        } else {
            $data = $rdata['data'];
        }

        if ('admin' == self::$moduleName) {
            if (!empty($data['prohibit_adminlogin'])) {
                session_unset();
                \think\Session::clear();
                $this->error('异常登录，不在特定范围内', ROOT_DIR.'/');
            }
            else if (in_array(self::$actionName, ['check_authority','onekeyupgrade'])) {
                if (in_array(self::$controllerName, ['Upgrade','Weapp'])) {
                    if (!empty($data['prohibit_upgrade'])) {
                        $this->error('已禁止升级功能');
                    }
                }
            }
            else if ('Ueditor' == self::$controllerName) {
                if (!empty($data['prohibit_upload'])) {
                    $upload_act_arr = ['upFile','saveRemote','imageUp','appFileUp','DownloadUploadFile','DownloadUploadFileAjax','upVideo'];
                    foreach ($upload_act_arr as $key => $val) {
                        $upload_act_arr[$key] = strtolower($val);
                    }
                    if ('POST' == self::$method || in_array(self::$actionName, $upload_act_arr)) {
                        $res = [
                            'code' => 0,
                            'msg' => '已禁止上传功能',
                        ];
                        $res['state'] = $res['msg'];
                        respose($res,'json');
                    }
                }
            }
            else {
                if ('POST' == self::$method) {
                    $act_list = [
                        'release',
                        'clear_cache',
                        'get_common_list',
                        'ajax_get_region_data',
                    ];
                    foreach ($act_list as $key => $val) {
                        $act_list[$key] = strtolower($val);
                    }
                    $filter_login_action = config('filter_login_action');
                    $ctl_act_list = [];
                    $ctl_act_list = array_merge($ctl_act_list, $filter_login_action);
                    $ctl_act_list = $this->actionTolower($ctl_act_list);

                    $nosubmit = input('param.nosubmit/d', 0);
                    if ('ajax_newtpl' == self::$actionName && 1 == $nosubmit) {

                    } else {
                        if(!in_array(self::$actionName, $act_list) && !in_array(self::$controllerName.'@'.self::$actionName, $ctl_act_list)){
                            if (!empty($data['prohibit_save'])) {
                                $this->error('已禁止保存/删除功能');
                            }
                        }
                    }
                }
            }
        }
        else if ('api' == self::$moduleName) {
            if ('POST' == self::$method) {
                self::$controllerName = strtolower(self::$controllerName);
                if (!empty($data['prohibit_upload'])) {
                    $ctl_act_list = [
                        'Diyminipro@uploads',
                        'Diyminipro@uploads_file',
                        'v1.Api@uploads',
                        'v1.Api@upload_head_pic',
                    ];
                    $ctl_act_list = $this->actionTolower($ctl_act_list);
                    $ctl_act_list = $this->controllerTolower($ctl_act_list);

                    if(in_array(strtolower(self::$controllerName).'@'.self::$actionName, $ctl_act_list)){
                        $this->error('已禁止上传功能');
                    }
                }
                if (!empty($data['prohibit_save'])) {
                    $ctl_act_list = [
                        'Diyminipro@guestbook',
                        'Diyminipro@save_form',
                        'v1.Api@submitArticleComment',
                        'v1.Api@addArticleReply',
                        'v1.Api@guestbook',
                        'v1.Users@save_comment',
                        'v1.Users@save_user_info',
                        'v1.Users@guestbook',
                        'v1.Users@add_ask',
                        'v1.Users@add_answer',
                    ];
                    $ctl_act_list = $this->actionTolower($ctl_act_list);
                    $ctl_act_list = $this->controllerTolower($ctl_act_list);

                    if(in_array(strtolower(self::$controllerName).'@'.self::$actionName, $ctl_act_list)){
                        $this->error('已禁止保存/删除功能');
                    }
                }
            }
        }
        else if ('plugins' == self::$moduleName) {
            if ('POST' == self::$method) {
                if (!empty($data['prohibit_upload'])) {
                    $ctl_act_list = [
                        'BdDiyminipro@uploads',
                        'BdDiyminipro@uploads_file',
                        'TtDiyminipro@uploads',
                        'TtDiyminipro@uploads_file',
                        'DiyminiproMall@uploads',
                        'DiyminiproMall@uploads_file',
                    ];
                    $ctl_act_list = $this->actionTolower($ctl_act_list);

                    if(in_array(self::$controllerName.'@'.self::$actionName, $ctl_act_list)){
                        $this->error('已禁止上传功能');
                    }
                }
                if (!empty($data['prohibit_save'])) {
                    $ctl_list = [
                        'BdDiyminipro',
                        'BdDiyminiproUsers',
                        'TtDiyminipro',
                        'DiyminiproMall',
                    ];
                    $ctl_act_list = [
                        'BdDiyminipro@guestbook',
                        'BdDiyminiproUsers@save_form',
                        'BdDiyminiproUsers@comment_submit',
                        'TtDiyminipro@guestbook',
                        'TtDiyminipro@save_form',
                        'TtDiyminipro@save_user_info',
                        'TtDiyminipro@shop_address_action',
                        'TtDiyminipro@save_comment',
                        'DiyminiproMall@guestbook',
                        'DiyminiproMall@save_form',
                    ];
                    $ctl_act_list = $this->actionTolower($ctl_act_list);

                    if(in_array(self::$controllerName.'@'.self::$actionName, $ctl_act_list) || !preg_match('/minipro/i', self::$controllerName)){
                        $this->error('已禁止保存/删除功能');
                    }
                }
            }
        }
        else {
            if ('Uploadify' == self::$controllerName) {
                if (!empty($data['prohibit_upload'])) {
                    $upload_act_arr = ['saveRemote','imageUp','DownloadUploadFileAjax','AjaxUploadMedia','DownloadUploadFile','upVideo','del_local'];
                    foreach ($upload_act_arr as $key => $val) {
                        $upload_act_arr[$key] = strtolower($val);
                    }
                    if ('POST' == self::$method || in_array(self::$actionName, $upload_act_arr)) {
                        $res = [
                            'code' => 0,
                            'msg' => '已禁止上传功能',
                        ];
                        $res['state'] = $res['msg'];
                        respose($res,'json');
                    }
                }
            }
            else {
                if ('POST' == self::$method) {
                    $filter_login_action = config('filter_login_action');
                    $ctl_act_list = [];
                    $ctl_act_list = array_merge($ctl_act_list, $filter_login_action);
                    $ctl_act_list = $this->actionTolower($ctl_act_list);

                    if(!in_array(self::$controllerName.'@'.self::$actionName, $ctl_act_list)){
                        if (!empty($data['prohibit_save'])) {
                            $this->error('已禁止保存/删除功能');
                        }
                    }
                }
            }
        }
    }

    /**
     * 控制器的方法转成小写
     * @param  array  $ctl_act_list [description]
     * @return [type]               [description]
     */
    private function actionTolower($ctl_act_list = [])
    {
        foreach ($ctl_act_list as $key => $val) {
            $arr = explode('@', $val);
            $arr[1] = strtolower($arr[1]);
            $val = implode('@', $arr);
            $ctl_act_list[$key] = $val;
        }

        return $ctl_act_list;
    }

    /**
     * 控制器转成小写
     * @param  array  $ctl_act_list [description]
     * @return [type]               [description]
     */
    private function controllerTolower($ctl_act_list = [])
    {
        foreach ($ctl_act_list as $key => $val) {
            $arr = explode('@', $val);
            $arr[0] = strtolower($arr[0]);
            $val = implode('@', $arr);
            $ctl_act_list[$key] = $val;
        }

        return $ctl_act_list;
    }
}
