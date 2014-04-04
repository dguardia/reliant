<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Mainbody 2 columns: content - sidebar
 */
?>
<div id="t3-mainbody" class="container t3-mainbody">
	<div class="row">

		<!-- SIDEBAR LEFT -->
		<div class="t3-sidebar t3-sidebar-left col-xs-12 col-sm-4 col-md-3 <?php $this->_c('blog-left-sidebar') ?>">
			<jdoc:include type="modules" name="<?php $this->_p('blog-left-sidebar') ?>" style="T3Xhtml" />
		</div>
		<!-- //SIDEBAR LEFT -->


		<!-- MAIN CONTENT -->
		<div id="t3-content" class="t3-content col-xs-12 col-sm-8  col-md-8 col-md-offset-1">
			<?php if($this->hasMessage()) : ?>
			<jdoc:include type="message" />
			<?php endif ?>
			<jdoc:include type="component" />
		</div>
		<!-- //MAIN CONTENT -->



	</div>
</div> 
