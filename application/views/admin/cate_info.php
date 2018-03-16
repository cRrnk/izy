<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 上午10:07
 */
?>

<div id="content">
    <h1> 分类信息</h1>
    <button><a href="<?php echo base_url('/cate/add');?>">添加</a></button>
    <hr>
    <div>
        <table class="table_info">
            <thead>
            <tr>
                <th>id</th>
                <th>pid</th>
                <th>分类名</th>
                <th>颜色</th>
                <th>seo标题</th>
                <th>seo关键字</th>
                <th>seo描述</th>
                <th>排序</th>
                <th>状态</th>
                <th>点击数</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cates as $cate){?>
            <tr>
                <td><?php echo $cate['cate_id'];?></td>
                <td><?php echo $cate['pid']; ?></td>
                <td><?php echo $cate['cate_name'];?></td>
                <td><?php echo $cate['cate_color'];?></td>
                <td><?php echo $cate['seo_title'];?></td>
                <td><?php echo $cate['seo_keyword'];?></td>
                <td><?php echo $cate['seo_desc'];?></td>
                <td><?php echo $cate['sort_order'];?></td>
                <td><?php echo $cate['status'];?></td>
                <td><?php echo $cate['click_num'];?></td>
                <td><?php echo $cate['create_time'];?></td>
                <td><a href="<?php echo base_url('/cate/edit/').$cate['cate_id'];?>">编辑</a></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <span>分页：</span><?php echo $page;?>
</div>