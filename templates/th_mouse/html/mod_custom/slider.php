<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_custom
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;



$backgroundtype = $params->get('backgroundtype', 'image');



?>




<div class="custom <?php echo $moduleclass_sfx .' '.$layout ?>" <?php if ($params->get('backgroundimage')): ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?> >
	
	<?php
		if( $backgroundtype=='video' ){
	?>




	<?php } ?>
	
	<?php if ($params->get('usecontainer')==1){ ?> 
	<div class="row">
		<div class="col-xs-12">
			<div class="container custom">
				<?php } ?>

				<?php echo $module->content;?>

				<?php if ($params->get('usecontainer')){ ?> 
			</div>
		</div>
	</div>
	<?php } ?>
</div>
