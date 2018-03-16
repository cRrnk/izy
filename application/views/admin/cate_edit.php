<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 上午11:47
 */
?>
<div id="content">
    <h1> 分类添加／编辑</h1>
    <hr>
    <div>
        <?php echo validation_errors(); ?>
        <?php echo form_open("/cate/edit/{$cate_info['cate_id']}"); ?>
        <input type="hidden" name="cate_id" value="<?php echo $cate_info['cate_id'];?>">
        <label for="cate_name">分类名：</label>
        <input type="text" name="cate_name" value="<?php echo $cate_info['cate_name'];?>">
        <label for="cate_color">颜色：</label>
        <input type="text" name="cate_color" value="<?php echo $cate_info['cate_color'];?>">
        <label for="seo_title">seo标题：</label>
        <input type="text" name="seo_title" value="<?php echo $cate_info['seo_title'];?>">
        <label for="seo_keyword">seo关键字：</label>
        <input type="text" name="seo_keyword" value="<?php echo $cate_info['seo_keyword'];?>">
        <label for="seo_desc">seo描述：</label>
        <input type="text" name="seo_desc" value="<?php echo $cate_info['seo_desc'];?>">
        <label for="sort_order">排序：</label>
        <input type="text" name="sort_order" value="<?php echo $cate_info['sort_order'];?>">
        <label for="status">状态：</label>
        <select name="status">
            <option value="online" <?php if($cate_info['status']=='online') echo 'selected';?>>上线</option>
            <option value="offline" <?php if($cate_info['status']=='offline') echo 'selected';?>>下线</option>
            <option value="delete">删除！慎重操作</option>
        </select>

        <button type="submit">提交</button>
    </div>
</div>