<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"./application/admin/template/uploadimgnew/get_upload_list.htm";i:1741228788;s:75:"/www/wwwroot/cnnfreight.com/application/admin/template/public/theme_css.htm";i:1721637128;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <title>本地图片</title>
        <link rel="stylesheet" type="text/css" href="/public/plugins/uploadimgnew/layui/css/layui.css?v=<?php echo $version; ?>">
        <link rel="stylesheet" type="text/css" href="/public/plugins/uploadimgnew/css/image-upload.css?v=<?php echo $version; ?>">
        <link href="/public/static/admin/font/css/font-awesome.min.css?v=<?php echo $version; ?>" rel="stylesheet" />
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
        <script type="text/javascript" src="/public/static/common/js/jquery.min.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/layui/layui.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/js/jquery.cookie.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript">
            var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
            var module_name = "<?php echo MODULE_NAME; ?>";
            var __root_dir__ = "";
            var __lang__ = "<?php echo $admin_lang; ?>";
        </script>
        <style type="text/css">
            #layui-laydate1.layui-laydate{
                right: 7px;
                left: unset !important;
            }
        </style>
    </head>

    <body>
        <div class="upload-box ui-layout-center">
            <div class="upload-body">
                <div class="upload-main">
                    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                        <div class="layui-tab-content" style="height: 100%;">
                            <div class="layui-tab-item layui-show"  id="bendi_cont">
                                <div class="upload-con" style="overflow-y: auto;">
                                    <div class="images-con">
                                        <div class="image-header">
                                            <div class="image-header-l"  id="topbar">
                                                <button type="button" class="addfile layui-btn layui-btn-normal"><i class="layui-icon layui-icon-upload-drag"></i><span class="text addfiletext">上传图片</span></button>
                                                <div class="img-about">
                                                    <span class="tag-left"></span>
                                                    <span class="text">存储于<?php echo $storageTitle; ?>，建议&lt;2M</span>
                                                </div>
                                            </div>
                                            <form id="searchForm" action="<?php echo url('Uploadimgnew/get_upload_list'); ?>" method="get" onsubmit="layer_loading('正在处理');">
                                                <?php echo (isset($searchform['hidden']) && ($searchform['hidden'] !== '')?$searchform['hidden']:''); ?>
                                                <div class="image-header-r">
                                                    <div class="layui-form">
                                                        <div class="layui-form-item">
                                                            <div class="layui-inline">
                                                                <div class="layui-input-inline" style="width: 195px;margin-right:0px;">
                                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar" style=" position: absolute; font-size: 14px; vertical-align: baseline; margin-right: 4px; top: 9px; right: 5px; color: #ababab; "></i>
                                                                    <input type="text" name="eytime" class="layui-input" id="eytime" placeholder="选择上传时间" autocomplete="off" value="<?php echo \think\Request::instance()->param('eytime'); ?>">
                                                                </div>
                                                                <input type="hidden" name="lang" value="<?php echo $info['lang']; ?>">
                                                                <input type="hidden" name="num" value="<?php echo $info['num']; ?>">
                                                                <input type="hidden" name="input" value="<?php echo $info['input']; ?>">
                                                                <input type="hidden" name="path" value="<?php echo $info['path']; ?>">
                                                                <input type="hidden" name="func" value="<?php echo $info['func']; ?>">
                                                                <input type="hidden" name="is_water" value="<?php echo $info['is_water']; ?>">
                                                                <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php if(empty($imglist) || (($imglist instanceof \think\Collection || $imglist instanceof \think\Paginator ) && $imglist->isEmpty())): ?>
                                            <ul class="image-list" id="file_list">
                                                <div style="width: 100%;height: 300px;line-height: 20;text-align: center;">
                                                    <?php if(empty($admin_logic_1639031991) || (($admin_logic_1639031991 instanceof \think\Collection || $admin_logic_1639031991 instanceof \think\Paginator ) && $admin_logic_1639031991->isEmpty())): ?>
                                                    <img id='litpic_img' src="/public/static/common/images/null-data.png"/>
                                                    <!-- <div style="color: #999;">暂无图片记录，<a style="color: #34a3dc;" href="javascript:void(0);" onclick="parent.syn_old_imgdata(false);">点击同步</a>站点图片</div> -->
                                                    <?php else: ?>
                                                    <img id='litpic_img' src="/public/static/common/images/null-data.png"/>
                                                    <?php endif; ?>
                                                </div>
                                            </ul>
                                        <?php else: ?>
                                            <ul class="image-list" id="file_list">
                                                <?php if(is_array($imglist) || $imglist instanceof \think\Collection || $imglist instanceof \think\Paginator): $i = 0; $__LIST__ = $imglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <li data-img="<?php echo $vo['image_url']; ?>" data-title="<?php echo $vo['title']; ?>" data-id="<?php echo $vo['img_id']; ?>">
                                                        <div class="picbox">
                                                            <img src="<?php echo $vo['image_url']; ?>">
                                                            <div class="image-select-layer">
                                                                <i class="layui-icon layui-icon-ok-circle"></i>
                                                            </div>
                                                        </div>
                                                        <div class="namebox" style="height: 15px;">
                                                            <span class="eyou_imgtime"><?php echo $vo['title']; ?></span>
                                                            <span class="eyou_imgname"><?php echo $vo['width']; ?> x <?php echo $vo['height']; ?></span>
                                                        </div>
                                                        <div class="tools layer">
                                                            <i class="layui-icon layui-icon-close-fill close" onclick="delimg(this,'<?php echo $vo['img_id']; ?>')"></i>
                                                        </div>
                                                    </li>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <div class="image-pages">
                                            <div class="image-pages-l">
                                                <label><input type="checkbox" class="checkAll" autocomplete="off" onclick="choose_all(this);">&nbsp;全选</label>
                                                <a class="ml5 basics-color" href="javascript:void(0);" onclick="moving(this);">移动</a>
                                                <a class="ml5 basics-color" href="javascript:void(0);" onclick="batch_delimg(this);">删除</a>
                                            </div>
                                            <div class="image-pages-r"><div id="page"><?php echo $pageStr; ?></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var type_id = <?php echo (isset($type_id) && ($type_id !== '')?$type_id:0); ?>;
            var UploadUpUrl = "<?php echo $info['upload']; ?>&unneed_syn=<?php echo \think\Request::instance()->param('unneed_syn'); ?>";
            var UploadTypeListUrl = "<?php echo url('Uploadimgnew/get_type'); ?>";
            var UpdateTypeIdUrl = "<?php echo url('Uploadimgnew/update_type_id'); ?>";
            var callback = "<?php echo $info['func']; ?>";
            var num = <?php echo (isset($info['num']) && ($info['num'] !== '')?$info['num']:1); ?>;
            var upload_num = num;
            if (num == 1) {
                upload_num = 100;
            }
            var input = "<?php echo (isset($info['input']) && ($info['input'] !== '')?$info['input']:''); ?>";
            var image_accept = "<?php echo $info['image_accept']; ?>";
            var countimg = <?php echo (isset($countimg) && ($countimg !== '')?$countimg:0); ?>;
            var eytime = "<?php echo (isset($eytime) && ($eytime !== '')?$eytime:''); ?>";
        </script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/js/get_upload_list.js?v=<?php echo $version; ?>0"></script>
    </body>
</html>
