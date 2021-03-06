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
                <a>群邀请活动管理</a>
            </li>
            <li>
                <strong>修改</strong>
            </li>
        </ol>
	</div>
</div>
<div class="wrapper wrapper-content animated">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="text-center">修改</h5>

                </div>
                <div class="ibox-content">
					<form class="form-horizontal m-t" id="signupForm" method="post" action="__ACTION__">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">标题:</label>
                            <div class="col-sm-6">
                                <input id="title" name="title" value="<?php echo ($result['title']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                                <input type="hidden" name="form_key" value="yes" />
                                <input type="hidden" name="chat_id" value="<?php echo ($result['chat_id']); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">标题en:</label>
                            <div class="col-sm-6">
                                <input id="en_title" name="en_title" value="<?php echo ($result['en_title']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">LOGO:</label>
                            <div class="col-sm-6">
                                <input id="logo" name="logo" value="<?php echo ($result['logo']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">活动开始时间:</label>
                            <div class="col-sm-6">
                                <input id="started_at" name="started_at" value="<?php echo (date("Y-m-d",$result['started_at'])); ?>" class="form_datetime form-control" data-date="" data-date-format="yyyy-mm-dd" >

                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-3 control-label">活动结束时间:</label>
                            <div class="col-sm-6">
                                <input id="stoped_at" name="stoped_at" value="<?php echo (date("Y-m-d",$result['stoped_at'])); ?>" class="form_datetime form-control" data-date="" data-date-format="yyyy-mm-dd" >

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">加入群文案:</label>
                            <div class="col-sm-6">
                                <input id="join_button_text" name="join_button_text" value="<?php echo ($result['join_button_text']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">加入群文案en:</label>
                            <div class="col-sm-6">
                                <input id="en_join_button_text" name="en_join_button_text" value="<?php echo ($result['en_join_button_text']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">群聊:</label>
                            <div class="col-sm-6">
                                <input id="chat_id" name="chat_id" value="<?php echo ($result['chat_id']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">类型:</label>
                            <div class="col-sm-6">
                                <input id="type" name="type" value="<?php echo ($result['type']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="col-sm-3 control-label">描述:</label>
                            <div class="col-sm-6">
                                <textarea name="message" rows="8" cols="80" id="message" class="form-control" aria-required="true" aria-invalid="true" class="error"><?php echo ($result['message']); ?></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">描述en:</label>
                            <div class="col-sm-6">
                                <textarea name="en_message" rows="8" cols="80" id="en_message" class="form-control" aria-required="true" aria-invalid="true" class="error"><?php echo ($result['en_message']); ?></textarea>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">规则:</label>
                            <div class="col-sm-6">
                                <textarea name="rule" rows="8" cols="80" id="rule" class="form-control" aria-required="true" aria-invalid="true" class="error"><?php echo ($result['rule']); ?></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">规则en:</label>
                            <div class="col-sm-6">
                                <textarea name="en_rule" rows="8" cols="80" id="en_rule" class="form-control" aria-required="true" aria-invalid="true" class="error"><?php echo ($result['en_rule']); ?></textarea>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">底部文案:</label>
                            <div class="col-sm-6">
                                <input id="bottom_text" name="bottom_text" value="<?php echo ($result['bottom_text']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">底部文案en:</label>
                            <div class="col-sm-6">
                                <input id="en_bottom_text" name="en_bottom_text" value="<?php echo ($result['en_bottom_text']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">底部文案跳转地址:</label>
                            <div class="col-sm-6">
                                <input id="bottom_text_url" name="bottom_text_url" value="<?php echo ($result['bottom_text_url']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">邀请奖励:</label>
                            <div class="col-sm-6">
                                <input id="rate" name="rate" value="<?php echo ($result['rate']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">邀请奖励单位:</label>
                            <div class="col-sm-6">
                                <input id="rate_unit" name="rate_unit" value="<?php echo ($result['rate_unit']); ?>" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">活动结束文案:</label>
                            <div class="col-sm-6">
                                <textarea name="activity_end_text" rows="8" cols="80" id="activity_end_text" class="form-control" aria-required="true" aria-invalid="true" class="error"><?php echo ($result['activity_end_text']); ?></textarea>
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

</script>
<script src="__PUBLIC__/js/bootstrap-datetimepicker.min.js"></script>
<script src="__PUBLIC__/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script type="text/javascript">
$('.form_datetime').datetimepicker({
     language:  'zh-CN',
     format: 'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 4,
        forceParse: 0
 });
</script>

<script>


	//以下为官方示例
   $().ready(function () {
	   // validate signup form on keyup and submit
	   $("#signupForm").validate({
		   rules: {
			   cmd: {
				   required: true
			   },
               type: {
				   required: true
			   },
               content: {
				   required: true
			   },
			   // chat_id: {
				//    required: true,
			   // },
			   // master_id: {
				//    required: true
			   // },
			   // code_cmd: "required"
		   },
		   messages: {

		   }
	   });
   });
</script>