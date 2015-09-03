<?php 
/**
 *	留言版guestbooks.php文件
 *	@author Jeffery Cai
 */	
//  初始值库文件
	require "include/inic.php";

	// 判断是否存在
	if($_POST)
	{
		// 姓名+电子邮件+留言内容
		$guestbookName=fliter_words(trim($_POST["guestbookName"]),$fliter_words_array);
		$guestbookEmail=" - ".trim($_POST["guestbookEmail"]);
		$guestbookMessage=nl2br(trim($_POST["guestbookMessage"]));

		// 打开文件 (末尾，只写，不截断，不存在创建)
		$meg=fopen("date/message.txt","a");

		// 写入文件
		fwrite($meg,str_replace("\r\n","",$guestbookMessage)."\r\n");

		// 关闭文件
		fclose($meg);
	}
	// include "include/array.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文豆电子网</title>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- bootstrapValidator的样式 -->
	<link rel="stylesheet" href="css/bootstrapValidator.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!--[if It IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/htmlshiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<div class="container">
			<!-- 头部 -->
		<div class="header">
			  <div class="navbar"> 
		    	<a href="#" class="btn btn-navbar"  data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
		    	</a>
		      <div class="container"> 
		        <div class="span4">
		       	 <a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a>
		    	</div>
		        <div class="nav-collapse">

		        	<!-- 遍历子菜单 -->
		         <ul class="nav">
		            <li class="dropdown">
				          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">关于我们<b class="caret"></b>
				          </a>
				           <ul class="dropdown-menu">
					            <li><a href="contact.html">联系我们</a></li>
					            <li><a href="ceo-word.html">CEO致词</a></li>
					            <li><a href="history.html">公司历史</a></li>
					            <li><a href="#">企业文化</a></li>
					            <!-- <li class="divider"></li> 横线-->
					            <li><a href="#">Examples</a></li>
				          </ul>
				      </li>
		            <li><a href="products.html">产品展示</a></li>
		            <li><a href="news.php">新闻中心</a></li>
		            <li><a href="invite-job.html">人才招聘</a></li>
		            <li><a href="guestbook.php">客户留言</a></li>
		        </ul>

		        </div>
		      </div>
		    </div>

			<!-- 登录注册按钮 -->
		    <div class="login">
		    	<!-- 注册 -->
			    	<a href="#register" data-toggle="modal" class="">注册</a>
			    	<a href="#login" data-toggle="modal" class="">登录</a>
			    	<a href="#ctrl-d" data-toggle="modal" class="">收藏本站</a>

			    	 <!-- 收藏本站 -->
					<div class="modal hide fade" id="ctrl-d">
			    	 	 <a href="#ctrl-d" class="close" data-dismiss="modal"> X </a>
			    	 	<div class="modal-body">
			    	 		<h3 align='center'>请按Ctrl+D收藏我们的网站，谢谢！</h3>
			    		 </div>
			    	 </div>

		    	 <div class="modal hide fade" id="register">
				    <div class="modal-header">
				    <a href="#register" class="close" data-dismiss="modal"> X </a>
				      <h4>注册</h4>
				      
				    </div>
				    <div class="modal-body">
<!-- PHP表单注册验证部分 start-->
						<form id="registerForm" method="post" class="form-horizontal"> 
					        <fieldset>
						    <div class="form-group">
						        <label class="control-label" for="register-user">用户名：</label>
						        <input type="text" class="form-control" name="registerUsername" id="register-user"/>
						    </div>
						    <br>
						    <div class="form-group">
						        <label class="control-label" for="register-pass">密码：</label>
						        <input type="password" class="form-control" name="registerPassword" id="register-pass"/>
						    </div>
						    <br>
						    <div class="form-group">
						        <label class="control-label" for="register-conPass">确认密码：</label>
						        <input type="password" class="form-control" name="registerConfirmPassword" id="register-conPass"/>
						    </div>
						    <br>
						    <div class="form-group">
						        <label class="control-label" for="register-email">电子邮箱：</label>
						        <input type="text" class="form-control" name="registerAddEmail" id="register-email"/>
						    </div>
					        </fieldset>
					        <div class="form-actions">
								<button class="btn" type="submit">提交</button>
								<button class="btn" type="reset">重置</button>
							</div>
						</form>
<!-- PHP表单注册验证部分 stop-->
	    			</div>
 				</div>

<!-- PHP表单登录验证部分 strat-->
				 <div class="modal hide fade" id="login">
				    <div class="modal-header">
				    <a href="#login" class="close" data-dismiss="modal"> X </a>
				      <h4>登录</h4>
				    </div>
				    <div class="modal-body">
				     <form id="loginForm" method="post" class="form-horizontal"> 
				        <fieldset>
					    <div class="form-group">
					        <label class="control-label" for="login-user">用户名：</label>
					        <input type="text" class="form-control" name="loginUsername" id="login-user"/>
					    </div>
					    <br>
					    <div class="form-group">
					        <label class="control-label" for="login-pass">密码：</label>
					        <input type="password" class="form-control" name="loginPassword" id="login-pass"/>
					    </div>
				        </fieldset>
				        <div class="form-actions">
							<button class="btn" type="submit">提交</button>
							<button class="btn" type="reset">重置</button>
						</div>
					</form>
<!-- PHP表单登录验证部分 stop-->

	    			</div>
 				</div>

		    </div>
		</div>

		<!-- ad -->
		<div class="ad">
			<img src="images/ad-list-img.jpg" alt="" style="width:1207px">
		</div>


		<!-- 关于我们 -->
			<!-- 中间内容 -->
		<div class="row">
			<div class="span3">
				<div class="content-nav">
					<h3>COMPANY</h3>
					<h1>关于我们</h1>
					<ul>
						<li> > <a href="ceo-word.html">CEO致词</a></li>
						<li> > <a href="copy-history.html">公司历史</a></li>
						<li> > <a href="#">企业文化</a></li>
						<li> > <a href="#">组织结构</a></li>
						<li> > <a href="#">合作伙伴</a></li>
						<li style="border:none"> > <a href="#">联系我们</a></li>
					</ul>
					<div class="nav-ornaments">
						<img src="images/slide-nav-ti.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="span9">
			<div class="content-main">
				<h1>客户留言</h1>
				<div class="wengdo-addr-nav">
					<a href="">主页</a> > 	
					<a href="message.html">客户留言</a>
				</div>	
				<div class="hr"></div>

			<!-- wendo-各个子页面修改部分 -->
			<!-- 客户留言页面 -->
				<div class="contact-content">
					<div class="guestbook-content">
						<ul>
			<?php foreach( $dz_guestbook as $gues_value ){ ?>
							<li>
								<div class="user-email">
									<?php echo $gues_value["guestbook_name"]; echo $gues_value["guestbook_email"]; ?>
								</div>
								<div class="user-com-cont">
									<?php echo $gues_value["guestbook_content"] ?>
								</div>
								<div class="view-details">
									<button class="btn">展开</button>
									<div class="guestbook-date">
										<?php echo $gues_value["guestbook_addtime"] ?>
									</div>
								</div>
							</li>
			<?php } ?>
						</ul>
					</div>
					<div class="guestbook-page">
						<a href="" class="news-page-current"><<</a>
						<a href="" class="news-page-current"><</a>
						<a href="">1</a>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<a href="">5</a>
						<a href="">6</a>
						<a href="">7</a>
						<a href="">8</a>
						<a href="">9</a>
						<a href="">10</a>
						<a href="" class="news-page-current">></a>
						<a href="" class="news-page-current">>></a>
					</div>
					<div class="user-mess-form" >
						<form action="" method="post" id="guestbookForm">
							<div class="form-group">
								<label for="user-name" class="control-label">姓名</label><input type="text" id="user-name" name="guestbookName" placeholder="请输入你的姓名">
							</div>

							<div class="form-group">
								<label for="user-mess-mail" class="control-label">电子邮箱</label><input type="text" id="user-mess-mail" name="guestbookEmail" placeholder="请输入你的电子邮箱">
							</div>

							<div class="form-group">
								<label for="">留言内容</label>
								<textarea name="guestbookMessage" id="" cols="30" rows="10" placeholder="请输入留言内容"></textarea>
							</div>
							<div class="user-form-btn form-actions">
								<button class="btn" type="submit"> > 发送</button>
								<button class="btn" type="reset"> > 重置</button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
			</div>
	</div>
	

	<!-- 顶部 -->
	<footer>
		<div class="row">
			<div class="span6">
				<ul>
					<a href="">法律高地</a>
					<a href="">隐私政策</a>
					<a href="">电子邮件</a>
					<a href="">网站地图</a>
				<br>COPYRIGHT ⓒ WENGDO company. All rights reserved
				</ul>
			</div>
			<div class="span6 friend-links">
				<select name="" id="" style="float:right">
						<option value="">友情链接</option>
						<option value="">Web资源网</option>
						<option value="">知园博客</option>
						<option value="">绿叶学习网</option>
				</select>
			</div>
		</div>
	</footer>
</div>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- bootstrap 表单验证插件 -->
<script type="text/javascript" src="js/bootstrapValidator.min.js"></script>

<!--  html前端表单验证js文件  -->
<script type="text/javascript" src="js/formValidator.js"></script>
<SCRIPT TYPE="text/javascript">
		
	// 留言版浏览全部
	var guesBtn=$(".guestbook-content ul li").find("button");
	guesBtn.toggle(function()
	{
		$(this).html("收缩");
		$(this).parent().siblings(".user-com-cont").css({
			"height":"auto",
			"white-space":"inherit",
			"overflow":"auto"
		})
	},function()
	{
		$(this).html("展开");
		$(this).parent().siblings(".user-com-cont").css({
			"height":"30",
			"white-space":"nowrap",
			"overflow":"hidden"
		})

	})
</SCRIPT>
</body>
</html>