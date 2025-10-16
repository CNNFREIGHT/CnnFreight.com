<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:45:"./application/admin/template/system/basic.htm";i:1756879123;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/layout.htm";i:1756879123;s:75:"/www/wwwroot/cnnfreight.com/application/admin/template/public/theme_css.htm";i:1721637128;s:69:"/www/wwwroot/cnnfreight.com/application/admin/template/system/bar.htm";i:1667356242;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/footer.htm";i:1680508820;}*/ ?>
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
<body class="bodystyle" style="overflow-y: scroll;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page atta min-hg-c-10">
    <?php if(\think\Request::instance()->param('tabase') != '-1'): ?>
    <div class="fixed-bar">
        <div class="item-title">
            <ul class="tab-base nc-row">
                <?php if(is_check_access(CONTROLLER_NAME.'@web') == '1'): ?>
                <li><a href="<?php echo url('System/web'); ?>" <?php if('web'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>网站信息</span></a></li>
                <?php endif; if($main_lang == $admin_lang): if(is_check_access(CONTROLLER_NAME.'@web2') == '1'): ?>
                    <li><a href="<?php echo url('System/web2'); ?>" <?php if('web2'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>核心设置</span></a></li>
                    <?php endif; endif; if(is_check_access(CONTROLLER_NAME.'@basic') == '1'): ?>
                <li><a href="<?php echo url('System/basic'); ?>" <?php if('basic'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>附件扩展</span></a></li>
                <?php endif; if($main_lang == $admin_lang): if(is_check_access(CONTROLLER_NAME.'@api_conf') == '1'): ?>
                    <li><a href="<?php echo url('System/api_conf'); ?>" <?php if(preg_match('/^api_conf/i', ACTION_NAME)): ?>class="current"<?php endif; ?>><span>接口API</span></a></li>
                    <?php endif; endif; if(is_check_access(CONTROLLER_NAME.'@customvar_index') == '1'): ?>
                <li><a href="<?php echo url('System/customvar_index'); ?>" <?php if('customvar_index'==ACTION_NAME): ?>class="current"<?php endif; ?>><span>自定义变量</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
    <form method="post" enctype="multipart/form-data" name="form1" id="handlepost" action="<?php echo url('System/basic'); ?>">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="basic_indexname">面包屑首页名</label>
                </dt>
                <dd class="opt">
                    <input id="basic_indexname" name="basic_indexname" value="<?php echo (isset($config['basic_indexname']) && ($config['basic_indexname'] !== '')?$config['basic_indexname']:'首页'); ?>" class="input-txt" type="text" />
                    <p class="notic"></p>
                </dd>
            </dl>
            <?php if($main_lang == $admin_lang): ?>
            <dl class="row">
                <dt class="tit">
                    <label for="list_symbol">面包屑间隔符</label>
                </dt>
                <dd class="opt">
                    <input id="list_symbol" name="list_symbol" value="<?php echo (isset($config['list_symbol']) && ($config['list_symbol'] !== '')?$config['list_symbol']:''); ?>" class="input-txt" type="text" />
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="image_type">上传图片格式</label>
                </dt>
                <dd class="opt">
                    <textarea rows="5" cols="60" id="image_type" name="image_type" style="height:20px;"><?php if(empty($config['image_type']) || (($config['image_type'] instanceof \think\Collection || $config['image_type'] instanceof \think\Paginator ) && $config['image_type']->isEmpty())): ?>jpg|gif|png|bmp|jpeg|ico<?php else: ?><?php echo $config['image_type']; endif; ?></textarea>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="file_type">上传软件格式</label>
                </dt>
                <dd class="opt">
                    <textarea rows="5" cols="60" id="file_type" name="file_type" style="height:20px;"><?php if(empty($config['file_type']) || (($config['file_type'] instanceof \think\Collection || $config['file_type'] instanceof \think\Paginator ) && $config['file_type']->isEmpty())): ?>zip|gz|rar|iso|doc|xsl|ppt|wps<?php else: ?><?php echo $config['file_type']; endif; ?></textarea>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="media_type">视频格式</label>
                </dt>
                <dd class="opt">
                    <textarea rows="5" cols="60" id="media_type" name="media_type" style="height:20px;"><?php if(empty($config['media_type']) || (($config['media_type'] instanceof \think\Collection || $config['media_type'] instanceof \think\Paginator ) && $config['media_type']->isEmpty())): ?>swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov|mp4<?php else: ?><?php echo $config['media_type']; endif; ?></textarea>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="file_size">附件上传大小</label>
                </dt>
                <dd class="opt">
                    <input id="file_size" name="file_size" value="<?php echo (isset($config['file_size']) && ($config['file_size'] !== '')?$config['file_size']:$max_filesize); ?>" type="text" style="width: 60px;" /> <?php echo $max_sizeunit; ?>
                    <p class="notic">附件上传大小限制，如果空间不支持，请与空间商联系修改php.ini部分参数</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="file_uploadname_open">附件名称</label>
                </dt>
                <dd class="opt">
                    <label class="curpoin"><input type="radio" name="file_uploadname_open" value="1" <?php if(isset($config['file_uploadname_open']) && $config['file_uploadname_open'] == 1): ?>checked="checked"<?php endif; ?>>不做变动</label>
                    &nbsp;
                    <label class="curpoin"><input type="radio" name="file_uploadname_open" value="0" <?php if(empty($config['file_uploadname_open'])): ?>checked="checked"<?php endif; ?>>随机重命名</label>
                    <p class="notic">附件名称设置不做变动即为上传的随机+原来名称，随机重命名就是会被系统随便更改名称。</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>内容图片附加功能</label>
                </dt>
                <dd class="opt">
                    <label><input type="checkbox" name="basic_img_auto_wh" value="1" <?php if(!isset($config['basic_img_auto_wh']) OR $config['basic_img_auto_wh'] == 1): ?>checked="checked"<?php endif; ?> title="自动通过样式控制，确保手机端下图片不拉伸变形">wap端自适应</label>&nbsp;&nbsp;
                    <label><input type="checkbox" name="basic_img_title" value="1" <?php if(!isset($config['basic_img_title']) OR $config['basic_img_title'] == 1): ?>checked="checked"<?php endif; ?>>追加title属性</label>&nbsp;&nbsp;
                    <label><input type="checkbox" name="basic_img_alt" value="1" <?php if(!isset($config['basic_img_alt']) OR $config['basic_img_alt'] == 1): ?>checked="checked"<?php endif; ?> onclick="check_basic_img_alt(this);">追加alt属性</label>&nbsp;&nbsp;
                    <label id="basic_img_alt_force" <?php if(isset($config['basic_img_alt']) && $config['basic_img_alt'] != 1): ?> class="none" <?php endif; ?>><input type="checkbox" name="basic_img_alt_force" value="1" <?php if(!empty($config['basic_img_alt_force'])): ?> checked="checked" <?php endif; ?>>alt强制同步title</label>&nbsp;&nbsp;
                    <span class="err"></span>
                    <p class="notic">针对文档详情页的内容图片附加这些功能效果</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="other_arcclick">文档默认点击数</label>
                </dt>
                <dd class="opt">
                    <input id="other_arcclick" name="other_arcclick" value="<?php if(isset($other_config['other_arcclick']) && 0 <= $other_config['other_arcclick']): ?><?php echo $other_config['other_arcclick']; else: ?>500|1000<?php endif; ?>" onkeyup="this.value=this.value.replace(/[^\|\d]/g,'');" onpaste="this.value=this.value.replace(/[^\|\d]/g,'')" class="input-txt" type="text" />
                    <p class="notic">比如：500|1000 表示随机数500-1000之间</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="other_arcdownload">文件默认下载数</label>
                </dt>
                <dd class="opt">
                    <input id="other_arcdownload" name="other_arcdownload" value="<?php if(isset($other_config['other_arcdownload']) && 0 <= $other_config['other_arcdownload']): ?><?php echo $other_config['other_arcdownload']; else: ?>100|500<?php endif; ?>" onkeyup="this.value=this.value.replace(/[^\|\d]/g,'');" onpaste="this.value=this.value.replace(/[^\|\d]/g,'')" class="input-txt" type="text" />
                    <p class="notic">比如：100|500 表示随机数100-500之间</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="editor_select">内容编辑器</label>
                </dt>
                <dd class="opt">
                    <label class="curpoin"><input type="radio" name="editor_select" value="1" <?php if(empty($editor['editor_select']) || $editor['editor_select'] == 1): ?> checked="checked" <?php endif; ?>>Ueditor</label>
                    &nbsp;&nbsp;
                    <label class="curpoin"><input type="radio" name="editor_select" value="2" <?php if(isset($editor['editor_select']) && $editor['editor_select'] == 2): ?> checked="checked" <?php endif; ?>>Ckeditor</label>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row <?php if(!empty($editor['editor_select']) && $editor['editor_select'] != 1): ?> none <?php endif; ?>" id="bdmap_ak_dl">
                <dt class="tit">
                    <label for="editor_select">百度地图AK</label>
                </dt>
                <dd class="opt">
                    <input name="editor_bdmap_ak" value="<?php echo $editor['editor_bdmap_ak']; ?>" class="input-txt" type="text" />
                    <p class="notic">影响功能：百度编辑器工具栏里的Baidu地图</p>
                    &nbsp;&nbsp;<a href="JavaScript:void(0);" data-href="https://www.eyoucms.com/plus/view.php?aid=30297&origin_eycms=1" onclick="openFullframe(this,'获取百度地图的访问应用AK');" style="font-size: 12px;">获取AK？</a>
                </dd>
            </dl>
            <!-- <dl class="row <?php if(!empty($editor['editor_select']) && $editor['editor_select'] != 1): ?> none <?php endif; ?>" id="gmap_ak_dl">
                <dt class="tit">
                    <label for="editor_select">谷歌地图AK</label>
                </dt>
                <dd class="opt">
                    <input name="editor_gmap_ak" value="<?php echo $editor['editor_gmap_ak']; ?>" class="input-txt" type="text" />
                    <p class="notic">影响功能：谷歌编辑器工具栏里的Google地图</p>
                    &nbsp;&nbsp;<a href="JavaScript:void(0);" data-href="https://www.eyoucms.com/plus/view.php?aid=30297&origin_eycms=1" onclick="openFullframe(this,'获取谷歌地图的访问应用AK');" style="font-size: 12px;">获取AK？</a>
                </dd>
            </dl> -->
            <dl class="row">
                <dt class="tit">
                    <label>编辑器常用配置</label>
                </dt>
                <dd class="opt">
                    <label><input type="checkbox" name="editor_remote_img_local" value="1" <?php if(!isset($editor['editor_remote_img_local']) OR $editor['editor_remote_img_local'] == 1): ?>checked="checked"<?php endif; ?> title="开启后,提交保存文档时将先自动执行远程图片本地化操作">远程图片本地化</label>&nbsp;&nbsp;
                    <label><input type="checkbox" name="editor_img_clear_link" value="1" <?php if(!isset($editor['editor_img_clear_link']) OR $editor['editor_img_clear_link'] == 1): ?>checked="checked"<?php endif; ?>  title="开启后,提交保存文档时将先自动执行清除非本站链接操作">清除非本站链接</label>&nbsp;&nbsp;
                    <span class="err"></span>
                    <p class="notic">开启远程图片本地化后,提交保存文档时将先自动执行远程图片本地化操作；开启清除非本站链接后,提交保存文档时将先自动执行清除非本站链接操作</p>
                </dd>
            </dl>

            <?php if(!(empty($databaseType) || (($databaseType instanceof \think\Collection || $databaseType instanceof \think\Paginator ) && $databaseType->isEmpty()))): ?>
            <dl class="row">
                <dt class="tit">
                    <label>开启特殊字符</label>
                </dt>
                <dd class="opt">
                    <?php if(!empty($specialCharIndex_1752204109)): ?>
                    <span style="color: #939799;">已启用</span>
                    <?php else: ?>
                    <a href="JavaScript:void(0);" onclick="checkSupportUtf8mb4();">一键启用</a>
                    <?php endif; ?>
                    <span style="font-size: 12px; color: #939799;">(开启后编辑器支持发布表情符号，如小红书常见表情等)</span>
                </dd>
            </dl>
            <?php endif; ?>

            <dl class="row <?php if(empty($editor['editor_img_clear_link'])): ?>none<?php endif; ?>" id="dl_basic_body_allowurls">
                <dt class="tit">
                    <label for="basic_body_allowurls">外链域名白名单</label>
                </dt>
                <dd class="opt">
                    <textarea rows="5" cols="60" id="basic_body_allowurls" name="basic_body_allowurls" style="height:100px;" placeholder="一行表示一个域名，比如：
baidu.com
aliyun.com
video.qq.com
                    "><?php echo (isset($config['basic_body_allowurls']) && ($config['basic_body_allowurls'] !== '')?$config['basic_body_allowurls']:''); ?></textarea>
                    <p class="notic"></p>
                </dd>
            </dl>
            <?php endif; ?>
            <div class="bot">
                <input type="hidden" name="max_filesize" id="max_filesize" value="<?php echo $max_filesize; ?>">
                <input type="hidden" name="max_sizeunit" id="max_sizeunit" value="<?php echo $max_sizeunit; ?>">
                <input type="hidden" name="old_basic_img_setlist" value="<?php echo (isset($config['basic_img_auto_wh']) && ($config['basic_img_auto_wh'] !== '')?$config['basic_img_auto_wh']:0); ?><?php echo (isset($config['basic_img_alt']) && ($config['basic_img_alt'] !== '')?$config['basic_img_alt']:0); ?><?php echo (isset($config['basic_img_title']) && ($config['basic_img_title'] !== '')?$config['basic_img_title']:0); ?>">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="adsubmit();">确认提交</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('input[name=editor_select]').click(function(){
        if (1 == $(this).val()) {
            $('#bdmap_ak_dl').show();
            $('#gmap_ak_dl').show();
        }else{
            $('#bdmap_ak_dl').hide();
            $('#gmap_ak_dl').hide();
        }
    });

    $('input[name=editor_img_clear_link]').click(function(){
        if (1 == $(this).is(':checked')) {
            $('#dl_basic_body_allowurls').show();
        }else{
            $('#dl_basic_body_allowurls').hide();
        }
    });

    function check_basic_img_alt(obj)
    {
        if ($(obj).is(":checked")) {
            $('#basic_img_alt_force').show();
        } else {
            $('#basic_img_alt_force').hide();
        }
    }
    function adsubmit(){
        var file_size = parseInt($('#file_size').val());
        var max_filesize = parseInt($('#max_filesize').val());
        var max_sizeunit = $('#max_sizeunit').val();
        if (0 < max_filesize && max_filesize < file_size) {
            showErrorMsg('附件上传大小超过空间的最大限制'+max_filesize+max_sizeunit);
            $('input[name=file_size]').focus();
            return false;
        }

        layer_loading("正在处理");
        $('#handlepost').submit();
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