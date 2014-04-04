<?php
	/*
	# mod_hippo_slider - Slider Module by ThemeHippo.com
	# -----------------------------------------------
	# Author    ThemeHippo http://www.ThemeHippo.com
	# Copyright (C) 2013 - 2014 ThemeHippo.com. All Rights Reserved.
	# license - GNU/GPL V2 or Later
	# Websites: http://www.ThemeHippo.com
	*/
    // no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );


    // global variables:  $layout, $moduleName, $moduleID, $moduleClass, $data 
	?>

	<div class="hippo-slider-wrapper <?php echo $moduleClass ?>">
		<div class="carousel"  id="hippo-slider-<?php echo $moduleID ?>">

			<div class="carousel-inner">
				<?php

//print_r($data);
				$i = 0;
				foreach($data as $slider){

					$is_image = ($slider['backgroundtype']=='image')?true:false;
					$is_video = ($slider['backgroundtype']=='video')?true:false;


					$style='';
					$video='';

					$activeclass = ($i==0)?' active ':'';

					if( $is_image ){

						$image = JURI::base( true ).'/'.$slider['backgroundimage'];
						$style = "background-image: url('{$image}')";
					}

					if( $is_video ){

						$mp4 = JURI::base( true ).'/images/'.$moduleName.'/'.$slider['backgroundvideomp4'];
						$webm = JURI::base( true ).'/images/'.$moduleName.'/'.$slider['backgroundvideowebm'];
						$ogv = JURI::base( true ).'/images/'.$moduleName.'/'.$slider['backgroundvideoogv'];

						$video = '
						<video class="hippo-video-background" preload="auto" autoplay="autoplay" loop muted>
						<source src="'.$mp4.'" type="video/mp4">
						<source src="'.$webm.'" type="video/webm">
						<source src="'.$ogv.'" type="video/ogg">
						Video not supported
						</video>
						<div class="hippo-video-background-pattern"></div>';

					}

					?>
					<div class="item <?php echo $activeclass ?>" style="<?php echo $style ?>">
						<?php echo $video; ?>
						<div class="container">
							<div class="row">
								<?php echo $slider['content'] ?>
							</div>
						</div>
					</div>
					<?php
					$i++;
				} 
				?>

			</div>

<div class="carousel-control-wrapper">
<a class="left carousel-control" href="#hippo-slider-<?php echo $moduleID ?>" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>

<a class="right carousel-control" href="#hippo-slider-<?php echo $moduleID ?>" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>


		</div>
	</div>