<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:37:"./weapp/EyouGzhLogin/template/doc.htm";i:1756433174;s:66:"/www/wwwroot/cnnfreight.com/weapp/EyouGzhLogin/template/header.htm";i:1756433174;s:63:"/www/wwwroot/cnnfreight.com/weapp/EyouGzhLogin/template/bar.htm";i:1756433174;s:66:"/www/wwwroot/cnnfreight.com/weapp/EyouGzhLogin/template/footer.htm";i:1756433174;}*/ ?>
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
    <div class="flexigrid">
        <div class="mDiv" style="margin-left: 30px;">
            <!-- <p style="font-size: 15px;line-height: 2em;">【绑定与解绑】</p> -->
            <ol style="font-size: 15px;line-height: 2em;">
                <li>根据不同扫码模式，查看不同的说明文档引导<br/><br/>
                    <img src="/weapp/EyouGzhLogin/template/skin/images/4.png"><br/><br/>
                </li>
<!--                 <li>第一、在插件里开启扫码功能，选择需要的扫码模式，并保存<br/>
                    <img src="/weapp/EyouGzhLogin/template/skin/images/3.png"><br/><br/>
                </li>
                <li>第二、然后点击后台右上角的个人信息<br/>
                    <img src="/weapp/EyouGzhLogin/template/skin/images/1.png"><br/><br/>
                </li>
                <li>第三、进行微信扫码绑定/解绑<br/>
                    <img src="/weapp/EyouGzhLogin/template/skin/images/2.png">
                </li> -->
            </ol>
        </div>
    </div>
</div>
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