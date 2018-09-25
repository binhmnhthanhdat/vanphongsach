<div class="tin_gioithieu">
    <div class="menuM">        
    </div>
    <div class="ContentMain">
        <div class="fixTopContent"></div>
            <?php
            if ($laygioithieu->num_rows() > 0) {
                foreach ($laygioithieu->result() as $kqlaygioithieu) {
                ?>
                <div class="fixTopContent2"  style="padding-top: 20px;">
                    <p class="bold padL15" style="font-size: 16px;"> <?php echo $kqlaygioithieu->title; ?></p>
                </div>
                <div class="fixTopContent3 padL35 padR35">
                    <div align="justify" class="justify">
                <?php echo $kqlaygioithieu->content; ?>
                    </div>
                    <div class="gocRight"></div>
                </div>
    <?php } ?>
<?php } ?>
    </div>
</div>
