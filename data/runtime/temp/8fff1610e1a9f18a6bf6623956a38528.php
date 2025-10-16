<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:43:"./application/admin/template/form/index.htm";i:1750816366;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/layout.htm";i:1756879123;s:75:"/www/wwwroot/cnnfreight.com/application/admin/template/public/theme_css.htm";i:1721637128;s:67:"/www/wwwroot/cnnfreight.com/application/admin/template/form/bar.htm";i:1686877574;s:73:"/www/wwwroot/cnnfreight.com/application/admin/template/form/index_bar.htm";i:1686877574;s:70:"/www/wwwroot/cnnfreight.com/application/admin/template/public/page.htm";i:1655708908;s:72:"/www/wwwroot/cnnfreight.com/application/admin/template/public/footer.htm";i:1680508820;}*/ ?>
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
<style type="text/css">
    .layui-layer-btn .layui-layer-btn-star{
        color: #666 !important;
        background-color: #fff !important;
    }
</style>
<body class="bodystyle" style="cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="page_div" class="page">
<?php if(empty($iframe) || (($iframe instanceof \think\Collection || $iframe instanceof \think\Paginator ) && $iframe->isEmpty())): ?>
    <div class="fixed-bar">
    <div class="item-title">
        <a class="back_xin" href="<?php echo url('Index/switch_map'); ?>" title="返回"><i class="iconfont e-fanhui"></i></a>
        <div class="subject">
            <h3>留言中心</h3>
            <h5></h5>
        </div>
        <ul class="tab-base nc-row">
            <?php if(is_check_access('Form@index') == '1'): ?>
            <li><a href="<?php echo url('Form/index'); ?>" class="tab <?php if(in_array(\think\Request::instance()->action(), ['index', 'baidu_diyminipro_index', 'wechat_diyminipro_index'])): ?>current<?php endif; ?>"><span>留言列表</span></a></li>
            <?php endif; if(is_check_access('Form@field') == '1'): ?>
            <li><a href="<?php echo url('Form/field'); ?>" class="tab <?php if(in_array(\think\Request::instance()->action(), ['field'])): ?>current<?php endif; ?>"><span>自由表单</span></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
    <div class="flexigrid">
        <div class="mDiv pt0">
            <div class="ftitle_nav">
    <?php if(is_array($gbTypeList) || $gbTypeList instanceof \think\Collection || $gbTypeList instanceof \think\Paginator): $i = 0; $__LIST__ = $gbTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="fbutton">
        <a href="<?php echo $vo['url']; ?>">
            <div class="<?php echo $vo['class']; ?>" title="<?php echo $vo['name']; ?>〔<?php echo $vo['count']; ?>〕">
                <?php echo $vo['name']; ?><span><?php echo $vo['count']; ?></span>
            </div>
        </a>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
            <form id="searchForm" class="navbar-form form-inline" action="<?php echo url('Form/index'); ?>" method="get" onsubmit="layer_loading('正在处理');">
                <?php echo (isset($searchform['hidden']) && ($searchform['hidden'] !== '')?$searchform['hidden']:''); ?>
                <div class="sDiv">
                    <div class="sDiv2">
                        <input type="text" name="add_time_begin" id="add_time_begin" value="<?php echo \think\Request::instance()->param('add_time_begin'); ?>" class="qsbox" autocomplete="off" placeholder="起始日期">
                    </div>
                    &nbsp;至&nbsp;
                    <div class="sDiv2">
                        <input type="text" name="add_time_end" id="add_time_end" value="<?php echo \think\Request::instance()->param('add_time_end'); ?>" class="qsbox" autocomplete="off" placeholder="结束日期">
                    </div>
                    <div class="sDiv2">
                        <select name="count_type" class="select" style="margin: 0px 5px;" onchange="gbCountSubmit(this);">
                            <?php if(is_array($gbCountList) || $gbCountList instanceof \think\Collection || $gbCountList instanceof \think\Paginator): $i = 0; $__LIST__ = $gbCountList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['type']; ?>" <?php if($count_type == $vo['type']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?>留言 (<?php echo $vo['count']; ?>)</option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <!-- <div class="sDiv2">
                        <select name="source" class="select" style="margin:0px 5px;">
                            <option value="">--全部来源--</option>
                            <option value="1" <?php if($source == '1'): ?>selected<?php endif; ?>>电脑端</option>
                            <option value="2" <?php if($source == '2'): ?>selected<?php endif; ?>>手机端</option>
                        </select>
                    </div> -->
                    <div class="sDiv2">
                        <input type="hidden" name="typeid" id="typeid" value="<?php echo (isset($typeid) && ($typeid !== '')?$typeid:''); ?>">
                        <input type="hidden" name="form_type" id="form_type" value="<?php echo (isset($form_type) && ($form_type !== '')?$form_type:''); ?>">
                        <!-- <input type="hidden" name="count_type" id="count_type" value="<?php echo (isset($count_type) && ($count_type !== '')?$count_type:''); ?>"> -->
                        <input type="hidden" name="iframe" id="iframe" value="<?php echo (isset($iframe) && ($iframe !== '')?$iframe:''); ?>">
                        <input type="text" size="30" name="keywords" value="<?php echo \think\Request::instance()->param('keywords'); ?>" class="qsbox" placeholder="模糊搜索..." autocomplete="off">
                        <input type="submit" class="btn" value="搜索">
                        <i class="iconfont e-sousuo"></i>
                    </div>
                    <?php if(is_check_access('Guestbook@ajax_excel_export') == '1'): ?>
                    <div class="fbutton ml10" style="float: right;">
                        <?php if($typeid > 0): ?>
                        <a href="javascript:void(0);" onclick="excel_export(this, 'ids');" data-url="<?php echo url('Guestbook/ajax_excel_export', ['form_type'=>'all','typeid'=>$typeid]); ?>" class="bt-xin-xia">
                            <i class="iconfont e-xiazai"></i>导出
                        </a>
                        <?php else: ?>
                        <a href="javascript:void(0);" onclick="excel_export(this, 'ids');" data-url="<?php echo url('Guestbook/ajax_excel_export', ['form_type'=>'all']); ?>" class="bt-xin-xia">
                            <i class="iconfont e-xiazai"></i>导出
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                
            </form>
            
        </div>
        <div class="hDiv" style="background-color: #fff;">
            <div class="hDivBox">
                <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                    <div class="no-data" >
                        <div class="no_row">
                            <div class="no_pic"><img src="/public/static/admin/images/null-data.png"></div>
                        </div>
                    </div>
                <?php else: ?>
                <div class="guestbook-boxes jsGridView">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $k=>$vo): ?>
                    <div class="guestbook-box-wrapper">
                      <div class="guestbook-box">
                        <div class="guestbook-box-header">
                            <span>
                                <a href="<?php echo url('Form/index', ['typeid'=>$vo['typeid'],'form_type'=>$vo['form_type']]); ?>"><?php echo (isset($vo['form_name']) && ($vo['form_name'] !== '')?$vo['form_name']:'<i class="red">数据出错！</i>'); ?>-<?php echo $vo['aid']; ?></a>
                            </span>
                            <div class="more-wrapper">
                                <div id="td_is_read_<?php echo $vo['aid']; ?>">
                                    <?php if($vo['is_read'] == '1'): ?>
                                        <div class="days-yes">已读</div>
                                    <?php else: ?>
                                        <div class="days-no">未读</div>
                                    <?php endif; ?>
                                </div>
								<div class="is_star_tag <?php if(empty($vo['is_star']) || (($vo['is_star'] instanceof \think\Collection || $vo['is_star'] instanceof \think\Paginator ) && $vo['is_star']->isEmpty())): ?> none <?php endif; ?>" id="is_star_tag_<?php echo $vo['aid']; ?>"><i class="iconfont e-xingxing"></i></div>
                            </div>
                        </div>
                        <div class="guestbook-box-content">
                        <?php if(!empty($tab_list[$vo['typeid']])): $__FOR_START_1536811658__=0;$__FOR_END_1536811658__=count($tab_list[$vo['typeid']]);for($i=$__FOR_START_1536811658__;$i < $__FOR_END_1536811658__;$i+=1){ if($i < 4): ?>
                                    <p><?php echo $tab_list[$vo['typeid']][$i]['attr_name']; ?>：<?php echo $vo['attr_list'][$i]['attr_value']; ?></p>
                                <?php endif; } endif; ?>
                        </div>
                        <div class="guestbook-box-footer">
                          <div class="participants">
                              <span><?php echo date('Y-m-d H:i:s',$vo['add_time']); ?></span>
                          </div>
                          <div class="guestbook-btn-more">
                            <a href="javascript:void(0);" data-is_star="<?php echo $vo['is_star']; ?>" data-btn1="<?php if(empty($vo['is_star']) || (($vo['is_star'] instanceof \think\Collection || $vo['is_star'] instanceof \think\Paginator ) && $vo['is_star']->isEmpty())): ?>设为星标<?php else: ?>取消星标<?php endif; ?>" data-href="<?php echo url('Guestbook/details', ['aid'=>$vo['aid'],'form_type'=>$vo['form_type']]); ?>" onclick="openDetails(this, <?php echo $vo['aid']; ?>);">查看</a>
                              <?php if(!(empty($vo['open_examine']) || (($vo['open_examine'] instanceof \think\Collection || $vo['open_examine'] instanceof \think\Paginator ) && $vo['open_examine']->isEmpty()))): if(0 == $vo['examine']): ?>
                              <i></i>
                              <a href="javascript:void(0);" data-aid="<?php echo $vo['aid']; ?>" onclick="to_examine(this);">待审核</a>
                              <?php elseif(1 == $vo['examine']): ?>
                              <i></i>
                              <a href="javascript:void(0);" class="grey">已审核</a>
                              <?php elseif(2 == $vo['examine']): ?>
                              <i></i>
                              <a href="javascript:void(0);" class="grey">已拒绝</a>
                              <?php endif; endif; if(!(empty($vo['open_reply']) || (($vo['open_reply'] instanceof \think\Collection || $vo['open_reply'] instanceof \think\Paginator ) && $vo['open_reply']->isEmpty()))): if(empty($vo['reply']) || (($vo['reply'] instanceof \think\Collection || $vo['reply'] instanceof \think\Paginator ) && $vo['reply']->isEmpty())): ?>
                                <i></i>
                                <a href="javascript:void(0);" data-aid="<?php echo $vo['aid']; ?>" onclick="guest_reply(this);">待回复</a>
                              <?php else: ?>
                                <i></i>
                                <a href="javascript:void(0);" class="grey" title="<?php echo $vo['reply']; ?>">已回复</a>
                              <?php endif; endif; if(is_check_access('Guestbook@del') == '1'): ?>
                                <i></i>
                                <a href="javascript:void(0);" data-url="<?php echo url('Guestbook/del',['form_type'=>$vo['form_type']]); ?>" data-id="<?php echo $vo['aid']; ?>" onClick="delfun(this);">删除</a>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?>
        <div class="tDiv nobdb">
            <div class="tDiv2">
                <div class="fbuttonr">
    <div class="pages">
       <?php echo $page; ?>
    </div>
</div>
<div class="fbuttonr">
    <div class="total">
        <h5>共有<?php echo (isset($pager->totalRows) && ($pager->totalRows !== '')?$pager->totalRows:0); ?>条,每页显示
            <select name="pagesize" style="width: 60px;" onchange="ey_selectPagesize(this);">
                <option <?php if($pager->listRows == 20): ?> selected <?php endif; ?> value="20">20</option>
                <option <?php if($pager->listRows == 50): ?> selected <?php endif; ?> value="50">50</option>
                <option <?php if($pager->listRows == 100): ?> selected <?php endif; ?> value="100">100</option>
                <option <?php if($pager->listRows == 200): ?> selected <?php endif; ?> value="200">200</option>
            </select>
        </h5>
    </div>
</div>
            </div>
            <div style="clear:both"></div>
        </div>
        <?php endif; ?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('input[name*=ids]').click(function(){
            if ($('input[name*=ids]').length == $('input[name*=ids]:checked').length) {
                $('.checkAll').prop('checked','checked');
            } else {
                $('.checkAll').prop('checked', false);
            }
        });
        $('input[type=checkbox].checkAll').click(function(){
            $('input[type=checkbox]').prop('checked',this.checked);
        });

        $('#searchForm select[name=source]').change(function(){
            $('#searchForm').submit();
        });
    });

    function gbCountSubmit(obj, count_type) {
        $('input[name=count_type]').val(count_type);
        layer_loading('正在处理');
        $('#searchForm').submit();
    }

    layui.use('laydate', function(){
        var laydate = layui.laydate;
        //执行一个laydate实例
        laydate.render({
            elem: '#add_time_begin' //指定元素
        });
        laydate.render({
            elem: '#add_time_end' //指定元素
        });
    });

    $(document).ready(function(){

        // 表格行点击选中切换
        $('#flexigrid > table>tbody >tr').click(function(){
            $(this).toggleClass('trSelected');
        });

        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });
    });

    function excel_export(obj,name) {
        var url = $(obj).attr('data-url');
        var aid = [];
        var typeid =  $('input[name=typeid]').val();
        var start_time =  $('input[name=add_time_begin]').val();
        var end_time =  $('input[name=add_time_end]').val();
        $('input[name^='+name+']').each(function(i,o){
            if($(o).is(':checked')){
                aid.push($(o).val());
            }
        });
        url = url+"&aid="+aid+"&typeid="+typeid+"&start_time="+start_time+"&end_time="+end_time;
        window.location.href = url;
    }

    //留言详情
    function openDetails(obj,aid) {
        var btn1 = $(obj).attr('data-btn1');
        var is_star = $(obj).attr('data-is_star');
        is_star = (is_star == 1) ? 0 : 1;
        var iframes = layer.open({
            type: 2
            ,title: '查看详情'
            ,fixed: true //不固定
            ,shadeClose: false
            ,shade: layer_shade
            ,offset: 'auto'
            // ,maxmin: true //开启最大化最小化按钮
            ,area: ['800px','80%']
            ,anim: 5
            ,content: $(obj).data('href')
            ,btn: ['加载中','关闭']
            ,yes: function(index, layero){ // 设置/取消星标
                layer_loading('正在处理');
                $.ajax({
                    type : 'post',
                    url : "<?php echo url('Guestbook/ajax_set_star', ['_ajax'=>1]); ?>",
                    data : {aid:aid, is_star:is_star},
                    dataType : 'json',
                    success : function(res){
                        layer.closeAll();
                        if(res.code == 1){
                            if (is_star == 1) {
                                $(obj).attr('data-is_star', '1');
                                $(obj).attr('data-btn1', '取消星标');
                                $('#is_star_tag_'+aid).show();
                            } else {
                                $(obj).attr('data-is_star', '0');
                                $(obj).attr('data-btn1', '设为星标');
                                $('#is_star_tag_'+aid).hide();
                            }
                            showSuccessMsg(res.msg, 1000);
                        }else{
                            showErrorMsg(res.msg);
                        }
                    },
                    error: function(e){
                        layer.closeAll();
                        showErrorAlert(e.responseText);
                    }
                });
            }
            ,btn2: function(index, layero){

            }
            ,end: function() {

            }
            ,success: function(layero, index){
                $('#td_is_read_'+aid).html('<div class=\'days-yes\'>已读</div>');
                if (is_star == 1) {
                    $('.layui-layer-btn0').html(btn1).removeClass('layui-layer-btn-star');
                } else {
                    $('.layui-layer-btn0').html(btn1).addClass('layui-layer-btn-star');
                }
            }
        });
    }

    function guest_reply(obj){
        var aid = $(obj).attr('data-aid');
        layer.prompt({
            formType: 2,
            shade: layer_shade,
            placeholder: '输入留言回复',
            title: '请输入留言回复',
            btnAlign:'r',
            closeBtn: 3,
            value: $(obj).attr('data-reply'),
        }, function(value, index, elem){
            layer.close(index);
            $.ajax({
                type : 'post',
                url : "<?php echo url('Form/editReply'); ?>",
                data : {aid:aid,reply:value, _ajax:1},
                dataType : 'json',
                success : function(res){
                    layer.closeAll();
                    if(res.code == 1){
                        layer.msg(res.msg, {icon: 1, time:1000}, function(){
                            window.location.reload();
                        });
                    }else{
                        layer.msg(res.msg, {icon: 2, time:1000});
                    }
                },
                error:function(){
                    layer.closeAll();
                    layer.alert('未知错误', {icon: 2, title:false});
                }
            })

        });

    }

    function to_examine(obj) {
        layer.confirm('确认审核表单信息，并显示在前端', {
            area: ['480px', '190px'],
            shade: layer_shade,
            title: '提示',
            closeBtn: 3,
            btnAlign:'r',
            btn: ['审核','拒绝','取消'],
            success: function () {
                  $(".layui-layer-content").css('text-align', 'left');
              }
        }, function() {
            layer_loading('正在处理');
            $.ajax({
                url: "<?php echo url('Form/to_examine'); ?>",
                data: {aid: $(obj).data('aid'), examine: 1, _ajax: 1},
                type:'post',
                dataType:'json',
                success:function(res) {
                    layer.closeAll();
                    if (1 == res.code) {
                        layer.msg(res.msg, {time: 1500},function(){
                            window.location.reload();
                        });
                    } else {
                        layer.msg(res.msg, {time: 1500});
                    }
                }
            });
        }, function() {
            layer_loading('正在处理');
            $.ajax({
                url: "<?php echo url('Form/to_examine'); ?>",
                data: {aid: $(obj).data('aid'), examine: 2, _ajax: 1},
                type:'post',
                dataType:'json',
                success:function(res) {
                    layer.closeAll();
                    if (1 == res.code) {
                        layer.msg(res.msg, {time: 1500},function(){
                            window.location.reload();
                        });
                    } else {
                        layer.msg(res.msg, {time: 1500});
                    }
                }
            });
        },function(index) {
            layer.closeAll(index);
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