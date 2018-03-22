<style>
    #content .line_info{
        border: 1px solid #ABABAB;
        margin: 10px auto;
    }
    #content .line_info h3{
        margin: 5px;
    }
    #content .line_info p{
        text-indent: 2em;
        border-top: 1px solid #ABABAB;
        margin: 5px;
        padding: 5px;
    }
</style>
<main>
    <div id="content">
        <h2><?php echo $cate_info['cate_name'];?>：</h2>
        <a data-type="8" data-tmpl="527x25" data-tmplid="224" data-style="2" data-border="1" biz-g_lgo="0" biz-g_hot_x="11" biz-g_hot_site="14" biz-g_hot_space="0" biz-g_hot_color="#000" href="#" rel="nofowllow">文字链</a>
        <?php foreach($links as $link){?>
            <a href="<?php echo $link['link']; ?>" rel="nofollow" target="_blank" title="<?php echo $link['title']?>">
                <div class="line_info">
                    <h3>
                        <?php echo $link['title']?>
                    </h3>
                    <p class="intro">
                        简介：<?php echo $link['intro'];?>
                    </p>
                </div>
            </a>
        <?php }?>
    </div>
    <?php echo $page;?>
</main>

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["mshare","weixin","sqq","qzone","tsina","bdysc","copy","renren","tqq","tieba","douban","bdhome","thx","meilishuo","mogujie","diandian","huaban","duitang","hx","youdao","sdo","people","mail","isohu","ty","evernotecn","print"],"bdPic":"http://izy123.com/statics/img/izy_logo.png","bdStyle":"1","bdSize":"24"},"slide":{"type":"slide","bdImg":"4","bdPos":"right","bdTop":"27"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>