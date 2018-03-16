<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 上午11:47
 */
?>
<div id="content">
    <h1> 链接添加／编辑</h1>
    <hr>
    <div>
        <?php echo validation_errors(); ?>
        <?php echo form_open("/link/edit/{$link_info['link_id']}"); ?>
        <input type="hidden" name="link_id" value="<?php echo $link_info['link_id'];?>">
        <label for="title">分类：</label>
        <select name="cate_id">
            <?php foreach ($cates as $cate){?>
                <option value="<?php echo $cate['cate_id'];?>" <?php if($cate['cate_id']==$link_info['cate_id']) echo 'selected';?>>
                    <?php echo $cate['cate_name'];?>
                </option>
            <?php }?>
        </select>
        <label for="title">链接名：</label>
        <input type="text" name="title" value="<?php echo $link_info['title'];?>">
        <label for="title_color">颜色：</label>
        <input type="text" name="title_color" value="<?php echo $link_info['title_color'];?>">
        <label for="link">链接地址：</label>
        <input type="text" name="link" value="<?php echo $link_info['link'];?>">
        <label for="intro">简介：</label>
        <input type="text" name="intro" value="<?php echo $link_info['intro'];?>">
        <label for="sort_order">排序：</label>
        <input type="text" name="sort_order" value="<?php echo $link_info['sort_order'];?>">
        <label for="status">状态：</label>
        <select name="status">
            <option value="online" <?php if($link_info['status']=='online') echo 'selected';?>>上线</option>
            <option value="offline" <?php if($link_info['status']=='offline') echo 'selected';?>>下线</option>
            <option value="delete">删除！慎重操作</option>
        </select>

        <button type="submit">提交</button>
    </div>
</div>