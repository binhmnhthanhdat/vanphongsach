<?php
if ($laygroupproject->num_rows() > 0) {

    $sorecord = 1;
    foreach ($laygroupproject->result() as $kqlaygroupproject) {
        ?>
<div class="boxtin  <?php if ($sorecord % 3 == 0) {echo "right";}?>">
   <h2 title="<?php echo $kqlaygroupproject->title; ?>"><a class="moduleItemTitle" href="<?php echo base_url(); ?><?php echo $kqlaygroupproject->alias; ?>"><?php echo $kqlaygroupproject->name; ?></a></h2>
   <img class="caption" src=" <?php echo base_url();
        echo $kqlaygroupproject->images; ?>" alt=" <?php echo $kqlaygroupproject->title; ?>" title=" <?php echo $kqlaygroupproject->title; ?>" border="0" height="90" width="160" style="float: left;padding-right: 10px;padding-left:10px;" /><?php echo $kqlaygroupproject->content; ?>
</div>
<?php
$sorecord++;
    } // end foreach($laygroupproject->result() as $kqlaygroupproject)
    ?><?php
} //end if?>
<div class="clearFix"></div>
<div class="clearFix"></div>
<div class="boxContact marT20">
   <div class="flLeft fone">
      <div class="clearFix padB10"></div>
      <div class="flLeft hotline hotlinefirst" style="margin-top:40px;">
         <p class="fontsize15 padT40 bold" style="color: #025d30; font-size:15px;">DỊCH VỤ VỆ SINH VĂN PHÒNG</p>
         <p class="colorRed fontsize18 padT3">0941111336</p>
      </div>
      <div class="rulerRight flLeft"  style="margin-top:30px; "></div>
      <div class="flLeft hotline"  style="margin-top:40px;">
         <p class="fontsize15 padT40 bold" style="color: #025d30; font-size:15px;">CÔNG TY VỆ SINH VĂN PHÒNG</p>
         <p class="colorRed fontsize18 padT3">024.66616333</p>        
      </div>
   </div>
   <div class="anhlienhe"><img src="<?echo base_url(); ?>images/project/lien-he-dich-vu-ve-sinh-theo-gio.png" alt="lien-he-dich-vu-ve-sinh-theo-gio" width="150px" height="175px;"/></div>
   <div class="clearFix"></div>
</div>
<div class="shutContact padB10"></div>
<div class="tintuc">
   <?php
if ($laygrouptintuc->num_rows() > 0) {
    $i = 1;
    foreach ($laygrouptintuc->result() as $kqlaygrouptintuc) {
        ?>
   <div class="boxNews  <?php if ($i % 3 == 0) {
            echo "tintuc_right";
        }
        ?>">
      <div class="flLeft builet"><img src="<?php echo base_url();
        echo $kqlaygrouptintuc->icon; ?>" width="20" height="20" alt="<?php echo $kqlaygrouptintuc->title; ?>" /></div>
      <h3 class="upcase padL5 flLeft" title="<?php echo $kqlaygrouptintuc->title; ?>"><a  class="title_hidden"  href="<?php echo base_url(); ?>tin-tuc/<?php echo $kqlaygrouptintuc->alias; ?>" title= "<?php echo $kqlaygrouptintuc->title; ?>" class="colorRed fontsize16"><?php echo $kqlaygrouptintuc->name; ?></a></h3>
      <div class="clearFix"></div>
      <div class="boxNews_content">
         <p><a href="<?php echo base_url(); ?>tin-tuc/<?php echo $kqlaygrouptintuc->alias; ?>" title=" <?php echo $kqlaygrouptintuc->title; ?>"><img src="<?php echo base_url();
        echo $kqlaygrouptintuc->images; ?>"  alt="<?php echo $kqlaygrouptintuc->title; ?>" class="image_new_home" /></a></p>
         <?php // echo $kqlaygrouptintuc->id;
        $sql        = "select * from news where id_group_new=\"" . $kqlaygrouptintuc->id . "\" and display=1 order by ord asc,id desc limit 0,1";
        $listtintuc = $this->db->query($sql);
        if ($listtintuc->num_rows() > 0) {
            $kqlaytindautien = $listtintuc->row();
            $idtindau        = $kqlaytindautien->id;

            ?>
         <h4 class="bold padT10"><a  class="title_hidden"  href=" <?php echo base_url(); ?><?php echo $kqlaygrouptintuc->alias; ?>/<?php echo $kqlaytindautien->alias; ?>" title="Chia sẻ RSS Internet Explorer và Outlook" class="color6D honghab"><?php if ($listtintuc->num_rows() > 0) {
                echo $kqlaytindautien->title;
            }
            ?></a></h4>
         <div class="fontsize13 padT5 description" align="justify"><?php if ($listtintuc->num_rows() > 0) {
                echo $kqlaytindautien->description;
            }
            ?></div>
         <?php
}
        ?><?php
if ($listtintuc->num_rows() > 0) {
            ?>
         <ul class="padT10 newsWithIndex listtintuc">
            <?php
foreach ($listtintuc->result() as $kqlisttintuc) {
                if ($kqlisttintuc->id != $idtindau) {
                    ?>
            <li><a class="title_hidden" href=" <?php echo base_url(); ?><?php echo $kqlaygrouptintuc->alias; ?>/<?php echo $kqlisttintuc->alias; ?>" title=" <?php echo $kqlisttintuc->title; ?>"><?php echo $kqlisttintuc->title; ?></a></li>
            <?php
} // end if tin dau
            }
            ?>
         </ul>
         <?php
}

        ?>
      </div>
   </div>
   <?php
$i++;
    }
} //end so group
?>
</div>
<div class="clearFix"></div>
<?php
if ($layboxtext->num_rows() > 0) {

    ?>
<div class="fontsize15 color51 padL25 padT5 box_ghichu" style="text-align: justify;padding: 0 15px;padding-bottom:15px;">
   <?php
foreach ($layboxtext->result() as $kqlayboxtext) {

        ?>
   <div class="ghichu"><img  title="dich-vu-ve-sinh-giup-viec-uy-tin" alt="dich-vu-ve-sinh-giup-viec-uy-tin" src=" <?php echo base_url(); ?>images/news/dich-vu-ve-sinh-giup-viec-uy-tin.png" style="float: left;" /><?php echo $kqlayboxtext->title; ?></div>
   <div style="width:100%;"><?php echo $kqlayboxtext->content; ?></div>
   <?php }?>
</div>
<?php
}

?>