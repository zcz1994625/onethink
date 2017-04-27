<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/Public/static/bootstrap/css/docs.css" rel="stylesheet">
<link href="/Public/static/bootstrap/css/onethink.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 导航条
================================================== -->
<!--<div class="navbar navbar-inverse navbar-fixed-top">-->
    <!--<div class="navbar-inner">-->
        <!--<div class="container">-->
            <!--<a class="brand" href="<?php echo U('index/index');?>">OneThink</a>-->
            <!--<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">-->
                <!--<span class="icon-bar"></span>-->
                <!--<span class="icon-bar"></span>-->
                <!--<span class="icon-bar"></span>-->
            <!--</button>-->
            <!--<div class="nav-collapse collapse">-->
                <!--<ul class="nav">-->
                    <!--<?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>-->
                    	<!--<?php if(($nav["pid"]) == "0"): ?>-->
                        <!--<li>-->
                            <!--<a href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($nav["title"]); ?></a>-->
                        <!--</li>-->
                        <!--<?php endif; ?>-->
                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                <!--</ul>-->
            <!--</div>-->
            <!--<div class="nav-collapse collapse pull-right">-->
                <!--<?php if(is_login()): ?>-->
                    <!--<ul class="nav" style="margin-right:0">-->
                        <!--<li class="dropdown">-->
                            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-left:0;padding-right:0"><?php echo get_username();?> <b class="caret"></b></a>-->
                            <!--<ul class="dropdown-menu">-->
                                <!--<li><a href="<?php echo U('User/profile');?>">修改密码</a></li>-->
                                <!--<li><a href="<?php echo U('User/logout');?>">退出</a></li>-->
                            <!--</ul>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--<?php else: ?>-->
                    <!--<ul class="nav" style="margin-right:0">-->
                        <!--<li>-->
                            <!--<a href="<?php echo U('User/login');?>">登录</a>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<a href="<?php echo U('User/register');?>" style="padding-left:0;padding-right:0">注册</a>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--<?php endif; ?>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->

	<!-- /头部 -->
	
	<!-- 主体 -->
	
<!--<header class="jumbotron subhead" id="overview">-->
  <!--<div class="container">-->
    <h2>用户登录</h2>
    <!--<p><span><span class="pull-left"><span>还没有账号? <a href="<?php echo U('User/register');?>">立即注册</a></span> </span></p>-->
  <!--</div>-->
<!--</header>-->

<div id="main-container" class="container">
    <div class="row">
         
        
<section>
	<div class="span12">
        <form class="login-form" action="/index.php?s=/Home/User/login.html" method="post">
          <div class="control-group">
            <label class="control-label" for="inputEmail">用户名</label>
            <div class="controls">
              <input type="text" id="inputEmail" class="span3" placeholder="请输入用户名"  ajaxurl="/member/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">密码</label>
            <div class="controls">
              <input type="password" id="inputPassword"  class="span3" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">验证码</label>
            <div class="controls">
              <input type="text" id="inputPassword" class="span3" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('verify');?>" style="cursor:pointer;">
            </div>
            <div class="controls Validform_checktip text-warning"></div>
          </div>
          <div class="control-group">
            <div class="controls">
              <!--<label class="checkbox">-->
                <!--<input type="checkbox"> 自动登陆-->
              <!--</label>-->
              <button type="submit" class="btn btn-info" style="width: 100%">登 陆</button>
                <P><a href="<?php echo U('User/register');?>">新用户注册</a></P>
            </div>
          </div>
        </form>
	</div>
</section>

    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>
	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
</body>
</html>