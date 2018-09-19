<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>telegram bot 管理后台</title>
    <meta name="keywords" content="销费商后台系统">
    <meta name="description" content="销费商后台系统">

    <link href="__PUBLIC__/css/bootstrap.min.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/font-awesome/css/font-awesome.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/css/animate.css?v=0.0.1" rel="stylesheet">

    <link href="__PUBLIC__/css/plugins/summernote/summernote.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/css/plugins/summernote/summernote-bs3.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css?v=0.03" rel="stylesheet">
    <style media="screen">
        .page-heading {
            padding-top:20px
        }
    </style>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
    	<nav class="navbar-default navbar-static-side" role="navigation">
		   <div class="nav-close"><i class="fa fa-times-circle"></i>
		   </div>
		   <div class="sidebar-collapse">
			   <ul class="nav" id="side-menu">
				   <li class="nav-header">
					   <div class="dropdown profile-element">
						   <!-- <span><img alt="image" class="img-circle" src="img/profile_small.jpg" /></span> -->
						   <a data-toggle="dropdown" class="dropdown-toggle" href="#">
							   <span class="clear">
							  <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
							   <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
							   </span>
						   </a>
						   <ul class="dropdown-menu animated fadeInRight m-t-xs">
							   <!-- <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
							   </li>
							   <li><a class="J_menuItem" href="profile.html">个人资料</a>
							   </li>
							   <li><a class="J_menuItem" href="contacts.html">联系我们</a>
							   </li>
							   <li><a class="J_menuItem" href="mailbox.html">信箱</a>
							   </li>
							   <li class="divider"></li> -->
							   <li><a href="login.html">安全退出</a>
							   </li>
						   </ul>
					   </div>
					   <!-- <div class="logo-element">H+
					   </div> -->
				   </li>
				   <li>
					   <a href="#">
						   <i class="fa fa-home"></i>
						   <span class="nav-label">首页</span>
						   <span class="fa arrow"></span>
					   </a>
					   <ul class="nav nav-second-level">
						   <li>
							   <a class="J_menuItem" href="__APP__/Index/index" data-index="0">首页</a>
						   </li>

					   </ul>

				   </li>
				   <li>
					   <a href="#">
						   <i class="fa fa fa-bar-chart-o"></i>
						   <span class="nav-label">群管理</span>
						   <span class="fa arrow"></span>
					   </a>
					   <ul class="nav nav-second-level">
						   <li>
							   <a class="J_menuItem" href="__APP__/ChatBot/index">机器设置</a>
						   </li>

					   </ul>
				   </li>


			   </ul>
		   </div>
	   </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
				<!-- <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;">
    <ul class="nav navbar-top-links navbar-right">
        <li >
            <span class="m-r-sm text-muted welcome-message" >
            <strong class="font-bold">欢迎<?php echo $_SESSION['Rongzi']['admin']['name'];?></strong>销费商
            <a href="__APP__" title="返回首页" ><i class="fa fa-home"></i></a></span>
        </li>
        <li>
            <a href="__APP__/Login/logout" >
                <i class="fa fa-sign-out"></i> 退出
            </a>
        </li>
    </ul>

</nav> -->

            </div>

<div class="row wrapper border-bottom white-bg page-heading" >
	<div class="col-lg-10" >
		<ol class="breadcrumb" >
			<a href="__URL__"><i class="fa fa-home"></i></a>
            <li>
                <a href="__URL__">首页</a>
            </li>
            <li>
                <a>首页</a>
            </li>
            <li>
                <strong>首页</strong>
            </li>
        </ol>
	</div>
</div>
<div class="wrapper wrapper-content">

	<!-- <div class="row">
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right"></span>
					<h5>销费商总数</h5>
				</div>
				<div class="ibox-content table-responsive">
					<h1 class="no-margins"><?php echo ($result['member_count']); ?></h1>
					<small>销费商总数</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-info pull-right"></span>
					<h5>新增销费商</h5>
				</div>
				<div class="ibox-content table-responsive">
					<h1 class="no-margins"><?php echo ($result['today_member_count']); ?></h1>

					<small>新增销费商</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-primary pull-right"></span>
					<h5>充值申请</h5>
				</div>
				<div class="ibox-content table-responsive">
					<h1 class="no-margins"><?php echo ($result['money_change']); ?></h1>
					<small>充值申请</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-danger pull-right"></span>
					<h5>提现申请</h5>
				</div>
				<div class="ibox-content table-responsive">
					<h1 class="no-margins"><?php echo ($result['withdrawal']); ?></h1>

					<small>提现申请</small>
				</div>
			</div>
		</div>
	</div> -->


	<!-- <div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title" style="text-align: center;">
							<h5 style="float: none !important;">公司财务</h5>
						</div>
						<div class="ibox-content table-responsive">
							<table class="table table-hover no-margins table-bordered table-striped">
								<thead>
									<tr>
										<th>总收入</th>
										<th>总支出</th>
										<th>拨比</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo ($result['finance']['income']); ?></td>
										<td><?php echo ($result['finance']['expend']); ?></td>
										<td><?php echo ($result['finance']['expend']/$result['finance']['income']); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div> -->
</div>
<div class="footer">
	<div>
		<!-- <strong>Copyright</strong> @2016 enjvip.com 京ICP备16049754号-1 北京众享天成健康科技有限公司版权所有 -->
	</div>
</div>
</div>
</div>

<!-- Mainly scripts -->
<script src="__PUBLIC__/js/jquery-2.1.1.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js?v=3.4.0"></script>
<script src="__PUBLIC__/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="__PUBLIC__/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="__PUBLIC__/js/hplus.js?v=2.2.0"></script>
<script src="__PUBLIC__/js/plugins/pace/pace.min.js"></script>


</body>

</html>