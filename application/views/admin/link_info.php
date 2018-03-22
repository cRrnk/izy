<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 上午10:07
 */
?>

<div id="content">
    <h1> 链接信息</h1>
    <button><a href="<?php echo base_url('/link/add');?>">添加</a></button>
    <form action="<?php echo base_url('/link/search');?>" method="post">
        <input type="txet" name="search_title" value="<?php echo $search_title  ?: '';?>" placeholder="搜索标题..."/>
        <input type="submit" value="提交" />
    </form>
    <hr>
    <div>
        <table class="table_info">
            <thead>
            <tr>
                <th>id</th>
                <th>分类id</th>
                <th>链接名</th>
                <th>颜色</th>
                <th>链接</th>
                <th>简介</th>
                <th>排序</th>
                <th>状态</th>
                <th>点击数</th>
                <th>更新时间</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($links as $link){?>
            <tr>
                <td><?php echo $link['link_id'];?></td>
                <td>
                    <?php foreach ($cates as $cate){
                        if($link['cate_id']==$cate['cate_id']){
                            echo $cate['cate_name'];
                        }
                    } ?>
                </td>
                <td><?php echo $link['title'];?></td>
                <td><?php echo $link['title_color'];?></td>
                <td><?php echo $link['link'];?></td>
                <td><?php echo $link['intro'];?></td>
                <td><?php echo $link['sort_order'];?></td>
                <td><?php echo $link['status'];?></td>
                <td><?php echo $link['click_num'];?></td>
                <td><?php echo $link['last_time'];?></td>
                <td><?php echo $link['create_time'];?></td>
                <td><a href="<?php echo base_url('/link/edit/').$link['link_id'];?>">编辑</a></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <span>分页：</span><?php echo $page;?>
</div>