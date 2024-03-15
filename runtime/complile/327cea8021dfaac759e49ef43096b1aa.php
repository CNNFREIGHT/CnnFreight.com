<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer"  content="webkit">
  <title><?php echo CMSNAME;?>管理中心-V<?php echo APP_VERSION;?>-<?php echo RELEASE_TIME;?></title>
  <link rel="shortcut icon" href="<?php echo SITE_DIR;?>/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/layui/css/layui.css?v=v2.5.4">
  <link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/font-awesome/css/font-awesome.min.css?v=v4.7.0" type="text/css">
  <link rel="stylesheet" href="<?php echo APP_THEME_DIR;?>/css/comm.css?v=v3.0.6">
  <link href="<?php echo APP_THEME_DIR;?>/css/jquery.treetable.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/jquery.treetable.js"></script>
</head>

<body class="layui-layout-body">

<!--定义部分地址方便JS调用-->
<div style="display: none">
	<span id="controller" data-controller="<?php echo C;?>"></span>
	<span id="url" data-url="<?php echo URL;?>"></span>
	<span id="preurl" data-preurl="<?php echo url('/admin',false);?>"></span>
	<span id="sitedir" data-sitedir="<?php echo SITE_DIR;?>"></span>
	<span id="mcode" data-mcode="<?php echo get('mcode');?>"></span>
</div>

<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">
    <a href="<?php echo \core\basic\Url::get('/admin/Index/home');?>">
    <img src="<?php echo APP_THEME_DIR;?>/images/logo.png" height="30">
	    <?php echo CMSNAME;?> 
	   	<?php if (LICENSE==3) {?>
	   		<span class="layui-badge">SVIP</span>
	   	<?php } else { ?>
	   		<span class="layui-badge layui-bg-gray">V<?php echo APP_VERSION;?></span>	
	   	<?php } ?>
    </a>
    </div>
    
    <ul class="menu">
    	<li class="menu-ico" title="显示或隐藏侧边栏"><i class="fa fa-bars" aria-hidden="true"></i></li>
	</ul>
	<?php if (!$this->getVar('one_area')) {?>
	<form method="post" action="<?php echo \core\basic\Url::get('/admin/Index/area');?>" class="area-select">
		<input type="hidden" name="formcheck" value="<?php echo $this->getVar('formcheck');?>" > 
		<div class="layui-col-xs8">
		   <select name="acode">
		       <?php echo $this->getVar('area_html');?>
		   </select>
		</div>
		<div class="layui-col-xs4">
		 	<button type="submit" class="layui-btn layui-btn-sm">切换</button>
		</div>
   	</form>
 	<?php } ?>

    <ul class="layui-nav layui-layout-right">
    
       <li class="layui-nav-item layui-hide-xs">
      	 <a href="<?php echo SITE_DIR;?>/" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> 网站主页</a>
       </li>

       <li class="layui-nav-item layui-hide-xs">
       		<a href="<?php echo \core\basic\Url::get('/admin/DeleCache/index');?>"><i class="fa fa-trash-o" aria-hidden="true"></i> 清理缓存</a>
       </li>

       <li class="layui-nav-item layui-hide-xs">
	        <a href="javascript:;">
	          <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo session('realname');?>
	        </a>
	        <dl class="layui-nav-child">
	          <dd><a href="<?php echo \core\basic\Url::get('/admin/Index/ucenter');?>"><i class="fa fa-address-card-o" aria-hidden="true"></i> 密码修改</a></dd>
	          <dd><a href="<?php echo \core\basic\Url::get('/admin/Index/loginOut');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> 退出登录</a></dd>
	          <?php if (session('ucode')==10001) {?>
	          	<dd><a href="<?php echo \core\basic\Url::get('/admin/Upgrade/index');?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i> 在线更新</a></dd>
	          	<dd><a href="<?php echo \core\basic\Url::get('/admin/Index/clearSession');?>" class="ajaxlink"><i class="fa fa-trash-o" aria-hidden="true"></i> 清理会话</a></dd>
	          <?php } ?>
	        </dl>
      </li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree" id="nav" lay-shrink="all">
	   <?php $num = 0;foreach ($this->getVar('menu_tree') as $key => $value) { $num++;?>
        <li class="layui-nav-item nav-item <?php if ($this->getVar('primary_menu_url')==$value->url) {?>layui-nav-itemed<?php } ?>">
          <a class="" href="javascript:;"><i class="fa <?php echo $value->ico; ?>" aria-hidden="true"></i><?php echo $value->name; ?></a>
          <dl class="layui-nav-child">
			<?php if ($value->mcode=='M130') {?>
				 <?php $num3 = 0;foreach ($this->getVar('menu_models') as $key3 => $value3) { $num3++;?>
				 	<?php if ($value3->type==1) {?>
						<dd><a href="<?php echo \core\basic\Url::get('/admin/Single/index/mcode/'.$value3->mcode.'');?>"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $value3->name; ?>内容</a></dd>
					<?php } ?>
					<?php if ($value3->type==2) {?>
						<dd><a href="<?php echo \core\basic\Url::get('/admin/Content/index/mcode/'.$value3->mcode.'');?>"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $value3->name; ?>内容</a></dd>
					<?php } ?>
				 <?php } ?>
			<?php } else { ?>
				<?php $num2 = 0;foreach ($value->son as $key2 => $value2) { $num2++;?>
					<?php if (!isset($value2->status)|| $value2->status==1) {?>
	            		<dd><a href="<?php echo \core\basic\Url::get(''.$value2->url.'');?>"><i class="fa <?php echo $value2->ico; ?>" aria-hidden="true"></i><?php echo $value2->name; ?></a></dd>
	            	<?php } ?>
				<?php } ?>
				
				<?php if ($value->mcode=='M101' && session('ucode')==10001) {?>
					<dd><a href="<?php echo \core\basic\Url::get('/admin/Upgrade/index');?>"><i class="fa fa-cloud-upload" aria-hidden="true"></i>在线更新</a></dd>
				<?php } ?>
		    <?php } ?>
          </dl>
        </li>
		<?php } ?>
		
		<li style="height:1px;background:#666" class="layui-hide-sm"></li>
		
		<li class="layui-nav-item layui-hide-sm">
		 <a href="<?php echo SITE_DIR;?>/" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> 网站主页</a>
		</li>
		
		<li class="layui-nav-item layui-hide-sm">
          <a href="<?php echo \core\basic\Url::get('/admin/Index/ucenter');?>"><i class="fa fa-address-card-o" aria-hidden="true"></i> 资料修改</a>
        </li>
        
        <li class="layui-nav-item layui-hide-sm">
         <a href="<?php echo \core\basic\Url::get('/admin/DeleCache/index');?>"><i class="fa fa-trash-o" aria-hidden="true"></i> 清理缓存</a>
        </li>
        
        <li class="layui-nav-item layui-hide-sm">
         <a href="<?php echo \core\basic\Url::get('/admin/Index/loginOut');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> 退出登录</a>
        </li>

      </ul>
    </div>
  </div>
<style>
.huancuna{
display: inline-block;
padding: 9px 25px;
font-weight: 400;
line-height: 20px;
text-align: right;
color:#ffffff;
background-color: #009688;
border-radius:2px;
}
.huancuna:hover{
background-color: #33aba0;
color:#ffffff;
}

</style>
<div class="layui-body">
	
	<div class="layui-tab layui-tab-brief" lay-filter="tab">
	  <ul class="layui-tab-title">
	    <li class="layui-this" lay-id="t1">更新缓存</li>
	  </ul>
	  
	  <div class="layui-tab-content">
  	     <div class="layui-tab-item layui-form  layui-show">
  	     
  	     	 <div class="layui-form-item">
                  <label class="layui-form-label">更新首页和栏目</label>
                  <button type="button" class="layui-btn deletecache" data-type="1">立即更新首页和栏目</button>
             </div>
           
     		 <div class="layui-form-item">
                  <label class="layui-form-label">更新栏目分页</label>
                  <div class="layui-input-inline">
	                  <select name="scode">
	                      <option value="0" >全部栏目</option>
	                      <?php echo $this->getVar('sort_select');?>
	                  </select>
                  </div>
                  <button type="button" class="layui-btn deletecache" data-type="2">立即更新栏目页</button>
             </div>
             
             <div class="layui-form-item">
                  <label class="layui-form-label">更新内容页</label> &nbsp;&nbsp;起始ID
				  <input type="text" id="idzuixiao" value="1" placeholder="最小ID"  class="layui-input input" style="width:15%; display:inline;">
				  &nbsp;&nbsp;结束ID
				  <input type="text" id="idzuida" value="10" placeholder="最大ID"  class="layui-input input" style="width:15%; display:inline;">
                  <button type="button" class="layui-btn deletecache" data-type="3">立即更新内容页</button>
             </div>
			 <div class="layui-form-item">
                  <label class="layui-form-label">更新系统缓存</label>
				  <a href="<?php echo \core\basic\Url::get('/admin/Index/clearOnlySysCache');?>" class="ajaxlink huancuna">清理系统缓存</a> 

             </div>
			 <div class="layui-form-item">
                  <label class="layui-form-label">更新所有缓存</label>
				  <a href="<?php echo \core\basic\Url::get('/admin/Index/clearCache');?>" class="ajaxlink huancuna">清理所有缓存</a> 

             </div>
			 <div class="layui-form-item" style="padding-left:20px; line-height:24px;">
                  功能说明：
				  <br />1、《更新首页和栏目》：随便使用。
				  <br />2、《更新栏目分页》：每天发布量<200篇。7天一次。每天发布量<500篇。3天只需使用一次。每天发布量>1000篇。1天只需使用一次。
				  <br />3、《更新内容页》：根据需要去更新，无全局更新永远不使用。
				  <br />4、《更新系统缓存》：随便使用。
				  <br />5、《更新所有缓存》：如果数据量小，随便使用。如果数据量大，无全局更新永远不要使用。
				  <br />6、一定要做好301，保证链接的唯一性。
             </div>

  	     </div>
	   </div>
	</div>
	
</div>

 <script>
 $(".deletecache").on("click",function(){
	 var type=$(this).data("type");
	 var scode=$(this).parents(".layui-form-item").find("select").val();
	 var idzuixiao=$("#idzuixiao").val();
	 var idzuida=$("#idzuida").val();
	 
	 var lyindex;
	 layui.use('layer', function(){
		var layer = layui.layer;
		lyindex = layer.open({
			type: 1,
			title:'温馨提示',
			closeBtn:0,
			content: '<div style="padding:20px 10px;"><img src="<?php echo APP_THEME_DIR;?>/layui/css/modules/layer/default/loading-0.gif">正在更新...<div>' 
		});
	 });
	
	var url= "?p=/DeleCache/index";
	$.ajax({
   	  type: 'GET',
   	  url: url,
   	  data:{
   		  type:type,
   		  scode:scode,
		  idzuixiao:idzuixiao,
		  idzuida:idzuida
   	  },
   	  dataType: 'json',
   	  success: function (response, status) {
   		  if(response.code==1){
   			 layer.close(lyindex);
      		 layer.msg(response.data, {icon: 1});
   		  }else{
   			layer.close(lyindex);
   			layer.open({
	  			  type: 0,
	  			  title:'错误提示：',
	  			  closeBtn:0,
	  			  btn: ['确认'],
	  			  content: response.data,
	  			  yes: function(index, layero){
	  				  layer.close(index); 
	  			  }
	  		 });
   		  }
        },
        error:function(xhr,status,error){
     	  layer.close(lyindex);
       	  layer.msg("执行更新发生错误!", {icon: 5});
        }
   	});
	
 });
 
 </script>

<input type="hidden" id="do_check" data-url="<?php echo \core\basic\Url::get('/admin/Upgrade/check');?>">
<input type="hidden" id="do_down" data-url="<?php echo \core\basic\Url::get('/admin/Upgrade/down');?>">
<input type="hidden" id="do_update" data-url="<?php echo \core\basic\Url::get('/admin/Upgrade/update');?>">
<input type="hidden" id="check_version" data-url="/index.php?p=upgrade/check&version=<?php echo APP_VERSION;?>.<?php echo RELEASE_TIME;?>.<?php echo $this->getVar('revise');?>&branch=<?php echo $this->getVar('branch');?>&snuser=<?php echo $this->getVar('snuser');?>&site=<?php echo $this->getVar('site');?>">
<input type="hidden" id="check_cache" data-url="<?php echo \core\basic\Url::get('/admin/Upgrade/checkCache');?>">
</div>

<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/layui/layui.all.js?v=v2.5.4"></script>
<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/comm.js?v=v3.1.1"></script>
<script type="text/javascript" src="<?php echo APP_THEME_DIR;?>/js/mylayui.js?v=v3.1.0"></script>

<script type="text/javascript" src="https://www.pbootcms.com/res/v1/js/update.js?v=v3.1.3" ></script>
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</body>
</html>

<?php return array (
  0 => '/www/wwwroot/cnnfreight.com/apps/admin/view/default/common/head.html',
  1 => '/www/wwwroot/cnnfreight.com/apps/admin/view/default/common/foot.html',
); ?>