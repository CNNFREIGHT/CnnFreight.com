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

namespace weapp\Safe\controller;

use think\Page;
use think\Db;
use think\Cache;
use app\common\controller\Weapp;
use weapp\Safe\model\SafeModel;
use weapp\Safe\logic\SafeLogic;

/**
 * 插件的控制器
 */
class Safe extends Weapp
{
    /**
     * 实例化模型
     */
    private $model;

    /**
     * 实例化对象
     */
    private $logic;

    /**
     * 插件基本信息
     */
    private $weappInfo;

    /**
     * 构造方法
     */
    public function __construct(){
        parent::__construct();
        $this->model = new SafeModel;
        $this->logic = new SafeLogic;

        /*插件基本信息*/
        $this->weappInfo = $this->getWeappInfo();
        $this->assign('weappInfo', $this->weappInfo);
        /*--end*/
    }

    /**
     * 插件安装后置操作
     */
    public function afterInstall()
    {
        // 系统默认是自动调用，这里在安装完插件之后，更改为手工调用
        $savedata = [
            'tag_weapp' => 2,
            'update_time'   => getTime(),
        ];
        Db::name('weapp')->where(['code'=>'Safe'])->update($savedata);
    }

    /**
     * 插件后台管理 - 列表
     */
    public function index()
    {
        if (IS_POST) {
            $post = input('post.');
            $data = [];
            $data['ip_whitelist'] = empty($post['ip_whitelist']) ? '' : $post['ip_whitelist'];
            $data['prohibit_adminlogin'] = empty($post['prohibit_adminlogin']) ? 0 : $post['prohibit_adminlogin'];
            $data['prohibit_save'] = empty($post['prohibit_save']) ? 0 : $post['prohibit_save'];
            $data['prohibit_upload'] = empty($post['prohibit_upload']) ? 0 : $post['prohibit_upload'];
            $data['prohibit_upgrade'] = empty($post['prohibit_upgrade']) ? 0 : $post['prohibit_upgrade'];

            $currentIp = clientIP();
            $rdata = $this->model->safe_blockip_check($currentIp, $data['ip_whitelist'], false);
            if (empty($rdata['blockip_check'])) {
                $ipStart = preg_replace('/\.\d{1,3}\.\d{1,3}$/i', '.0.1', $currentIp);
                $ipEnd = preg_replace('/\.\d{1,3}\.\d{1,3}$/i', '.255.255', $currentIp);
                $this->error("当前IP（{$currentIp}）没在IP段白名单内，<br/>可添加固定单个IP，或可变的IP段范围，<br/>以下仅供参考（按需调整IP范围）:<br/>{$ipStart}-{$ipEnd}");
            }

            $saveData = array(
                'data' => json_encode($data),
                'tag_weapp' => 2,
                'update_time' => getTime(),
            );
            $r = M('weapp')->where('code','Safe')->update($saveData);
            if ($r !== false) {
                $cacheKey = 'weapp_safe_1715133369';
                Cache::rm($cacheKey);
                \think\Cache::clear('hooks');
                adminLog('编辑'.$this->weappInfo['name'].'：插件配置'); // 写入操作日志
                $this->success("操作成功!", weapp_url('Safe/Safe/index'));
            }
            $this->error("操作失败!");
        }

        $row = $this->model->getWeappData();
        $this->assign('row', $row);

        $currentIp = clientIP();
        $ipStart = preg_replace('/\.\d{1,3}\.\d{1,3}$/i', '.0.1', $currentIp);
        $ipEnd = preg_replace('/\.\d{1,3}\.\d{1,3}$/i', '.255.255', $currentIp);
        $this->assign('ipSegment', "{$ipStart}-{$ipEnd}");
        $this->assign('currentIp', $currentIp);

        return $this->fetch('index');
    }
}