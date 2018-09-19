<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>销费商后台系统</title>
    <meta name="keywords" content="销费商后台系统">
    <meta name="description" content="销费商后台系统">

    <link href="__PUBLIC__/css/bootstrap.min.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/font-awesome/css/font-awesome.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/css/animate.css?v=0.0.1" rel="stylesheet">

    <link href="__PUBLIC__/css/plugins/summernote/summernote.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/css/plugins/summernote/summernote-bs3.css?v=0.0.1" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css?v=0.0.1" rel="stylesheet">
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
							   <a class="J_menuItem" href="__APP__/News/index">机器设置</a>
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

<link href="__PUBLIC__/css/plugins/iCheck/custom.css" rel="stylesheet">
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<ol class="breadcrumb">
			<a href="__URL__"><i class="fa fa-home"></i></a>
            <li>
                <a href="__URL__">首页</a>
            </li>
            <li>
                <a>群管理</a>
            </li>
        </ol>
	</div>
</div>
<div class="wrapper wrapper-content animated">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content table-responsive">
                    <div class="row">
                        <div class="col-sm-12 m-b-xs">
							<p>
                                <a type="button" class="btn btn-w-m btn-danger" href="__APP__/News/add">新增</a>
                                <!-- <button type="button" class="btn btn-w-m btn-primary">启用</button>
                                <button type="button" class="btn btn-w-m btn-primary">禁用</button>
                                <button type="button" class="btn btn-w-m btn-primary">删除</button>
                                <button type="button" class="btn btn-w-m btn-primary">排序</button> -->
                            </p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover no-margins table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>编号</th>
                                    <th>标题</th>
                                    <th>类型</th>
                                    <th>优先级</th>
                                    <th>最后更新</th>
									<th>状态</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($result['result'])): foreach($result['result'] as $key=>$new): ?><tr>
                                        <!-- <td>
                                            <input type="checkbox" checked class="i-checks" name="input[]">
                                        </td> -->
                                        <td><?php echo ($new["id"]); ?></span></td>
    									<td><?php echo ($new["title"]); ?></td>
                                        <td>
                                            <?php if($new['type'] == 1): ?>公共<?php endif; ?>
                                        </td>
                                        <td><?php echo ($new["level"]); ?></td>
    									<td><?php echo (date("Y-m-d H:i:s",$new["updated_at"])); ?></td>
    									<td>
                                            <?php if($new['status'] == 0): ?>启用
                                            <?php elseif($new['status'] == 1): ?>
                                                禁用<?php endif; ?>
                                        </td>
                                        <td>
    										<a href="__APP__/News/edit/id/<?php echo ($new["id"]); ?>">编辑</a>
    										<a href="__APP__/News/delete/id/<?php echo ($new["id"]); ?>" onclick="return confirm('确认删除吗？')">删除</a>
                                            <?php if($new['status'] == 0): ?><a href="__APP__/News/status/id/<?php echo ($new["id"]); ?>/type/0" onclick="return confirm('确认禁用吗？')">禁用</a>
                                            <?php elseif($new['status'] == 1): ?>
                                                <a href="__APP__/News/status/id/<?php echo ($new["id"]); ?>/type/1" onclick="return confirm('确认启用吗？')">启用</a><?php endif; ?>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

	<div class="row">
	    <div class="col-sm-12 text-right">
	        <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
	            <ul class="pagination">
	                <?php echo ($result["page"]); ?>
	            </ul>
	        </div>
	    </div>
	</div>

</div>
<div class="footer">
	<div>
		<strong>Copyright</strong> @2016 enjvip.com 京ICP备16049754号-1 北京众享天成健康科技有限公司版权所有
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

<!-- iCheck -->
<script src="__PUBLIC__/js/plugins/iCheck/icheck.min.js"></script>
<script>
   $(document).ready(function () {
	   $('.i-checks').iCheck({
		   checkboxClass: 'icheckbox_square-green',
		   radioClass: 'iradio_square-green',
	   });
   });
</script>