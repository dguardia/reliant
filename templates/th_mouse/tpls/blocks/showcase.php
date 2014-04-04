<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<!-- SHOWCASE -->
<div class="showcase-wrapper">
	<div class="row">
		<?php if ($this->countModules('showcase')) { ?>	
		<jdoc:include type="modules" name="<?php $this->_p('showcase') ?>" style="raw" />		
		<?php } ?>
	</div>
</div>
<!-- //SHOWCASE -->