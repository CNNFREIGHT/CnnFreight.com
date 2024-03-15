<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<meta name="applicable-device" content="pc,mobile"/>
<meta name="renderer" content="webkit"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,user-scalable=no">
<title>{pboot:if('{sort:title}'=='')}{pboot:pagetitle}{else}{sort:title}{/pboot:if}</title>
<meta name="keywords" content="{pboot:if('{sort:keywords}'=='')}{pboot:pagekeywords}{else}{sort:keywords}{/pboot:if}">
<meta name="description" content="{pboot:if('{sort:description}'=='')}{pboot:pagedescription}{else}{sort:description}{/pboot:if}">
<link rel="stylesheet" type="text/css" href="{pboot:sitepath}/skin/css/remixicon.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="{pboot:sitepath}/skin/css/animate.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="{pboot:sitepath}/skin/css/style.css" media="screen"/>
<script src="{pboot:sitepath}/skin/js/jquery-2.2.4.min.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="{pboot:sitepath}/skin/js/html5shiv.v3.72.min.js"></script>
<![endif]-->
</head>
<body id="category">
<header id="header">
  <div class="inner">
    <h1 id="logo"> <a href="{pboot:sitepath}/"><img src="{pboot:sitelogo}" alt="{pboot:sitetitle}" height="70"></a> </h1>
    <div id="topBtn">
      <div id="navBtn"> <i></i> </div>
    </div>
    <div id="searchbox">
      <form method="get" action="{pboot:scaction}">
        <div class="input">
          <input type="text" name="keyword" id="" class="text" value="" placeholder="搜索..."/>
          <button type="submit" id="btnPost" class="submit"><i class="ri-search-line"></i></button>
        </div>
      </form>
    </div>
    <nav id="nav">
      <ul>
        <li class="navbar-item {pboot:if(0=='{sort:scode}')cur{/pboot:if}"><a href="{pboot:sitepath}/" title="网站首页">网站首页</a></li>
        {pboot:nav}
        <li class="navbar-item {pboot:if('[nav:scode]'=='{sort:tcode}')}cur{/pboot:if}"><a href="[nav:link]" title="[nav:name]">[nav:name]</a>
          {pboot:if([nav:soncount]>0)}
          <ul>
            {pboot:2nav parent=[nav:scode]}
            <li class="navbar-item"><a href="[2nav:link]" title="[2nav:name]">[2nav:name]</a></li>
            {/pboot:2nav}
          </ul>
          {/pboot:if}
        </li>
        {/pboot:nav}
      </ul>
    </nav>
    <div class="clear"></div>
  </div>
</header>
<div id="blank"></div>
<div id="breadcrumb">
  <div class="inner"> {pboot:position} </div>
</div>
<div id="wrapper">
  <div class="inner">
    <main id="main">
      <div id="blogList">
        {pboot:search num=8 order=sorting}
        <article class="blogItem wow animate__fadeInUp">
          <figure class="thumbnail"> <a target="_blank" href="[search:link]" title="[search:title]"> <img src="[search:ico]" alt="[search:title]"> </a> </figure>
          <div class="text">
            <h2 class="title"> <a target="_blank" href="[search:link]" title="[search:title]">[search:title]</a> </h2>
            <div class="rows excerpt"> [search:description lencn=120] </div>
            <div class="meta"> <span> <i class="ri-calendar-check-line"></i>
              <time datetime="[search:date style=Y-m-d]">[list:date style=Y-m-d]</time>
              </span> <span> <a href="[search:sortlink]" title="[search:sortname]"><i class="ri-price-tag-3-line"></i> [search:sortname]</a> </span> <span><i class="ri-eye-line"></i> [search:visits]</span></div>
          </div>
        </article>
        {/pboot:search}
      </div>
      {pboot:if({page:rows}>0)}
    <div class="pagebar">
    <div class="pagination">
    <a class="page-item page-link hidden-sm" href="{page:index}" title="首页">首页</a>
    {page:numbar}
    <a class="page-item page-link" href="javascript:;" title="当前页/总页数">{page:current}/{page:count}</a>
    <a class="page-item page-link hidden-sm" href="{page:last}" title="尾页">尾页</a>
    </div>
    </div>	
    {else}
    <div class="tac text-secondary">本分类下无任何数据！</div>
    {/pboot:if}
    </main>
    <div id="sidebar">
      <section class="widget theme divContact">
        <h3 class="sidetitle">联系我们</h3>
        <div class="textwidget">
          <div class="clear tel">
            <div class="box">
              <h4><i class="ri-customer-service-line"></i> 咨询电话：</h4>
              <span>{pboot:companyphone}</span> </div>
          </div>
          <div class="info">
            <p class="qr"> <img src="{pboot:companyweixin}" alt="微信"/> </p>
            <h4>微信扫描二维码</h4>
            <p>联系我们了解更多</p>
          </div>
          <div class="info">
            <p class="qr"> <img src="{label:ma}" alt="抖音"/> </p>
            <h4>抖音扫描二维码</h4>
            <p>关注我们了解更多</p>
          </div>
          <div class="clear social"> <span> <a class="qq" rel="nofollow" href="tencent://message/?Menu=yes&uin={pboot:companyqq}&Site={pboot:httpurl}" title="QQ"><i class="ri-qq-fill"></i></a> </span> <span> <a class="wb" rel="nofollow" href="{label:weibo}" title="微博" target="_blank"><i class="ri-weibo-fill"></i></a> </span> </div>
        </div>
      </section>
      <section class="widget system divTags">
        <h3 class="sidetitle">标签列表</h3>
        <ul>
          {pboot:tags num=20}
          <li><a title="[tags:text]" href="[tags:link]">[tags:text]</a></li>
          {/pboot:tags}
        </ul>
      </section>
      <section class="widget system divPrevious">
        <h3 class="sidetitle">最近发表</h3>
        <ul>
          {pboot:list num=6 scode={sort:scode} page=0}
          <li><a title="[list:title]" href="[list:link]">[list:title]</a></li>
          {/pboot:list}
        </ul>
      </section>
      <section class="widget system divSearchPanel">
        <div class="textwidget">
          <form name="search" method="get" action="{pboot:scaction}">
            <input type="submit" value="搜索" name="keyword" />
          </form>
        </div>
      </section>
    </div>
  </div>
</div>
<footer>
  <div id="footer">
    <div class="inner">
      <div id="logoIcon">
        <div class="icon"> <img src="{label:footlogo}" alt="{pboot:sitetitle}"/> </div>
      </div>
      <div id="copyright">
        <p>{pboot:sitecopyright}</p>
        <p><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow">{pboot:siteicp}</a> <a target="_blank" href="{pboot:sitepath}/sitemap.xml">XML地图</a>  </p>
      </div>
      <div id="beian">
        <p> <a target="_blank" href="https://www.baidu.com/" title="模板网">网站模板</a> </p>
        <p> {pboot:sitestatistical} </p>
      </div>
    </div>
  </div>
</footer>
<script>	
	var _url = '/';
</script> 
<script src="{pboot:sitepath}/skin/js/wow.min.js"></script> 
<script src="{pboot:sitepath}/skin/js/slick.min.js"></script> 
<script src="{pboot:sitepath}/skin/js/jquery-rebox.js"></script> 
<script src="{pboot:sitepath}/skin/js/js.js"></script>
</body>
</html><?php return array (
  0 => '/www/wwwroot/cnnfreight.com/template/xiuzhanwang/head.html',
  1 => '/www/wwwroot/cnnfreight.com/template/xiuzhanwang/right.html',
  2 => '/www/wwwroot/cnnfreight.com/template/xiuzhanwang/foot.html',
); ?>