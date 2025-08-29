<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:52:"./application/admin/template/uploadimgnew/upload.htm";i:1741228788;s:75:"/www/wwwroot/cnnfreight.com/application/admin/template/public/theme_css.htm";i:1721637128;}*/ ?>
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
        <title>图片选择 - <?php echo $version; ?></title>
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
        <link href="/public/static/admin/font/css/iconfont.css?v=<?php echo $version; ?>" rel="stylesheet" />
        <link rel="stylesheet" href="/public/plugins/ztree/css/zTreeStyle/zTreeStyle.css?v=<?php echo $version; ?>" type="text/css">
        <script type="text/javascript" src="/public/static/common/js/jquery.min.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/layui/layui.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/js/jquery.cookie.js?v=<?php echo $version; ?>"></script>
        
        <style type="text/css">
            .group-item .group-button {display: none;}
            .group-item:hover .group-button {display: block;}
            .group-item:hover .group-count {display: none;}
            .ztree .node_name{
                font-size: 13px !important;
            }
            .hover{
                line-height: 22px;
            }
            .ui-layout-pane {   
                background: #fff;   
            } 
            .ui-layout-center{
                padding:0 15px 0 15px;
            }
            .ztree li a {
                display: inline-block !important;
            }
            .ztree li a.curSelectedNode{
                height: 20px;
            }
        </style>
        <script type="text/javascript">
            var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
            var module_name = "<?php echo MODULE_NAME; ?>";
            var __root_dir__ = "";
            var __lang__ = "<?php echo $admin_lang; ?>";
        </script>
    </head>

    <body>
        <div class="upload-box ui-layout-center">
            <div class="upload-body">
                <div class="upload-main">
                    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                        <ul class="layui-tab-title">
                            <li id="bendi" <?php if($info['open_source'] == 'bendi'): ?> class="layui-this" <?php endif; ?>>本地图片</li>
                            <li id="tiqu" <?php if($info['open_source'] == 'tiqu'): ?> class="layui-this" <?php endif; ?>>远程图片</li>
                            <?php if(file_exists(ROOT_PATH.'weapp/Ai/template/uploadimgnew/ai_tab.htm')): ?>
                                模板文件不存在: ./weapp/Ai/template/uploadimgnew/ai_tab.htm
                            <?php endif; ?>
                        </ul>
                        <div class="layui-tab-content" style="height: 100%;">
                            <div class="layui-tab-item <?php if($info['open_source'] == 'bendi'): ?> layui-show <?php endif; ?>" id="bendi_cont">
                                <div class="upload-con">
                                    <div class="upload-group">
                                        <div>
                                            <ul class="upload-nav" id="tab">
                                                <li class="item active" id="li_tag_item_group" data-value="1">我的分组</li>
                                                <li class="item" id="li_tag_item_imgdir" data-value="2">图片目录</li>
                                            </ul>
                                        </div>
                                        <div id="container">
                                            <div id="content1">
                                                <div class="upload-group-add">
                                                    <button onclick="addcate();" class="layui-btn layui-btn-primary layui-border-blue"><i class="iconfont e-wenjianjiatianjia"></i>添加分组</button>
                                                </div>
                                                <div class="upload-group-con">
                                                    <div class="group-item <?php if(empty($type_id) || (($type_id instanceof \think\Collection || $type_id instanceof \think\Paginator ) && $type_id->isEmpty())): ?> active <?php endif; ?>">
                                                        <div class="group-item-l">
                                                            <a href="javascript:void(0);" data-src="<?php echo $default_upload_list_url; ?>" id="typename_0" data-type_id="0" onclick="openIframes(this);">默认分组
                                                                <?php if(empty($admin_logic_1639031991) || (($admin_logic_1639031991 instanceof \think\Collection || $admin_logic_1639031991 instanceof \think\Paginator ) && $admin_logic_1639031991->isEmpty())): ?>
                                                                <!-- <span style=" margin-left: 15px;"><i class="fa fa-refresh" onclick="syn_old_imgdata(true);" title="点击同步站点图片"></i></span> -->
                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                        <div class="group-item-r" id="count_0" style="text-align: right;margin: 0 auto;"><?php echo (isset($uploads_total_list[0]['total']) && ($uploads_total_list[0]['total'] !== '')?$uploads_total_list[0]['total']:0); ?></div>
                                                    </div>
                                                    <?php if(is_array($uploads_type_list) || $uploads_type_list instanceof \think\Collection || $uploads_type_list instanceof \think\Paginator): $i = 0; $__LIST__ = $uploads_type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <div class="group-item <?php if($type_id == $vo['id']): ?> active <?php endif; ?>">
                                                        <div class="group-item-l"><a href="javascript:void(0);" data-src="<?php echo $vo['url']; ?>" id="typename_<?php echo $vo['id']; ?>" data-type_id="<?php echo $vo['id']; ?>" onclick="openIframes(this);"><?php echo $vo['upload_type']; ?></a></div>
                                                        <div class="group-item-r group-count" id="count_<?php echo $vo['id']; ?>" style="text-align: right;margin: 0 auto;"><?php echo (isset($uploads_total_list[$vo['id']]['total']) && ($uploads_total_list[$vo['id']]['total'] !== '')?$uploads_total_list[$vo['id']]['total']:0); ?></div>
                                                        <div class="group-item-r group-button">
                                                            <a href="javascript:void(0)" onclick="editcate(this, '<?php echo $vo['id']; ?>')">编辑</a> 
                                                            <a href="javascript:void(0)" onclick="delcate(this, '<?php echo $vo['id']; ?>')">删除</a>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                            </div>
                                            <div id="content2" style="display: none">
                                                <div class="upload-dirimg-con ui-layout-east">
                                                    <div class="ztreeContent">
                                                        <div id="tree" class="ztree"></div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <iframe name="content_body" id="content_body" src="<?php echo $current_upload_list_url; ?>&unneed_syn=<?php echo \think\Request::instance()->param('unneed_syn'); ?>" width="100%" height="100%" frameborder="0" style="height: 460px;"></iframe>
                                </div>
                            </div>
                            <div class="layui-tab-item <?php if($info['open_source'] == 'tiqu'): ?> layui-show <?php endif; ?>" id="tiqu_cont">
                                <div class="upload-con">
                                    <div class="image-selector-network">
                                        <form class="layui-form" id="layui-form" action="<?php echo url('Uploadimgnew/ajax_remote_to_imglocal'); ?>" method="post">
                                          <div class="layui-form-item">
                                            <label class="layui-form-label"></label>
                                            <div class="layui-input-inline" style="width: 400px;">
                                              <input type="text" name="imgremoteurl" lay-verify="imgremoteurl" autocomplete="off" placeholder="请输入图片地址" class="layui-input">
                                            </div>
                                            <div class="layui-input-inline">
                                              <a onclick="remote_to_imglocal();" class="layui-btn layui-btn-normal">提取图片</a>
                                            </div>  
                                          </div>
                                          <div class="layui-form-item">
                                            <label class="layui-form-label"></label>
                                            <div class="layui-form-mid layui-word-aux">
                                               需要http://.........大小不要超过<?php echo $basicConfig['file_size']; ?><?php echo $basicConfig['max_sizeunit']; ?>，支持图片类型 <?php echo $basicConfig['image_type']; ?>
                                            </div>
                                          </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                            <?php if(file_exists(ROOT_PATH.'weapp/Ai/template/uploadimgnew/ai_drawing.htm')): ?>
                                模板文件不存在: ./weapp/Ai/template/uploadimgnew/ai_drawing.htm
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="upload-footer">
                    <button type="button" class="layui-btn layui-btn-primary layui-btn-off">取消</button>
                    <button type="button" class="layui-btn layui-btn-normal layui-btn-yes">确定</button>
                </div>
            </div>
        </div>
        <input type="hidden" id="input_type_id" value="<?php echo (isset($type_id) && ($type_id !== '')?$type_id:0); ?>">
        <input type="hidden" id="input_top_tab" value="bendi">
        <script src="/public/static/admin/js/jquery.layout-latest.min.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/plugins/ztree/js/jquery.ztree.core.min.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript">
            var callback = "<?php echo $info['func']; ?>";
            var num = "<?php echo (isset($info['num']) && ($info['num'] !== '')?$info['num']:1); ?>";
        </script>
        <script type="text/javascript" src="/public/plugins/uploadimgnew/js/upload.js?v=<?php echo $version; ?>"></script>
        <script type="text/javascript" src="/public/static/admin/js/clipboard.min.js"></script>
        <?php if(file_exists(ROOT_PATH.'weapp/Ai/template/uploadimgnew/skin/js/ai_upload.js')): ?>
        <script type="text/javascript" src="/weapp/Ai/template/uploadimgnew/skin/js/ai_upload.js?v=<?php echo getTime(); ?>"></script>
        <?php endif; ?>
    </body>
</html>
