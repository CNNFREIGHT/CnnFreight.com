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

namespace weapp\EyouGzhLogin\logic;

use think\Db;
use think\Model;

load_trait('controller/Jump');
class EyouGzhLoginLogic extends Model
{
    use \traits\controller\Jump;
    private $admin_info = [];

    /**
     * 初始化操作
     */
    public function initialize() {
        parent::initialize();
        $this->admin_info = session('?admin_info') ? session('admin_info') : [];
    }

    /**
     * 获取基础设置->网站网址
     * @return [type] [description]
     */
    public function get_web_basehost()
    {
        $web_basehost = tpCache('web.web_basehost');
        $web_basehost = preg_replace('/^(([^\:]+):)?(\/\/)?([^\/\:]*)(.*)$/i', '${4}', $web_basehost);

        return $web_basehost;
    }

    /**
     * 获取浏览器地址栏的域名
     * @return [type] [description]
     */
    public function get_web_domain()
    {
        $host = request()->host(true);
        if (empty($host) || false !== filter_var($host, FILTER_VALIDATE_IP) || file_exists('./data/conf/multidomain.txt')) {
            $host = $this->get_web_basehost();
        }
        $host = preg_replace('/^(([^\:]+):)?(\/\/)?([^\/\:]*)(.*)$/i', '${4}', $host);

        return $host;
    }

    //获取公众号二维码
    public function mp_getqrcode()
    {
        \think\Session::pause(); // 暂停session，防止session阻塞机制
        if (IS_AJAX_POST) {
            $postData = [];
            $op = input('post.op/s','bind');
            $postData['op'] = $op;
            $postData['domain'] = $this->get_web_domain();
            $postData['server_ip'] = serverIP();
            $postData['root_dir'] = ROOT_DIR;
            $response = httpRequest("https://www.eyoucms.com/index.php?m=plugins&c=Wechat&a=GetUserWechatQrcodeUrl&ctl=Basis", 'POST', $postData);
            $paramData = json_decode($response, true);
            if (!empty($paramData)) {
                if (empty($paramData['code'])) {
                    $msg = !empty($paramData['msg']) ? $paramData['msg'] : '生成二维码失败，请重试！';
                    $this->error($paramData['msg']);
                } else {
                    $res_data = ['ticket'=>$paramData['ticket'], 'uniqid_scene'=>$paramData['uniqid_scene']];
                    if (!empty($res_data)) {
                        $this->success('生成二维码成功', null, $res_data);
                    }
                }
            }
        }
        $this->error('生成二维码失败');
    }

    // 轮询检测是否绑定官方微信公众号openid
    public function mp_bingwxgzhopenid()
    {
        \think\Session::pause(); // 暂停session，防止session阻塞机制
        if (IS_AJAX_POST) {
            $postData = [];
            $op = input('post.op/s','bind');
            $postData['op'] = $op;
            $postData['domain'] = $this->get_web_domain();
            $postData['server_ip'] = serverIP();
            $postData['root_dir'] = ROOT_DIR;
            $uniqid_scene = input('post.uniqid_scene/s');
            $postData['uniqid_scene'] = $uniqid_scene;
            $response = httpRequest("https://www.eyoucms.com/index.php?m=plugins&c=Wechat&a=GetUserOpenid&ctl=Basis", 'POST', $postData);
            $paramData = json_decode($response, true);
            if (empty($paramData)) {
                $this->error('易优CMS官方接口异常：GetUserOpenid');
            }
            else if (!empty($paramData['code'])) {
                $openid = !empty($paramData['openid']) ? $paramData['openid'] : '';
                if (empty($openid)) {
                    $this->success('轮询中…', null, ['code'=>2]);
                }
                if ('bind' == $op) {
                    $admin_id = input('post.admin_id/d');
                    $this->mp_bind_handle($admin_id, $openid);
                }
                else if ('login' == $op) {
                    $this->mp_login_handle($openid);
                }
            }
        }
        $this->error('轮询请求失败!');
    }

    /**
     * 扫码绑定处理
     * @param  integer $admin_id  [description]
     * @param  array   $paramData [description]
     * @return [type]             [description]
     */
    private function mp_bind_handle($admin_id = '', $openid = '')
    {
        if (empty($this->admin_info['parent_id']) && -1 == $this->admin_info['role_id']) { // 创始人
            $is_founder = 1;
            empty($admin_id) && $admin_id = $this->admin_info['admin_id'];
            $admin_info = Db::name('admin')->where(['admin_id'=>$admin_id])->find();
        } else {
            $is_founder = 0;
            $admin_info = $this->admin_info;
            $admin_id = $this->admin_info['admin_id'];
        }

        if (empty($admin_info)) {
            $this->error('查不到管理员信息');
        }

        $row = Db::name('admin_wxlogin')->where(['openid'=>$openid, 'type'=>1])->find();
        if(!empty($row))
        {
            if (!empty($row['admin_id'])) {
                $count = Db::name('admin')->where(['admin_id'=>$row['admin_id']])->count();
                if (!empty($count)) {
                    $this->error('当前微信已被绑定');
                }
            }
            $saveData = [
                'admin_id'   => $admin_id,
                'nickname'   => '',
                'headimgurl' => '',
                'update_time'=> getTime(),
            ];
            $r = Db::name('admin_wxlogin')->where([
                    'wx_id' => $row['wx_id'],
                ])->update($saveData);
        } else {
            $saveData = [
                'admin_id'  => $admin_id,
                'nickname'   => '',
                'headimgurl' => '',
                'type'  => 1,
                'openid'    => $openid,
                'unionid'    => '',
                'add_time'=> getTime(),
                'update_time'=> getTime(),
            ];
            $r = Db::name('admin_wxlogin')->insert($saveData);
        }

        if ($r !== false) {
            if ($admin_id == $this->admin_info['admin_id']) {
                $this->admin_info['openid'] = $openid;
                session('admin_info', $this->admin_info);
            } else {
                if (1 == $is_founder) {
                    $openid = Db::name('admin_wxlogin')->where(['admin_id'=>$this->admin_info['admin_id'], 'type'=>1])->value('openid');
                    if (!empty($openid)) {
                        $this->admin_info['openid'] = $openid;
                        session('admin_info', $this->admin_info);
                    }
                }
            }
            \think\Cache::clear("admin_wxlogin");
            $this->success('绑定成功', null, ['code'=>1]);
        }
        $this->error('绑定失败');
    }

    /**
     * 扫码登录处理
     * @param  array  $data [description]
     * @return [type]            [description]
     */
    private function mp_login_handle($openid = '')
    {
        $web_adminbasefile = tpCache('web.web_adminbasefile');
        $web_adminbasefile = !empty($web_adminbasefile) ? $web_adminbasefile : ROOT_DIR.'/login.php';
        $we_user = Db::name('admin_wxlogin')->field('a.openid, b.admin_id, b.user_name')
            ->alias('a')
            ->join('admin b', 'a.admin_id=b.admin_id', 'LEFT')
            ->where(['a.openid'=>$openid, 'a.type'=>1])
            ->find();
        if (empty($we_user['user_name'])) {
            adminLog('登录失败(微信用户不存在)');
            $this->error('微信用户不存在', $web_adminbasefile);
        } else {
            $admin_info = adminLoginAfter($we_user['admin_id'], session_id(), 'EyouGzhLogin');
            if (!empty($admin_info)) {
                adminLog('扫码登录成功');
                $this->success('登录成功', $web_adminbasefile, ['code'=>1]);
            }
            adminLog('扫码登录失败');
            $this->error('登录失败', $web_adminbasefile);
        }
    }

    /**
     * 解绑微信
     * @return [type] [description]
     */
    public function mp_unbindwx()
    {
        if (empty($this->admin_info['parent_id']) && -1 == $this->admin_info['role_id']) {
            $admin_id = input('param.admin_id/d', $this->admin_info['admin_id']);
        } else {
            $admin_id = intval($this->admin_info['admin_id']);
        }

        if (IS_AJAX_POST && !empty($admin_id)) {

            $EyouGzhLoginModel = new \weapp\EyouGzhLogin\model\EyouGzhLoginModel;
            $weappData = $EyouGzhLoginModel->getWeappData();
            if (!empty($weappData['data']['gzh']['force'])) {
                $this->error('检测已开启强制扫码登录，禁止解绑');
            }

            $r = Db::name('admin_wxlogin')->where(['admin_id'=>$admin_id, 'type'=>1])->delete();
            if ($r !== false) {
                \think\Cache::clear("admin_wxlogin");
                if ($admin_id == $this->admin_info['admin_id'] && isset($this->admin_info['openid'])) {
                    unset($this->admin_info['openid']);
                }
                session('admin_info', $this->admin_info);
                $this->success("操作成功");
            }
        }
        $this->error("操作失败");
    }
}
