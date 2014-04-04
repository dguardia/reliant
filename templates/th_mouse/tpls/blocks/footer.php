<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

  <button  id="back-to-top"><i class="fa fa-angle-up"></i></button>


<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">

	<?php if ($this->checkSpotlight('footnav', 'footer-1, footer-2, footer-3')) : ?>
		<!-- FOOT NAVIGATION -->
		<div class="container">
			<?php $this->spotlight('footnav', 'footer-1, footer-2, footer-3') ?>
		</div>
		<!-- //FOOT NAVIGATION -->
	<?php endif ?>

</footer>
<!-- //FOOTER -->