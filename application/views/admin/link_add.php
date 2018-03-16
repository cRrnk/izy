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
        <?php echo form_open("/link/add"); ?>
            <label for="title">分类：</label>
            <select name="cate_id">
                <?php foreach ($cates as $cate){?>
                <option value="<?php echo $cate['cate_id'];?>"><?php echo $cate['cate_name'];?></option>
                <?php }?>
            </select>
            <label for="title">链接名：</label>
            <input type="text" name="title">
            <label for="title">颜色：</label>
            <input type="text" name="title_color">
            <label for="title">链接地址：</label>
            <input type="text" name="link">
            <label for="title">简介：</label>
            <input type="text" name="intro">
            <label for="title">排序：</label>
            <input type="text" name="sort_order">

            <button type="submit">提交</button>
        </form>
    </div>
</div>