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
        <?php echo form_open("/cate/add"); ?>
            <label for="cate_name">分类名：</label>
            <input type="text" name="cate_name">
            <label for="cate_color">颜色：</label>
            <input type="text" name="cate_color">
            <label for="seo_title">seo标题：</label>
            <input type="text" name="seo_title">
            <label for="seo_keyword">seo关键字：</label>
            <input type="text" name="seo_keyword">
            <label for="seo_desc">seo描述：</label>
            <input type="text" name="seo_desc">
            <label for="title">排序：</label>
            <input type="text" name="sort_order">

            <button type="submit">提交</button>
        </form>
    </div>
</div>