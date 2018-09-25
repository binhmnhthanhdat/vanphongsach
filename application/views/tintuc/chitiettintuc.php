<div class="box_news_detail">
    <div class="menuM">
        <ul>
            <?php
            $breadcrumb = '';
            if ($laygrouptintuc->num_rows() > 0) {
                $i = 0;
                if ($this->uri->segment(3) != "" && !is_numeric($this->uri->segment(3))) {
                    $url = $this->uri->segment(3);
                } else if ($this->uri->segment(2) != "" && !is_numeric($this->uri->segment(2))) {
                    $url = $this->uri->segment(2);
                } else if ($this->uri->segment(1) != "" && !is_numeric($this->uri->segment(1))) {
                    $url = $this->uri->segment(1);
                }
                $alias_group = $this->db->query("select alias from group_new where type=1 and id=( select id_group_new from news where alias=\"" . $url . "\" limit 0,1)")->row()->alias;
                foreach ($laygrouptintuc->result() as $kqlaygrouptintuc) {
                    $i++;
                    ?>
                    <li><h2><a href="<?php echo base_url(); ?>tin-tuc/<?php echo $kqlaygrouptintuc->alias; ?>" class="color51  <?php if ($alias_group == $kqlaygrouptintuc->alias) {
                $breadcrumb = base_url() . $kqlaygrouptintuc->alias;
                $breadcrumbname = $kqlaygrouptintuc->title;
                echo "active";
            } ?>" title=" <?php echo $kqlaygrouptintuc->title; ?>"><span></span> <?php echo $kqlaygrouptintuc->title; ?></a></h2></li>

        <?php
    }
}
?>
        </ul>
    </div>
    <div class="ContentMain">
        <div class="fixTopContent"></div>
            <?php
            if ($chitiettintuc->num_rows() > 0) {
                $kqchitiettintuc = $chitiettintuc->row();
            ?>
            <div class="breadcrumb">
                <a class = "bread" href="<?php echo base_url(); ?>">Công ty dịch vụ vệ sinh</a>
                <span class="breadcrumb-separator">»</span>
                <a class = "bread"  href="<?php echo base_url() . "tin-tuc/" . $this->uri->segment(1); ?>"><?php echo $breadcrumbname; ?></a>
                <span class="breadcrumb-separator">»</span>
                <a class = "bread"  href="<?php echo $breadcrumb . "/" . $this->uri->segment(2); ?>"><?php echo $kqchitiettintuc->title; ?></a>
            </div>
            <?php }
        ?>
        <div class="fixTopContent2"  style="padding-top: 15px;">
            <p class="title"> <?php echo $kqchitiettintuc->title; ?></p>
        </div>
        <div class="fixTopContent3">
            <div class="content_news">
                <p class="rulerRed280"></p>
                <div  class="description"><? echo $description;?> </div>
                <div > <?php echo $kqchitiettintuc->description; ?></div>
                <div class="detail">
                    <?php echo $kqchitiettintuc->content; ?>
                </div>
            </div>
            <div class="tagNews">
                <p class="flLeft"><span class="fontsize13">Công ty dịch vụ vệ sinh công ty Hà Nội HCM:</span>
                    <?php
                    $mangtag = explode(",", $kqchitiettintuc->tag);
                    for ($itag = 0; $itag < count($mangtag); $itag++) {
                        ?>
                        <a href="<? echo base_url();?>tag/<?php echo $this->util->alias(trim($mangtag[$itag])); ?>" title="<?php echo trim($mangtag[$itag]); ?>"> <?php echo trim($mangtag[$itag]); ?></a>,
                        <?php
                        }
                        ?>
                </p>
            </div>
            <div class="comment_google">
                <script type="text/javascript"  src="https://apis.google.com/js/plusone.js">
                </script>
                <div id="google_comments"></div>
                <script type="text/javascript" >
                    gapi.comments.render('google_comments', {
                        href: window.location,
                        width: '955',
                        height: '210',
                        first_party_property: 'BLOGGER',
                        view_type: 'FILTERED_POSTMOD'
                    });
                </script>
            </div>
            <div class="news_other">
                <p class="title_other">Tin tức liên quan</p>
                <p class="rulerRed"></p>
                <ul class="list_other">
                    <?php
                    $idtinlienquan = $kqchitiettintuc->id_group_new;
                    $tinlienquan = $this->db->query("select id,title,alias from news where id_group_new=$idtinlienquan limit 0,10");
                    if ($tinlienquan->num_rows() > 0) {
                        $id_group_new = $tinlienquan->row()->id_group_new;
                        $function =  $this->uri->segment(1);
                        foreach ($tinlienquan->result() as $kqtinlienquan) {
                     ?>
                                <li><h3  class="title_hidden" style="font-weight: normal;"><a href="<?php echo base_url(); ?><?php echo $function; ?>/<?php echo $kqtinlienquan->alias; ?>" class="fontsize13" title=" <?php echo $kqtinlienquan->title; ?>"> <?php echo $kqtinlienquan->title; ?></a></h3></li>
                                <?php
                            }
                        }
                        ?>
                </ul>
            </div>
            <div class="gocRight"></div>
        </div>
    </div>
</div>
<div class="clearFix"></div>