<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:39:"./template/old/pc/lists_single_page.htm";i:1756878968;s:57:"/www/wwwroot/cnnfreight.com/template/old/pc/comm/head.htm";i:1756878972;s:56:"/www/wwwroot/cnnfreight.com/template/old/pc/comm/top.htm";i:1756878973;s:60:"/www/wwwroot/cnnfreight.com/template/old/pc/comm/sortnav.htm";i:1756878973;s:61:"/www/wwwroot/cnnfreight.com/template/old/pc/comm/position.htm";i:1756878973;s:57:"/www/wwwroot/cnnfreight.com/template/old/pc/comm/foot.htm";i:1756878972;}*/ ?>
<!doctype html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<title><?php echo $eyou['field']['seo_title']; ?>_<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_title"); echo $__VALUE__; ?></title>
	<meta name="keywords" content="<?php echo $eyou['field']['seo_keywords']; ?>_<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_keywords"); echo $__VALUE__; ?>" />
	<meta name="description" content="<?php echo $eyou['field']['seo_description']; ?>_<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_description"); echo $__VALUE__; ?>" />
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


<!-- 头部大屏 -->
<div class="zi_banner">
  <a href="#" target="_self"><img src="<?php echo $eyou['field']['typelitpic']; ?>" /></a>
</div>
<div class="nav">
  <div class="all">
      <!--<i><a href=""> <?php  $typeid = ""; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  $tagPosition = new \think\template\taglib\eyou\TagPosition; $__VALUE__ = $tagPosition->getPosition($typeid, "", " "); echo $__VALUE__; ?></a></i>-->
      <?php if(\think\Cookie::get('home_lang') =='cn'): ?>
    <i><a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>/">首页</a><span></span><a href="<?php echo $eyou['field']['ptypeurl']; ?>"><?php echo $eyou['field']['ptypename']; ?></a><span></span><?php echo $eyou['field']['typename']; ?></i>
    <?php elseif(\think\Cookie::get('home_lang') =='en'): ?>
    <i><a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>/">HOME</a><span></span><a href="<?php echo $eyou['field']['ptypeurl']; ?>"><?php echo gettoptype($eyou['field']['typeid'],'englist_name'); ?></a><span></span><?php echo $eyou['field']['englist_name']; ?></i>
    <?php endif; ?>
  </div>
</div>


<div class="all">
    <div class="about_cont clearboth">
        <div class="Left">
            <!-- 二级栏目导航 -->

    <?php if(\think\Cookie::get('home_lang') =='cn'):  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "self", "cur", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
    <a href="<?php echo $field['typeurl']; ?>" class="<?php echo $field['currentstyle']; ?>"><?php echo $field['typename']; ?> <img src="/template/old/images/leftbg2.png" /></a>
    <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; elseif(\think\Cookie::get('home_lang') =='en'):  if(isset($ui_typeid) && !empty($ui_typeid)) : $typeid = $ui_typeid; else: $typeid = ""; endif; if(isset($ui_modelid) && !empty($ui_modelid)) : $modelid = $ui_modelid; else: $modelid = ""; endif; if(empty($typeid) && isset($channelartlist["id"]) && !empty($channelartlist["id"])) : $typeid = intval($channelartlist["id"]); endif;  if(isset($ui_row) && !empty($ui_row)) : $row = $ui_row; else: $row = 100; endif; $tagChannel = new \think\template\taglib\eyou\TagChannel; $_result = $tagChannel->getChannel($typeid, "self", "cur", "", $modelid); if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $e = 1;$__LIST__ = is_array($_result) ? array_slice($_result,0, $row, true) : $_result->slice(0, $row, true); if( count($__LIST__)==0 ) : echo htmlspecialchars_decode("");else: foreach($__LIST__ as $key=>$field): $field["typename"] = text_msubstr($field["typename"], 0, 100, false); $__LIST__[$key] = $_result[$key] = $field;$i= intval($key) + 1;$mod = ($i % 2 ); ?>
    <a href="<?php echo $field['typeurl']; ?>" class="<?php echo $field['currentstyle']; ?>"><?php echo $field['englist_name']; ?> <img src="/template/old/images/leftbg2.png" /></a>
    <?php ++$e; endforeach; endif; else: echo htmlspecialchars_decode("");endif; $field = []; endif; ?>

        </div>
        <div class="right_cont">
            <!-- 当前位置 -->

<div class="subTitle">
  <div class="name">
      <!-- <span>01-01</span> -->
      <?php if(\think\Cookie::get('home_lang') =='cn'): ?>
      <em><?php echo $eyou['field']['typename']; ?><span><?php echo $eyou['field']['englist_name']; ?></span></em>
      <?php elseif(\think\Cookie::get('home_lang') =='en'): ?>
      <em><?php echo $eyou['field']['englist_name']; ?><span></span></em>
      <?php endif; ?>
  </div>
  <div class="navbar">
    <?php if(\think\Cookie::get('home_lang') =='cn'): ?>
    <i><a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>/">首页</a><span></span><a href="<?php echo $eyou['field']['ptypeurl']; ?>"><?php echo $eyou['field']['ptypename']; ?></a><span></span><?php echo $eyou['field']['typename']; ?></i>
    <?php elseif(\think\Cookie::get('home_lang') =='en'): ?>
    <i><a href="<?php  $tagGlobal = new \think\template\taglib\eyou\TagGlobal; $__VALUE__ = $tagGlobal->getGlobal("web_cmsurl"); echo $__VALUE__; ?>/">HOME</a><span></span><a href="<?php echo $eyou['field']['ptypeurl']; ?>"><?php echo gettoptype($eyou['field']['typeid'],'englist_name'); ?></a><span></span><?php echo $eyou['field']['englist_name']; ?></i>
    <?php endif; ?>
  </div>
</div>
        <div class="p1">
            <?php echo $eyou['field']['content']; ?>
        </div>
        </div>
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

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?c878bb9344a27c6a9d5a4619a14dd0ae";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MNYSVF9KZL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MNYSVF9KZL');
</script>

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