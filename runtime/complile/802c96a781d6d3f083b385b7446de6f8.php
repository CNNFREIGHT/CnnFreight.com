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

<div class="layui-body">
	<?php if ($this->getVar('list')) {?>
	<div class="layui-tab layui-tab-brief" lay-filter="tab">
	  <ul class="layui-tab-title">
	    <li class="layui-this" lay-id="t1">评论列表</li>
	  </ul>
	  <div class="layui-tab-content">
	  	<div class="layui-tab-item layui-show">
	  		<form action="<?php echo \core\basic\Url::get('/admin/MemberComment/index');?>" method="get" class="layui-form">
	  	   		<div class="layui-form-item nospace">
	  	   			<div class="layui-input-inline">
	  	   			  <?php echo $this->getVar('pathinfo');?>
				       <select name="field" lay-verify="required">
				       		<option value="b.title" <?php if (get('field')=='b.title') {?>selected="selected" <?php } ?>>文章标题</option>
				       		<option value="a.comment" <?php if (get('field')=='a.comment') {?>selected="selected" <?php } ?>>评论内容</option>
                            <option value="c.username" <?php if (get('field')=='c.username') {?>selected="selected" <?php } ?> >会员账号</option>
                            <option value="c.nickname" <?php if (get('field')=='c.nickname') {?>selected="selected" <?php } ?> >会员昵称</option>
                       </select>
				    </div>
                     <div class="layui-input-inline">
                     	<input type="text" name="keyword"  value="<?php echo get('keyword');?>"  placeholder="请输入搜索关键字" class="layui-input">
                     </div>
                     <div class="layui-input-inline">
                     	<button class="layui-btn" lay-submit>搜索</button>
                     	<a class="layui-btn layui-btn-primary"  href="<?php echo \core\basic\Url::get('/admin/MemberComment/index');?>">清除搜索</a>
                     </div>
                </div>
            </form>
            
            <form action="<?php echo \core\basic\Url::get('/admin/MemberComment/mod');?>" method="post"  id="contentForm" name="contentForm" class="layui-form" onkeydown="if(event.keyCode==13) return false;">
		  		<input type="hidden" name="formcheck" value="<?php echo $this->getVar('formcheck');?>" > 
		  		<table class="layui-table">
		  			<thead>
	                    <tr>
	                    	<th><input type="checkbox" class="checkbox" lay-ignore id="checkall" title="全选"></th>
	                        <th>文章</th>
	                        <th>评论</th>
	                        <th>状态</th>
	                        <th>评论人</th>
	                        <th>时间</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $num = 0;foreach ($this->getVar('comments') as $key => $value) { $num++;?>
	                    <tr>
	                    	<td>
	                    		<input type="checkbox" class="checkbox checkitem" lay-ignore name="list[]" value="<?php echo $value->id; ?>">
	                    		<input type="hidden" name="listall[]" value="<?php echo $value->id; ?>">
	                    	</td>
	                        <td><?php echo $value->title; ?></td>
	                        <td title="<?php echo $value->comment; ?>"><?php echo substr_both($value->comment,0,20);?>...</td>
	                        <td>
	                       		<?php if ($value->status) {?>
		                        <a href="<?php echo \core\basic\Url::get('/admin/'.C.'/mod/id/'.$value->id.'/field/status/value/0');?>"><i class='fa fa-toggle-on' title="点击禁用"></i></a>
		                        <?php } else { ?>
		                        <a href="<?php echo \core\basic\Url::get('/admin/'.C.'/mod/id/'.$value->id.'/field/status/value/1');?>"><i class='fa fa-toggle-off' title="点击启用"></i></a>
		                        <?php } ?>
	                        </td>
	                        <td title="<?php echo $value->nickname; ?>"><?php echo $value->username; ?></td>
	                        <td><?php echo $value->create_time; ?></td>
	                        <td>
	                       		<?php echo get_btn_more($value->id);?>
	                            <?php echo get_btn_del($value->id);?>
	                        </td>
	                    </tr>
	                    <?php } ?>
	                </tbody>
		  		</table>
		  		
		  		<?php if ($this->getVar('comments')) {?>
		  		<div class="layui-btn-group">
                   
                    <?php if (check_level('del')) {?>
			     		<button type="submit" name="submit" onclick="return setDelAction();" class="layui-btn layui-btn-sm">删除</button>
			     	<?php } ?>
			     	
			     	<?php if (check_level('mod')) {?>
			     		<button type="submit" name="submit" value="verify1" class="layui-btn layui-btn-sm">审核</button>
			     		<button type="submit" name="submit" value="verify0" class="layui-btn layui-btn-sm">禁用</button>
			     	 <?php } ?>
		     	 </div>
		     	<script>
		     		function setDelAction(){
		     			document.contentForm.action = "<?php echo \core\basic\Url::get('/admin/MemberComment/del');?>"; 
		     			return confirm("您确定要删除选中的评论么？");
		     		}
		     	</script>
		     	<?php } ?>
		  	</form> 
	  		<div class="page"><?php echo $this->getVar('pagebar');?></div>
	  	</div>
	  </div>
	</div>
	<?php } ?> 
	
	<?php if ($this->getVar('more')) {?>
	<div class="layui-tab layui-tab-brief" lay-filter="tab">
	  <ul class="layui-tab-title">
	    <li class="layui-this">评论详情</li>
	  </ul>
	  <div class="layui-tab-content">
	  	<div class="layui-tab-item layui-show">
	  		<table class="layui-table table-two">

				 <tr>
					<th width="100">文章</th>
					<td><?php echo @$this->getVar('comment')->title;?></td>
				 </tr>

				 <tr>
					<th>评论</th>
					<td><?php echo @$this->getVar('comment')->comment;?></td>
				 </tr>
				 
				 <tr>
					<th>状态</th>
					<td>
						<?php if ($this->getVar('comment')->status==1) {?>启用<?php } ?>
						<?php if ($this->getVar('comment')->status==0) {?>禁用<?php } ?>
					</td>
				</tr>
				
				 <tr>
					<th>评论人</th>
					<td><?php echo @$this->getVar('comment')->username;?>（<?php echo @$this->getVar('comment')->nickname;?>）</td>
				 </tr>
				 
				  
				 <?php if ($this->getVar('comment')->pusername) {?>
				 <tr>
					<th>被评论人</th>
					<td><?php echo @$this->getVar('comment')->pusername;?>（<?php echo @$this->getVar('comment')->pnickname;?>）</td>
				 </tr>
				 <?php } ?>
				 
				 <tr>
					<th>点赞数</th>
					<td><?php echo @$this->getVar('comment')->likes;?></td>
				 </tr>
				 
				  <tr>
					<th>反对数</th>
					<td><?php echo @$this->getVar('comment')->oppose;?></td>
				 </tr>
				

				 <tr>
					<th>用户IP</th>
					<td><?php echo long2ip($this->getVar('comment')->user_ip);?></td>
				 </tr>
				 
				  <tr>
					<th>操作系统</th>
					<td><?php echo @$this->getVar('comment')->user_os;?></td>
				 </tr>
				 
				 <tr>
					<th>浏览器</th>
					<td><?php echo @$this->getVar('comment')->user_bs;?></td>
				 </tr>
				 
				 <tr>
					<th>时间</th>
					<td><?php echo @$this->getVar('comment')->create_time;?></td>
				 </tr>
				 
  	   	    </table>
	  		<?php echo get_btn_back();?>
	  	</div>
	  </div>
	 </div>
	<?php } ?> 

</div>
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