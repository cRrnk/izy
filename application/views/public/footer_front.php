<footer id="footer">
    <span><?php echo $sys_info['footer_info']; ?></span>
    <em class="copyright">&copy; <a href="#footer" alt="版权所有"><?php echo $sys_info['copy_right']; ?></a></em>
</footer>
<script>
    <?php if ($sys_info['add_source']){?>
    $(function() { 
        var self_url = window.location.hostname;
        document.addEventListener('click',function (e) {
            if(e.target.nodeName.toUpperCase()==='A'){
                e.preventDefault();
                var target_url = e.target.href;
                if(target_url.indexOf(self_url) > -1){
                    window.open(target_url,'_self');
                    return false;
                }
                if(/[?&]/.test(target_url)){
                    target_url += '&';
                }else {
                    target_url += '?';
                }
                target_url += 'from_site='+self_url;
                window.open(target_url);
            }
        },false);
    });
    <?php }?>
</script>

<script src="<?php echo base_url('/statics/js/skinnytip.js')?>"></script>
<script type="text/javascript">SkinnyTip.init();</script>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261716165'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261716165%26online%3D1%26show%3Dline' type='text/javascript'%3E%3C/script%3E"));</script>
<script language="javascript" type="text/javascript" src="//js.users.51.la/19158886.js"></script>
<noscript><a href="//www.51.la/?19158886" rel="nofollow" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="//img.users.51.la/19158886.asp" style="border:none" /></a></noscript>

<?php if (!isWeChat()) {
    $taobao_script = "<script type='text/javascript'>
    (function(win,doc){
        var s = doc.createElement('script'), h = doc.getElementsByTagName('head')[0];
        if (!win.alimamatk_show) {
            s.charset = 'gbk';
            s.async = true;
            s.src = 'https://alimama.alicdn.com/tkapi.js';
            h.insertBefore(s, h.firstChild);
        };
        var o = {
            pid: 'mm_32943488_29274728_119096535',/*推广单元ID，用于区分不同的推广渠道*/
            appkey: '',/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
            unid: '',/*自定义统计字段*/
            type: 'click' /* click 组件的入口标志 （使用click组件必设）*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
    </script>";
    
    echo $taobao_script;
}?>

</body>
</html>