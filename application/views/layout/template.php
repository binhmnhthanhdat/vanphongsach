<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi-vn" xml:lang="vi-vn" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
        $sql = "select * from setting ";
        $setting = $this->db->query($sql);
        $kqsetting = $setting->row();
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> <?php if (isset($title)) { echo ucfirst(($title));} else { echo ucfirst(($kqsetting->site_name));} ?></title>
        <meta name="description" content="<?php if (isset($description)) { echo $description; } else { echo $kqsetting->meta_desc;  } ?>" />
        <meta name="keywords" content="<?php if (isset($keywords)) { echo $keywords; } else { echo $kqsetting->meta_key; } ?>" />
        <meta name="robots" content="index, follow" />
        <meta name="copyright" content="Vanphongsach.com" />
        <meta http-equiv="content-language" content="vi" />
        <link rel="alternate" href="http://vanphongsach.com" hreflang="vi-vn" />
        <meta name="Author" content="Vanphongsach.com" />
        <meta name="og:title" content="Dịch vụ vệ sinh công ty tại Hà Nội HCM"/>
        <meta name="og:description" content="Công ty dịch vụ vệ sinh công ty tại Hà Nội TP. Hồ Chí Minh. LH công ty vệ sinh văn phòng: 0941111336"/>
        <meta name="og:url" content="http://vanphongsach.com"/>
        <meta name="og:image" content="http://vanphongsach.com/images/slide/dich-vu-ve-sinh-van-phong-ha-noi.jpg"/>
        <meta name="DC.Title" content="Công ty dịch vụ vệ sinh văn phòng công ty tại Hà Nội Sài Gòn" />
        <meta name="DC.Creator" content="VHE Corp" />
        <meta name="DC.Date" content="2017-1-5" />
        <meta name="DC.Format" scheme="DCMIType" content="Text" />
        <meta name="DC.Identifier" content="http://vanphongsach.com" />
        <meta name="DC.Type" content="text/html" />
        <meta name="DC.Description" content="Công ty dịch vụ vệ sinh công ty, dịch vụ vệ sinh văn phòng tại Hà Nội HCM. LH: 0941111336" />
        <link href="<?php echo base_url(uri_string()); ?>"  rel="canonical" />
        <link rel="shortcut icon" href="http://vanphongsach.com/favicon.ico" />
        <link href="vanphongsach.com/rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
        <link type="text/css" href="<?php echo base_url(); ?>css/style.css?binh=123456" rel="stylesheet"  />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96528190-1', 'auto');
  ga('send', 'pageview');

</script>        
    </head>
    <body>
        <?php $this->load->view('layout/menu') ?>
        <div id="wrapper">
            <div id="fixBody">
                <?php $this->load->view('layout/header') ?>
                <div id="MainBody">
                    <?php $this->load->view($content) ?>
                    <?php $this->load->view('layout/menufooter') ?>
                </div>
                <div class="clearFix"></div>
                <div id="footer">
                    <?php $this->load->view('layout/footer') ?>
                    <div style="line-height: 36px;position: fixed; right: 0px; bottom: 0px;z-index:9999;background:#02733c;border-radius: 5px 5px 0px 0px;margin-right:50px;">
                        <center><a href="tel:0941111336" style="color:white;line-height: 30px;padding:10px;font-size:15px;"> Dịch vụ vệ sinh: 0941111336 </a></center>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src=" <?php echo base_url(); ?>js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script>
        <script type="text/javascript">
             $('.bxslider').bxSlider({
                 auto: true,
                 captions: true
             });
        </script>
    </body>
</html>