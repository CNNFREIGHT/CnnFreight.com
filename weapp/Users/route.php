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

// 前端URL的路由配置（支持TP5本身的路由规则）
$rewrite = [];

$usersTypeModel = new \weapp\Users\model\UsersTypeModel;
$usersConfData = $usersTypeModel->getWeappData();
$users_seo_pseudo = 1;
if (!empty($usersConfData['data']['seo_pseudo'])) {
    $users_seo_pseudo = intval($usersConfData['data']['seo_pseudo']);
}

if (3 == $users_seo_pseudo) {
    $rewrite = [
		'users/<id>$' => array('plugins/Users/user',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'usercol/<id>$' => array('plugins/Users/usercol',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'userdow/<id>$' => array('plugins/Users/userdow',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'userask/<id>$' => array('plugins/Users/userask',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'useranswer/<id>$' => array('plugins/Users/useranswer',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'usercon/<id>$' => array('plugins/Users/usercon',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'userfan/<id>$' => array('plugins/Users/userfan',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'userforum/<id>$' => array('plugins/Users/userforum',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'userforumanswer/<id>$' => array('plugins/Users/userforumanswer',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'users$' => array('plugins/Users/user',array('method' => 'get', 'ext' => ''), 'cache'=>1),
		'usercol$' => array('plugins/Users/usercol',array('method' => 'get', 'ext' => ''), 'cache'=>1),
		'userdow$' => array('plugins/Users/userdow',array('method' => 'get', 'ext' => ''), 'cache'=>1),
		'useranswer$' => array('plugins/Users/useranswer',array('method' => 'get', 'ext' => 'html'), 'cache'=>1),
		'userask$' => array('plugins/Users/userask',array('method' => 'get', 'ext' => ''), 'cache'=>1),
		'usercon$' => array('plugins/Users/usercon',array('method' => 'get', 'ext' => ''), 'cache'=>1),
		'userfan$' => array('plugins/Users/userfan',array('method' => 'get', 'ext' => ''), 'cache'=>1),
		'userforum$' => array('plugins/Users/userforum',array('method' => 'get', 'ext' => ''), 'cache'=>1),
		'userforumanswer$' => array('plugins/Users/userforumanswer',array('method' => 'get', 'ext' => ''), 'cache'=>1),
    ];
}
return $rewrite;