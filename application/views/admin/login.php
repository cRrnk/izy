<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午12:21
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
</head>
<body>
    <header id="header"></header>
    <main>
        <div id="content">
            <?php echo validation_errors(); ?>
            <?php echo form_open('/login/check_login'); ?>
            <label for="username">用户名</label>
            <input type="text" name="username" maxlength="20">
            <label for="password">密码</label>
            <input type="password" name="password" maxlength="20">
            <input type="submit" value="登录">
            </form>
        </div>
    </main>
</body>
</html>
