<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0051)http://www.sss.run/dashboard/?code=4d51c4fbf98adf28 -->
<html data-dpr="2" style="font-size: 37.5px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?php echo ($group_activity['title']); ?></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="__PUBLIC__/telegram/bootstrap.min.css">
    <script src="__PUBLIC__/telegram/hm.js"></script><script src="__PUBLIC__/telegram/flexible_css.js"></script><style>@charset "utf-8";html{color:#000;background:#fff;overflow-y:scroll;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}html *{outline:0;-webkit-text-size-adjust:none;-webkit-tap-highlight-color:rgba(0,0,0,0)}html,body{font-family:sans-serif}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td,hr,button,article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{margin:0;padding:0}input,select,textarea{font-size:100%}table{border-collapse:collapse;border-spacing:0}fieldset,img{border:0}abbr,acronym{border:0;font-variant:normal}del{text-decoration:line-through}address,caption,cite,code,dfn,em,th,var{font-style:normal;font-weight:500}ol,ul{list-style:none}caption,th{text-align:left}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:500}q:before,q:after{content:''}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}a:hover{text-decoration:underline}ins,a{text-decoration:none}</style>
    <script src="__PUBLIC__/telegram/flexible.js"></script>
    <link rel="icon" href="http://www.sss.run/static/index//assets/img/logo/logo.ico">
    <link rel="stylesheet" href="__PUBLIC__/telegram/dashboard.css">
<link rel="stylesheet" href="__PUBLIC__/telegram/layer.css" id="layuicss-layer"><link type="text/css" rel="stylesheet" href="chrome-extension://gdahdckfamodilgodnphjbihfhghkdag/style.css"><link type="text/css" rel="stylesheet" href="chrome-extension://gdahdckfamodilgodnphjbihfhghkdag/content.css"><script type="text/javascript" charset="utf-8" src="chrome-extension://gdahdckfamodilgodnphjbihfhghkdag/page_context.js"></script></head>

<body duitang_screen_capture_injected="true" style="font-size: 24px;">
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-right lang-box">
            <a href="__APP__/Index/dashboard/<?php echo ($code); ?>?lang=en" class="lang">English</a>
        </div>
        <div class="col-sm-12 text-center">
            <img class="logo" src="<?php echo ($group_activity['logo']); ?>" alt="">
        </div>

        <?php if($activity_status == -1): ?><div class="col-sm-12 text-center">
                <a href="<?php echo ($group_activity['join_button_url']); ?>" class="join border-radius"><?php echo ($group_activity['join_button_text']); ?></a>
            </div>
    		<div class="col-sm-12 text-center" stye="">
                    <p class="desc"><?php echo ($group_activity['message']); ?></p>
                    <p class="desc">如果您對奖励的 <?php echo ($group_activity['rate_unit']); ?> 數量正確性有疑問，請<a href="<?php echo ($group_activity['join_button_url']); ?>"><u>Telegram</u></a>联系客服，我們工作人員會核實數據。</p>
           </div>

       <?php else: ?>

            <div class="col-sm-12 text-center">
                <p class="desc">每邀请一个好友加入，你将额外获得 <?php echo ($group_activity['rate']); ?> 个 <?php echo ($group_activity['rate_unit']); ?></p>
            </div>
            <div class="col-sm-12 text-left">
                <p class="text-left">1. 点击以下按钮加入 <?php echo ($group_activity['rate_unit']); ?>，在活动结束之后，我们会验证 Telegram 的群组，只有还在群里的有效用户才会发放奖励</p>
                <a href="<?php echo ($group_activity['join_button_url']); ?>" class="join border-radius text-nowrap">加入 <?php echo ($group_activity['rate_unit']); ?> 电报群</a>
            </div>
            <div class="col-sm-12 text-center">
                <p class="text-left">2. 把以下验证码复制粘贴发送到 <?php echo ($group_activity['rate_unit']); ?> 电报群里（必须）</p>
                <div class="input-box">
                    <input class="address border-radius text-center" value="/<?php echo ($chat_bot['code_cmd']); echo ($code); ?>"/>
                    <a href="javascript:void(0);" class="copy text-center copy-btn" data-clipboard-action="copy" data-clipboard-target=".address">复制</a>
                </div>
            </div>
            <div class="col-sm-12 text-left">
                <p class="text-left">3. 把以下链接分享给好友，每推荐一个好友入群成功，即可获得<?php echo ($group_activity['rate']); ?> 个 <?php echo ($group_activity['rate_unit']); ?>！</p>
                <div class="input-box">
                    <input class="submit border-radius" value="http://xxxxxx/?<?php echo ($chat_bot['code_cmd']); ?>=<?php echo ($code); ?>"/>
                    <a href="javascript:void(0);"  class="copy text-center copy-btn" data-clipboard-action="copy" data-clipboard-target=".submit">复制</a>
                </div>
            </div><?php endif; ?>

        <div class="col-sm-6 text-center">
            <div class="data-box">
                <p>已成功邀请人数</p>
                <h3><?php echo ($code_count); ?></h3>
            </div>
        </div>
        <div class="col-sm-6 text-center">
            <div class="data-box">
                <p>已赚取 <?php echo ($group_activity['rate_unit']); ?></p>
                <h3><?php echo ($code_rate); ?></h3>
            </div>
        </div>
        <div class="col-sm-12 text-center link-box">
           <a class="link" href="<?php echo ($group_activity['bottom_text_url']); ?>"><?php echo ($group_activity['bottom_text']); ?></a>
        </div>
    </div>
</div>
<script src="__PUBLIC__/telegram/jquery-3.2.1.min.js"></script>
<script src="__PUBLIC__/telegram/bootstrap.min.js"></script>
<script src="__PUBLIC__/telegram/clipboard.js"></script>
<script src="__PUBLIC__/telegram/layer.js"></script>
<script>
var clipboard = new Clipboard('.copy-btn');

clipboard.on('success', function(e) {
    layer.msg("Successful replication!", {
        shade: [0.8, '#000'],
        time: 1000
    });
});

clipboard.on('error', function(e) {
    layer.msg("Replication failed!", {
        shade: [0.8, '#000'],
        time: 1000
    });
});
</script>
<!--baidu-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?237ad81b4d99913c9d27c8cf8c47bcf2";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--baidu-->



<div id="duitang-collect-box" style="position: fixed; height: 298px; width: 656px; top: 100px; left: auto; right: -656px;"><div id="duitang-collect-wrdiv"> <a id="duitang-collect-close" href="javascript:;" target="_self">关闭</a> <div id="duitang-collect-left"></div> <div id="duitang-collect-right" class=""> <form enctype="multipart/form-data" method="post" name="fileinfo"></form> <div id="duitang-collect-succmess" class="duitang-collect-board"></div> <div class="duitang-collect-board"><a id="duitang-collect-temaihui" href="javascript:;" target="_blank" style="display:none">发布到特卖惠</a><br><a href="http://www.duitang.com/myhome/" target="_blank">去我的堆糖看看</a><br><a id="duitang-collect-continue" href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" target="_self">&gt;&gt;收起</a></div> <div id="duitang-collect-tips"><span id="duitang-collect-wx" style="display: inline;">温馨提示：</span><span id="duitang-collect-randtip">可以使用快捷键进行操作哦</span></div> <b>专辑</b><div class="duitang-collect-rdiv" id="duitang-collect-albumsel" style="display:block !important;"><input id="duitang-collect-album" type="hidden" value="0"><a href="javascript:;" id="duitang-collect-albumtrig">默认专辑</a><div id="duitang-collect-usetag" class="duitang_collect_clr"> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">家居</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">设计</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">插画</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">电影</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">旅行</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">手工</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">女装</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">男装</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">配饰</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">美食</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">摄影</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">艺术</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">动漫</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">人物</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">封面</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">怀旧</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">街拍</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">小孩</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">宠物</a> <a href="http://www.sss.run/dashboard/?code=4d51c4fbf98adf28#" class="">植物</a></div><div id="duitang-collect-myalbums-wrap" style="display: none;"><div id="duitang-collect-myalbums-albs"><a data-albumid="0" href="javascript:;">默认专辑</a></div><div class="duitang_collect_clr"><form id="duitang-collect-createalbum" action="http://www.duitang.com/album/add/" method="post"><input type="text" id="duitang_collect_tags" value="" name="name" class="duitang_collect_ipt" maxlength="40"><a id="duitang-collect-createsub" target="_self" href="javascript:;" class="duitang-collect-sub"><button type="submit"><u>创建</u></button></a></form></div></div></div> <b>描述</b><p><textarea id="duitang-collect-msg" maxlength="300"></textarea></p><b id="duitang-collect-tagslb">标签</b><div id="duitang-collect-tagsp" class="duitang-collect-rdiv"><input id="duitang-collect-tags" class="duitang_collect_ipt" value="" maxlength="40"></div><b>&nbsp;</b><div id="duitang-collect-subarea"><input type="hidden" id="duitang-collect-lnktt" value=""><input type="hidden" id="duitang-collect-lnk" value=""><a id="duitang-collect-post" class="duitang-collect-sub" href="javascript:;"><button type="submit"><u>收集</u></button></a><input id="duitang-collect-sycn-sina" type="checkbox" value="sina" name="syncpost" style="display: none;"><label id="duitang-collect-lb-sina" title="同步到新浪微博" for="duitang-collect-sycn-sina" style="display: none;">同步</label><div id="duitang-collect-mbsite-sina" style="display: none;">新浪</div><div id="duitang-collect-postst" class=""></div></div><div class="duitang-collect-currentuser">收集者：<a href="http://www.duitang.com/myhome/" target="_blank" id="duitang-collect-currentuser">Hami小熊</a></div> </div> </div></div></body></html>