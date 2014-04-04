<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


/**
 * Mainbody 3 columns, content in center: sidebar1 - content - sidebar2
 */

// positions configuration
$sidebar_left = 'blog-left-sidebar';
$sidebar_right = 'blog-right-sidebar';

$sidebar_left = $this->countModules($sidebar_left) ? $sidebar_left : false;
$sidebar_right = $this->countModules($sidebar_right) ? $sidebar_right : false;

// detect layout
if ($sidebar_left && $sidebar_right) {
	$main_column_class = 'col-xs-12 col-sm-6 col-md-6';
} elseif ($sidebar_left) {
	$main_column_class = 'col-xs-12 col-sm-8 col-md-8  col-md-offset-1';
} elseif ($sidebar_right) {
	$main_column_class = 'col-xs-12 col-sm-8 col-md-8';
} else {
	$main_column_class = 'col-xs-12';
}

?>
<div id="t3-mainbody" class="container t3-mainbody">
	<div class="row">

		<?php if($sidebar_left){ ?>

		<!-- SIDEBAR LEFT -->
		<div class="t3-sidebar t3-sidebar-left col-xs-12 col-sm-4 col-md-3 <?php $this->_c('blog-left-sidebar') ?>">
			<jdoc:include type="modules" name="<?php $this->_p('blog-left-sidebar') ?>" style="T3Xhtml" />
		</div>
		<!-- //SIDEBAR LEFT -->
		<?php } ?>



		<!-- MAIN CONTENT -->
		<div id="t3-content" class="t3-content <?php echo $main_column_class?>">
			<?php if($this->hasMessage()) : ?>
			<jdoc:include type="message" />
		<?php endif ?>
		<jdoc:include type="component" />
	</div>
	<!-- //MAIN CONTENT -->


	<?php if($sidebar_right){ ?>

	<!-- SIDEBAR RIGHT -->
	<div class="t3-sidebar t3-sidebar-right col-xs-12 col-sm-4 col-md-3 col-md-offset-1 <?php $this->_c('blog-right-sidebar') ?>">
		<jdoc:include type="modules" name="<?php $this->_p('blog-right-sidebar') ?>" style="T3Xhtml" />
	</div>
	<!-- //SIDEBAR RIGHT -->		
	<?php } ?>

</div>
</div> 




