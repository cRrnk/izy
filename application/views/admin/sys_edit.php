<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 上午11:47
 */
?>
<div id="content">
    <h1>系统设置</h1>
    <hr>
    <div>
        <?php echo validation_errors(); ?>
        <?php echo form_open("/sys/edit"); ?>
        <input type="hidden" name="sys_id" value="<?php echo $sys_info['sys_id'];?>">
        <label for="site_name">网站名：</label>
        <input type="text" name="site_name" value="<?php echo $sys_info['site_name'];?>">
        <label for="site_keyword">网站关键字：</label>
        <input type="text" name="site_keyword" value="<?php echo $sys_info['site_keyword'];?>">
        <label for="site_desc">网站描述：</label>
        <input type="text" name="site_desc" value="<?php echo $sys_info['site_desc'];?>">
        <label for="notice_limit">公告条数：</label>
        <input type="text" name="notice_limit" value="<?php echo $sys_info['notice_limit'];?>">
        <label for="link_show_limit">首页分类链接展示数：</label>
        <input type="text" name="link_show_limit" value="<?php echo $sys_info['link_show_limit'];?>">
        <label for="per_page">每页条目数：</label>
        <input type="text" name="per_page" value="<?php echo $sys_info['per_page'];?>">
        <label for="footer_info">页脚信息：</label>
        <input type="text" name="footer_info" value="<?php echo $sys_info['footer_info'];?>">
        <label for="copy_right">版权所有：</label>
        <input type="text" name="copy_right" value="<?php echo $sys_info['copy_right'];?>">
        <label for="add_source">是否添加跳转来源参数：</label>
        <input type="text" name="add_source" value="<?php echo $sys_info['add_source'];?>">
        <label for="cache_time">缓存时间（分）：</label>
        <input type="text" name="cache_time" value="<?php echo $sys_info['cache_time'];?>">


        <button type="submit">提交</button>
    </div>
</div>