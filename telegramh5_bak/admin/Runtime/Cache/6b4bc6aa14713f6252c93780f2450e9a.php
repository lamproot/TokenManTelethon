<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>销费商后台系统</title>
    <meta name="keywords" content="销费商后台系统">
    <meta name="description" content="销费商后台系统">

    <link href="__PUBLIC__/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="__PUBLIC__/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <link href="__PUBLIC__/css/animate.css" rel="stylesheet">

    <link href="__PUBLIC__/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="__PUBLIC__/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css?v=2.2.0" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
    	<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="side-menu">
			<li class="nav-header">

				<div class="logo-element" style="padding:0px;">
					<img src="__PUBLIC__/images/admin_logo.jpg" alt="" style="width:100%">
				</div>

			</li>
			<li class="<?php if (MODULE_NAME == 'Index' && ACTION_NAME == 'index') {echo 'active';} ?>">
				<a href="index.html"><i class="fa fa-home"></i> <span class="nav-label">首页</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li class="<?php if (MODULE_NAME == 'Index' && ACTION_NAME == 'index') {echo 'active bcolor';} ?>">
						<a href="__APP__">首页</a>
					</li>
				</ul>
			</li>


			<li class="<?php if (MODULE_NAME == 'News' && ACTION_NAME == 'index') {echo 'active';} ?>">
				<a href="__APP__/News/index"><i class="fa fa-newspaper-o"></i> <span class="nav-label">新闻公告</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">

					<li class="<?php if (MODULE_NAME == 'News' && ACTION_NAME == 'index') {echo 'active bcolor';} ?>">
						<a href="__APP__/News/index">公司新闻</a>
					</li>

					<!-- <li class="<?php if (MODULE_NAME == 'News' && ACTION_NAME == 'add') {echo 'active';} ?>">
						<a href="__APP__">添加新闻</a>
					</li> -->
				</ul>
			</li>


			<?php if(in_array("管理员列表", $_SESSION['Rongzi']['adminauth'])){ ?>
			<li class="<?php if (MODULE_NAME == 'Admins' || MODULE_NAME == 'Auth') {echo 'active';} ?>">
				<a href="index.html"><i class="fa fa-list"></i> <span class="nav-label">管理员列表</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<?php if(in_array("权限管理", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Auth' && ACTION_NAME == 'index') {echo 'active bcolor';} ?>">
						<a href="__APP__/Auth/index">权限管理</a>
					</li>
					<?php } ?>
					<?php if(in_array("新增管理员", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Admins' && ACTION_NAME == 'add') {echo 'active bcolor';} ?>">
						<a href="__APP__/Admins/add">新增管理员</a>
					</li>
					<?php } ?>
					<!-- <li class="<?php if (MODULE_NAME == 'Admins' && ACTION_NAME == 'edit') {echo 'active bcolor';} ?>">
						<a href="__APP__/Admins/edit">管理员修改</a>
					</li> -->

					<?php if(in_array("管理员列表", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Admins' && ACTION_NAME == 'index') {echo 'active bcolor';} ?>">
						<a href="__APP__/Admins/index">管理员列表</a>
					</li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>


			<?php if(in_array("信息管理", $_SESSION['Rongzi']['adminauth'])){ ?>
			<li class="<?php if (MODULE_NAME == 'Corps' || MODULE_NAME == 'Activates' || MODULE_NAME == 'Teams') {echo 'active';} ?>">
				<a href="index.html"><i class="fa fa-group"></i> <span class="nav-label">信息管理</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<?php if(in_array("销费商列表", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Corps' && ACTION_NAME == 'index') {echo 'active bcolor';} ?>">
						<a href="__APP__/Corps/index">销费商列表</a>
					</li>
					<?php } ?>

					<?php if(in_array("销费商激活", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Activates' && ACTION_NAME == 'index') {echo 'active bcolor';} ?>">
						<a href="__APP__/Activates/index">销费商激活</a>
					</li>
					<?php } ?>

					<?php if(in_array("销费商注册", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Teams' && ACTION_NAME == 'register') {echo 'active bcolor';} ?>">
						<a href="__APP__/Teams/register">销费商注册</a>
					</li>
					<?php } ?>

					<?php if(in_array("拓展拓扑", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Teams' && ACTION_NAME == 'recommend_relation') {echo 'active bcolor';} ?>">
						<a href="__APP__/Teams/recommend_relation">拓展拓扑</a>
					</li>
					<?php } ?>

					<?php if(in_array("位置关系", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Teams' && ACTION_NAME == 'contact_relation') {echo 'active bcolor';} ?>">
						<a href="__APP__/Teams/contact_relation">位置关系</a>
					</li>
					<?php } ?>

					<?php if(in_array("销费商升级", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Corps' && ACTION_NAME == 'upgrade') {echo 'active bcolor';} ?>">
						<a href="__APP__/Corps/upgrade">销费商升级</a>
					</li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>


			<?php if(in_array("财务管理", $_SESSION['Rongzi']['adminauth'])){ ?>
			<li class="<?php if (MODULE_NAME == 'Finances') {echo 'active';} ?>">
				<a href="index.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">财务管理</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<?php if(in_array("补贴统计", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'bonus_list') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/bonus_list">补贴统计</a>
					</li>
					<?php } ?>

					<?php if(in_array("财务流水", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'finance_flow') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/finance_flow">财务流水</a>
					</li>
					<?php } ?>

					<?php if(in_array("转账明细", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'transfer_list') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/transfer_list">转账明细</a>
					</li>
					<?php } ?>

					<?php if(in_array("公司充值", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'company_recharge') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/company_recharge">公司充值</a>
					</li>
					<?php } ?>

					<?php if(in_array("激活扣币", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'company_deduct_money') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/company_deduct_money">激活扣币</a>
					</li>
					<?php } ?>

					<?php if(in_array("提现申请", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'cash') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/cash">提现申请</a>
					</li>
					<?php } ?>

					<?php if(in_array("提现记录", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'cash_list') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/cash_list">提现记录</a>
					</li>
					<?php } ?>

					<?php if(in_array("充值记录", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Finances' && ACTION_NAME == 'recharge_list') {echo 'active bcolor';} ?>">
						<a href="__APP__/Finances/recharge_list">充值记录</a>
					</li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>


			<?php if(in_array("系统设置", $_SESSION['Rongzi']['adminauth'])){ ?>
			<li class="<?php if (MODULE_NAME == 'Set' && ACTION_NAME == 'bonus') {echo 'active';} ?>">
				<a href="index.html"><i class="fa fa-gear"></i> <span class="nav-label">系统设置</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">

					<?php if(in_array("奖金设置", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Set' && ACTION_NAME == 'bonus') {echo 'active bcolor';} ?>">
						<a href="__APP__/Set/bonus">奖金设置</a>
					</li>
					<?php } ?>
					<!-- <li class="<?php if (MODULE_NAME == 'Set' && ACTION_NAME == 'plan') {echo 'active';} ?>">
						<a href="__APP__/Set/plan">计划任务</a>
					</li>
					<li class="<?php if (MODULE_NAME == 'Set' && ACTION_NAME == 'bonus') {echo 'active';} ?>">
						<a href="__APP__/Set/bonus">奖金设置</a>
					</li>
					<li class="<?php if (MODULE_NAME == 'Set' && ACTION_NAME == 'set') {echo 'active';} ?>">
						<a href="__APP__/Set/set">系统设置</a>
					</li> -->
				</ul>
			</li>
			<?php } ?>


			<?php if(in_array("商城", $_SESSION['Rongzi']['adminauth'])){ ?>
			<li class="<?php if (MODULE_NAME == 'Products' || MODULE_NAME == 'Orders') {echo 'active';} ?>">
				<a href="index.html"><i class="fa fa-shopping-cart"></i> <span class="nav-label">商城</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">

					<?php if(in_array("商品列表", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Products' && ACTION_NAME == 'index') {echo 'active bcolor';} ?>">
						<a href="__APP__/Products/index">商品列表</a>
					</li>
					<?php } ?>

					<?php if(in_array("待发货订单", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Orders' && ACTION_NAME == 'wait') {echo 'active bcolor';} ?>">
						<a href="__APP__/Orders/wait">待发货订单</a>
					</li>
					<?php } ?>

					<?php if(in_array("已发货订单", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Orders' && ACTION_NAME == 'sent') {echo 'active bcolor';} ?>">
						<a href="__APP__/Orders/sent">已发货订单</a>
					</li>
					<?php } ?>

					<?php if(in_array("已签收订单", $_SESSION['Rongzi']['adminauth'])){ ?>
					<li class="<?php if (MODULE_NAME == 'Orders' && ACTION_NAME == 'sign') {echo 'active bcolor';} ?>">
						<a href="__APP__/Orders/sign">已签收订单</a>
					</li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
			<!-- <li>
				<a href="index.html#"><i class="fa fa fa-globe"></i> <span class="nav-label">v2.0新增</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="toastr_notifications.html">Toastr通知</a>
					</li>
					<li><a href="nestable_list.html">嵌套列表</a>
					</li>
					<li><a href="timeline_v2.html">时间轴</a>
					</li>
					<li><a href="forum_main.html">论坛</a>
					</li>
					<li><a href="code_editor.html">代码编辑器</a>
					</li>
					<li><a href="modal_window.html">模态窗口</a>
					</li>
					<li><a href="validation.html">表单验证</a>
					</li>
					<li><a href="tree_view_v2.html">树形视图</a>
					</li>
					<li><a href="chat_view.html">聊天窗口</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="index.html#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">图表</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="graph_echarts.html">百度ECharts</a>
					</li>
					<li><a href="graph_flot.html">Flot</a>
					</li>
					<li><a href="graph_morris.html">Morris.js</a>
					</li>
					<li><a href="graph_rickshaw.html">Rickshaw</a>
					</li>
					<li><a href="graph_peity.html">Peity</a>
					</li>
					<li><a href="graph_sparkline.html">Sparkline</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">信箱 </span><span class="label label-warning pull-right">16</span></a>
				<ul class="nav nav-second-level">
					<li><a href="mailbox.html">收件箱</a>
					</li>
					<li><a href="mail_detail.html">查看邮件</a>
					</li>
					<li><a href="mail_compose.html">写信</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">小工具</span></a>
			</li>
			<li>
				<a href="index.html#"><i class="fa fa-edit"></i> <span class="nav-label">表单</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="form_basic.html">基本表单</a>
					</li>
					<li><a href="form_validate.html">表单验证</a>
					</li>
					<li><a href="form_advanced.html">高级插件</a>
					</li>
					<li><a href="form_wizard.html">步骤条</a>
					</li>
					<li><a href="form_webuploader.html">百度WebUploader</a>
					</li>
					<li><a href="form_file_upload.html">文件上传</a>
					</li>
					<li><a href="form_editors.html">富文本编辑器</a>
					</li>
					<li><a href="form_simditor.html">simditor</a>
					</li>
					<li><a href="form_avatar.html">头像裁剪上传</a>
					</li>
					<li><a href="layerdate.html">日期选择器layerDate</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="index.html#"><i class="fa fa-desktop"></i> <span class="nav-label">页面</span></a>
				<ul class="nav nav-second-level">
					<li><a href="contacts.html">联系人</a>
					</li>
					<li><a href="profile.html">个人资料</a>
					</li>
					<li><a href="projects.html">项目</a>
					</li>
					<li><a href="project_detail.html">项目详情</a>
					</li>
					<li><a href="file_manager.html">文件管理器</a>
					</li>
					<li><a href="calendar.html">日历</a>
					</li>
					<li><a href="faq.html">帮助中心</a>
					</li>
					<li><a href="timeline.html">时间轴</a>
					</li>
					<li><a href="pin_board.html">标签墙</a>
					</li>
					<li><a href="invoice.html">单据</a>
					</li>
					<li><a href="login.html">登录</a>
					</li>
					<li><a href="register.html">注册</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="index.html#"><i class="fa fa-files-o"></i> <span class="nav-label">其他页面</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="search_results.html">搜索结果</a>
					</li>
					<li><a href="lockscreen.html">登录超时</a>
					</li>
					<li><a href="404.html">404页面</a>
					</li>
					<li><a href="500.html">500页面</a>
					</li>
					<li><a href="empty_page.html">空白页</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="index.html#"><i class="fa fa-flask"></i> <span class="nav-label">UI元素</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="typography.html">排版</a>
					</li>
					<li><a href="icons.html">字体图标</a>
					</li>
					<li><a href="iconfont.html">阿里巴巴矢量图标库</a>
					</li>
					<li><a href="draggable_panels.html">拖动面板</a>
					</li>
					<li><a href="buttons.html">按钮</a>
					</li>
					<li><a href="tabs_panels.html">选项卡 & 面板</a>
					</li>
					<li><a href="notifications.html">通知 & 提示</a>
					</li>
					<li><a href="badges_labels.html">徽章，标签，进度条</a>
					</li>
					<li><a href="layer.html">Web弹层组件layer</a>
					</li>
					<li><a href="tree_view.html">树形视图</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">栅格</span></a>
			</li>
			<li>
				<a href="index.html#"><i class="fa fa-table"></i> <span class="nav-label">表格</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="table_basic.html">基本表格</a>
					</li>
					<li><a href="table_data_tables.html">数据表格(DataTables)</a>
					</li>
					<li><a href="table_jqgrid.html">jqGrid</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="index.html#"><i class="fa fa-picture-o"></i> <span class="nav-label">图库</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="basic_gallery.html">基本图库</a>
					</li>
					<li><a href="carousel.html">图片切换</a>
					</li>

				</ul>
			</li>
			<li>
				<a href="index.html#"><i class="fa fa-sitemap"></i> <span class="nav-label">菜单 </span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="index.html#">三级菜单 <span class="fa arrow"></span></a>
						<ul class="nav nav-third-level">
							<li>
								<a href="index.html#">三级菜单 01</a>
							</li>
							<li>
								<a href="index.html#">三级菜单 01</a>
							</li>
							<li>
								<a href="index.html#">三级菜单 01</a>
							</li>

						</ul>
					</li>
					<li><a href="index.html#">二级菜单</a>
					</li>
					<li>
						<a href="index.html#">二级菜单</a>
					</li>
					<li>
						<a href="index.html#">二级菜单</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="webim.html"><i class="fa fa-comments"></i> <span class="nav-label">即时通讯</span><span class="label label-danger pull-right">New</span></a>
			</li>
			<li>
				<a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS动画</span></a>
			</li>
			<li>
				<a href="index.html#"><i class="fa fa-cutlery"></i> <span class="nav-label">工具 </span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="form_builder.html">表单构建器</a>
					</li>
				</ul>
			</li> -->
		</ul>

	</div>
</nav>

        <div id="page-wrapper" class="white-bg dashbard-1">
            <div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <ul class="nav navbar-top-links navbar-right" >
        <li >
            <span class="m-r-sm text-muted welcome-message"  style="color:#ffffff !important;">
            <strong class="font-bold">欢迎<?php echo $_SESSION['Rongzi']['admin']['name'];?></strong>销费商
            <a href="__APP__" title="返回首页"  style="color:#ffffff !important;"><i class="fa fa-home"></i></a></span>
        </li>
        <li>
            <a href="__APP__/Login/logout"  style="color:#ffffff !important;">
                <i class="fa fa-sign-out"></i> 退出
            </a>
        </li>
    </ul>

</nav>

            </div>

<link href="__PUBLIC__/css/plugins/iCheck/custom.css" rel="stylesheet">

<script type="text/javascript" charset="utf-8" src="__PUBLIC__/uedit/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/uedit/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/uedit/lang/zh-cn/zh-cn.js"></script>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<ol class="breadcrumb">
			<a href="__URL__"><i class="fa fa-home"></i></a>
            <li>
                <a href="__URL__">首页</a>
            </li>
            <li>
                <a>新闻公告</a>
            </li>
            <li>
                <strong>公司新闻</strong>
            </li>
        </ol>
	</div>
</div>
<div class="wrapper wrapper-content animated">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="text-center">编辑新闻</h5>

                </div>
                <div class="ibox-content">
					<form class="form-horizontal m-t" id="signupForm" method="post" action="__ACTION__">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">*标题:</label>
                            <div class="col-sm-6">
                                <input id="title" name="title" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" value="<?php echo ($result["title"]); ?>">
                                <input type="hidden" name="form_key" value="yes" />
                                <input type="hidden" name="id" value="<?php echo ($result["id"]); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">*类型:</label>
                            <div class="col-sm-6">
                                <label class="checkbox-inline"><input type="radio" name="type" value="1" id="inlineCheckbox1" checked> 公共</label>
                            </div>
                        </div>

						<div class="form-group">
							<label class="col-sm-3 control-label">*优先级:</label>
							<div class="col-sm-6">
								<input id="level" name="level" class="form-control" type="text" value="<?php echo ($result["level"]); ?>">
							</div>
						</div>

						<div class="form-group">
                            <label class="col-sm-3 control-label">*新闻内容:</label>
                            <div class="col-sm-6">
                                <!-- <textarea name="content" rows="8" cols="40" class="form-control"><?php echo ($result["content"]); ?></textarea> -->
                                <div class="ibox-content gray-bg">

									<script id="container" name="content" type="text/plain">
									  <?php echo ($result["content"]); ?>
								  	</script>
                                </div>
                            </div>
                        </div>
                        <!-- <textarea name="content" rows="8" cols="40" class="content_code" style="display:none">

                        </textarea> -->
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit" onclick="save()">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
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

<!-- jQuery Validation plugin javascript-->
<script src="__PUBLIC__/js/plugins/validate/jquery.validate.min.js"></script>
<script src="__PUBLIC__/js/plugins/validate/messages_zh.min.js"></script>
<script src="__PUBLIC__/js/plugins/summernote/summernote.min.js"></script>
<script src="__PUBLIC__/js/plugins/summernote/summernote-zh-CN.js"></script>
<script>
    $(document).ready(function () {

        // $('.summernote').summernote({
        //     lang: 'zh-CN'
        // });
    });
    // var edit = function () {
    //     $("#eg").addClass("no-padding");
    //     $('.click2edit').summernote({
    //         lang: 'zh-CN',
    //         focus: true
    //     });
    // };
    var save = function () {
        var aHTML = $('.summernote').code(); //save HTML If you need(aHTML: array).
        $('.content_code').val(aHTML)
    };

</script>
<script>
   //以下为修改jQuery Validation插件兼容Bootstrap的方法，没有直接写在插件中是为了便于插件升级
   // $.validator.setDefaults({
   //  highlight: function (element) {
   //   $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
   //  },
   //  success: function (element) {
   //   element.closest('.form-group').removeClass('has-error').addClass('has-success');
   //  },
   //  errorElement: "span",
   //  errorClass: "help-block m-b-none",
   //  validClass: "help-block m-b-none"
   //
   //
   // });

	//以下为官方示例
   $().ready(function () {
	   // validate signup form on keyup and submit
	   $("#signupForm").validate({
		   rules: {
			   title: {
				   required: true
			   },
			   type: {
				   required: true,
			   },
			   level: {
				   required: true
			   },
			   agree: "required"
		   },
		   messages: {

		   }
	   });



   });
</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	var editor = UE.getEditor('container');

    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>