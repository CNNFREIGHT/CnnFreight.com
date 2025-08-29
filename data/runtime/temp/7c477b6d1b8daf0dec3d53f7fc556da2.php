<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:27:"./template/old/pc/index.htm";i:1756433052;s:57:"/www/wwwroot/cnnfreight.com/template/old/pc/comm/head.htm";i:1756433056;s:57:"/www/wwwroot/cnnfreight.com/template/old/pc/comm/foot.htm";i:1756433056;}*/ ?>
<!doctype html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<title><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_title"); echo $__VALUE__; ?>_<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_name"); echo $__VALUE__; ?></title>
	<meta name="description" content="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_description"); echo $__VALUE__; ?>" />
	<meta name="keywords" content="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_keywords"); echo $__VALUE__; ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,shrink-to-fit=no">
	
	<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/css/common.css","","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/css/jquery.bxslider.css","","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/css/homeadd.css","","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/css/animate.css","","","","",""); echo $__VALUE__; ?>

	<meta name="baidu-site-verification" content="SVpHNM9fEu" />
	<link rel="shortcut icon" href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_ico"); echo $__VALUE__; ?>" type="image/x-icon">
</head>
<body>

<!-- 头部导航 -->

<div class="header clearboth">
	<?php if(\think\Cookie::get('home_lang') =='cn'): ?>
	<div id="nav">
		<div class="logo"> <img style="width: 100%;" src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_logo"); echo $__VALUE__; ?>"></div>
		<ul class="clearboth">
			
			<li <?php if(\think\Request::instance()->param('m') == 'Index'): ?>class="cur"<?php endif; ?> style="width:80px" rel="0"> <a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>">首页<i></i></a></li>

			<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "cur", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
			<li rel=""  class="ot <?php echo $field['currentstyle']; ?>">
				<a href="<?php echo $field['typeurl']; ?>"><?php echo $field['typename']; ?><i></i></a>
				<?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>
				<div>
					<!-- 第二级栏目循环开始 -->
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<a href="<?php echo $field2['typeurl']; ?>">· <?php echo $field2['typename']; ?></a>
					<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?> 
				</div>
				<?php endif; ?>
			</li>
			<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
		</ul>
    <div class="language"><a class="langbtn" href="<?php echo $field['url']; ?>/en"><img src="/template/old/images/en.png"></a></div>
		<div class="nav_line"></div>
	</div>
	<?php elseif(\think\Cookie::get('home_lang') =='en'): ?>
	<div id="nav">
		<div class="logo"> <img style="width: 100%;" src="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_logo"); echo $__VALUE__; ?>"></div>
		<ul class="clearboth">
			
			<li <?php if(\think\Request::instance()->param('m') == 'Index'): ?>class="cur"<?php endif; ?> style="width:80px" rel="0"> <a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>">HOME<i></i></a></li>

			<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "cur", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
			<li rel=""  class="ot <?php echo $field['currentstyle']; ?>">
				<a href="<?php echo $field['typeurl']; ?>"><?php echo $field['englist_name']; ?><i></i></a>
				<?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>
				<div>
					<!-- 第二级栏目循环开始 -->
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<a href="<?php echo $field2['typeurl']; ?>">· <?php echo $field2['englist_name']; ?></a>
					<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?> 
				</div>
				<?php endif; ?>
			</li>
			<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
		</ul>
    <div class="language"><a class="langbtn" href="/"><img src="/template/old/images/cn.png"></a></div>
		<div class="nav_line"></div>
	</div>
	<?php endif; ?>

   <!-- wap -->
	<div class="ham">
		<img src="/template/old/images/ham.png">
		<?php if(\think\Cookie::get('home_lang') =='cn'): ?>
		<div class="hamBox" id="hamBox">
			<div>
				<a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>" class="logo"><img src="/template/old/images/logo1.png"></a>
				<img class="closeBtn" src="/template/old/images/close.png">
			</div>
			<ul class="clearboth">
				<li>
					<a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>">首页</a>
				</li>
				<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "cur", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
				<li rel=""  class="ot <?php echo $field['currentstyle']; ?>">
				<a href="javascript:void(0);"><?php echo $field['typename']; ?><i></i></a>
				<?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>
				<div>
					<!-- 第二级栏目循环开始 -->
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<a href="<?php echo $field2['typeurl']; ?>">· <?php echo $field2['typename']; ?></a>
					<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?> 
				</div>
				<?php endif; ?>
			</li>
			<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
			</ul>
			<div class="language"><a href="<?php echo $field['url']; ?>/en">English</a></div>
		</div>
		<?php elseif(\think\Cookie::get('home_lang') =='en'): ?>
		<div class="hamBox" id="hamBox">
			<div>
				<a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>" class="logo"><img src="/template/old/images/logo1.png"></a>
				<img class="closeBtn" src="/template/old/images/close.png">
			</div>
			<ul class="clearboth">
				<li>
					<a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>">HOME</a>
				</li>
				<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "cur", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
				<li rel=""  class="ot <?php echo $field['currentstyle']; ?>">
				<a href="javascript:void(0);"><?php echo $field['englist_name']; ?><i></i></a>
				<?php if(!(empty($field['children']) || (($field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator ) && $field['children']->isEmpty()))): ?>
				<div>
					<!-- 第二级栏目循环开始 -->
					<?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif;if(is_array($field['children']) || $field['children'] instanceof \think\Collection || $field['children'] instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($field['children']) ? array_slice($field['children'],0,100, true) : $field['children']->slice(0,100, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field2): $field2["typename"] = text_msubstr($field2["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field2;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
					<a href="<?php echo $field2['typeurl']; ?>">· <?php echo $field2['englist_name']; ?></a>
					<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field2 = []; ?> 
				</div>
				<?php endif; ?>
			</li>
			<?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
			</ul>
			<div class="language"><a href="/">中文</a></div>
		</div>
		<?php endif; ?>
	</div>

</div>

<!--占位导航栏-->
<div class="head-sm-height"></div>


<div class="content index">
    <div class="banner">
        <ul class="bxslider">
            <?php  $tagAdv = new \think\template\taglib\eyou\TagAdv; $_result = $tagAdv->getAdv("1", "", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, 10, true) : $_result->slice(0, 10, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field):  if ($i == 0) : $field["currentclass"] = $field["currentstyle"] = ""; else:  $field["currentclass"] = $field["currentstyle"] = ""; endif;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
            <li><a href='<?php echo $field['links']; ?>' <?php echo $field['target']; ?>><img src="<?php echo $field['litpic']; ?>" /></a></li>
            <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
        </ul>
    </div>
    <div class="company">
        <h1 class="title title2">业务中心</h1>
        <p class="subIntro">打造华东地区最具专业水准操作货物集装和化工危险品运输的物流团队。</p>
        <div class="companyBox">
            <ul class="bxslider">
                <li>
                    <a href="hdyw.html">
                        <i><span><img src="/template/old/images/circle1.png" /></span></i>
                        <em>进出口货代业务</em>
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="gxfw.html">
                        <i><span><img src="/template/old/images/circle2.png" /></span></i>
                        <em>罐箱服务</em>
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="gjwl.html">
                        <i><span><img src="/template/old/images/circle7.png" /></span></i>
                        <em>国际物流解决方案</em>
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="wxpys.html">
                        <i><span><img src="/template/old/images/circle9.png" /></span></i>
                        <em>危险品货代优势</em>
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="intro">
        <h1 class="title title1">走进驰诺</h1>
        <p class="subIntro">驰诺国际货运有限公司是经中华人民共和国交通部批准，依法具有无船承运人资质（MOC-NV 07688），专业从事货物集装业务、化工危险品的国际国内仓储运输、ISO 罐箱租赁和国际综合物流服务的企业。</p>
        <ul class="clearboth">
            <!-- <li>
                    <em><i>6</i></em>
                    <span>驰诺成立于2014年,成立6年</span>
                </li>-->
            <li>
                <em><i>5</i></em>
                <span>危险品仓储基地,有维修洗罐等专业设备</p></span>
            </li>
            <li>
                <em><i>6</i><i>0</i></em>
                <span>60多位团队专业人员提供一站式服务</span>
            </li>
            <li>
                <em><i>1</i><i>0</i><i>0</i></em>
                <span>危化品专业运输车辆百余台,为客户提供专业服务</span>
            </li>
            <li>
                <em><i>2</i><i>0</i><i>0</i></em>
                <span>已为200多家客户提供服务</span>
            </li>
            <li>
                <em><i>3</i><i>2</i><i>0</i><i>0</i></em>
                <span>自有3200多台气体、液体罐</span>
            </li>
        </ul>
    </div>
    <div class="main main_s">
        <div class="w-1300">
            <h1 class="title title2">最新动态</h1>
            <div class="main_s_m">
                <a class="next"></a>
                <a class="prev"></a>
                <div class="bd">
                    <div class="tempWrap" style="overflow:hidden; position:relative; width:1172px">
                        <ul  style="width: 1465px; left: -293px; position: relative; overflow: hidden; padding: 0px; margin: 0px;">
                           <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "2"; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 6; endif; $param = array(      "typeid"=> $typeid,      "notypeid"=> "",      "flag"=> "",      "noflag"=> "",      "channel"=> $modelid,      "joinaid"=> "",      "keyword"=> "",      "release"=> "off",      "idlist"=> "",      "idrange"=> "",      "aid"=> "", ); $tag = array (
  'typeid' => '2',
  'loop' => '6',
  'titlelen' => '17',
  'infolen' => '50',
  'r' => 'eyou:artlist',
  'row' => '6',
); $tagArclist = new \think\template\taglib\eyou\TagArclist; $_result = $tagArclist->getArclist($param, $row, "", "","desc","",$tag,"0","on","off","","");if(!empty($_result["list"]) && (is_array($_result["list"]) || $_result["list"] instanceof \think\Collection || $_result["list"] instanceof \think\Paginator)): $i = 0; $e = 1; $__LIST__ = is_array($_result["list"]) ? array_slice($_result["list"],0, $row, true) : $_result["list"]->slice(0, $row, true);  $__TAG__ = $_result["tag"];if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $aid = $field["aid"];$users_id = $field["users_id"];$field["title"] = text_msubstr($field["title"], 0, 17, false);if($field["is_b"] == 1) : $field["title"] = "<strong>".$field["title"]."</strong>";endif;$field["seo_description"] = text_msubstr($field["seo_description"], 0, 50, true);$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                            <li style="float: left; width: 269px;background-color:#FFF;">
                                <a href="<?php echo $field['arcurl']; ?>"><img src="<?php echo $field['litpic']; ?>" />
                                    <h4 style="height:48px;text-align:left;padding-left:5px;" title="<?php echo $field['title']; ?>"><?php echo $field['title']; ?></h4>
                                    <p style="padding:0px 10px;width:250px;"><?php echo $field['seo_description']; ?></p>
                                </a>
                            </li>
                            <?php ++$e; $aid = 0; $users_id = 0; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_s_more">
                <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "2"; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagType = new \think\template\taglib\eyou\TagType; $_result = $tagType->getType($typeid, "self", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator):  $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: $field = $__LIST__;?><a href="<?php echo $field['typeurl']; ?>" target="_blank"><span>更多动态</span></a><?php endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
            </div>
        </div>
    </div>
    <div class="more">
        <ul class="clearboth">
            <li>
                <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "37"; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagType = new \think\template\taglib\eyou\TagType; $_result = $tagType->getType($typeid, "self", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator):  $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: $field = $__LIST__;?>
                <a href="<?php echo $field['typeurl']; ?>" class="moreImg"><img src="/template/old/images/home1.jpg" /></a>
                <h1><a href="<?php echo $field['typeurl']; ?>"><?php echo $field['typename']; ?></a></h1>
                <p><?php echo $field['Subtypename']; ?></p>
                <a href="<?php echo $field['typeurl']; ?>" class="moreBtn">More 》</a>
                <?php endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
            </li>
            <li>
                <a href="https://haven.scm.eportyun.com" target="_blank" class="moreImg"><img src="/template/old/images/home2.jpg" /></a>
                <h1><a href="https://haven.scm.eportyun.com" target="_blank">外部工具查询</a></h1>
                <p class="clearboth">
                    <a href="http://www.somsds.com/msds.html" data-id="1" target="_blank">·化学品安全技术说明书列表</a>
                    <a href="http://www.fob001.cn/" data-id="11" target="_blank">·集运宝典</a>
                    <BR>
                    <a href="https://haven.scm.eportyun.com/" data-id="3" target="_blank">·云海供应链·数智化国际物流管理系统</a>
                    <a href="http://www.chinaports.com/shiptracker/shipinit.do?method=forIndex" data-id="13" target="_blank">·船舶动态查询</a>
                </p>
                <a href="https://haven-p.scm.eportyun.com/portal/login/form/index/" class="moreBtn" target="_blank">More 》</a>
            </li>
            <li>
                <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "36"; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagType = new \think\template\taglib\eyou\TagType; $_result = $tagType->getType($typeid, "self", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator):  $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: $field = $__LIST__;?>
                <a href="<?php echo $field['typeurl']; ?>" class="moreImg"><img src="/template/old/images/home3.jpg" /></a>
                <h1><a href="<?php echo $field['typeurl']; ?>"><?php echo $field['typename']; ?></a></h1>
                <p><?php echo $field['Subtypename']; ?></p>
                <a href="<?php echo $field['typeurl']; ?>" class="moreBtn">More 》</a>
                <?php endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
            </li>
            <li>
                <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = "34"; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagType = new \think\template\taglib\eyou\TagType; $_result = $tagType->getType($typeid, "self", ""); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator):  $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: $field = $__LIST__;?>
                <a href="<?php echo $field['typeurl']; ?>" class="moreImg"><img src="/template/old/images/home4.jpg" /></a>
                <h1><a href="<?php echo $field['typeurl']; ?>"><?php echo $field['typename']; ?></a></h1>
                <p><?php echo $field['Subtypename']; ?></p>
                <a href="<?php echo $field['typeurl']; ?>" class="moreBtn">More 》</a>
                <?php endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?>
            </li>
        </ul>
    </div>
</div>
<div class="footer">
    <div class="footer2 clearboth">
        <div class="footer_l">
            <a href="/"><img src="/template/old/images/logo1.png" /></a>
            <div class="clearboth">
                <a href="#" class="foot2"></a>
                <a href="javascript:;" class="wechat"></a>
                <a href="#" class="email"></a>
                <a href="<?php echo $field['url']; ?>/en" class="foot5" target="_blank" alter="ENGLISH|英文版" title="ENGLISH|英文版"><span></span></a>
            </div>
        </div>
        <div class="footer_r" style="height:auto">
            <?php if(\think\Cookie::get('home_lang') =='cn'): ?>
            <div class="left">
                <ul class="clearboth">
                    <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 8; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "on", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                    <li><a href="<?php echo $field['typeurl']; ?>"><?php echo $field['typename']; ?></a></li>
                    <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?> 
                </ul>
                <span><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attrname_16"); echo $__VALUE__;  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attr_16"); echo $__VALUE__; ?>&nbsp;&nbsp;&nbsp;<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attrname_1"); echo $__VALUE__;  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attr_1"); echo $__VALUE__; ?>&nbsp;&nbsp;&nbsp;<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attrname_21"); echo $__VALUE__;  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attr_21"); echo $__VALUE__; ?></span>
                <!-- <span>版权所有：<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_copyright"); echo $__VALUE__; ?>&nbsp;&nbsp;<a href="/">宁波上海货代</a>&nbsp;&nbsp;<a href="/gxfw.html">罐箱服务</a>&nbsp;&nbsp;<a href="/wxpys.html">危险品运输</a>&nbsp;&nbsp;<a target='_blank' href='https://beian.miit.gov.cn'>浙ICP备19045799号</a></span> -->
            </div>
            <div class="right"><img src="/template/old/images/code.png"><span>视频号</span></div>
            <?php elseif(\think\Cookie::get('home_lang') =='en'): ?>
            <div class="left">
                <ul class="clearboth">
                    <?php  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 8; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "top", "on", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
                    <li><a href="<?php echo $field['typeurl']; ?>"><?php echo $field['englist_name']; ?></a></li>
                    <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; ?> 
                </ul>
                <span><?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attrname_16"); echo $__VALUE__;  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attr_16"); echo $__VALUE__; ?>&nbsp;&nbsp;&nbsp;<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attrname_1"); echo $__VALUE__;  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attr_1"); echo $__VALUE__; ?>&nbsp;&nbsp;&nbsp;<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attrname_21"); echo $__VALUE__;  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_attr_21"); echo $__VALUE__; ?></span>
                <!-- <span>版权所有：<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_copyright"); echo $__VALUE__; ?>&nbsp;&nbsp;<a href="/">宁波上海货代</a>&nbsp;&nbsp;<a href="/gxfw.html">罐箱服务</a>&nbsp;&nbsp;<a href="/wxpys.html">危险品运输</a>&nbsp;&nbsp;<a target='_blank' href='https://beian.miit.gov.cn'>浙ICP备19045799号</a></span> -->
            </div>
            <div class="right"><img src="/template/old/images/YouTube.png"><span>YouTube</span></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!--返回顶部-->
<div class="backTop">
    <img src="/template/old/images/top1.png" />
</div>

<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/js/jquery-3.7.0.min.js","","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/js/jquery.bxslider.min.js","","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/js/smooth.js","","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/js/jquery.queryloader2.js","","","","",""); echo $__VALUE__;  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/js/jquery.SuperSlide.2.1.1.js","","","","",""); echo $__VALUE__; ?>

<script>
    $(function () {
        
        var slider = $('.banner .bxslider').bxSlider({
            mode: 'fade',
            auto: 'true',
            controls: false
        });
        $(".content .bx-wrapper .bx-pager").click(function () {
            slider.startAuto();
        });
        var bxW = $(".companyBox").outerWidth() / 4;
        if ($(window).width() > 510) {
            $('.company .bxslider').bxSlider({
                controls: false,
                minSlides: 1,
                maxSlides: 4,
                moveSlides: 1,
                infiniteLoop: false,
                slideWidth: bxW
            });
        } else {
            var bx510 = $(".companyBox").outerWidth() * 0.8 / 2;
            $('.company .bxslider').bxSlider({
                pager: false,
                minSlides: 1,
                maxSlides: 2,
                moveSlides: 1,
                infiniteLoop: false,
                slideWidth: bx510,
            });
            $(".company .bxslider li").each(function () {
                var obj = $(this).find("a > span");
                letterLimited(obj, 24);
            });
        }
        $("body").css("background", "#fff");
    });
    // function json2str(o) {
    //     var arr = [];
    //     var fmt = function (s) {
    //         if (typeof s == 'object' && s != null) return json2str(s);
    //         return /^(string|number)$/.test(typeof s) ? "'" + s + "'" : s;
    //     }
    //     for (var i in o) arr.push("'" + i + "':" + fmt(o[i]));
    //     return '{' + arr.join(',') + '}';
    // }
</script>

<?php  $tagStatic = new \think\template\taglib\eyou\TagStatic; $__VALUE__ = $tagStatic->getStatic("/template/old/js/fun.js","","","","",""); echo $__VALUE__; ?>
<!-- 最新动态 -->
<script type="text/javascript">
    jQuery(".main_s_m").slide({
        titCell: ".hd ul",
        mainCell: ".bd ul",
        autoPage: true,
        effect: "left",
        autoPlay: true,
        vis: 4,
        trigger: "click"
    });
</script>
</body>
</html>
