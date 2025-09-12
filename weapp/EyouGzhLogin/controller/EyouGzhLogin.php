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

namespace weapp\EyouGzhLogin\controller;

use think\Db;
use app\common\controller\Weapp;
use weapp\EyouGzhLogin\logic\EyouGzhLoginLogic;

/**
 * 微信扫码登录
 */
class EyouGzhLogin extends Weapp
{
    public $admin_info = [];
    public $logic = null;

    public function _initialize() {
        parent::_initialize();
        $this->logic = new EyouGzhLoginLogic;
        $this->admin_info = session('?admin_info') ? session('admin_info') : [];

        /*插件基本信息*/
        $this->weappInfo = $this->getWeappInfo();
        $this->assign('weappInfo', $this->weappInfo);
        /*--end*/
    }

    public function afterInstall()
    {
        $data = [
            'is_open' => 0,
            'mode' => 'WechatLogin',
            'install_time' => getTime(),
        ];
        $saveData = [
            'data'=>serialize($data),
            'tag_weapp' => 2,
            'update_time'=>getTime(),
        ];
        Db::name('weapp')->where('code','EyouGzhLogin')->update($saveData);
    }

    /**
     * 插件使用指南
     */
    public function doc(){
        return $this->fetch('doc');
    }

    /**
     * 插件后台管理 - 列表
     */
    public function index()
    {
        if (IS_POST) {
            $post = input('post.');
            $gzhPost = $post['gzh'];
            $wechatPost = $post['wechat'];
            $settingData = [
                'security_wechat_open'  => 0,
            ];

            $data = Db::name('weapp')->where('code','EyouGzhLogin')->value('data');
            $data = !empty($data) ? unserialize($data) : [];
            if (empty($data)) {
                $data['gzh'] = ['switch'=>0];
            }
            $data['is_open'] = intval($post['is_open']);
            $data['mode'] = $post['mode'];

            if (!empty($post['is_open'])) {
                if ('WechatLogin' == $post['mode']) {
                    $appid = trim($wechatPost['appid']);
                    if (empty($appid)) {
                        $this->error('AppID不能为空！');
                    }

                    $secret = trim($wechatPost['secret']);
                    if (empty($appid)) {
                        $this->error('AppSecret不能为空！');
                    }

                    $force = 0;
                    if (1 == intval($wechatPost['force'])) {
                        $openid = Db::name('admin_wxlogin')->where(['admin_id'=>$this->admin_info['admin_id'], 'type'=>2])->value('openid');
                        if (!empty($openid)) {
                            $force = 1;
                            $this->admin_info['openid'] = $openid;
                        }
                    } else {
                        if (isset($this->admin_info['openid'])) {
                            unset($this->admin_info['openid']);
                        }
                    }

                    $settingData['security_wechat_open'] = 1;
                    $settingData['security_wechat_appid'] = $appid;
                    $settingData['security_wechat_secret'] = $secret;
                    $settingData['security_wechat_forcelogin'] = $force;
                }
                else if ('EyouGzhLogin' == $post['mode']) {
                    $force = 0;
                    if (1 == intval($gzhPost['force'])) {
                        $openid = Db::name('admin_wxlogin')->where(['admin_id'=>$this->admin_info['admin_id'], 'type'=>1])->value('openid');
                        if (!empty($openid)) {
                            $force = 1;
                            $this->admin_info['openid'] = $openid;
                        }
                    } else {
                        if (isset($this->admin_info['openid'])) {
                            unset($this->admin_info['openid']);
                        }
                    }
                    $data['gzh']['force'] = $force;
                    $data['gzh']['switch'] = 1; // 兼容内置代码
                }
            }

            $saveData = [
                'data'=>serialize($data),
                'tag_weapp' => 2,
                'update_time'=>getTime(),
            ];
            $r = Db::name('weapp')->where('code','EyouGzhLogin')->update($saveData);
            if ($r !== false){
                /*多语言*/
                if (is_language()) {
                    $langRow = \think\Db::name('language')->order('id asc')
                        ->cache(true, EYOUCMS_CACHE_TIME, 'language')
                        ->select();
                    foreach ($langRow as $key => $val) {
                        tpSetting('security', $settingData, $val['mark']);
                    }
                } else {
                    tpSetting('security', $settingData);
                }
                /*--end*/
                session('admin_info', $this->admin_info);
                extra_cache('common_weapp_getWeappList', NULL);
                $this->success('保存成功');
            }
            $this->error('保存失败');
        }

        $data = Db::name('weapp')->where('code','EyouGzhLogin')->value('data');
        $data = !empty($data) ? unserialize($data) : [];
        $this->assign('data',$data);

        $security = tpSetting('security');
        $this->assign('security', $security);

        return $this->fetch('index');
    }

    /**
     * 检测是否满足条件强制开启微信登录
     * @return [type] [description]
     */
    public function ajax_check_forcelogin()
    {
        $type = input('param.type/d');
        if (IS_POST && !empty($type)) {
            $count = Db::name('admin_wxlogin')->where(['admin_id'=>$this->admin_info['admin_id'], 'type'=>$type])->count();
            if (!empty($count)) {
                $this->success('已绑定');
            } else {
                $this->error('请先在管理员个人信息里绑定微信！');
            }
        }
        $this->error('操作失败');
    }
}