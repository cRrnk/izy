<main>
    <!-- 横幅广告 start -->
    <div id="banner">
        <a data-type="5" data-tmpl="950x30" data-tmplid="138" data-style="2" data-border="1" href="#">淘宝充值</a>

        <!--only index-->
        <script>
            var img_refer = document.createElement('img');
            img_refer.src = 'http://' + window.location.host + '/Refer/success';
            img_refer.style.width = 0;
            img_refer.style.height = 0;
            img_refer.style.display = 'none';
            document.body.appendChild(img_refer);
        </script>
    </div>
    <!-- 横幅广告 end -->
    <div id="content">
        <div id="cate">
            <?php foreach ($cates as $cate){?>
                <h2>
                    <a href="<?php echo base_url('/home/cate/'.$cate['cate_id']);?>" style="color:<?php echo '#'.$cate['cate_color'];?>;"><?php echo $cate['cate_name'];?></a>
                </h2>
                <ul>
                    <?php foreach ($links as $link){
                        if($link['cate_id']==$cate['cate_id']){?>
                            <li>
                                <a class="skinnytip" href="<?php echo $link['link'];?>" target="_blank" rel="nofollow" style="color:#<?php echo $link['title_color'];?>;" data-text="<?php echo $link['intro']?>">
                                    <?php echo $link['title'];?>
                                </a>
                            </li>
                        <?php }?>
                    <?php }?>
                </ul>
            <?php }?>
        </div>
    </div>
</main>
