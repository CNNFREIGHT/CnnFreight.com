<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:51:"./application/admin/template/security/ddos_kill.htm";i:1756433208;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/layout.htm";i:1756433208;s:75:"/www/wwwroot/cnnfreight.com/application/admin/template/public/theme_css.htm";i:1721637128;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/footer.htm";i:1680508820;}*/ ?>
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
<body class="bodystyle">
<style>
    body{margin:0px;}
    body,th,td{font: 13px Arial,Tahoma;line-height: 16px;}
    .alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#fff;padding:10px 10px 10px 5px;border-right: 1px solid #ddd;}
    .alt2 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#fff;padding:10px 10px 10px 5px;border-right: 1px solid #ddd;vertical-align: middle;}
    .focus td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#F4FCFA;padding:10px 10px 10px 5px;border-right: 1px solid #ddd;}
    .head th{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e9e9e9;padding:10px 10px 10px 5px;font-weight:bold;}
    .head th span{font-weight:normal;}
</style>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page pb0">
    <div class="fixed-bar pb0">
        <div class="item-title mb0">
            <a class="back_xin" href="javascript:history.back();" title="返回"><i class="iconfont e-fanhui"></i></a>
            <div class="subject">
                <h3>安全中心</h3>
                <h5></h5>
            </div>
        </div>
    </div>
</div>
<?php if(!is_internal_network()): ?>
<div class="page nobg">
    <div class="flexigrid">
        <!-- 安全扫描 -->
        <div class="security-scan">
            <div class="security-scan-l">
                <div class="wlaq_pic" id="scan_wlaq_pic">
                    <?php if(empty($ddosSetting['ddos_scan_is_finish'])): ?>
                        <!-- 未检测 -->
                        <img src="/public/static/admin/images/security-unknown.png">
                    <?php else: if(empty($doubtdata['html']) || (($doubtdata['html'] instanceof \think\Collection || $doubtdata['html'] instanceof \think\Paginator ) && $doubtdata['html']->isEmpty())): ?>
                            <!-- 检测后没有问题 -->
                            <img src="/public/static/admin/images/security-yes.png">
                        <?php else: ?>
                            <!-- 检测后有问题 -->
                            <img src="/public/static/admin/images/security-no.png">
                        <?php endif; endif; ?>
                </div>
                <div class="wlaq-name">
                    <div class="wlaq-name-t">定期检查，确保程序安全</div>
                    <span class="wlaq-name-c">请选择扫描的范围，如果图片及附件目录过多，扫描会用时长些，建议分开扫描</span>
                    <div class="wlaq-name-b">
                        扫描范围：
                        <label class="curpoin mr10"><input id="range_files" name="range_files" value="1" type="checkbox" <?php if(!(empty($ddosSetting['ddos_scan_range_files']) || (($ddosSetting['ddos_scan_range_files'] instanceof \think\Collection || $ddosSetting['ddos_scan_range_files'] instanceof \think\Paginator ) && $ddosSetting['ddos_scan_range_files']->isEmpty()))): ?> checked="checked" <?php endif; ?>>系统文件</label>
                        <label class="curpoin mr10"><input id="range_attachment" name="range_attachment" value="1" type="checkbox" <?php if(!(empty($ddosSetting['ddos_scan_range_attachment']) || (($ddosSetting['ddos_scan_range_attachment'] instanceof \think\Collection || $ddosSetting['ddos_scan_range_attachment'] instanceof \think\Paginator ) && $ddosSetting['ddos_scan_range_attachment']->isEmpty()))): ?> checked="checked" <?php endif; ?>>附件目录</label>
                        <!-- <label class="curpoin mr10"><input id="range_uploads" name="range_uploads" value="1" type="checkbox" <?php if(!(empty($ddosSetting['ddos_scan_range_uploads']) || (($ddosSetting['ddos_scan_range_uploads'] instanceof \think\Collection || $ddosSetting['ddos_scan_range_uploads'] instanceof \think\Paginator ) && $ddosSetting['ddos_scan_range_uploads']->isEmpty()))): ?> checked="checked" <?php endif; ?>>图片目录</label> -->
                    </div>
                </div>
            </div>
            <div class="security-scan-r">
                <a class="scan-btn" onclick="scan();" href="javascript:void(0);">深度扫描</a>
                <a class="" href="javascript:void(0);" data-href="<?php echo url('Security/ddos_scan_doc'); ?>" onclick="openFullframe(this, '设置定时任务', '90%', '90%');">设置定时任务？</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="page">
    <div class="flexigrid">
        <!-- 扫描结果 -->
        <div class="result">
            <div id="div_scanlist" <?php if(empty($ddosSetting['ddos_scan_is_finish'])): ?> style="display: none;" <?php endif; ?>>
                <div class="result-tip">
                    <div id="scan_no_problem" <?php if(empty($source_dirlist_total) || !empty($doubtdata['html'])): ?> style="display: none;" <?php endif; ?>>
                        <i class="iconfont e-yanzhengmaguanli green"></i>共检查了<em class="scan_allpagetotal"><?php echo $ddosSetting['ddos_scan_allscantotal']; ?></em>个文件，没有发现问题。
                    </div>
                    <div id="scan_init_tips" <?php if(!empty($source_dirlist_total)): ?> style="display: none;" <?php endif; ?>>
                        <i class="iconfont e-yanzhengmaguanli green"></i>请点击右上方深度扫描按钮给网站做一次体检吧~
                    </div>
                    <div id="scan_yes_problem" class="scan-problem" <?php if(empty($source_dirlist_total) || empty($doubtdata['html'])): ?> style="display: none;" <?php endif; ?>>
                        <div>
                            <?php if(!empty($ddosSetting['ddos_is_auto_scan'])): ?>
                                <i class="iconfont e-gantanhao-quan red"></i>定期检查<em class="scan_allpagetotal"><?php echo $ddosSetting['ddos_scan_allscantotal']; ?></em>个核心文件，发现<em id="scan_doubtotal"><?php echo $doubtdata['file_doubt_total']; ?></em>个文件有风险，请修复后并执行深度扫描：
                            <?php else: ?>
                                <i class="iconfont e-gantanhao-quan red"></i>共检查了<em class="scan_allpagetotal"><?php echo $ddosSetting['ddos_scan_allscantotal']; ?></em>个文件，以下<em id="scan_doubtotal"><?php echo $doubtdata['file_doubt_total']; ?></em>个文件有问题，需要修复：
                            <?php endif; ?>
                        </div>
                        <div>
                            <a class="scan-problem-btn" onclick="one_click_repair(this);" href="javascript:void(0);">一键处理</a>
                        </div>
                        
                    </div>
                </div>
                <ul class="result-problem" id="scan_problem_list" <?php if(empty($source_dirlist_total) || empty($doubtdata['html'])): ?> style="display: none;" <?php endif; ?>>
                    <?php echo $doubtdata['html']; ?>
                </ul> 
                <div style="height: 30px;"></div>
            </div>
            <div class="result-tip"><i class="iconfont e-anquanshezhi green"></i>以下事项优化可提升网站安全性，具体建议如下：</div>
            <ul class="result-advise">
                <li>
                    <span class="label">账号密码</span>
                    <?php if(\think\Session::get('admin_login_pwdlevel') <= 3): ?>
                        <!-- 一般及一般以下  -->
                        <div class="name">后台登录密码强度：<span class="red"><?php echo getPasswordLevelTitle(\think\Session::get('admin_login_pwdlevel')); ?></span>，容易被暴力破解，请及时修改密码，提高安全性。</div>
                    <?php else: ?>
                        <!-- 一般以上不包含一般  -->
                        <div class="name">后台登录密码强度：<span class="green"><?php echo getPasswordLevelTitle(\think\Session::get('admin_login_pwdlevel')); ?></span>，请记好密码，如有忘记可以使用改密小工具</div>
                    <?php endif; ?>
                    <div class="operation">
                        <a href="javascript:void(0);" data-href="<?php echo url('Admin/admin_edit', ['id'=>\think\Session::get('admin_info.admin_id'),'iframe'=>1]); ?>" onclick="openFullframe(this, '管理员-修改密码');">修改</a>
                    </div>
                </li>
                <li>
                    <span class="label">登录路径</span>
                    <div class="name">
                        建议修改后台登录路径，以提高网站安全性
                        <?php if(!empty($adminbasefile) && $adminbasefile != 'login.php'): ?>
                            &nbsp;(<span class="green">已修改</span>)
                        <?php endif; ?>
                    </div>
                    <div class="operation">
                        <a href="javascript:void(0);" data-href="<?php echo url('Security/popup_adminbasefile'); ?>" onclick="openFullframe(this, '后台登录路径设置', '680px', '285px');">设置</a>
                    </div>
                </li>
                <li>
                    <span class="label">登录超时</span>
                    <div class="name">
                        后台登录后，超出设置时长时，将会自动退出登录
                        &nbsp;(<span class="green">已设置为<?php echo (isset($global['web_login_expiretime']) && ($global['web_login_expiretime'] !== '')?$global['web_login_expiretime']:config('login_expire')); ?>秒</span>)
                    </div>
                    <div class="operation">
                        <a href="javascript:void(0);" data-href="<?php echo url('Security/popup_login_expiretime'); ?>" onclick="openFullframe(this, '后台登录超时设置', '680px', '285px');">设置</a>
                    </div>
                </li>
                <li>
                    <span class="label">登录防爆</span>
                    <div class="name">
                        包含登录失败锁定，防火墙规则设置，双因子验证
                    </div>
                    <div class="operation">
                        <a href="javascript:void(0);" data-href="<?php echo url('Security/popup_flameproof'); ?>" data-cancel_callback="win_reload" onclick="openFullframe(this, '后台登录防爆设置', '100%', '100%');">设置</a>
                    </div>
                </li>
                <li>
                    <span class="label">密保问题</span>
                    <div class="name">
                        建议开启密保问题，以提高网站安全性 
                        <?php if(!empty($global['security_ask_open'])): ?>
                            &nbsp;(<span class="green">已开启</span>)
                        <?php endif; ?>
                     </div>
                    <div class="operation">
                        <a href="javascript:void(0);" data-href="<?php echo url('Security/popup_second'); ?>" data-cancel_callback="win_reload" onclick="openFullframe(this, '密保问题设置', '860px', '70%');">设置</a>
                    </div>
                </li>
                <li>
                    <span class="label">图片木马</span>
                    <div class="name">
                        建议开启，所有上传图片的功能将进行木马检测 
                        <?php if(empty($check_illegal_open)): ?>
                            &nbsp;(<span class="green">已开启</span>)
                        <?php endif; ?>
                    </div>
                    <div class="operation">
                        <?php if(!empty($check_illegal_open)): ?>
                            <a href="javascript:void(0);" onclick="check_illegal_open_submit(0)">开启</a>
                        <?php else: ?>
                            <a href="javascript:void(0);" onclick="check_illegal_open_submit(1)">关闭</a>
                        <?php endif; ?>
                    </div>
                </li>
                <li>
                    <span class="label">白&nbsp;名&nbsp;单</span>
                    <div class="name">
                        管理扫描的白名单列表
                     </div>
                    <div class="operation">
                        <a href="javascript:void(0);" data-href="<?php echo url('Security/ddos_whitelist_list'); ?>" data-cancel_callback="win_reload" onclick="openFullframe(this, '扫描白名单管理', '80%', '80%');">查看</a>
                    </div>
                </li>
                <li>
                    <span class="label">目录权限</span>
                    <div class="name">按教程设置，可提高网站安全性，系统升级时需要把权限恢复，否则会有升级失败的情况</div>
                    <div class="operation">
                        <a href="JavaScript:void(0);" data-href="https://www.eyoucms.com/plus/view.php?aid=28298&origin_eycms=1" onclick="openFullframe(this,'易优CMS目录权限设置教程，仅供参考');">查看</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">

    function scan()
    {
        var range_files = $('#range_files:checked').val();
        var range_attachment = $('#range_attachment:checked').val();
        var range_uploads = $('#range_uploads:checked').val();
        if (1 != range_files && 1 != range_attachment && 1 != range_uploads) {
            layer.msg('请勾选要扫描范围', {icon: 2, time: 1200});
            return false;
        }

        var url = eyou_basefile+"?m=admin&c=Security&a=ddos_scan_file&range_files="+range_files+"&range_attachment="+range_attachment+"&range_uploads="+range_uploads+"&lang="+__lang__;
        var index = layer.open({type: 2,title: '智能扫描',area: ['500px', '218px'],fix: false, maxmin: false,content: url});
    }

    /**
     * 加入白名单
     * @param  {[type]} obj [description]
     * @param  {[type]} opt [description]
     * @return {[type]}     [description]
     */
    function whitelist_add(obj, opt)
    {
        var md5keys = [];
        if ('batch' == opt) {
            $('input[name^=md5keys]').each(function(i,o){
                if($(o).is(':checked')){
                    md5keys.push($(o).val());
                }
            })
            if(md5keys.length == 0){
                layer.alert('请至少选择一项', {
                    shade: layer_shade,
                    area: ['480px', '190px'],
                    move: false,
                    title: '提示',
                    btnAlign:'r',
                    closeBtn: 3,
                    success: function () {
                        $(".layui-layer-content").css('text-align', 'left');
                    }
                });
                return;
            }
        } else {
            md5keys.push($(obj).attr('data-md5key'));
        }

        var title = '将此项加入白名单列表，下次扫描将智能跳过';
        layer.confirm(title, {
                shade: layer_shade,
                area: ['480px', '190px'],
                move: false,
                title: '加入白名单',
                btnAlign:'r',
                closeBtn: 3,
                btn: ['确定', '取消'], //按钮
                success: function () {
                    $(".layui-layer-content").css('text-align', 'left');
                }
            }, function(index){
                layer_loading('正在处理');
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url('Security/ddos_whitelist_add'); ?>",
                    data : {md5keys:md5keys, _ajax:1},
                    dataType : 'json',
                    success : function(res){
                        layer.closeAll();
                        if (res.data && res.data.md5keys) {
                            $.each(res.data.md5keys, function(index, item){
                                $('#div_scanlist').find('a[data-md5key='+item+']').parent().parent().remove();
                            });
                        }
                        
                        if(res.code == 1){
                            $('#scan_doubtotal').text(res.data.file_doubt_total);
                            layer.msg(res.msg, {icon: 1, time: 500});
                        }else{
                            showErrorAlert(res.msg);
                        }
                    },
                    error:function(e){
                        layer.closeAll();
                        showErrorAlert(e.responseText);
                    }
                })
            }, function(index){
                layer.close(index);
                return false;// 取消
            }
        );
    }

    /**
     * 一键处理
     * @param  {[type]} obj [description]
     * @return {[type]}     [description]
     */
    function one_click_repair(obj)
    {
        var title = '将批量处理扫描出来的文件修复及删除操作，操作后不可恢复，请确认';
        layer.confirm(title, {
                shade: layer_shade,
                area: ['480px', '190px'],
                move: false,
                title: '一键处理',
                btnAlign:'r',
                closeBtn: 3,
                btn: ['执行', '取消'], //按钮
                success: function () {
                    $(".layui-layer-content").css('text-align', 'left');
                }
            }, function(index){
                // 执行
                layer_loading('正在处理');
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url('Security/ddos_one_click_repair'); ?>",
                    data : {_ajax:1},
                    dataType : 'json',
                    success : function(res){
                        layer.closeAll();
                        if (res.data && res.data.md5keys) {
                            $.each(res.data.md5keys, function(index, item){
                                $('#div_scanlist').find('a[data-md5key='+item+']').parent().parent().remove();
                            });
                        }
                        
                        if(res.code == 1){
                            $('#scan_doubtotal').text(res.data.file_doubt_total);
                            layer.msg(res.msg, {icon: 1, time: 500});
                        }else{
                            showErrorAlert(res.msg);
                        }
                    },
                    error:function(e){
                        layer.closeAll();
                        showErrorAlert(e.responseText);
                    }
                })
            }, function(index){
                layer.close(index);
                return false;// 取消
            }
        );
    }

    /**
     * 修复
     * @param  {[type]} obj [description]
     * @param  {[type]} opt [description]
     * @return {[type]}     [description]
     */
    function replacefile(obj, opt)
    {
        var md5keys = [];
        if ('batch' == opt) {
            $('input[name^=md5keys]').each(function(i,o){
                if($(o).is(':checked')){
                    md5keys.push($(o).val());
                }
            })
            if(md5keys.length == 0){
                layer.alert('请至少选择一项', {
                    shade: layer_shade,
                    area: ['480px', '190px'],
                    move: false,
                    title: '提示',
                    btnAlign:'r',
                    closeBtn: 3,
                    success: function () {
                        $(".layui-layer-content").css('text-align', 'left');
                    }
                });
                return;
            }
        } else {
            md5keys.push($(obj).attr('data-md5key'));
        }
        var title = $(obj).data('title');
        layer.confirm(title, {
                shade: layer_shade,
                area: ['480px', '190px'],
                move: false,
                title: '提示',
                btnAlign:'r',
                closeBtn: 3,
                btn: ['确定', '取消'], //按钮
                success: function () {
                    $(".layui-layer-content").css('text-align', 'left');
                }
            }, function(){
                // 确定
                layer_loading('正在处理');
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url('Security/ddos_replacefile'); ?>",
                    data : {md5keys:md5keys, _ajax:1},
                    dataType : 'json',
                    success : function(res){
                        layer.closeAll();
                        if (res.data && res.data.md5keys) {
                            $.each(res.data.md5keys, function(index, item){
                                $('#div_scanlist').find('a[data-md5key='+item+']').parent().parent().remove();
                            });
                        }
                        
                        if(res.code == 1){
                            $('#scan_doubtotal').text(res.data.file_doubt_total);
                            layer.msg(res.msg, {icon: 1, time: 500});
                        }else{
                            showErrorAlert(res.msg);
                        }
                    },
                    error:function(e){
                        layer.closeAll();
                        showErrorAlert(e.responseText);
                    }
                })
            }, function(index){
                layer.close(index);
                return false;// 取消
            }
        );
    }

    /**
     * 删除
     * @param  {[type]} obj [description]
     * @param  {[type]} opt [description]
     * @return {[type]}     [description]
     */
    function delfile(obj, opt)
    {
        var md5keys = [];
        if ('batch' == opt) {
            $('input[name^=md5keys]').each(function(i,o){
                if($(o).is(':checked')){
                    md5keys.push($(o).val());
                }
            })
            if(md5keys.length == 0){
                layer.alert('请至少选择一项', {
                    shade: layer_shade,
                    area: ['480px', '190px'],
                    move: false,
                    title: '提示',
                    btnAlign:'r',
                    closeBtn: 3,
                    success: function () {
                        $(".layui-layer-content").css('text-align', 'left');
                    }
                });
                return;
            }
        } else {
            md5keys.push($(obj).attr('data-md5key'));
        }

        layer.confirm('此操作不可逆，确认删除？', {
                shade: layer_shade,
                area: ['480px', '190px'],
                move: false,
                title: '提示',
                btnAlign:'r',
                closeBtn: 3,
                btn: ['确定', '取消'], //按钮
                success: function () {
                    $(".layui-layer-content").css('text-align', 'left');
                }
            }, function(){
                // 确定
                layer_loading('正在处理');
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url('Security/ddos_delfile'); ?>",
                    data : {md5keys:md5keys, _ajax:1},
                    dataType : 'json',
                    success : function(res){
                        layer.closeAll();
                        if (res.data && res.data.md5keys) {
                            $.each(res.data.md5keys, function(index, item){
                                $('#div_scanlist').find('a[data-md5key='+item+']').parent().parent().remove();
                            });
                        }

                        if(res.code == 1){
                            $('#scan_doubtotal').text(res.data.file_doubt_total);
                            layer.msg(res.msg, {icon: 1, time: 500});
                        }else{
                            showErrorAlert(res.msg);
                        }
                    },
                    error:function(e){
                        layer.closeAll();
                        showErrorAlert(e.responseText);
                    }
                })
            }, function(index){
                layer.close(index);
                return false;// 取消
            }
        );
    }

    function win_reload()
    {
        window.location.reload();
    }

    function check_illegal_open_submit(value) {
        layer_loading('正在处理');
        $.ajax({
            url: "<?php echo url('Security/illegal_check_open'); ?>",
            data: {value:value,_ajax:1},
            type: 'post',
            dataType: 'json',
            success: function (res) {
                layer.closeAll();
                if (1 == res.code) {
                    layer.msg(res.msg, {time: 1000}, function(){
                        window.location.reload();
                    });
                }
            },
            error:function (e) {
                layer.closeAll();
                showErrorAlert(e.responseText);
            }
        });
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