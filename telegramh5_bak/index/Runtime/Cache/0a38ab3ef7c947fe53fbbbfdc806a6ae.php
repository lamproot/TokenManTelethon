<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0019)http://www.sss.run/ -->
<html data-dpr="2" style="font-size: 37.5px;">

    <head lang="zh">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo ($group_activity['en_title']); ?></title>
        <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <link rel="stylesheet" href="__PUBLIC__/telegram/bootstrap.min.css">
        <script src="__PUBLIC__/telegram/hm.js"></script>
        <script src="__PUBLIC__/telegram/flexible_css.js"></script>
        <style>@charset "utf-8";html{color:#000;background:#fff;overflow-y:scroll;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}html *{outline:0;-webkit-text-size-adjust:none;-webkit-tap-highlight-color:rgba(0,0,0,0)}html,body{font-family:sans-serif}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td,hr,button,article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{margin:0;padding:0}input,select,textarea{font-size:100%}table{border-collapse:collapse;border-spacing:0}fieldset,img{border:0}abbr,acronym{border:0;font-variant:normal}del{text-decoration:line-through}address,caption,cite,code,dfn,em,th,var{font-style:normal;font-weight:500}ol,ul{list-style:none}caption,th{text-align:left}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:500}q:before,q:after{content:''}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}a:hover{text-decoration:underline}ins,a{text-decoration:none}</style>
        <script src="__PUBLIC__/telegram/flexible.js"></script>
        <link rel="icon" href="http://www.sss.run/static/index//assets/img/logo/logo.ico">
        <link rel="stylesheet" href="__PUBLIC__/telegram/ladda-themeless.min.css">
        <link rel="stylesheet" href="__PUBLIC__/telegram/index.css">
        <style>input::-webkit-input-placeholder { /* placeholder颜色 */ color: #ffffff; /* placeholder字体大小 */ font-size: 20px; /* placeholder位置 */ text-align: left; } input { border: 1px solid red; }</style>
        <style type="text/css"></style>
        <link rel="stylesheet" href="__PUBLIC__/telegram/layer.css" id="layuicss-layer">
        <link type="text/css" rel="stylesheet" href="chrome-extension://gdahdckfamodilgodnphjbihfhghkdag/style.css">
        <link type="text/css" rel="stylesheet" href="chrome-extension://gdahdckfamodilgodnphjbihfhghkdag/content.css">
        <script type="text/javascript" charset="utf-8" src="chrome-extension://gdahdckfamodilgodnphjbihfhghkdag/page_context.js"></script>
    </head>

    <body style="font-size: 24px;" duitang_screen_capture_injected="true">
        <div class="container">
            <form class="row">
                <div class="col-sm-12 text-right lang-box">
                    <a href="javascript:void(0);" class="lang">中文</a></div>
                <div class="col-sm-12 text-center">
                    <img class="logo" src="<?php echo ($group_activity['logo']); ?>" alt=""></div>
                <div class="col-sm-12 text-center">
                    <a href="<?php echo ($group_activity['join_button_url']); ?>" class="join border-radius" style="text-decoration:none;"><?php echo ($group_activity['en_join_button_text']); ?></a></div>
                <div class="col-sm-12 text-center">
                    <p class="desc"><?php echo ($group_activity['en_message']); ?></p>
                    <!-- <p class="desc">每邀请一个好友加入，你将额外获得 <strong style="font-size: 1.5em"><?php echo ($group_activity['rate']); ?></strong> 个 <?php echo ($group_activity['rate_unit']); ?>，邀请越多，奖励越多，赶快行动!</p> -->
                </div>
                <input name="wallet" class="address border-radius text-center" placeholder="请输入你的 ETH 钱包地址">
                <input type="hidden" name="code" value="<?php echo ($code); ?>">
                <input type="hidden" name="token" value="<?php echo ($chat_bot['token']); ?>"></div>
                <input type="hidden" name="chat_id" value="<?php echo ($chat_bot['chat_id']); ?>"></div>
                <div class="col-sm-12 text-center">
                    <button type="button" href="javascript:void(0);" class="submit border-radius text-center ladda-button" data-style="zoom-in">
                        <span class="ladda-label">Submit</span></button>
                </div>
                <!-- <div class="col-sm-12 text-center rule-box">
                    <a class="link" href="http://www.sss.run/rule.html?lang=zh">
                        <u>活动详情</u>
                    </a>
                </div> -->
                <div class="col-sm-12 text-center link-box">
                    <a class="link">Due to regulatory reasons, we will not accept participants from People's Republic of China, United States, New Zealand, Canada, South Korea, and OFAC sanctioned countries ( please see list here:</a>
                    <a href="https://www.treasury.gov/resource-center/sanctions/Programs/Pages/Programs.aspx" class="link">
                        <u>OFAC</u>)</a>
                </div>
                <div class="col-sm-12 text-center link-box">
                    <a class="link" href="<?php echo ($group_activity['bottom_text_url']); ?>"><?php echo ($group_activity['en_bottom_text']); ?></a></div>
            </form>
        </div>
        <script src="__PUBLIC__/telegram/web3.min.js"></script>
        <script src="__PUBLIC__/telegram/jquery-3.2.1.min.js"></script>
        <script src="__PUBLIC__/telegram/bootstrap.min.js"></script>
        <script src="__PUBLIC__/telegram/spin.min.js"></script>
        <script src="__PUBLIC__/telegram/ladda.min.js"></script>
        <script src="__PUBLIC__/telegram/layer.js"></script>
        <script>$(function() {
                $('.submit').click(function() {
                    if ($(this).prop("disabled")) {
                        return false;
                    }
                    var ladda, data = {},
                    _this = this;
                    $.each($('form').serializeArray(),
                    function() {
                        data[this.name] = this.value;
                    });
                    $.ajax({
                        type: "post",
                        url: "__APP__/Api/code",
                        data: data,
                        timeout: 30000,
                        beforeSend: function() {
                            if (!data.wallet) {
                                layer.msg('The address of the wallet can not be empty!', {
                                    shade: [0.8, '#000'],
                                    time: 1500
                                });
                                return false;
                            } else if (!Web3.utils.isAddress(data.wallet)) {
                                layer.msg('The address of the wallet is invalid!', {
                                    shade: [0.8, '#000'],
                                    time: 1500
                                });
                                return false;
                            } else {
                                ladda = Ladda.create(_this);
                                ladda.start();
                            }
                        },
                        dataType: 'json'
                    }).done(function(res) {
                        if (res && res.success) {
                            window.location.href = '/Index/dashboard/' + res.code;
                        } else {
                            if (ladda) {
                                ladda.stop();
                            }
                            var msg = '';
                            if (res.code == 101) {
                                msg = 'The address of the wallet is invalid!';
                            } else {
                                msg = 'The system is busy, please try again later!'
                            }
                            layer.msg(msg, {
                                shade: [0.8, '#000'],
                                time: 1500
                            });
                        }
                    });
                });

                $('.lang').click(function() {
                    location.href = location.protocol + '//' + location.host + location.pathname + '?lang=ch' + ('' ? '&code=': '')
                });
            });</script>
        <!--baidu-->
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?237ad81b4d99913c9d27c8cf8c47bcf2";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
        <!--baidu-->

    </body>

</html>