<?php global $smof_data; ?>
<?php
if ( ! defined('THEME_TEMPLATE') AND FALSE) { ?>
    </div>
    </div>
<?php } ?>
</div>
<!-- /MAIN -->

</div>
<!-- /CANVAS -->


<a class="w-toplink" href="#"><i class="fa fa-angle-up"></i></a>
<script type="text/javascript">
<?php if ( ! empty($smof_data['mobile_nav_width']) AND $smof_data['mobile_nav_width'] < "1024") {?>window.mobileNavWidth = "<?php echo $smof_data['mobile_nav_width']; ?>";<?php } ?>
<?php if ( ! empty($smof_data['logo_height']) AND $smof_data['logo_height'] != "30") {?>window.logoHeight = "<?php echo $smof_data['logo_height']; ?>";<?php } ?>
<?php if ( ! empty($smof_data['logo_height_sticky']) AND $smof_data['logo_height_sticky'] != "30") {?>window.logoHeightSticky = "<?php echo $smof_data['logo_height_sticky']; ?>";<?php } ?>
<?php if ( ! empty($smof_data['mobile_nav_width']) AND $smof_data['mobile_nav_width'] != "1000") {?>window.mobileNavWidth = "<?php echo $smof_data['mobile_nav_width']; ?>";<?php } ?>
</script>
<?php if($smof_data['tracking_code'] != "") { echo $smof_data['tracking_code']; } ?>
<?php wp_footer(); ?>
</body>
</html>