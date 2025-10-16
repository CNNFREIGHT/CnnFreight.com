<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:44:"./application/admin/template/system/smtp.htm";i:1732860816;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/layout.htm";i:1756879123;s:75:"/www/wwwroot/cnnfreight.com/application/admin/template/public/theme_css.htm";i:1721637128;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/footer.htm";i:1680508820;}*/ ?>
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
<body class="bodystyle" style="overflow-y: scroll;min-width:auto;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page min-hg-c-i" style="min-width: auto;box-shadow:none;">
    <div class="fixed-bar">
        <div class="item-title">
            <?php if($goback != 'off'): ?>
            <a class="back_xin" href="<?php echo url('System/api_conf'); ?>" title="返回"><i class="iconfont e-fanhui"></i></a>
            <?php endif; ?>
            <div class="subject">
                <h3>电子邮箱</h3>
                <h5></h5>
            </div>
            <ul class="tab-base nc-row">
                <?php if(is_check_access('System@smtp') == '1'): ?>
                <li><a href="<?php echo url('System/smtp'); ?>" <?php if('smtp'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>邮箱配置</span></a></li>
                <?php endif; if(is_check_access('System@smtp_tpl') == '1'): ?>
                <li><a href="<?php echo url('System/smtp_tpl'); ?>" <?php if('smtp_tpl'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>自定义模板</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <form class="form-horizontal" id="handlepost" method="post">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="smtp_server"><em>*</em>SMTP地址</label>
                </dt>
                <dd class="opt">
                    <input id="smtp_server" name="smtp_server" value="<?php echo (isset($smtp['smtp_server']) && ($smtp['smtp_server'] !== '')?$smtp['smtp_server']:''); ?>" class="input-txt" type="text" autocomplete="off" />
                    <p class="notic2">发送邮箱的smtp地址。如: smtp.qq.com或smtp.gmail.com</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="smtp_port"><em>*</em>SMTP端口</label>
                </dt>
                <dd class="opt">
                    <input id="smtp_port" name="smtp_port" value="<?php if(isset($smtp['smtp_port'])): ?><?php echo (isset($smtp['smtp_port']) && ($smtp['smtp_port'] !== '')?$smtp['smtp_port']:''); else: ?>465<?php endif; ?>" class="input-txt" type="text" autocomplete="off"/>
                    <p class="notic2"><span style="color: red;">注意：大部分默认为465，具体请参看各STMP服务商的设置说明，极少部分是25或其他端口号。</span>
                    </p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="smtp_user"><em>*</em>发信邮箱账号</label>
                </dt>
                <dd class="opt">
                    <input id="smtp_user" name="smtp_user" value="<?php echo (isset($smtp['smtp_user']) && ($smtp['smtp_user'] !== '')?$smtp['smtp_user']:''); ?>" class="input-txt" type="text" autocomplete="off"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="smtp_pwd"><em>*</em>邮箱授权码</label>
                </dt>
                <dd class="opt">
                    <input id="smtp_pwd"  name="smtp_pwd" value="<?php echo (isset($smtp['smtp_pwd']) && ($smtp['smtp_pwd'] !== '')?$smtp['smtp_pwd']:''); ?>" class="input-txt" type="text" autocomplete="off"/>
                    <p class="notic2">使用发送邮件的邮箱授权码。具体请点击参看【<a href="JavaScript:void(0);" data-href="https://www.eyoucms.com/plus/view.php?aid=5552&origin_eycms=1" onclick="openFullframe(this,'获取邮箱授权码');">使用指南</a>】</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit"><em>*</em>管理员邮箱</dt>
                <dd class="opt">
                    <input value="<?php echo (isset($smtp['smtp_from_eamil']) && ($smtp['smtp_from_eamil'] !== '')?$smtp['smtp_from_eamil']:''); ?>" name="smtp_from_eamil" id="smtp_from_eamil" placeholder="多个邮箱可以用逗号隔开" class="input-txt" type="text" onkeyup="this.value=this.value.replace(/，/g,',');" onpaste="this.value=this.value.replace(/，/g,',')" autocomplete="off">
                    <input value="测试发送" class="input-btn" onclick="sendEmail();" type="button">
                    <p class="notic">多个邮箱可以用逗号隔开</p>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">接收提醒选项</dt>
                <dd class="opt">
                    <ul class="nc-row ncap-waybill-list">
                        <li style="width: 100%;">
                            <?php if(is_array($tpl_list) || $tpl_list instanceof \think\Collection || $tpl_list instanceof \think\Paginator): if( count($tpl_list)==0 ) : echo "" ;else: foreach($tpl_list as $k=>$vo): ?>
                            <label class="label">
                                <input class="check" type="checkbox" name="tpl_id[]" value="<?php echo $vo['tpl_id']; ?>" <?php if($vo['is_open'] == '1'): ?>checked="checked"<?php endif; ?>><span><?php echo $vo['tpl_name']; ?></span>
                            </label>
                            &nbsp;
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                    </ul>
                </dd>
            </dl>

            <div class="bot">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="submit_smtp();">确认提交</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    var parentObj = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    // 提交邮箱配置
    function submit_smtp() {
        var smtp_server = $.trim($('input[name="smtp_server"]').val());
        var smtp_user = $.trim($('input[name="smtp_user"]').val());
        var smtp_pwd = $.trim($('input[name="smtp_pwd"]').val());
        var smtp_from_eamil = $.trim($('input[name="smtp_from_eamil"]').val());

        if (smtp_server != '' || smtp_user != '' || smtp_pwd != '' || smtp_from_eamil != '') {
            if (smtp_server == '') {
                showErrorMsg('SMTP地址不能为空！');
                $('input[name=smtp_server]').focus();
                return false;
            }
            if (smtp_user == '' || !checkEmail(smtp_user)) {
                showErrorMsg('发信邮箱账号的格式不正确！');
                $('input[name=smtp_user]').focus();
                return false;
            }
            if (smtp_pwd == '') {
                showErrorMsg('邮箱授权码不能为空！');
                $('input[name=smtp_pwd]').focus();
                return false;
            }
            if (smtp_from_eamil == '') {
                showErrorMsg('管理员邮箱不能为空！');
                $('input[name=smtp_from_eamil]').focus();
                return false;
            }
        }
        
        layer_loading("正在处理");
        $.ajax({
            url: "<?php echo url('System/smtp', ['goback'=>$goback,'_ajax'=>1]); ?>",
            type: 'POST',
            dataType: 'JSON',
            data: $('#handlepost').serialize(),
            success: function(res) {
                layer.closeAll();
                if (1 == res.code) {
                    layer.msg(res.msg, {shade: 0.1, time: 1000}, function(){
                        window.location.reload();
                    });
                } else {
                    var icon = 5;
                    try{
                        if (res.data.icon) {
                            icon = res.data.icon;
                        }
                    }catch(e){}
                    showErrorAlert(res.msg, icon);
                }
            },
            error: function(e){
                layer.closeAll();
                showErrorAlert(e.responseText);
            }
        });
    }

    // 测试邮箱发送
    function sendEmail() {
        var email = $('#smtp_from_eamil').val();
        if (email == '') {
            showErrorMsg('管理员邮箱不能为空！');
            $('input[name=smtp_from_eamil]').focus();
            return false;
        } else {
            var loading = layer_loading('正在发送');
            $.ajax({
                type: "post",
                data: $('#handlepost').serialize(),
                dataType: 'json',
                url: "<?php echo url('System/send_email', ['_ajax'=>1]); ?>",
                success: function (res) {
                    layer.closeAll();
                    if (res.code == 1) {
                        layer.msg(res.msg, {icon: 1, time:1000});
                    } else {
                        layer.msg(res.msg, {icon: 2, time: 2000});
                    }
                },
                error: function(e) {
                    layer.closeAll();
                    showErrorAlert(e.responseText);
                }
            })
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