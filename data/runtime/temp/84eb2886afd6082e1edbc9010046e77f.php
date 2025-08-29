<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:39:"./weapp/EyouGzhLogin/template/index.htm";i:1756433174;s:66:"/www/wwwroot/cnnfreight.com/weapp/EyouGzhLogin/template/header.htm";i:1756433174;s:63:"/www/wwwroot/cnnfreight.com/weapp/EyouGzhLogin/template/bar.htm";i:1756433174;s:66:"/www/wwwroot/cnnfreight.com/weapp/EyouGzhLogin/template/footer.htm";i:1756433174;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="/public/plugins/layui/css/layui.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/weapp/EyouGzhLogin/template/skin/css/main.css?v=<?php echo (isset($weappInfo['version']) && ($weappInfo['version'] !== '')?$weappInfo['version']:'v1.0.0'); ?>" rel="stylesheet" type="text/css">
<link href="/weapp/EyouGzhLogin/template/skin/css/page.css?v=<?php echo (isset($weappInfo['version']) && ($weappInfo['version'] !== '')?$weappInfo['version']:'v1.0.0'); ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/font/css/font-awesome.min.css?v=<?php echo $version; ?>" rel="stylesheet" />
<link href="/public/static/admin/font/css/iconfont.css?v=<?php echo $version; ?>" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/public/static/admin/font/css/font-awesome-ie7.min.css?v=<?php echo $version; ?>">
<![endif]-->
<link href="/public/static/admin/js/jquery-ui/jquery-ui.min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css"/>
<link href="/public/static/admin/css/perfect-scrollbar.min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript">
    // 入口路径
    var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
    var module_name = "<?php echo MODULE_NAME; ?>";
    var GetUploadify_url = "<?php echo url('Uploadify/upload'); ?>";
</script>  
<script type="text/javascript" src="/public/static/admin/js/jquery.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery-ui/jquery-ui.min.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/weapp/EyouGzhLogin/template/skin/js/admin.js?v=<?php echo (isset($weappInfo['version']) && ($weappInfo['version'] !== '')?$weappInfo['version']:'v1.0.0'); ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/perfect-scrollbar.min.js?v=<?php echo $version; ?>"></script>
<script src="/weapp/EyouGzhLogin/template/skin/js/global.js?v=<?php echo (isset($weappInfo['version']) && ($weappInfo['version'] !== '')?$weappInfo['version']:'v1.0.0'); ?>"></script>
</head>
<body class="bodystyle" style="overflow-y: scroll; cursor: default; -moz-user-select: inherit;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    
    <div class="fixed-bar">
        <div class="item-title">
            <a class="back_xin" href="<?php if('EyouGzhLogin' == \think\Request::instance()->param('sc') && 'index' == \think\Request::instance()->param('sa')): ?><?php echo url("Weapp/index"); else: ?><?php echo weapp_url("EyouGzhLogin/EyouGzhLogin/index"); endif; ?>" title="返回列表"><i class="iconfont e-fanhui"></i></a>
            <div class="subject">
                <h3><?php echo $weappInfo['name']; ?></h3>
                <h5></h5>
            </div>
            <ul class="tab-base nc-row">
                <li>
                <?php if(\think\Request::instance()->param('sa') == 'index'): ?>
                    <a href="javascript:void(0);" class="tab current"><span>功能设置</span></a>
                <?php else: ?>
                    <a href="<?php echo weapp_url("EyouGzhLogin/EyouGzhLogin/index"); ?>" class="tab"><span>功能设置</span></a>
                <?php endif; ?>
                </li>

                <li>
                <?php if(in_array((\think\Request::instance()->param('sa')), explode(',',"doc"))): ?>
                    <a href="javascript:void(0);" class="tab current"><span>使用指南</span></a>
                <?php else: ?>
                    <a href="<?php echo weapp_url("EyouGzhLogin/EyouGzhLogin/doc"); ?>" class="tab"><span>使用指南</span></a>
                <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
    <form class="form-horizontal" id="post_form" action="<?php echo weapp_url('EyouGzhLogin/EyouGzhLogin/index'); ?>" method="post">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label>扫码功能</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <label for="is_open1" class="cb-enable <?php if(!empty($data['is_open'])): ?>selected<?php endif; ?>">开启</label>
                        <label for="is_open0" class="cb-disable <?php if(empty($data['is_open'])): ?>selected<?php endif; ?>">关闭</label>
                        <input id="is_open1" name="is_open" value="1" type="radio" onclick="wechat_is_open(this);" <?php if(!empty($data['is_open'])): ?> checked="checked" <?php endif; ?>>
                        <input id="is_open0" name="is_open" value="0" type="radio" onclick="wechat_is_open(this);" <?php if(empty($data['is_open'])): ?> checked="checked" <?php endif; ?>>
                    </div>
                    <p class="notic">开启后，后台登录界面将支持普通登录/扫码登录</p>
                </dd>
            </dl>
            <div id="div_mode" class="<?php if(empty($data['is_open'])): ?>none<?php endif; ?>">
                <dl class="row">
                    <dt class="tit">
                        <label>扫码模式</label>
                    </dt>
                    <dd class="opt">
                        <label class="curpoin"><input type="radio" name="mode" value="WechatLogin" onclick="scan_mode(this);" <?php if(!isset($data['mode']) || $data['mode'] == 'WechatLogin'): ?>checked="checked"<?php endif; ?>>微信应用&nbsp;<font color="red" class="<?php if(!(empty($data['install_time']) || (($data['install_time'] instanceof \think\Collection || $data['install_time'] instanceof \think\Paginator ) && $data['install_time']->isEmpty()))): ?> none <?php endif; ?>">(推荐)</font></label>
                        &nbsp;
                        <label class="curpoin <?php if(!(empty($data['install_time']) || (($data['install_time'] instanceof \think\Collection || $data['install_time'] instanceof \think\Paginator ) && $data['install_time']->isEmpty()))): ?> none <?php endif; ?>"><input type="radio" name="mode" value="EyouGzhLogin" onclick="scan_mode(this);" <?php if(isset($data['mode']) && $data['mode'] == 'EyouGzhLogin'): ?>checked="checked"<?php endif; ?>>官方公众号&nbsp;(有不稳定因素)</label>
                        &nbsp;
                        <p class="notic">每个模式有各自的说明文档</p>
                        &nbsp;
                        <a id="jc_WechatLogin" class="<?php if(isset($data['mode']) && $data['mode'] == 'EyouGzhLogin'): ?>none<?php endif; ?>" href="javascript:void(0);" onclick="click_to_eyou_1575506523('https://www.eyoucms.com/plus/view.php?aid=28268', '微信应用的说明书');" style="font-size: 12px;position: absolute;">查看说明</a>
                        <a id="jc_EyouGzhLogin" class="<?php if(!isset($data['mode']) || $data['mode'] == 'WechatLogin'): ?>none<?php endif; ?>" href="javascript:void(0);" onclick="click_to_eyou_1575506523('https://www.eyoucms.com/plus/view.php?aid=28267', '官方公众号的说明书');" style="font-size: 12px;position: absolute;">查看说明</a>
                    </dd>
                </dl>
                <div id="div_gzhlogin" class="<?php if(!isset($data['mode']) || $data['mode'] == 'WechatLogin'): ?>none<?php endif; ?>">
                    <dl class="row">
                        <dt class="tit">
                            <label>强制扫码登录</label>
                        </dt>
                        <dd class="opt">
                            <div class="onoff">
                                <label for="gzh_force1" class="cb-enable <?php if(!empty($data['gzh']['force'])): ?>selected<?php endif; ?>">开启</label>
                                <label for="gzh_force0" class="cb-disable <?php if(empty($data['gzh']['force'])): ?>selected<?php endif; ?>">关闭</label>
                                <input id="gzh_force1" name="gzh[force]" value="1" type="radio" onclick="forcelogin(this, 1);" <?php if(!empty($data['gzh']['force'])): ?> checked="checked" <?php endif; ?>>
                                <input id="gzh_force0" name="gzh[force]" value="0" type="radio" onclick="forcelogin(this, 1);" <?php if(empty($data['gzh']['force'])): ?> checked="checked" <?php endif; ?>>
                            </div>
                            <p class="notic">开启后，后台只支持微信扫码登录</p>
                            <p id="notic2_tips_1" class="notic2 red <?php if(empty($data['gzh']['force'])): ?>none<?php endif; ?>">确保所有管理员都已在个人信息里绑定微信，否则会扫码登录不了</p>
                        </dd>
                    </dl>
                </div>
                <div id="div_wechat" class="<?php if(isset($data['mode']) && $data['mode'] == 'EyouGzhLogin'): ?>none<?php endif; ?>">
                    <dl class="row">
                        <dt class="tit">
                            <label for="wechat_appid"><em>*</em>AppID</label>
                        </dt>
                        <dd class="opt">
                            <input type="text" class="input-txt" name="wechat[appid]" value="<?php echo (isset($security['security_wechat_appid']) && ($security['security_wechat_appid'] !== '')?$security['security_wechat_appid']:''); ?>" autocomplete="off">
                            &nbsp;<a href="javascript:void(0);" onclick="click_to_eyou_1575506523('https://www.eyoucms.com/plus/view.php?aid=17633', '获取微信扫描登录的应用配置appid/appsecret');" style="font-size: 12px;padding-top: 10px;position: absolute;">查看教程</a>
                            <p class="notic"></p>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="tit">
                            <label for="wechat_secret"><em>*</em>AppSecret</label>
                        </dt>
                        <dd class="opt">
                            <input type="text" class="input-txt" name="wechat[secret]" value="<?php echo (isset($security['security_wechat_secret']) && ($security['security_wechat_secret'] !== '')?$security['security_wechat_secret']:''); ?>" autocomplete="off">
                            <p class="notic"></p>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="tit">
                            <label for="wechat_forcelogin">强制扫码登录</label>
                        </dt>
                        <dd class="opt">
                            <div class="onoff">
                                <label for="wechat_force1" class="cb-enable <?php if(!empty($security['security_wechat_forcelogin'])): ?>selected<?php endif; ?>">开启</label>
                                <label for="wechat_force0" class="cb-disable <?php if(empty($security['security_wechat_forcelogin'])): ?>selected<?php endif; ?>">关闭</label>
                                <input id="wechat_force1" name="wechat[force]" value="1" type="radio" onclick="forcelogin(this, 2);" <?php if(!empty($security['security_wechat_forcelogin'])): ?> checked="checked"<?php endif; ?>>
                                <input id="wechat_force0" name="wechat[force]" value="0" type="radio" onclick="forcelogin(this, 2);" <?php if(empty($security['security_wechat_forcelogin'])): ?> checked="checked"<?php endif; ?>>
                            </div>
                            <p class="notic">开启后，后台只支持微信扫码登录</p>
                            <p id="notic2_tips_2" class="notic2 red <?php if(empty($security['security_wechat_forcelogin'])): ?>none<?php endif; ?>">确保所有管理员都已在个人信息里绑定微信，否则会扫码登录不了</p>
                            <span class="err"></span>
                        </dd>
                    </dl>
                </div>
                <!-- <dl class="row">
                    <dt class="tit">
                        <label>&nbsp;</label>
                    </dt>
                    <dd class="opt red">
                        <p>如果没有绑定个人微信，请查看使用指南教程！</p>
                    </dd>
                </dl> -->
            </div>
            <div class="bot">
                <a href="JavaScript:void(0);" onclick="checkForm();" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">

    function wechat_is_open(obj)
    {
        var is_open = $(obj).val();
        if (1 == is_open) {
            $('#div_mode').show();
        } else {
            $('#div_mode').hide();
        }
    }

    function scan_mode(obj)
    {
        var mode = $(obj).val();
        if ('EyouGzhLogin' == mode) {
            $('#div_gzhlogin').show();
            $('#div_wechat').hide();
            $('#jc_EyouGzhLogin').removeClass('none');
            $('#jc_WechatLogin').addClass('none');
        } else {
            $('#div_gzhlogin').hide();
            $('#div_wechat').show();
            $('#jc_EyouGzhLogin').addClass('none');
            $('#jc_WechatLogin').removeClass('none');
            $("input[name^='wechat[appid]']").focus();
        }
    }

    /**
     * 开启强制微信登录
     * @param  {[type]} obj [description]
     * @return {[type]}     [description]
     */
    function forcelogin(obj, type)
    {
        var value = $(obj).val();
        if (1 == value) {
            $.ajax({
                type : 'post',
                url : "<?php echo weapp_url('EyouGzhLogin/EyouGzhLogin/ajax_check_forcelogin'); ?>",
                data : {type:type, _ajax:1},
                dataType : 'json',
                success : function(res){
                    if(res.code == 1){
                        $('#notic2_tips_'+type).show();
                        console.log(res.msg)
                    }else{
                        if (1 == type) {
                            $('label[for=gzh_force1]').removeClass('selected');
                            $('#gzh_force1').attr('checked','');
                            $('label[for=gzh_force0]').addClass('selected');
                            $('#gzh_force0').attr('checked','checked');
                        }
                        else if (2 == type) {
                            $('label[for=wechat_force1]').removeClass('selected');
                            $('#wechat_force1').attr('checked','');
                            $('label[for=wechat_force0]').addClass('selected');
                            $('#wechat_force0').attr('checked','checked');
                        }
                        layer.alert(res.msg, {icon: 5, title: false, closeBtn: false, btn:['关闭']});
                    }
                },
                error: function(e){
                    showErrorAlert(e.responseText);
                }
            });
        } else {
            $('#notic2_tips_'+type).hide();
        }
    }

    // 判断输入框是否为空
    function checkForm(){
        var is_open = $('input[name=is_open]:checked').val();
        if (1 == is_open) {
            var mode = $('input[name=mode]:checked').val();
            if ('WechatLogin' == mode) {
                if($.trim($("input[name^='wechat[appid]']").val()) == ''){
                    showErrorMsg('AppID不能为空！');
                    $("input[name^='wechat[appid]']").focus();
                    return false;
                }
                if($.trim($("input[name^='wechat[secret]']").val()) == ''){
                    showErrorMsg('AppSecret不能为空！');
                    $("input[name^='wechat[secret]']").focus();
                    return false;
                }
            }
        }
        layer_loading('正在处理');
        $.ajax({
            type: 'POST',
            url: '<?php echo weapp_url("EyouGzhLogin/EyouGzhLogin/index"); ?>',
            data: $('#post_form').serialize(),
            dataType: "JSON",
            success: function(res){
                layer.closeAll();
                if (1 == res.code){
                    layer.msg(res.msg, {shade: 0.3, time: 1000}, function(){
                        window.location.reload();
                    });
                }else{
                    showErrorAlert(res.msg);
                }
            },
            error: function(e){
                layer.closeAll();
                showErrorAlert(e.responseText);
            }
        });
    }
</script>
<br/>
<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop">
        <i class="fa fa-angle-up"></i>
    </a>
    <a href="JavaScript:void(0);" id="btnbottom">
        <i class="fa fa-angle-down"></i>
    </a>
</div>

<script type="text/javascript">
    $(document).ready(function(){
		// 调试信息
        $('#think_page_trace_open').css('z-index', 99999);
    });
</script>
</body>
</html>