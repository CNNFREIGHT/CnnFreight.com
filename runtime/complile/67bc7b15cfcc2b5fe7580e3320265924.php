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
<body id="index">
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
<div id="blank"></div>
<main>
  <div id="slides">
    <div class="slick-load">
      {pboot:slide gid=1 num=10}
      <section class="item" style="background-image:url([slide:src]);">
        <div class="info">
          <div class="inner">
            <h2>[slide:title]</h2>
            <div class="intro">
              <p>[slide:subtitle]</p>
            </div>
            <div class="more"> <a href="[slide:link]" title="了解更多" target="_blank">了解更多</a> </div>
          </div>
        </div>
      </section>
      {/pboot:slide}
    </div>
    <div class="loading"> <span>加载中...</span> </div>
    <div id="mouse" title="滚动鼠标"></div>
  </div>
  {pboot:sort scode=10}
  <section class="columnbox" id="about">
    <div class="inner">
      <div class="text wow animate__fadeInLeft">
        <hgroup class="columnname left">
          <h2>[sort:name]</h2>
          <h3> / [sort:subname]</h3>
        </hgroup>
        {pboot:content id=23}
        <div class="rows excerpt">[content:content drophtml=1 dropblank=1 len=300 more='...'] </div>
        <div class="readmore"> <a href="[content:link]" title="了解更多"><i class="ri-arrow-right-double-line"></i></a> </div>
      </div>
      <div class="pic wow animate__fadeInRight">
        <div class="thumbnail"> <i style="background-image:url([content:ico]);"></i> </div>
      </div>
      {/pboot:content}
    </div>
  </section>
  {/pboot:sort}
  {pboot:sort scode=9}
  <section class="columnbox" id="service">
    <div class="inner">
      <hgroup class="columnname wow animate__fadeInUp">
        <h2>[sort:name]</h2>
        <h3><span>[sort:subname]</span></h3>
      </hgroup>
      <div class="svlist slick-load wow animate__fadeInUp">
        {pboot:list scode=[sort:scode] num=9 order=sorting}
        <article class="item"> <a class="figure" href="[list:link]" title="[list:title]">
          <figure class="img"> <img src="[list:ico]" alt="[list:title]"/> </figure>
          <div class="text">
            <div class="tag"> <span>0[list:i]</span> </div>
            <h4 class="wot">[list:title]</h4>
            <div class="rows intro"> [list:description lencn=90] </div>
          </div>
          <div class="more">
            <p class="rows">[list:title]</p>
            <p><span>了解更多</span></p>
          </div>
          </a> </article>
        {/pboot:list}
      </div>
      <div class="loading"></div>
    </div>
  </section>
  {/pboot:sort}
  {pboot:sort scode=1}
  <section class="columnbox" id="product">
    <div class="columnname wow animate__fadeInUp">
      <hgroup class="inner">
        <h2>[sort:name]</h2>
        <h3><span>[sort:subname]</span></h3>
      </hgroup>
    </div>
    <div class="slick-load">
      {pboot:list scode=[sort:scode] num=20 order=sorting}
      <article class="item proitem wow animate__zoomIn"> <a class="figure" href="[list:link]" title="[list:title]">
        <figure class="img"> <img src="[list:ico]" alt="[list:title]"/> </figure>
        <div class="text">
          <h4 class="wot">[list:title]</h4>
          <p class="rows">[list:description lencn=40]</p>
        </div>
        </a> </article>
      {/pboot:list}
    </div>
    <div class="morebtn"> <a href="[sort:link]" title="查看更多">更看更多 <i class="ri-arrow-right-s-line"></i></a> </div>
  </section>
  {/pboot:sort}
  <section class="columnbox" id="why">
    <div class="inner">
      <hgroup class="columnname wow animate__fadeInUp">
        <h2>为什么选择我们</h2>
        <h3><span>Why choose us</span></h3>
      </hgroup>
      <ul>
        <li class="wow animate__fadeInUp">
          <div class="info">
            <div class="icon"> <i style="background-image:url({pboot:sitedomain}/skin/images/remixicon-group-fill.png);"></i> </div>
            <div class="text">
              <h4>领先和具有影响力的研究</h4>
              <div class="intro"> 研究是我们业务的重要基础。我们的研究一贯坚持客观、独立、严谨和专业的原则，富有才干和经验丰富的研究团队是我们最宝贵的资产之一。我们拥有100多名专业研究人员。 </div>
            </div>
          </div>
        </li>
        <li class="wow animate__fadeInUp">
          <div class="info">
            <div class="icon"> <i style="background-image:url({pboot:sitedomain}/skin/images/remixicon-hearts-fill.png);"></i> </div>
            <div class="text">
              <h4>高质量、多元化的客户基础</h4>
              <div class="intro"> 我们拥有高质量、多元化的客户基础，我们与客户建立并保持长期合作，并致力为其提供全面的产品和服务。我们通过与客户的深入接触，以及对客户业务的深刻理解，赢得了客户的信任。 </div>
            </div>
          </div>
        </li>
        <li class="wow animate__fadeInUp">
          <div class="info">
            <div class="icon"> <i style="background-image:url({pboot:sitedomain}/skin/images/remixicon-pie-chart-2-fill.png);"></i> </div>
            <div class="text">
              <h4>领先、持续专注的服务</h4>
              <div class="intro"> 领先企业构成了我们的客户群基础。多年来，我们开发了诸多大客户，包括国有企业以及领先的非国有企业。我们通过持续专注的服务进一步巩固与他们的长期合作关系。 </div>
            </div>
          </div>
        </li>
        <li class="wow animate__fadeInUp">
          <div class="info">
            <div class="icon"> <i style="background-image:url({pboot:sitedomain}/skin/images/remixicon-device-fill.png);"></i> </div>
            <div class="text">
              <h4>独立、严谨的品牌及声誉</h4>
              <div class="intro"> 我们的研究亦提升了我们的品牌及声誉。连续九年被xxxxxx评为「xxxxxx（第一名）」。我们在二零一二年至二零一四年连续三年被《xxxxxx》评为「xxxxx第一名」。 </div>
            </div>
          </div>
        </li>
        <li class="wow animate__fadeInUp">
          <div class="info">
            <div class="icon"> <i style="background-image:url({pboot:sitedomain}/skin/images/remixicon-checkbox-multiple-blank-fill.png);"></i> </div>
            <div class="text">
              <h4>独有的专业性、创新和忠诚文化</h4>
              <div class="intro"> 人力资本对我们的成功至关重要。我们吸引、培养和留住人才以建立和巩固我们的核心竞争优势。我们的独有文化灌输我们的人员富有合伙人精神，并能激发专业性、创新和忠诚。 </div>
            </div>
          </div>
        </li>
        <li class="wow animate__fadeInUp">
          <div class="info">
            <div class="icon"> <i style="background-image:url({pboot:sitedomain}/skin/images/remixicon-box-1-fill.png);"></i> </div>
            <div class="text">
              <h4>出众的专业人员和创新能力</h4>
              <div class="intro"> 我们真诚与合作的企业文化营造产生创意解决方案的环境，我们高素质的专业人才，以及他们的视野和丰富经验使我们能够牢牢把握市场脉搏，提供创新型产品与服务，满足客户的需求。 </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>
  {pboot:sort scode=5}
  <section class="columnbox" id="case">
    <hgroup class="columnname wow animate__fadeInUp">
      <h2>[sort:name]</h2>
      <h3><span>[sort:subname]</span></h3>
    </hgroup>
    <div class="list">
      <div class="slick-load wow animate__fadeInRight">
        {pboot:list scode=[sort:scode] num=12 order=sorting}
        <article class="item"> <a class="figure" href="[list:link]" title="[list:title]">
          <figure class="img"> <img src="[list:ico]" alt="[list:title]"/> </figure>
          <h4>[list:title]</h4>
          </a> </article>
        {/pboot:list}
      </div>
    </div>
  </section>
  {/pboot:sort}
  {pboot:sort scode=6}
  <section class="columnbox" id="news">
    <div class="inner">
      <hgroup class="columnname wow animate__fadeInUp">
        <h2>[sort:name]</h2>
        <h3><span>[sort:subname]</span></h3>
      </hgroup>
      <div class="list">
        {pboot:list scode=[sort:scode] num=5 order=sorting}
        <article class="item">
          <div class="date wow animate__fadeInUp">
            <time pubdate="[list:date style=Y-m-d]"> <i>[list:date style=d]</i> [list:date style=Y-m] </time>
          </div>
          <div class="box">
            <div class="info wow animate__fadeInRight">
              <h4> <a href="[list:link]" title="[list:title]">[list:title]</a> </h4>
              <div class="rows excerpt">[list:description lencn=120] </div>
              <div class="readmore"> <a href="[list:link]" title="查看详情"><i class="ri-arrow-right-double-line"></i></a> </div>
            </div>
          </div>
        </article>
        {/pboot:list}
      </div>
      <div class="morebtn"> <a class="color" href="[sort:link]" title="查看更多">查看更多 <i class="ri-arrow-right-s-line"></i></a> </div>
    </div>
  </section>
  {/pboot:sort}
  <div id="contact">
    <div class="bg" style="background-image:url({pboot:sitedomain}/skin/images/contactbg.jpg);"></div>
    <div class="inner">
      <section id="contactInfo" class="wow animate__fadeInLeft">
        <hgroup class="columnname left">
          <h2>关注我们</h2>
          <h3> / Follow Us</h3>
        </hgroup>
        <div class="intro">
          {label:bottom}
        </div>
        <div class="ways">
          <h4> 咨询电话 </h4>
          <p> <span>{pboot:companyphone}</span> </p>
        </div>
        <div class="social">
          <ul>
            <li class="qq"> <a rel="nofollow" href="tencent://message/?Menu=yes&uin={pboot:companyqq}&Site={pboot:httpurl}" title="QQ"><i class="ri-qq-fill"></i></a> </li>
            <li class="wx"> <a href="javascript:void(0);" title="微信"><i class="ri-wechat-fill"></i></a>
              <div class="qr"> <img src="{pboot:companyweixin}" alt="微信"/> </div>
            </li>
            <li class="wb"> <a rel="nofollow" href="{label:weibo}" title="微博" target="_blank"><i class="ri-weibo-fill"></i></a> </li>
            <li class="dy"> <a href="javascript:void(0);" title="抖音"><i class="ri-tiktok-fill"></i></a>
              <div class="qr"> <img src="{label:ma}" alt="抖音"/> </div>
            </li>
          </ul>
        </div>
      </section>
      <section id="contactForm" class="wow animate__fadeInUp">
        <h4>联系我们</h4>
        <div class="box">
          <form action="{pboot:msgaction}" method="post">
            <div class="col">
              <div class="item">
                <label>姓名：<i>*</i></label>
                <div class="input">
                  <input type="text" name="contacts" id="name" class="inp" placeholder="请输入您的称呼" />
                </div>
              </div>
              <div class="item">
                <label>电话：<i>*</i></label>
                <div class="input">
                  <input type="text" name="mobile" id="tel" class="inp" placeholder="请输入您的联系电话"/>
                </div>
              </div>
            </div>
            <div class="item">
              <label>邮箱：</label>
              <div class="input">
                <input type="text" name="email" class="inp" value="" placeholder="请输入您的邮箱"/>
              </div>
            </div>
            <div class="item">
              <label>内容：</label>
              <div class="input">
                <textarea type="text" name="content" class="inp" placeholder="请输入您的留言内容"></textarea>
              </div>
            </div>
            <div class="item verify">
              <label>验证码：<i>*</i></label>
              <div class="input">
                <input type="text" id="" name="checkcode" class="inp" value="" placeholder="请输入右边的验证码" />
                <img id="vcode" src="{pboot:checkcode}" alt="验证码" onclick="this.src='{pboot:checkcode}?'+Math.round(Math.random()*10);" title="看不清？点击更换"/> </div>
            </div>
            <div class="btn">
              <input type="submit" class="submit" value="提交" id="tj"/>
            </div>
          </form>
        </div>
      </section>
      <div class="clear"></div>
    </div>
  </div>
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
<script>
	$(function(){
		$('#tj').click(function(){
			//alert(1)
			if($('#name').val()==''){alert('请输入您的姓名！'); $("#name").focus(); return false;}
			if ($("#tel").val() == "") { alert("请输入你的手机！"); $("#tel").focus(); return false; } 
			if (!$("#tel").val().match(/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/)) { alert("手机号码格式不正确！"); $("#tel").focus(); return false;} 
		})
	})
</script>
</body>
</html><?php return array (
  0 => '/www/wwwroot/cnnfreight.com/template/xiuzhanwang/head.html',
  1 => '/www/wwwroot/cnnfreight.com/template/xiuzhanwang/foot.html',
); ?>