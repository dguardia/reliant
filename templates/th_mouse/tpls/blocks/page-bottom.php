<?php

$show_page_preloader  = (bool) $this->getParam('hippopagepreloader','1');


if( $show_page_preloader  ){
?>

<div id="page-preload-wrapper">
<div class="spinner">
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
</div>
</div>
<?php } ?>
<script type="text/javascript" src="<?php echo T3_TEMPLATE_URL ?>/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo T3_TEMPLATE_URL ?>/js/retina.js"></script>