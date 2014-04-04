<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!isset($this->error))
{
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}
//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage()); ?></title>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/th_mouse/css/error.css" type="text/css" />
	<?php if ($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error_rtl.css" type="text/css" />
	<?php endif; ?>
	<?php
		$debug = JFactory::getConfig()->get('debug_lang');
		if (JDEBUG || $debug)
		{
	?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/cms/css/debug.css" type="text/css" />
	<?php
		}
	?>
</head>
<body>
	<div class="error">
		<div id="outline">
		<div id="errorboxoutline">
			<div id="errorboxheader">404</div>
			<div id="errorboxbody">

			<div id="techinfo">
			<?php echo htmlspecialchars($this->error->getMessage()); ?>

		
				<?php if ($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			

			</div>

			<p><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></p>


			<div class="redirect">
				<strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong><br/><br/>
				<a class="btn btn-primary" href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
			</div>			

			</div>
		</div>
		</div>
	</div>
</body>
</html>