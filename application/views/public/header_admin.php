<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/7
 * Time: 下午12:14
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <link rel="shortcut icon" href="<?php echo base_url('statics/favicon.ico');?>">
    <link rel="stylesheet" href="<?php echo base_url('statics/css/style_admin.css');?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>爱资源导航后台管理系统</title>
    <meta name="keywords" content="宅男资源,最新电影,vip共享,寂寞少妇">
    <meta name="description" content="这是后台管理界面">

</head>
<body>

<header id="header">
    <span>爱资源导航站-后台管理中心</span>
    <span>账户名：<?php echo $this->session->user_info['username'];?></span>
    <span><a href="<?php echo base_url('/user/info'); ?>">个人信息</a></span>
    <span><a href="<?php echo base_url('/login/logout');?>">注销</a></span>
</header>

<nav>
    <ul>
        <li><a href="<?php echo base_url('/home/index'); ?>" target="_blank">前台首页</a></li>
        <li><a href="<?php echo base_url('/link/info'); ?>">链接管理</a></li>
        <li><a href="<?php echo base_url('/cate/info'); ?>">分类管理</a></li>
        <li><a href="<?php echo base_url('/user/info'); ?>">用户管理</a></li>
        <li><a href="<?php echo base_url('/sys/edit'); ?>">系统设置</a></li>
    </ul>
</nav>