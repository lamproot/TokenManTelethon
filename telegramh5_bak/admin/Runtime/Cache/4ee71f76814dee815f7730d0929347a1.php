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
						   <span><img alt="image" class="img-circle" src="img/profile_small.jpg" /></span>
						   <a data-toggle="dropdown" class="dropdown-toggle" href="#">
							   <span class="clear">
							  <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
							   <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
							   </span>
						   </a>
						   <ul class="dropdown-menu animated fadeInRight m-t-xs">
							   <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
							   </li>
							   <li><a class="J_menuItem" href="profile.html">个人资料</a>
							   </li>
							   <li><a class="J_menuItem" href="contacts.html">联系我们</a>
							   </li>
							   <li><a class="J_menuItem" href="mailbox.html">信箱</a>
							   </li>
							   <li class="divider"></li>
							   <li><a href="login.html">安全退出</a>
							   </li>
						   </ul>
					   </div>
					   <div class="logo-element">H+
					   </div>
				   </li>
				   <li>
					   <a href="#">
						   <i class="fa fa-home"></i>
						   <span class="nav-label">主页</span>
						   <span class="fa arrow"></span>
					   </a>
					   <ul class="nav nav-second-level">
						   <li>
							   <a class="J_menuItem" href="index_v1.html" data-index="0">主页示例一</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="index_v2.html">主页示例二</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="index_v3.html">主页示例三</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="index_v4.html">主页示例四</a>
						   </li>
						   <li>
							   <a href="index_v5.html" target="_blank">主页示例五</a>
						   </li>
					   </ul>

				   </li>
				   <li>
					   <a class="J_menuItem" href="layouts.html"><i class="fa fa-columns"></i> <span class="nav-label">布局</span></a>
				   </li>
				   <li>
					   <a href="#">
						   <i class="fa fa fa-bar-chart-o"></i>
						   <span class="nav-label">统计图表</span>
						   <span class="fa arrow"></span>
					   </a>
					   <ul class="nav nav-second-level">
						   <li>
							   <a class="J_menuItem" href="graph_echarts.html">百度ECharts</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="graph_flot.html">Flot</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="graph_morris.html">Morris.js</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="graph_rickshaw.html">Rickshaw</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="graph_peity.html">Peity</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="graph_sparkline.html">Sparkline</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="graph_metrics.html">图表组合</a>
						   </li>
					   </ul>
				   </li>

				   <li>
					   <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">信箱 </span><span class="label label-warning pull-right">16</span></a>
					   <ul class="nav nav-second-level">
						   <li><a class="J_menuItem" href="mailbox.html">收件箱</a>
						   </li>
						   <li><a class="J_menuItem" href="mail_detail.html">查看邮件</a>
						   </li>
						   <li><a class="J_menuItem" href="mail_compose.html">写信</a>
						   </li>
					   </ul>
				   </li>
				   <li>
					   <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">表单</span><span class="fa arrow"></span></a>
					   <ul class="nav nav-second-level">
						   <li><a class="J_menuItem" href="form_basic.html">基本表单</a>
						   </li>
						   <li><a class="J_menuItem" href="form_validate.html">表单验证</a>
						   </li>
						   <li><a class="J_menuItem" href="form_advanced.html">高级插件</a>
						   </li>
						   <li><a class="J_menuItem" href="form_wizard.html">表单向导</a>
						   </li>
						   <li>
							   <a href="#">文件上传 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="form_webuploader.html">百度WebUploader</a>
								   </li>
								   <li><a class="J_menuItem" href="form_file_upload.html">DropzoneJS</a>
								   </li>
								   <li><a class="J_menuItem" href="form_avatar.html">头像裁剪上传</a>
								   </li>
							   </ul>
						   </li>
						   <li>
							   <a href="#">编辑器 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="form_editors.html">富文本编辑器</a>
								   </li>
								   <li><a class="J_menuItem" href="form_simditor.html">simditor</a>
								   </li>
								   <li><a class="J_menuItem" href="form_markdown.html">MarkDown编辑器</a>
								   </li>
								   <li><a class="J_menuItem" href="code_editor.html">代码编辑器</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="suggest.html">搜索自动补全</a>
						   </li>
						   <li><a class="J_menuItem" href="layerdate.html">日期选择器layerDate</a>
						   </li>
					   </ul>
				   </li>
				   <li>
					   <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">页面</span><span class="fa arrow"></span></a>
					   <ul class="nav nav-second-level">
						   <li><a class="J_menuItem" href="contacts.html">联系人</a>
						   </li>
						   <li><a class="J_menuItem" href="profile.html">个人资料</a>
						   </li>
						   <li>
							   <a href="#">项目管理 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="projects.html">项目</a>
								   </li>
								   <li><a class="J_menuItem" href="project_detail.html">项目详情</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="teams_board.html">团队管理</a>
						   </li>
						   <li><a class="J_menuItem" href="social_feed.html">信息流</a>
						   </li>
						   <li><a class="J_menuItem" href="clients.html">客户管理</a>
						   </li>
						   <li><a class="J_menuItem" href="file_manager.html">文件管理器</a>
						   </li>
						   <li><a class="J_menuItem" href="calendar.html">日历</a>
						   </li>
						   <li>
							   <a href="#">博客 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="blog.html">文章列表</a>
								   </li>
								   <li><a class="J_menuItem" href="article.html">文章详情</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="faq.html">FAQ</a>
						   </li>
						   <li>
							   <a href="#">时间轴 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="timeline.html">时间轴</a>
								   </li>
								   <li><a class="J_menuItem" href="timeline_v2.html">时间轴v2</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="pin_board.html">标签墙</a>
						   </li>
						   <li>
							   <a href="#">单据 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="invoice.html">单据</a>
								   </li>
								   <li><a class="J_menuItem" href="invoice_print.html">单据打印</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="search_results.html">搜索结果</a>
						   </li>
						   <li><a class="J_menuItem" href="forum_main.html">论坛</a>
						   </li>
						   <li>
							   <a href="#">即时通讯 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="chat_view.html">聊天窗口</a>
								   </li>
								   <li><a class="J_menuItem" href="webim.html">layIM</a>
								   </li>
							   </ul>
						   </li>
						   <li>
							   <a href="#">登录注册相关 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a href="login.html" target="_blank">登录页面</a>
								   </li>
								   <li><a href="login_v2.html" target="_blank">登录页面v2</a>
								   </li>
								   <li><a href="register.html" target="_blank">注册页面</a>
								   </li>
								   <li><a href="lockscreen.html" target="_blank">登录超时</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="404.html">404页面</a>
						   </li>
						   <li><a class="J_menuItem" href="500.html">500页面</a>
						   </li>
						   <li><a class="J_menuItem" href="empty_page.html">空白页</a>
						   </li>
					   </ul>
				   </li>
				   <li>
					   <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI元素</span><span class="fa arrow"></span></a>
					   <ul class="nav nav-second-level">
						   <li><a class="J_menuItem" href="typography.html">排版</a>
						   </li>
						   <li>
							   <a href="#">字体图标 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li>
									   <a class="J_menuItem" href="fontawesome.html">Font Awesome</a>
								   </li>
								   <li>
									   <a class="J_menuItem" href="glyphicons.html">Glyphicon</a>
								   </li>
								   <li>
									   <a class="J_menuItem" href="iconfont.html">阿里巴巴矢量图标库</a>
								   </li>
							   </ul>
						   </li>
						   <li>
							   <a href="#">拖动排序 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="draggable_panels.html">拖动面板</a>
								   </li>
								   <li><a class="J_menuItem" href="agile_board.html">任务清单</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="buttons.html">按钮</a>
						   </li>
						   <li><a class="J_menuItem" href="tabs_panels.html">选项卡 &amp; 面板</a>
						   </li>
						   <li><a class="J_menuItem" href="notifications.html">通知 &amp; 提示</a>
						   </li>
						   <li><a class="J_menuItem" href="badges_labels.html">徽章，标签，进度条</a>
						   </li>
						   <li>
							   <a class="J_menuItem" href="grid_options.html">栅格</a>
						   </li>
						   <li><a class="J_menuItem" href="plyr.html">视频、音频</a>
						   </li>
						   <li>
							   <a href="#">弹框插件 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="layer.html">Web弹层组件layer</a>
								   </li>
								   <li><a class="J_menuItem" href="modal_window.html">模态窗口</a>
								   </li>
								   <li><a class="J_menuItem" href="sweetalert.html">SweetAlert</a>
								   </li>
							   </ul>
						   </li>
						   <li>
							   <a href="#">树形视图 <span class="fa arrow"></span></a>
							   <ul class="nav nav-third-level">
								   <li><a class="J_menuItem" href="jstree.html">jsTree</a>
								   </li>
								   <li><a class="J_menuItem" href="tree_view.html">Bootstrap Tree View</a>
								   </li>
								   <li><a class="J_menuItem" href="nestable_list.html">nestable</a>
								   </li>
							   </ul>
						   </li>
						   <li><a class="J_menuItem" href="toastr_notifications.html">Toastr通知</a>
						   </li>
						   <li><a class="J_menuItem" href="diff.html">文本对比</a>
						   </li>
						   <li><a class="J_menuItem" href="spinners.html">加载动画</a>
						   </li>
						   <li><a class="J_menuItem" href="widgets.html">小部件</a>
						   </li>
					   </ul>
				   </li>
				   <li>
					   <a href="#"><i class="fa fa-table"></i> <span class="nav-label">表格</span><span class="fa arrow"></span></a>
					   <ul class="nav nav-second-level">
						   <li><a class="J_menuItem" href="table_basic.html">基本表格</a>
						   </li>
						   <li><a class="J_menuItem" href="table_data_tables.html">DataTables</a>
						   </li>
						   <li><a class="J_menuItem" href="table_jqgrid.html">jqGrid</a>
						   </li>
						   <li><a class="J_menuItem" href="table_foo_table.html">Foo Tables</a>
						   </li>
						   <li><a class="J_menuItem" href="table_bootstrap.html">Bootstrap Table
							   <span class="label label-danger pull-right">推荐</span></a>
						   </li>
					   </ul>
				   </li>
				   <li>
					   <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">相册</span><span class="fa arrow"></span></a>
					   <ul class="nav nav-second-level">
						   <li><a class="J_menuItem" href="basic_gallery.html">基本图库</a>
						   </li>
						   <li><a class="J_menuItem" href="carousel.html">图片切换</a>
						   </li>
						   <li><a class="J_menuItem" href="blueimp.html">Blueimp相册</a>
						   </li>
					   </ul>
				   </li>
				   <li>
					   <a class="J_menuItem" href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS动画</span></a>
				   </li>
				   <li>
					   <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">工具 </span><span class="fa arrow"></span></a>
					   <ul class="nav nav-second-level">
						   <li><a class="J_menuItem" href="form_builder.html">表单构建器</a>
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

<script type="text/javascript" charset="utf-8" src="__PUBLIC__/uedit/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/uedit/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/uedit/lang/zh-cn/zh-cn.js"></script>

<style type="text/css">
    div{
        width:100%;
    }
</style>
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
                    <h5 class="text-center">新增新闻</h5>

                </div>
                <div class="ibox-content">
					<form class="form-horizontal m-t" id="signupForm" method="post" action="__ACTION__">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">*标题:</label>
                            <div class="col-sm-6">
                                <input id="title" name="title" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                                <input type="hidden" name="form_key" value="yes" />
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
								<input id="level" name="level" class="form-control" type="text" value="1">
							</div>
						</div>

						<div class="form-group">
                            <label class="col-sm-3 control-label">*新闻内容:</label>
                            <div class="col-sm-6">
                                <!-- <textarea name="content" rows="8" cols="40" class="form-control"></textarea> -->
								<!-- 加载编辑器的容器 -->
							   <script id="container" name="content" type="text/plain">

							   </script>
                            </div>
                        </div>
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