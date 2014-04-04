<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($this->checkSpotlight('spotlight-bottom-1', 'bottom-1, bottom-2, bottom-3, bottom-4')) : ?>
	<!-- SPOTLIGHT 1 -->
	<div class="th-sl-b1">
		<?php $this->spotlight('spotlight-bottom-1', 'bottom-1, bottom-2, bottom-3, bottom-4') ?>
	</div>
	<!-- //SPOTLIGHT 1 -->
<?php endif ?>