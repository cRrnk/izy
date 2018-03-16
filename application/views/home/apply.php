<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 下午4:22
 */
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>链接收录申请 - 爱资源导航站</title>
    <link rel="shortcut icon" href="<?php echo base_url('statics/favicon.ico');?>">
    <meta name="keywords" content="izy123.com,链接收录申请,友情链接添加,留言板">
    <meta name="description" content="这是爱资源导航站一个用于提交网址链接收录的表单页面，也可以当中留言板使用">

    <style>
        *{margin: 0;padding: 0;}
        main{
            width: 960px;
            height: auto;
            margin: 0 auto;
            text-align: center;
        }
        .form_wrapper{
            margin:30px auto;
            width: 600px;
        }

        .form_wrapper .line{
            text-align: left;
            margin: 10px;
            border-bottom: 1px solid red;
        }

        .form_wrapper .line label,input{
            display: inline-block;
            width: 40%;
        }

        .form_wrapper .line input{
            border: none;
            height: 36px;
        }

        .form_wrapper button[type=submit],button[type=reset]{
            padding: 10px 20px;
            background-color: #ccc;
            opacity: 0.6;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<header>
    <a href="<?php echo base_url('/home/index') ;?>">返回首页</a>
</header>
<main>
    <?php echo validation_errors(); ?>
    <?php echo form_open("/home/apply"); ?>
    <div class="form_wrapper">
        <div class="head">
            <h1>申请添加链接</h1>
            <p>所有项必填！</p>
        </div>
        <div class="line">
            <label for="title">网站名：</label>
            <input type="text" name="title" placeholder="如：爱资源导航">
        </div>
        <div class="line">
            <label for="link">网站地址：</label>
            <input type="text" name="link" placeholder="如：http://izy123.com">
        </div>
        <div class="line">
            <label for="intro">网站简介：</label>
            <input type="text" name="intro" placeholder="如：你要的资源这里都有！">
        </div>
        <div class="line">
            <label for="contact">联系方式：</label>
            <input type="text" name="contact" placeholder="如：qq:123456789">
        </div>
        <div class="line">
            <label for="friend_link">加了我站友链的网页地址：</label>
            <input type="text" name="friend_link" placeholder="方便核查">
        </div>

        <button type="submit">提交</button>
        <button type="reset">重填</button>
    </div>
    </form>
</main>
<!-- UY BEGIN -->
<div id="uyan_frame"></div>
<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=2128993"></script>
<!-- UY END -->
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261716165'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261716165%26online%3D1%26show%3Dline' type='text/javascript'%3E%3C/script%3E"));</script>
</body>
<script language="javascript" type="text/javascript" src="//js.users.51.la/19158886.js"></script>
<noscript><a href="//www.51.la/?19158886" rel="nofollow" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="//img.users.51.la/19158886.asp" style="border:none" /></a></noscript>
</html>
