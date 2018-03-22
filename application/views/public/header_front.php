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
        <?php
            //seo优化
            switch (true){
                case preg_match('/cate\/[0-9]+/',$_SERVER['REQUEST_URI'])==true:
                    $seo_title = $cate_info['cate_name'].' - '.$cate_info['seo_title'];
                    $seo_keywords = $cate_info['seo_keyword'];
                    $seo_description = $cate_info['seo_desc'];
                    break;
                case preg_match('/refer/',$_SERVER['REQUEST_URI'])==true:
                    $seo_title = '自动收录网站链接 - 爱资源导航';
                    $seo_keywords = '免费网站外链,网站SEO优化,免登陆发布链接,自助收录';
                    $seo_description = '可以自动化收录网站链接，提高网站收录、曝光率、免费外链优化';
                    break;
                default:
                    $seo_title = $sys_info['site_name'];;
                    $seo_keywords = $sys_info['site_keyword'];;
                    $seo_description = $sys_info['site_desc'];;
            }
        ?>
        <title><?php echo $seo_title;?></title>
        <meta name="keywords" content="<?php echo $seo_keywords;?>">
        <meta name="description" content="<?php echo $seo_description;?>">
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
                    //     alert("copy success.");
                    // });
                    // clipboard.on('error', function (e) {
                    //     alert("copy fail.");
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
            </div>
            <div class="tools">
                <a onclick="addFavor()">收藏本站</a>&nbsp;
                |&nbsp;<a href="<?php echo base_url('/home/refer');?>" target="_blank">网站提交</a>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="<?php echo $sys_info['logo_link']?>">首页</a></li>
                <li><a href="<?php echo base_url('/home/refer')?>">自助收录</a></li>
            </ul>
            <strong class="notice">
                <a href="<?php echo $notice['link']; ?>" target="_blank" style="color:#<?php echo $notice['notice_color'];?>;"><?=$notice['notice'];?></a>
            </strong>
        </nav>

