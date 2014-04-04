<?php
/**
 * @version   $Id: item.php 54380 2012-07-17 00:06:22Z djamil $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 * @var $item RokSprocket_Item
 */
?>
<li<?php echo strlen($item->custom_tags) ? ' class="'.$item->custom_tags.'"' : ''; ?> data-mosaic-item>
	<div class="sprocket-mosaic-item" data-mosaic-content>
		<?php echo $item->custom_ordering_items; ?>
		<div class="sprocket-padding">
			<?php if ($item->getPrimaryImage()) :?>
			<div class="sprocket-mosaic-image-container">

				<div class="th-overlay">
					<div class="sprocket-mosaic-text">
						<?php echo $item->getText(); ?>
					</div>


					<div class="sprocket-mosaic-head">
						<?php if ($item->getTitle()): ?>
							<h2 class="sprocket-mosaic-title">
								<?php if ($item->getPrimaryLink()): ?><a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>"><?php endif; ?>
									<?php echo $item->getTitle();?>
								<?php if ($item->getPrimaryLink()): ?></a><?php endif; ?>
							</h2>
						<?php endif; ?>
					
						<?php if ($parameters->get('mosaic_article_details') != 0): ?>
						<div class="sprocket-mosaic-infos">
							<?php if ($parameters->get('mosaic_article_details') !== 'date'): ?>
							By 	<span class="author"><?php echo $item->getAuthor(); ?></span>
							<?php endif; ?>
							<?php if ($parameters->get('mosaic_article_details') == 1): ?> / <?php endif; ?>
							<?php if ($parameters->get('mosaic_article_details') !== 'author'): ?>
							<span class="date"><?php echo $item->getDate();?></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>

					<?php if ($item->getPrimaryLink()) : ?>
						<a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>" class="sprocket-readmore"><span class="icon-new-tab"></span></a>
					<?php endif; ?>
				</div>

				<?php if ($item->getPrimaryLink()) : ?>
				<a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>">
				<?php endif; ?>

				<img src="<?php echo $item->getPrimaryImage()->getSource(); ?>" alt="" class="sprocket-mosaic-image" />
			
				<?php if ($item->getPrimaryLink()) : ?>
				</a>
				<?php endif; ?>

			</div>
			<?php endif; ?>

		</div>
	</div>
</li>
