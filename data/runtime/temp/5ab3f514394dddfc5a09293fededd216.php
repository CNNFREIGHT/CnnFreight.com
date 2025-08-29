<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:49:"./application/admin/template/admin/admin_edit.htm";i:1732860816;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/layout.htm";i:1756433208;s:75:"/www/wwwroot/cnnfreight.com/application/admin/template/public/theme_css.htm";i:1721637128;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/footer.htm";i:1680508820;}*/ ?>
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
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen"/>
<link href="/public/plugins/layui/css/layui.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/css/main.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/css/page.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/font/css/font-awesome.min.css?v=<?php echo $version; ?>" rel="stylesheet" />
<link href="/public/static/admin/font/css/iconfont.css?v=<?php echo $version; ?>" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/public/static/admin/font/css/font-awesome-ie7.min.css?v=<?php echo $version; ?>">
<![endif]-->
<script type="text/javascript">
    var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
    var module_name = "<?php echo MODULE_NAME; ?>";
    var GetUploadify_url = "<?php echo url('Uploadimgnew/upload'); ?>";
    // 插件专用旧版上传图片框
    if ('Weapp@execute' == "<?php echo CONTROLLER_NAME; ?>@<?php echo ACTION_NAME; ?>") {
      GetUploadify_url = "<?php echo url('Uploadify/upload'); ?>";
    }
    var __root_dir__ = "";
    var __lang__ = "<?php echo $admin_lang; ?>";
    var __seo_pseudo__ = <?php echo (isset($global['seo_pseudo']) && ($global['seo_pseudo'] !== '')?$global['seo_pseudo']:1); ?>;
    var __web_xss_filter__ = <?php echo (isset($global['web_xss_filter']) && ($global['web_xss_filter'] !== '')?$global['web_xss_filter']:0); ?>;
    var __is_mobile__ = <?php echo (isset($is_mobile) && ($is_mobile !== '')?$is_mobile:0); ?>;
    var __security_ask_open__ = <?php echo (isset($global['security_ask_open']) && ($global['security_ask_open'] !== '')?$global['security_ask_open']:0); ?>;
</script>
<link href="/public/static/admin/js/jquery-ui/jquery-ui.min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css"/>
<link href="/public/static/admin/js/perfect-scrollbar.min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css"/>
<!-- <link type="text/css" rel="stylesheet" href="/public/plugins/tags_input/css/jquery.tagsinput.css?v=<?php echo $version; ?>"> -->
<style type="text/css">html, body { overflow: visible;}</style>
<link href="/public/static/admin/css/diy_style.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css" />
<?php if(file_exists(ROOT_PATH.'public/static/admin/css/theme_style.css')): ?>
    <link href="/public/static/admin/css/theme_style.css?v=<?php echo $version; ?>_<?php echo (isset($global['web_theme_style_uptime']) && ($global['web_theme_style_uptime'] !== '')?$global['web_theme_style_uptime']:0); ?>" rel="stylesheet" type="text/css">
<?php elseif(file_exists(APP_PATH.'admin/template/public/theme_css.htm') && function_exists('hex2rgba')): ?>
    <style type="text/css">
    /*官方内置样式表，升级会覆盖变动，请勿修改，否则后果自负*/

    /*左侧收缩图标*/
    #foldSidebar i { font-size: 24px;color:<?php echo $global['web_theme_color']; ?>; }
    /*左侧菜单*/
    .eycms_cont_left{ background:<?php echo $global['web_theme_color']; ?>; }
    .eycms_cont_left dl dd a:hover,.eycms_cont_left dl dd a.on,.eycms_cont_left dl dt.on{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl dd a:active{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl.jslist dd{ background:<?php echo $global['web_theme_color']; ?>; }
    .eycms_cont_left dl.jslist dd a:hover,.eycms_cont_left dl.jslist dd a.on{ background:<?php echo $global['web_assist_color']; ?>; }
    .eycms_cont_left dl.jslist:hover{ background:<?php echo $global['web_assist_color']; ?>; }
    /*栏目操作*/
    .cate-dropup .cate-dropup-con a:hover{ background-color: <?php echo $global['web_theme_color']; ?>; }
    /*按钮*/
    a.ncap-btn-green { background-color: <?php echo $global['web_theme_color']; ?>; }
    a:hover.ncap-btn-green { background-color: <?php echo $global['web_assist_color']; ?>; }
    .flexigrid .sDiv2 .btn:hover { background-color: <?php echo $global['web_theme_color']; ?>; }
    .flexigrid .mDiv .fbutton div.add{background-color: <?php echo $global['web_theme_color']; ?>; border: none;}
    .flexigrid .mDiv .fbutton div.add:hover{ background-color: <?php echo $global['web_assist_color']; ?>;}
    .flexigrid .mDiv .fbutton div.adds{color:<?php echo $global['web_theme_color']; ?>;border: 1px solid <?php echo $global['web_theme_color']; ?>;}
    .flexigrid .mDiv .fbutton div.adds:hover{ background-color: <?php echo $global['web_theme_color']; ?>;}
    /*选项卡字体*/
    .tab-base a.current,
    .tab-base a:hover.current {color:<?php echo $global['web_theme_color']; ?> !important;}
    .tab-base a.current:after,
    .tab-base a:hover.current:after {background-color: <?php echo $global['web_theme_color']; ?>;}
    .addartbtn input.btn:hover{ border-bottom: 1px solid <?php echo $global['web_theme_color']; ?>; }
    .addartbtn input.btn.selected{ color: <?php echo $global['web_theme_color']; ?>;border-bottom: 1px solid <?php echo $global['web_theme_color']; ?>;}
    /*会员导航*/
    .member-nav-group .member-nav-item .btn.selected{background: <?php echo $global['web_theme_color']; ?>;border: 1px solid <?php echo $global['web_theme_color']; ?>;box-shadow: -1px 0 0 0 <?php echo $global['web_theme_color']; ?>;}
    .member-nav-group .member-nav-item:first-child .btn.selected{border-left: 1px solid <?php echo $global['web_theme_color']; ?> !important;}
        
    /* 商品订单列表标题 */
   .flexigrid .mDiv .ftitle h3 {border-left: 3px solid <?php echo $global['web_theme_color']; ?>;} 
    
    /*分页*/
    .pagination > .active > a, .pagination > .active > a:focus, 
    .pagination > .active > a:hover, 
    .pagination > .active > span, 
    .pagination > .active > span:focus, 
    .pagination > .active > span:hover { border-color: <?php echo $global['web_theme_color']; ?>;color:<?php echo $global['web_theme_color']; ?>; }
    
    .layui-form-onswitch {border-color: <?php echo $global['web_theme_color']; ?> !important;background-color: <?php echo $global['web_theme_color']; ?> !important;}
    .onoff .cb-enable.selected { background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    .onoff .cb-disable.selected {background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    .pcwap-onoff .cb-enable.selected { background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    .pcwap-onoff .cb-disable.selected {background-color: <?php echo $global['web_theme_color']; ?> !important;border-color: <?php echo $global['web_theme_color']; ?> !important;}
    input[type="text"]:focus,
    input[type="text"]:hover,
    input[type="text"]:active,
    input[type="password"]:focus,
    input[type="password"]:hover,
    input[type="password"]:active,
    textarea:hover,
    textarea:focus,
    textarea:active { border-color:<?php echo hex2rgba($global['web_theme_color'],0.8); ?>;box-shadow: 0 0 0 1px <?php echo hex2rgba($global['web_theme_color'],0.5); ?> !important;}
    .input-file-show:hover .type-file-button {background-color:<?php echo $global['web_theme_color']; ?> !important; }
    .input-file-show:hover {border-color: <?php echo $global['web_theme_color']; ?> !important;box-shadow: 0 0 5px <?php echo hex2rgba($global['web_theme_color'],0.5); ?> !important;}
    .input-file-show:hover span.show a,
    .input-file-show span.show a:hover { color: <?php echo $global['web_theme_color']; ?> !important;}
    .input-file-show:hover .type-file-button {background-color: <?php echo $global['web_theme_color']; ?> !important; }
    .color_z { color: <?php echo $global['web_theme_color']; ?> !important;}
    a.imgupload{
        background-color: <?php echo $global['web_theme_color']; ?> !important;
        border-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    /*专题节点按钮*/
    .ncap-form-default .special-add{background-color:<?php echo $global['web_theme_color']; ?>;border-color:<?php echo $global['web_theme_color']; ?>;}
    .ncap-form-default .special-add:hover{background-color:<?php echo $global['web_assist_color']; ?>;border-color:<?php echo $global['web_assist_color']; ?>;}
    
    /*更多功能标题*/
    .on-off_panel .title::before {background-color:<?php echo $global['web_theme_color']; ?>;}
    .on-off_panel .on-off_list-caidan .icon_bg .on{color: <?php echo $global['web_theme_color']; ?>;}
    .on-off_panel .e-jianhao {color: <?php echo $global['web_theme_color']; ?>;}
    
     /*内容菜单*/
    .ztree li a:hover{color:<?php echo $global['web_theme_color']; ?> !important;}
    .ztree li a.curSelectedNode{background-color: <?php echo $global['web_theme_color']; ?> !important; border-color:<?php echo $global['web_theme_color']; ?> !important;}
    .layout-left .on-off-btn {background-color: <?php echo $global['web_theme_color']; ?> !important;}

    /*框架正在加载*/
    .iframe_loading{width:100%;background:url(/public/static/admin/images/loading-0.gif) no-repeat center center;}
    
    .layui-btn-normal {background-color: <?php echo $global['web_theme_color']; ?>;}
    .layui-laydate .layui-this{background-color: <?php echo $global['web_theme_color']; ?> !important;}
    .laydate-day-mark::after {background-color: <?php echo $global['web_theme_color']; ?> !important;}
	
    /*上传框*/
    .upload-body .upload-con .image-header .image-header-l .layui-btn {
        background: <?php echo $global['web_theme_color']; ?> !important;
        border-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .layui-tab-brief>.layui-tab-title .layui-this {
        color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .layui-tab-brief>.layui-tab-title .layui-this:after {
        border-bottom-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .layui-layer-btn .layui-layer-btn0 {
        border-color: <?php echo $global['web_theme_color']; ?> !important;
        background-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .layui-btn-yes {
        background: <?php echo $global['web_theme_color']; ?> !important;
        border-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .pagination li.active a {
        color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-nav .item.active {
        color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .upload-con .group-item.active a {
        color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .upload-con .group-item.active {
        color: <?php echo $global['web_theme_color']; ?> !important;
        background-color: <?php echo hex2rgba($global['web_theme_color'],0.1); ?>;
    }
    .pagination li.active {
        border-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .layui-btn-normal {
        background-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .upload-con .image-list li.up-over .image-select-layer i {
        color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-body .upload-con .image-list li .layer .close {
        color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .upload-dirimg-con .ztree li a.curSelectedNode {
         background-color: #FFE6B0 !important; 
         border-color: #FFB951 !important; 
    }
    /*.plug-item-content .plug-item-bottm a, .plug-item-content .plug-status .yes {
        color: <?php echo $global['web_theme_color']; ?> !important;
    }*/
    .ncap-form-default dd.opt .layui-btn{
        background-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .marketing_panel .title::before{
        background-color: <?php echo $global['web_theme_color']; ?> !important;
    }
    .marketing_panel .marketing_list ul.marketing-nav li a .button button {
        color: <?php echo $global['web_theme_color']; ?> !important;
        border: 1px solid <?php echo $global['web_theme_color']; ?> !important;
    }
</style>
<?php endif; ?>
<script type="text/javascript" src="/public/static/common/js/jquery.min.js?t=v1.7.6"></script>
<!-- <script type="text/javascript" src="/public/plugins/tags_input/js/jquery.tagsinput.js?v=<?php echo $version; ?>"></script> -->
<script type="text/javascript" src="/public/static/admin/js/jquery-ui/jquery-ui.min.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.cookie.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/admin.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.validation.min.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/common.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/perfect-scrollbar.min.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.mousewheel.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/plugins/layui/layui.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/common/js/jquery.lazyload.min.js?v=<?php echo $version; ?>"></script>
<script src="/public/static/admin/js/myFormValidate.js?v=<?php echo $version; ?>"></script>
<script src="/public/static/admin/js/myAjax2.js?v=<?php echo $version; ?>"></script>
<script src="/public/static/admin/js/global.js?v=<?php echo $version; ?>1"></script>
</head>
<body class="rolecss bodystyle">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <?php if(empty($iframe) || (($iframe instanceof \think\Collection || $iframe instanceof \think\Paginator ) && $iframe->isEmpty())): ?>
    <div class="fixed-bar">
        <div class="item-title">
            <a class="back_xin" href="javascript:history.back();" title="返回"><i class="iconfont e-fanhui"></i></a>
            <div class="subject">
                <h3>个人信息</h3>
                <h5></h5>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <form class="form-horizontal" id="postForm" action="<?php echo url('Admin/admin_edit'); ?>" method="post">
        <input type="hidden" name="admin_id" value="<?php echo $info['admin_id']; ?>">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="head_pic">用户头像</label>
                </dt>
                <dd class="opt">
                    <div class="txpic" onClick="GetUploadify(1,'','allimg','head_pic_call_back');">
                        <input type="hidden" name="head_pic" id="head_pic" value="<?php echo get_head_pic($info['head_pic'], true); ?>" />
                        <img id="img_head_pic" src="<?php echo get_head_pic($info['head_pic'], true); ?>" />
                        <em>更换头像</em>
                    </div>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名</label>
                </dt>
                <dd class="opt">
                    <?php if(empty($admin_info['parent_id'])): ?>
                        <input type="text" name="user_name" value="<?php echo $info['user_name']; ?>" class="input-txt" placeholder="" autocomplete="off">
                        <p class="notic">为了安全起见，请勿设置网络常见的用户名，且不能与笔名一致，以免被暴露在网站前台</p>
                    <?php else: ?>
                        <?php echo $info['user_name']; endif; ?>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="password">用户密码</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="password" value="" id="password" autocomplete="off" class="input-txt" placeholder="不修改留空">
                    <p class="notic">密码长度至少5位或以上，建议密码长度设置一些，且以0-9a-zA-Z.@_-!等符号组合！</p>
                    <p id="password_tips"></p>
                </dd>
            </dl>
<!--             <dl class="row">
                <dt class="tit">
                    <label for="password">确认密码</label>
                </dt>
                <dd class="opt">
                    <input type="password" name="password2" value="" id="password2" autocomplete="off" class="input-txt">
                    <p class="notic"></p>
                    <p id="password2_tips"></p>
                </dd>
            </dl> -->
            <dl class="row">
                <dt class="tit">
                    <label for="pen_name">笔名</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="pen_name" value="<?php echo $info['pen_name']; ?>" id="pen_name" class="input-txt" autocomplete="off">
                    <p class="notic">发布文档后显示责任编辑的名字，禁止与用户名设置一致，以免存在安全隐患</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="true_name">真实姓名</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="true_name" value="<?php echo (isset($info['true_name']) && ($info['true_name'] !== '')?$info['true_name']:''); ?>" id="true_name" class="input-txt" autocomplete="off">
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="mobile">手机号码</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="mobile" value="<?php echo $info['mobile']; ?>" id="mobile" class="input-txt" autocomplete="off">
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="email">Email邮箱</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="email" value="<?php echo $info['email']; ?>" id="email" class="input-txt" autocomplete="off">
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="desc">工作内容</label>
                </dt>
                <dd class="opt">
                    <textarea rows="5" cols="60" id="desc" name="desc" style="height:60px;"><?php echo $info['desc']; ?></textarea>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row" <?php if(empty($global['wechat_push_notice_open'])): ?> style="display: none;" <?php endif; ?>>
                <dt class="tit">
                    <label>关注公众号</label>
                </dt>
                <dd class="opt">
                    <span id="span_wechat_followed">
                        <?php if(empty($info['wechat_followed']) || (($info['wechat_followed'] instanceof \think\Collection || $info['wechat_followed'] instanceof \think\Paginator ) && $info['wechat_followed']->isEmpty())): ?>未关注<?php else: ?>已关注<?php endif; ?>
                    </span> &nbsp;
                    <a href="javascript:void(0);" id="wechatFollowed_bind" data-id="<?php echo $info['admin_id']; ?>" onclick="wechatFollowed(this, 'bind');" class="ncap-btn ncap-btn-green" <?php if(!(empty($info['wechat_followed']) || (($info['wechat_followed'] instanceof \think\Collection || $info['wechat_followed'] instanceof \think\Paginator ) && $info['wechat_followed']->isEmpty()))): ?> style="display: none;" <?php endif; ?>>扫码关注</a>
                    <a href="javascript:void(0);" id="wechatFollowed_unbind" data-id="<?php echo $info['admin_id']; ?>" onclick="wechatFollowed(this, 'unbind');" class="ncap-btn ncap-btn-green" <?php if(empty($info['wechat_followed']) || (($info['wechat_followed'] instanceof \think\Collection || $info['wechat_followed'] instanceof \think\Paginator ) && $info['wechat_followed']->isEmpty())): ?> style="display: none;" <?php endif; ?>>点击取消</a>
                    <p class="notic">通过此处扫码关注公众号则会将账号与微信号进行关联绑定，才能接收微信公众号的消息通知！</p>
                    <!-- <p class="notic">用于微信登录及公众号消息推送</p> -->
                </dd>
            </dl>
            <script type="text/javascript">
                function wechatFollowed(obj, opt) {
                    if ('bind' == opt) {
                        var admin_id = $(obj).data('id');
                        layer_loading('正在加载');
                        $.ajax({
                            type: 'POST',
                            url : "<?php echo url('Admin/wechat_followed'); ?>",
                            data: {admin_id: admin_id, opt:opt, _ajax: 1},
                            dataType: "JSON",
                            success: function(res){
                                layer.closeAll();
                                if (1 == res.code) {
                                    var htmlContent = '<img src="' + res.url + '?t='+ Math.floor(Math.random()*10000000) +'" style="width: 250px; height: 250px;"><p style="color: red; padding: 8px 0; font-size: 15px; text-align: center;">打开微信扫一扫</p> <script type="text/javascript"> pollingWechatFollowed("' + admin_id + '"); <\/script>';
                                    layer.open({
                                        type: 1,
                                        title:'微信扫码绑定',
                                        id: 'layer_wechat_followed',
                                        shadeClose: false,
                                        content: htmlContent,
                                        end: function() {
                                            clearWechatFollowed();
                                        }
                                    });
                                } else {
                                    showErrorAlert(res.msg);
                                }
                            },
                            error: function(e) {
                                layer.closeAll();
                                showErrorAlert(e.responseText);
                            }
                        });
                    } else if ('unbind' == opt) {
                        var admin_id = $(obj).data('id');
                        layer_loading('正在处理');
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo url("Admin/wechat_followed"); ?>',
                            data: {admin_id:admin_id, opt:opt, _ajax:1},
                            dataType: "JSON",
                            success: function(res){
                                layer.closeAll();
                                if (1 == res.code){
                                    $('#span_wechat_followed').html('未关注');
                                    $('#wechatFollowed_bind').show();
                                    $('#wechatFollowed_unbind').hide();
                                    layer.msg(res.msg, {shade: layer_shade, time: 1000});
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
                }

                var pollingFollowed = null;
                function pollingWechatFollowed(admin_id) {
                    pollingFollowed = setTimeout(function(){
                        $.ajax({
                            type: 'POST',
                            url : "<?php echo url('Admin/polling_wechat_followed'); ?>",
                            data: {admin_id: admin_id, _ajax:1},
                            dataType: "JSON",
                            success: function(res) {
                                if (1 == res.data.code) {
                                    layer.closeAll();
                                    clearWechatFollowed();
                                    $('#span_wechat_followed').html('已关注');
                                    $('#wechatFollowed_bind').hide();
                                    $('#wechatFollowed_unbind').show();
                                    layer.msg(res.msg, {shade: layer_shade, time: 2000});
                                } else if (0 == res.code) {
                                    layer.closeAll();
                                    clearWechatFollowed();
                                    layer.alert(res.msg, {icon: 5, title: false, closeBtn: false}, function() {
                                        window.location.reload();
                                    });
                                } else if (2 == res.data.code) {
                                    pollingWechatFollowed(admin_id);
                                }
                            },
                            error: function(e){
                                layer.closeAll();
                                clearWechatFollowed();
                                layer.alert(e.responseText, {icon: 5, title: false, closeBtn: false}, function() {
                                    window.location.reload();
                                });
                            }
                        });
                    }, 2000);
                }

                function clearWechatFollowed() {
                    if (pollingFollowed > 0) {
                        clearTimeout(pollingFollowed);
                        pollingFollowed = null;
                    }
                }
            </script>

            <?php if(!empty($thirdata['data']['security_wechat_open'])): ?>
                <dl class="row">
                    <dt class="tit">
                        <label for="bind_wechat">绑定微信</label>
                    </dt>
                    <dd class="opt">
                        <span id="span_wechat_nickname">
                            <?php if(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty())): ?>未绑定<?php else: ?><?php echo $wechatInfo['nickname']; endif; ?>
                        </span>
                        <a href="javascript:void(0);" id="wechat_bind" data-logintype="<?php echo $thirdata['type']; ?>" onclick="wechat_bind(this);" class="ncap-btn ncap-btn-green" <?php if(!(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty()))): ?> style="display: none;" <?php endif; ?>>立即绑定</a>
                        <a href="javascript:void(0);" id="wechat_unbind" data-logintype="<?php echo $thirdata['type']; ?>" onclick="wechat_unbind(this);" class="ncap-btn ncap-btn-green" <?php if(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty())): ?> style="display: none;" <?php endif; ?>>解除绑定</a>
                        <input type="hidden" id="is_bind_wechat" value="<?php if(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty())): ?>bind<?php else: ?>unbind<?php endif; ?>">
                    </dd>
                </dl>
            <?php elseif(!empty($thirdata['data']['switch'])): ?>
                <dl class="row">
                    <dt class="tit">
                        <label for="bind_wechat">绑定微信</label>
                    </dt>
                    <dd class="opt">
                        <span id="span_wechat_nickname">
                            <?php if(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty())): ?>未绑定<?php else: ?>已绑定公众号<?php endif; ?>
                        </span>
                        <a href="javascript:void(0);" id="wechat_bind" data-logintype="<?php echo $thirdata['type']; ?>" onclick="wechat_bind(this);" class="ncap-btn ncap-btn-green" <?php if(!(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty()))): ?> style="display: none;" <?php endif; ?>>立即绑定</a>
                        <a href="javascript:void(0);" id="wechat_unbind" data-logintype="<?php echo $thirdata['type']; ?>" onclick="wechat_unbind(this);" class="ncap-btn ncap-btn-green" <?php if(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty())): ?> style="display: none;" <?php endif; ?>>解除绑定</a>
                        <input type="hidden" id="is_bind_wechat" value="<?php if(empty($wechatInfo['wx_id']) || (($wechatInfo['wx_id'] instanceof \think\Collection || $wechatInfo['wx_id'] instanceof \think\Paginator ) && $wechatInfo['wx_id']->isEmpty())): ?>bind<?php else: ?>unbind<?php endif; ?>">
                    </dd>
                </dl>
            <?php endif; if($info['admin_id'] != \think\Session::get('admin_info.admin_id') AND 0 >= \think\Session::get('admin_info.role_id')): ?>
            <dl class="row"><dt class="tit"><label><b>管理员权限设置</b></label></dt></dl>
            <dl class="row">
                <dt class="tit">
                    <label for="name">管理员角色组</label>
                </dt>
                <dd class="opt">
                    <p><label><input type="radio" name="role_id" value="-1" onclick="changeRole(-1);" <?php if(-1 == $info['role_id']): ?>checked="checked"<?php endif; ?> />超级管理员</label></p>
                    <?php if(is_array($admin_role_list) || $admin_role_list instanceof \think\Collection || $admin_role_list instanceof \think\Paginator): if( count($admin_role_list)==0 ) : echo "" ;else: foreach($admin_role_list as $key=>$role): ?>
                    <p>
                        <label><input type="radio" name="role_id" value="<?php echo $role['id']; ?>" onclick="changeRole(<?php echo $role['id']; ?>);" <?php if($role_info['id'] == $role['id']): ?> checked="checked"<?php endif; ?> /><?php echo $role['name']; ?></label>
                        <!-- &nbsp;<a href="javascript:void;" data-url="<?php echo url('AuthRole/edit', array('id'=>$role['id'],'iframe'=>1)); ?>" onclick="addRole(this);">[编辑]</a>&nbsp;&nbsp;<a href="javascript:void;" data-url="<?php echo url('AuthRole/del'); ?>" data-id="<?php echo $role['id']; ?>" onclick="delfun(this);">[删除]</a> -->
                    </p>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <p id="custom_role" style="padding-left: 13px; text-decoration:underline;"><label><a href="javascript:void(0);" data-url="<?php echo url('AuthRole/add', array('iframe'=>1)); ?>" onclick="addRole(this);">自定义</a></label></p>
                </dd>
            </dl>
            <dl class="row"><dt class="tit"><label><b>当前权限组预览</b></label></dt></dl>
<!--             <dl class="row">
                <dt class="tit">
                    <label for="name">语言权限</label>
                </dt>
                <dd class="opt">
                    <label><img class="cboximg" src="/public/static/admin/images/<?php if(! empty($role_info['language']) && in_array('cn', $role_info['language'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="language[]" value="cn" <?php if(! empty($role_info['language']) && in_array('cn', $role_info['language'])): ?> checked="checked"<?php endif; ?> class="none" />简体中文</label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl> -->
            <dl class="row">
                <dt class="tit">
                    <label for="name">在线升级</label>
                </dt>
                <dd class="opt">
                    <label><img class="cboximg" src="/public/static/admin/images/<?php if($role_info['online_update'] == '1'): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="online_update" value="1" <?php if($role_info['online_update'] == '1'): ?> checked="checked"<?php endif; ?> class="none" />允许操作</label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="name">功能地图</label>
                </dt>
                <dd class="opt">
                    <label><img class="cboximg" src="/public/static/admin/images/<?php if($role_info['switch_map'] == '1'): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="switch_map" value="1" <?php if($role_info['switch_map'] == '1'): ?> checked="checked"<?php endif; ?> class="none" />允许操作</label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="name">文档权限</label>
                </dt>
                <dd class="opt">
                    <label><img class="cboximg" src="/public/static/admin/images/<?php if($role_info['only_oneself'] == '1'): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="only_oneself" value="1" <?php if($role_info['only_oneself'] == '1'): ?> checked="checked"<?php endif; ?> class="none" />只允许查看自己发布的文档</label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="name">文档审核</label>
                </dt>
                <dd class="opt">
                    <label><img class="cboximg" src="/public/static/admin/images/<?php if($role_info['check_oneself'] == '1'): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="check_oneself" value="1" <?php if($role_info['check_oneself'] == '1'): ?> checked="checked"<?php endif; ?> class="none" />发布文档自动通过审核</label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="name">操作权限</label>
                </dt>
                <dd class="opt">
                    <p><label><img class="cboximg" src="/public/static/admin/images/<?php if(!empty($role_info['cud']) && count($role_info['cud'])>=4): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" id="select_cud" <?php if(! empty($role_info['cud']) && count($role_info['cud'])>=4): ?> checked="checked"<?php endif; ?> class="none" />完全控制</label></p>
                    <p><label><img class="cboximg" src="/public/static/admin/images/<?php if(!empty($role_info['cud']) && in_array('add', $role_info['cud'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="cud[]" value="add" <?php if(! empty($role_info['cud']) && in_array('add', $role_info['cud'])): ?> checked="checked"<?php endif; ?> class="none" />添加信息</label></p>
                    <p><label><img class="cboximg" src="/public/static/admin/images/<?php if(!empty($role_info['cud']) && in_array('edit', $role_info['cud'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="cud[]" value="edit" <?php if(! empty($role_info['cud']) && in_array('edit', $role_info['cud'])): ?> checked="checked"<?php endif; ?> class="none" />修改信息</label></p>
                    <p><label><img class="cboximg" src="/public/static/admin/images/<?php if(!empty($role_info['cud']) && in_array('del', $role_info['cud'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="cud[]" value="del" <?php if(! empty($role_info['cud']) && in_array('del', $role_info['cud'])): ?> checked="checked"<?php endif; ?> class="none" />删除信息</label></p>
                    <p><label><img class="cboximg" src="/public/static/admin/images/<?php if(!empty($role_info['cud']) && in_array('changetableval', $role_info['cud'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="cud[]" value="changetableval" <?php if(! empty($role_info['cud']) && in_array('changetableval', $role_info['cud'])): ?> checked="checked"<?php endif; ?> class="none" />审核信息</label></p>
                    <p class="none"><label><img class="cboximg" src="/public/static/admin/images/<?php if(!empty($role_info['cud']) && in_array('rebackdraft', $role_info['cud'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="cud[]" value="rebackdraft" <?php if(! empty($role_info['cud']) && in_array('rebackdraft', $role_info['cud'])): ?> checked="checked"<?php endif; ?> class="none" />退回信息</label></p>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>功能权限</label>
                </dt>
                <dd class="opt">
                    <p>
                        <label><img class="cboximg" src="/public/static/admin/images/ok.png" /><input type="checkbox" id="select_all_permission" class="none" />全部选择</label>
                    </p>

                    <?php if(is_array($modules) || $modules instanceof \think\Collection || $modules instanceof \think\Paginator): if( count($modules)==0 ) : echo "" ;else: foreach($modules as $key=>$vo): if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): if( count($vo['child'])==0 ) : echo "" ;else: foreach($vo['child'] as $key=>$vo2): if(1 == $vo2['is_modules'] AND ! empty($auth_rule_list[$vo2['id']])): if(1002 == $vo2['id']): ?>
                            <div class="admin_poplistdiv">
                                <h2><?php echo $vo2['name']; ?></h2>
                                <?php if(! empty($arctype_p_html)): ?>
                                <p>
                                    <?php echo $arctype_p_html; ?>
                                </p>
                                <?php echo $arctype_child_html; endif; ?>
                            </div>
                          <?php else: ?>
                            <div class="admin_poplistdiv">
                                <h2><?php echo $vo2['name']; ?></h2>
                                <p>
                                    <?php if(is_array($auth_rule_list[$vo2['id']]) || $auth_rule_list[$vo2['id']] instanceof \think\Collection || $auth_rule_list[$vo2['id']] instanceof \think\Paginator): if( count($auth_rule_list[$vo2['id']])==0 ) : echo "" ;else: foreach($auth_rule_list[$vo2['id']] as $key=>$rule): ?>
                                    <label><img class="cboximg" src="/public/static/admin/images/<?php if(! empty($role_info['permission']['rules']) && in_array($rule['id'], $role_info['permission']['rules'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" class="none" name="permission[rules][]" value="<?php echo $rule['id']; ?>" <?php if(! empty($role_info['permission']['rules']) && in_array($rule['id'], $role_info['permission']['rules'])): ?> checked="checked"<?php endif; ?> /><?php echo $rule['name']; ?></label>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </p>
                            </div>
                          <?php endif; endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; if(! empty($plugins)): ?>
                    <div class="admin_poplistdiv">
                        <h2>插件应用</h2>
                        <ul>
                            <?php if(is_array($plugins) || $plugins instanceof \think\Collection || $plugins instanceof \think\Paginator): if( count($plugins)==0 ) : echo "" ;else: foreach($plugins as $key=>$plugin): ?>
                            <li>
                                <label><img class="cboximg" src="/public/static/admin/images/<?php if(! empty($role_info['permission']['plugins'][$plugin['code']]) || !empty($role_info['permission']['plugins'][$plugin['code']]['child'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" name="permission[plugins][<?php echo $plugin['code']; ?>][code]" value="<?php echo $plugin['code']; ?>" class="none" <?php if(!empty($role_info['permission']['plugins'][$plugin['code']]) || !empty($role_info['permission']['plugins'][$plugin['code']]['child'])): ?> checked="checked"<?php endif; ?> /><?php echo $plugin['name']; ?></label>
                                <?php $config = json_decode($plugin['config'], true); if(! empty($config['permission'])): ?>
                                <p style="padding-left:10px;">
                                    <span class="button level1 switch center_docu"></span>
                                    <?php foreach($config['permission'] as $index => $text): ?>
                                    <label><img class="cboximg" src="/public/static/admin/images/<?php if(! empty($role_info['permission']['plugins'][$plugin['code']]['child']) && in_array($index, $role_info['permission']['plugins'][$plugin['code']]['child'])): ?>ok<?php else: ?>del<?php endif; ?>.png" /><input type="checkbox" class="none" name="permission[plugins][<?php echo $plugin['code']; ?>][child][]" <?php if(! empty($role_info['permission']['plugins'][$plugin['code']]['child']) && in_array($index, $role_info['permission']['plugins'][$plugin['code']]['child'])): ?> checked="checked"<?php endif; ?> value="<?php echo $index; ?>" /><?php echo $text; ?></label>
                                    <?php endforeach; ?>
                                </p>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </dd>
            </dl>
            <?php endif; ?>
            <div class="bot2">
                <?php echo token('__token_admin_edit__'); ?>
                <a href="JavaScript:void(0);" onclick="adsubmit();" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a>
            </div>
        </div>
    </form>
</div>
<input type="hidden" name="security_ask_old" id="security_ask_old" value="<?php echo (isset($global['security_ask']) && ($global['security_ask'] !== '')?$global['security_ask']:''); ?>">
<textarea name="admin_role_list" id="admin_role_list" class="none"><?php echo json_encode($admin_role_list); ?></textarea>
<script type="text/javascript">
    $(function(){
        // 默认全部禁用复选框
        $('#postForm input[type="checkbox"]').attr("disabled","disabled");

        /*超级管理员默认全选复选框*/
        if (0 >= <?php echo $info['role_id']; ?>) {
            $('#postForm input[type="checkbox"]').prop('checked', 'checked');
            $('#postForm img.cboximg').attr('src', '/public/static/admin/images/ok.png');
            // $('#postForm input[name=only_oneself]').val(0);
            // $('#postForm input[name=only_oneself]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
        }
        /*--end*/

        $('.arctype_bg').bind('click', function(){
            var acid = $(this).next().find('input').val(), input = 'arctype_child_' + acid;
            $('.arctype_child').hide();
            if( $(this).attr('class').indexOf('expandable') == -1 ){
                $(this).removeClass('collapsable').addClass('expandable');
            }else{
                $('.arctype_bg').removeClass('collapsable').addClass('expandable');
                $(this).removeClass('expandable').addClass('collapsable');
                $('#'+input).show();
            }
        });
        $('.arctype_cbox').bind('click', function(){
            var acid = $(this).val(), input = 'arctype_child_' + acid;
            var pid = $(this).data('pid');
            var tpid = $(this).data('tpid');
            if($(this).prop('checked')){
                if (0 < $('input[data-pid="'+pid+'"]:checked').length) {
                    $('.arctype_id_'+pid).prop('checked', 'checked');
                    $('.arctype_id_'+pid).parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                }
                if (0 < $('#arctype_child_'+tpid).find('input[type="checkbox"]:checked').length) {
                    $('.arctype_id_'+tpid).prop('checked', 'checked');
                    $('.arctype_id_'+tpid).parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                }
                $('#'+input).find('input[type="checkbox"]').prop('checked', 'checked');
                $('#'+input).find('input[type="checkbox"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
            }else{
                if (1 > $('input[data-pid="'+pid+'"]:checked').length) {
                    $('.arctype_id_'+pid).removeAttr('checked');
                    $('.arctype_id_'+pid).parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
                }
                if (1 > $('#arctype_child_'+tpid).find('input[type="checkbox"]:checked').length) {
                    $('.arctype_id_'+tpid).removeAttr('checked');
                    $('.arctype_id_'+tpid).parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
                }
                $('#'+input).find('input[type="checkbox"]').removeAttr('checked');
                $('#'+input).find('input[type="checkbox"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
            }
        });
        $('#select_cud').bind('click', function(){
            if($(this).prop('checked')){
                $('#postForm input[name^="cud"]').prop('checked', 'checked');
                $('#postForm input[name^="cud"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
            }else{
                $('#postForm input[name^="cud"]').removeAttr('checked');
                $('#postForm input[name^="cud"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
            }
        });

        $('#select_all_permission').bind('click', function(){
            if($(this).prop('checked')){
                $('#postForm input[name^="permission"]').prop('checked', 'checked');
                $('#postForm input[name^="permission"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
            }else{
                $('#postForm input[name^="permission"]').removeAttr('checked');
                $('#postForm input[name^="permission"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
            }
        });
        $('#postForm input[name^="permission"],#postForm input[name^="cud"]').bind('click', function(){
            hasSelectAll();
        });

        hasSelectAll();
    });

    function hasSelectAll(){
        var c = true;
        $('#postForm input[name^="permission"]').each(function(idx, ele){
            if(! $(ele).prop('checked')){
                c = false;
                return;
            }
        });
        if(c){
            $('#select_all_permission').prop('checked', 'checked');
            $('#select_all_permission').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
        }else{
            $('#select_all_permission').removeAttr('checked');
            $('#select_all_permission').parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
        }

        var c = true;
        $('#postForm input[name^="cud"]').each(function(idx, ele){
            if(! $(ele).prop('checked')){
                c = false;
                return;
            }
        });
        if(c){
            $('#select_cud').prop('checked', 'checked');
            $('#select_cud').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
        }else{
            $('#select_cud').removeAttr('checked');
            $('#select_cud').parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
        }
    }

    function changeRole(value){
        if (-1 == value) {
            $('#postForm input[type="checkbox"]').attr("checked","checked").attr('disabled', 'disabled');
            $('#postForm img.cboximg').attr('src', '/public/static/admin/images/ok.png');
            // $('#postForm input[name=only_oneself]').val(0);
            // $('#postForm input[name=only_oneself]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/del.png');
            return;
        }
        
        $('#postForm input[name!="role_id"]').removeAttr('checked').removeAttr('disabled');
        $('#postForm img.cboximg').attr('src', '/public/static/admin/images/del.png');

        // if(value == "0"){
        //     $('#postForm input[name!="role_id"]').prop('checked', 'checked');
        //     $('#postForm input[name="online_update"]').removeAttr('checked');
        //     $('#postForm input[name="switch_map"]').removeAttr('checked');
        //     $('#postForm input[name="only_oneself"]').removeAttr('checked');
        //     return ;
        // }
        var admin_role_list = JSON.parse($('#admin_role_list').val());
        for(var i in admin_role_list){
            var item = admin_role_list[i];
            if(item.id == value){
                if(item.language){
                    item.language.map(function(row){
                        $('#postForm input[name^="language"][value="'+row+'"]').prop('checked', 'checked');
                        $('#postForm input[name^="language"][value="'+row+'"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                    });
                }

                if(item.online_update){
                    $('#postForm input[name="online_update"]').prop('checked', 'checked');
                    $('#postForm input[name="online_update"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                };
                if(item.switch_map){
                    $('#postForm input[name="switch_map"]').prop('checked', 'checked');
                    $('#postForm input[name="switch_map"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                };
                // if(item.editor_visual){
                //     $('#postForm input[name="editor_visual"]').prop('checked', 'checked');
                //     $('#postForm input[name="editor_visual"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                // };
                if(item.only_oneself){
                    $('#postForm input[name="only_oneself"]').prop('checked', 'checked');
                    $('#postForm input[name="only_oneself"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                };
                if(item.check_oneself){
                    $('#postForm input[name="check_oneself"]').prop('checked', 'checked');
                    $('#postForm input[name="check_oneself"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                };
                if(item.cud){
                    item.cud.map(function(row){
                        $('#postForm input[name^="cud"][value="'+row+'"]').prop('checked', 'checked');
                        $('#postForm input[name^="cud"][value="'+row+'"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                    });
                }
                if(item.permission){
                    for(var p in item.permission){
                        if(p == 'plugins'){
                            if(item.permission[p]){
                                for(var pluginId in item.permission[p]){
                                    $('#postForm input[name="permission['+p+']['+pluginId+'][id]"][value="'+pluginId+'"]').prop('checked', 'checked');
                                    $('#postForm input[name="permission['+p+']['+pluginId+'][code]"][value="'+pluginId+'"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                                    if(item.permission[p][pluginId].child){
                                        item.permission[p][pluginId].child.map(function(row){
                                            $('#postForm input[name="permission['+p+']['+pluginId+'][child][]"][value="'+row+'"]').prop('checked', 'checked');
                                            $('#postForm input[name="permission['+p+']['+pluginId+'][child][]"][value="'+row+'"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                                        });
                                    }
                                }
                            }
                        } else if (p == 'arctype') {
                            item.permission[p].map(function(row){
                                $('#postForm .arctype_id_'+row).prop('checked', 'checked');
                                $('#postForm .arctype_id_'+row).parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                            });
                        }else{
                            item.permission[p].map(function(row){
                                $('#postForm input[name="permission['+p+'][]"][value="'+row+'"]').prop('checked', 'checked');
                                $('#postForm input[name="permission['+p+'][]"][value="'+row+'"]').parent().find('img.cboximg').attr('src', '/public/static/admin/images/ok.png');
                            });
                        }
                    }
                }
                
                hasSelectAll();
                $('#postForm input[type="checkbox"]').attr('disabled', 'disabled');
                break;
            }
        }
    }

    function addRole(obj)
    {
        var url = $(obj).data('url');
        // iframe窗
        layer.open({
            type: 2,
            title: '自定义用户组',
            fixed: true, //不固定
            shadeClose: false,
            shade: layer_shade,
            maxmin: false, //开启最大化最小化按钮
            area: ['90%', '90%'],
            content: url
        });
    }

    function custom_role(str, new_role_id, auth_role_list)
    {
        $('#custom_role').before(str);
        $('#admin_role_list').val(auth_role_list);
        changeRole(new_role_id);
    }

    function head_pic_call_back(fileurl_tmp)
    {
      $("#head_pic").val(fileurl_tmp);
      $("#img_head_pic").attr('src', fileurl_tmp);
    }

    $('#password').keyup(function(){
        var password = $(this).val();
        $.ajax({
            url: "<?php echo url('Admin/ajax_checkPasswordLevel'); ?>",
            type: "POST",
            dataType: "JSON",
            data: {password:password, _ajax:1},
            success: function(res){
                $('#password_tips').removeAttr('class');
                if (1 == res.code) {
                    $('#password_tips').addClass('rank r'+res.data.pwdLevel);
                }
            }
        });
    });
/*
    $('#password2').keyup(function(){
        var password = $('#password').val();
        var password2 = $('#password2').val();
        $('#password2_tips').hide();
        if (password != '' || password2 != '') {
            if (password != password2) {
                $('#password2_tips').html('<font color="red">两次密码输入不一致！</font>').show();
            } else {
                $('#password2_tips').html('<font color="green">校验通过！</font>').show();
            }
        }
    });
*/
    var parentObj = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    // 判断输入框是否为空
    function adsubmit(){
        if ($('input[name=user_name]').length > 0) {
            var user_name = $('input[name=user_name]').val();
            if($.trim(user_name) == '') {
                showErrorMsg('用户名不能为空！');
                $('input[name=user_name]').focus();
                return false;
            } 
        }
        var password = $.trim($('#password').val());
        if (0 < password.length) {
            <?php echo (isset($pwdJsCode) && ($pwdJsCode !== '')?$pwdJsCode:''); ?>
            var security_verifyfunc = <?php echo json_encode($global['security_verifyfunc']); ?>;
            if($.inArray('edit_pwd', security_verifyfunc) != -1){
                if (!ajax_isverify_answer()) {
                    autoload_security();
                    return false;
                }
            }
            
            /*var password2 = $('#password2').val();
            if(password2 == ''){
                showErrorMsg('确认密码不能为空！');
                $('input[name=password2]').focus();
                return false;
            }
            if (password != password2) {
                showErrorMsg('两次密码输入不一致！');
                $('input[name=password]').focus();
                return false;
            }*/
        }

        layer_loading('正在处理');
        setTimeout(function (){
            $.ajax({
                type : 'post',
                url : "<?php echo url('Admin/admin_edit', ['_ajax'=>1,'iframe'=>$iframe]); ?>",
                data : $('#postForm').serialize(),
                dataType : 'json',
                success : function(res){
                    layer.closeAll();
                    if(res.code == 1){
                        var _parent = parent;
                        _parent.layer.msg(res.msg, {shade: layer_shade, time: 1000}, function(){
                            _parent.window.location.reload();
                        });
                    }else{
                        showErrorMsg(res.msg);
                        $('input[name='+res.data.input_name+']').focus();
                    }
                },
                error: function(e){
                    layer.closeAll();
                    layer.alert(e.responseText, {icon: 5, title:false});
                }
            });
        }, 1);
    }

    /**
     * 绑定微信应用
     * @return {[type]} [description]
     */
    var notifyPolling = null;
    function wechat_bind(obj)
    {
        var logintype = $(obj).attr('data-logintype');
        if ('WechatLogin' == logintype) {
            var gourl = window.location.href;
            var url = "<?php echo url('Admin/wechat_bind', ['admin_id'=>$info['admin_id']], true, true); ?>";
            url += "&gourl="+encodeURIComponent(gourl);
            var iframes = layer.open({
                type: 2,
                title: '微信扫码绑定',
                fixed: true, //不固定
                shadeClose: false,
                shade: layer_shade,
                // maxmin: true, //开启最大化最小化按钮
                area: ['500px', '460px'],
                content: url
            });
        } else if ('EyouGzhLogin' == logintype) {
            layer_loading('正在加载');
            var admin_id = <?php echo (isset($info['admin_id']) && ($info['admin_id'] !== '')?$info['admin_id']:0); ?>;
            $.ajax({
                type: 'POST',
                url: "<?php echo url('Admin/mp_getqrcode'); ?>",
                data: {op:'bind', admin_id:admin_id, _ajax:1},
                dataType: "JSON",
                success: function(res){
                    layer.closeAll();
                    if (1 == res.code) {
                        var html_content = '<img src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='+ res.data.ticket +'" style="width: 250px; height: 250px;"><p style="color: red;padding: 8px 0;font-size: 15px;text-align: center;">打开微信扫一扫</p> <script type="text/javascript"> getNotify("'+admin_id+'","'+res.data.uniqid_scene+'"); <\/script>';
                        layer.open({
                            type: 1,
                            title:'微信扫码绑定',
                            id: 'layer_official_account',
                            shadeClose: false,
                            content: html_content,
                            end: function() {
                                clearNotify();
                            }
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
    }

    /**
     * 轮询是否绑定官方公众号
     * @return {[type]} [description]
     */
    function getNotify(admin_id, uniqid_scene){
        notifyPolling = setTimeout(function(){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('Admin/mp_bingwxgzhopenid'); ?>",
                data: {op:'bind', admin_id:admin_id, uniqid_scene:uniqid_scene, _ajax:1},
                dataType: "JSON",
                success: function(res){
                    if (1 == res.data.code) {
                        layer.closeAll();
                        clearNotify();
                        $('#span_wechat_nickname').html('已绑定公众号');
                        $('#wechat_bind').hide();
                        $('#wechat_unbind').show();
                        layer.msg('绑定成功', {shade: layer_shade, time: 1000});
                    } else if (0 == res.code) {
                        layer.closeAll();
                        clearNotify();
                        layer.alert(res.msg, {icon: 5, title:false, closeBtn:false}, function(){
                            window.location.reload();
                        });
                    } else if (2 == res.data.code) {
                        getNotify(admin_id, uniqid_scene);
                    }
                },
                error: function(e){
                    layer.closeAll();
                    clearNotify();
                    layer.alert(e.responseText, {icon: 5, title:false, closeBtn:false}, function(){
                        window.location.reload();
                    });
                }
            });
        }, 1800);
    }

    function clearNotify(){
        if(notifyPolling > 0){
            clearTimeout(notifyPolling);
            notifyPolling = null;
        }
    }

    /**
     * 解除绑定微信应用
     * @return {[type]} [description]
     */
    function wechat_unbind(obj)
    {
        var logintype = $(obj).attr('data-logintype');
        if ('WechatLogin' == logintype) {
            var admin_id = <?php echo (isset($info['admin_id']) && ($info['admin_id'] !== '')?$info['admin_id']:0); ?>;
            layer_loading('正在处理');
            $.ajax({
                type : 'post',
                url : "<?php echo url('Admin/wechat_unbind_handle'); ?>",
                data : {admin_id:admin_id, _ajax:1},
                dataType : 'json',
                success : function(res){
                    layer.closeAll();
                    if(res.code == 1){
                        $('#span_wechat_nickname').html('未绑定');
                        $('#wechat_bind').show();
                        $('#wechat_unbind').hide();
                        layer.msg(res.msg, {shade: layer_shade, time: 1000}, function(){
                            // window.location.reload();
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
        } else if ('EyouGzhLogin' == logintype) {
            var admin_id = <?php echo (isset($info['admin_id']) && ($info['admin_id'] !== '')?$info['admin_id']:0); ?>;
            layer_loading('正在处理');
            $.ajax({
                type: 'POST',
                url: '<?php echo url("Admin/mp_unbindwx"); ?>',
                data: {admin_id:admin_id, _ajax:1},
                dataType: "JSON",
                success: function(res){
                    layer.closeAll();
                    if (1 == res.code){
                        $('#span_wechat_nickname').html('未绑定');
                        $('#wechat_bind').show();
                        $('#wechat_unbind').hide();
                        layer.msg(res.msg, {shade: layer_shade, time: 1000}, function(){
                            // window.location.reload();
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
    }
</script>

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
        $('#think_page_trace_open').css('z-index', 99999);
    });
</script>
</body>
</html>