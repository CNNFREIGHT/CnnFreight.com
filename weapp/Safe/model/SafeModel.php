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
 * Date: 2018-4-3
 */

namespace weapp\Safe\model;

use think\Db;
use think\Model;
use think\Cache;

/**
 * 模型
 */
class SafeModel extends Model
{
    /**
     * 数据表名，不带前缀
     */
    public $name = 'weapp_safe';

    /**
     * 插件标识
     */
    public $code = 'Safe';

    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
    }

    /**
     * 获取数据
     */
    public function getWeappData()
    {
        $cacheKey = 'weapp_safe_1715133369';
        $data = Cache::get($cacheKey);
        if (empty($data)) {
            $row = Db::name('weapp')->where(['code'=>$this->code])->find();
            if (!empty($row['data'])) {
                $data = json_decode($row['data'], true);
            } else {
                $data = [];
            }

            if (!isset($data['is_open'])) {
                $data['is_open'] = (1 == $row['status']) ? 1 : 0;
            }
            Cache::set($cacheKey, $data);
        }
        $data['ip_whitelist'] = empty($data['ip_whitelist']) ? '' : $data['ip_whitelist'];

        return $data;
    }

    /**
     * 当前访问ip是否在白名单里
     * @param  string  $currentIp [description]
     * @return boolean            [description]
     */
    public function is_pass_blockip($currentIp = '')
    {
        $moduleName = request()->module();
        $controllerName = request()->controller();
        $actionName = request()->action();
        $sm = input('param.sm/s');
        $data = $this->getWeappData();
        if (empty($data['is_open']) || 'admin@Weapp@execute@Safe' == "{$moduleName}@{$controllerName}@{$actionName}@{$sm}") {
            return ['code'=>1, 'msg'=>'不受限制'];
        }
        else {
            empty($currentIp) && $currentIp = clientIP();
            //预留测试IP
            //$currentIp = '220.194.58.240';//北京市
            //$currentIp = '59.39.145.178';//广东省 惠州市
            //$currentIp = '203.69.66.102';//台湾省
            //$currentIp = '169.235.24.133';//美国 加利福尼亚
            //$currentIp = '115.68.28.11';//韩国 首尔
            // $currentIp = '153.19.50.62';//波兰
            $blockip_check = false;

            if (false === $blockip_check) {
                static $uneyousafe = null;
                if (null === $uneyousafe) {
                    $file = DATA_PATH.'conf'.DS.'uneyousafe.txt';
                    $uneyousafe = file_exists($file) ? true : false;
                }
                $blockip_check = $uneyousafe;
            }
            
            $rdata = $this->safe_blockip_check($currentIp, $data['ip_whitelist'], $blockip_check);
            $data['ip_whitelist'] = $rdata['ip_whitelist'];
            $blockip_check = $rdata['blockip_check'];

            if (true === $blockip_check) {
                return ['code'=>1, 'msg'=>'不受限制'];
            }

            return ['code'=>0, 'msg'=>'不在白名单里，功能限制', 'data'=>$data];
        }
    }

    /**
     * 检测ip是否在白名单范围内
     * @param  [type]  $currentIp     [description]
     * @param  string  $ip_whitelist  [description]
     * @param  boolean $blockip_check [description]
     * @return [type]                 [description]
     */
    public function safe_blockip_check($currentIp, $ip_whitelist = '', $blockip_check = false)
    {
        $ip_whitelist = str_replace(["\r\n"], PHP_EOL, $ip_whitelist);
        $ip_whitelist = str_replace(["\r", "\n"], PHP_EOL, $ip_whitelist);
        $ip_whitelist = explode(PHP_EOL, $ip_whitelist);
        $ip_whitelist = array_unique($ip_whitelist);
        $ip_whitelist = array_filter($ip_whitelist);
        if (false === $blockip_check) {
            if (!empty($ip_whitelist)) {
                foreach ($ip_whitelist as $key => $value) {
                    $value = trim($value);
                    if (strstr($value, '-')) {
                        $valueArr = explode('-', $value);
                        $valueMin = !empty($valueArr[0]) ? trim($valueArr[0]) : '';
                        $valueMax = !empty($valueArr[1]) ? trim($valueArr[1]) : '';
                        if (ip2long($currentIp) >= ip2long($valueMin) && ip2long($currentIp) <= ip2long($valueMax)) {
                            $blockip_check = true;
                            break;
                        }
                    } else {
                        if (ip2long($currentIp) == ip2long($value)) {
                            $blockip_check = true;
                            break;
                        }
                    }
                }
            } else {
                $blockip_check = true;
            }
        }

        return [
            'ip_whitelist' => $ip_whitelist,
            'blockip_check' => $blockip_check,
        ];
    }
}