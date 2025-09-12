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

namespace weapp\Users\controller;

use think\Page;
use think\Db;
use app\common\controller\Weapp;
use weapp\Users\model\UsersTypeModel;
/**
 * 插件的控制器
 */
class Users extends Weapp
{

    /**
     * 构造方法
     */
    public function __construct(){
        parent::__construct();
		/*插件基本信息*/
		$this->UsersTypeModel = new UsersTypeModel;
        $this->weappInfo = $this->getWeappInfo();
        $this->assign('weappInfo', $this->weappInfo);
        /*--end*/
        /*--end*/
    }

	/**
     * 插件安装的后置操作
     * @return [type] [description]
     */
    public function afterInstall()
    {
        // 系统默认是自动调用，这里在安装完插件之后，更改为手工调用
        $savedata = [
            'tag_weapp' => 2,
            'update_time'   => getTime(),
        ];
        Db::name('weapp')->where(['code'=>'Users'])->update($savedata);
    }
	/**
     * 系统内置钩子show方法（没用到这个方法，建议删掉）
     * 用于在前台模板显示片段的html代码，比如：QQ客服、对联广告等
     *
     * @param  mixed  $params 传入的参数
     */
    public function show($params = null){
        echo $this->fetch('show');
    }
    /**
     * 插件后台管理 - 列表
     */
    public function index()
    {
		/*会员中心URL模式*/
        $users_seo_pseudo = 1; // 默认动态URL
        $usersConfData = $this->UsersTypeModel->getWeappData();
        if (!empty($usersConfData['data']['seo_pseudo'])) {
            $users_seo_pseudo = intval($usersConfData['data']['seo_pseudo']);
        }

		$weapp = Db::name('weapp')->where(['code'=>'Users'])->find();
		if ($weapp['tag_weapp'] == 1){
			$savedata = [
                'tag_weapp' => 2,
                'update_time'   => getTime(),
            ];
			Db::name('weapp')->where(['code'=>'Users'])->update($savedata);
		}
		$this->assign('usersConfData',$usersConfData);
        return $this->fetch('index');
    }

	 public function setData()
    {
        if (IS_AJAX_POST) {
            $name = input('post.name/s');
            $value = input('post.value/d');
            $data[$name] = $value;
            $saveData = array(
                'data' => serialize($data),
                'update_time' => getTime(),
            );
            $r = Db::name('weapp')->where(array('code' => $this->weappInfo['code']))->update($saveData);
            if ($r) {
                delFile(HTML_ROOT); //清除页面缓存，让整站导航及时刷新问答链接
                adminLog('编辑' . $this->weappInfo['name'] . '成功'); // 写入操作日志
                $this->success("操作成功", weapp_url('Users/Users/index'));
            }
        }
        $this->error('操作失败');
    }
}