<main>
    <!-- 横幅广告 start -->
    <div id="banner">
        <a data-type="8" data-tmpl="527x25" data-tmplid="224" data-style="2" data-border="1" biz-g_lgo="0" biz-g_hot_x="11" biz-g_hot_site="14" biz-g_hot_space="0" biz-g_hot_color="#000" href="#" rel="nofowllow">文字链</a>
    </div>
    <!-- 横幅广告 end -->
    <div id="content">
        <div class="readme">
            <h3>自助收录说明：</h3>
            <p style="text-indent: 2em">
                每来访一次,次数+1排名越前面 (每日凌晨自动清零)
            </p>
            <p style="text-indent: 2em">
                来访<span style="color: #000000;">少于10次黑色</span>、
                <span style="color:#ff00ff; font-weight:bold;">少于100次粉色</span>、
                <span style="color:#FF0000; font-weight:bold;">100次以上红色</span>
            </p>
            <h3>如何加入？</h3>
            <p style="text-indent: 2em">
                只需要将本站首页链接加入贵站，访客通过链接访问即可自动展示到下方
            </p>
        </div>
        <div id="cate">
            <ul>
                <?php foreach ($links as $link){ ?>
                    <li>
                        <a class="skinnytip" style="color:<?php
                            switch (true){
                                case $link['visit_today_num']<10:
                                    echo '#000000;font-weight:bold;';
                                    break;
                                case $link['visit_today_num']<100:
                                    echo '#ff00ff;font-weight:bold;';
                                    break;
                                default:
                                    echo '#FF0000';
                                    break;
                            }
                        ?>;border: solid 1px gray;" href="<?php echo 'http://' . $link['url'];?>" target="_blank" rel="nofollow" data-text="<?php echo $link['description']?>">
                            <?php echo $link['title'];?>
                        </a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</main>
