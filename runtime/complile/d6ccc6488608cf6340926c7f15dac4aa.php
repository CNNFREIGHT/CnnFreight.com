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
<title>{pboot:pagetitle}</title>
<meta name="keywords" content="{pboot:pagekeywords}">
<meta name="description" content="{pboot:pagedescription}">
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
<main id="worklist">
  <div class="list">
    {pboot:list num=21 order=sorting}
    <article class="item wow animate__fadeInUp"> <a class="figure" href="[list:link]">
      <figure class="img"> <img src="[list:ico]" alt="[list:title]"> </figure>
      <h2 class="wot title">[list:title]</h2>
      </a> </article>
    {/pboot:list}
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
  1 => '/www/wwwroot/cnnfreight.com/template/xiuzhanwang/foot.html',
); ?>