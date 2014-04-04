<!--HEADER BLOCK-->

<?php
// get params
$sitename  = $this->params->get('sitename');
$logotype  = $this->params->get('logotype');


$logoimage = $logotype == 'image' ? $this->params->get('logoimage', 'templates/' . T3_TEMPLATE . '/images/logo.png') : '';

if (!$sitename) {
  $sitename = JFactory::getConfig()->get('sitename');
}

?>

<!-- HEADER -->

<header id="t3-header" class="header-wrapper">


  <div id="th-header" class="container">

    <div class="th-wrapper">

      <div class="row th-navbar">

        <div class="col-sm-3 col-xs-9 ">

         <!-- share -->
         <?php if ($this->countModules('share')) { ?>
         <div class="share">
          <jdoc:include type="modules" name="<?php $this->_p('share') ?>" style="raw" />
        </div>
        <?php } ?>
        <!-- //share -->

        <!-- LANGUAGE SWITCHER -->
        <?php if ($this->countModules('languageswitcherload')) { ?>
        <div class="languageswitcherload">
          <jdoc:include type="modules" name="<?php $this->_p('languageswitcherload') ?>" style="raw" />
        </div>
        <?php } ?>
        <!-- //LANGUAGE SWITCHER -->

      </div>


      <div class="col-sm-9 col-xs-3">


        <div class="t3-navbar navbar-collapse collapse">
          <jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />
        </div>

        <div class="pull-right visible-xs">
          <?php if ($this->getParam('addon_offcanvas_enable')) { ?>
          <?php $this->loadBlock ('off-canvas') ?>
          <?php } ?>
        </div>

      </div>


    </div>


    <div class="row">


      <!-- LOGO -->
      <div class="col-xs-12 col-sm-3 col-md-2 logo-wrapper">
        <div class="logo-<?php echo $logotype ?>">
          <a href="<?php echo JURI::base(true) ?>" title="<?php echo strip_tags($sitename) ?>">
            <?php if($logotype == 'image'): ?>
            <img class="logo-img" src="<?php echo JURI::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
          <?php endif ?>
        </a>
      </div>
    </div>
    <!-- //LOGO -->

  </div>

</div>

</div>

</header>
<!-- //HEADER -->
