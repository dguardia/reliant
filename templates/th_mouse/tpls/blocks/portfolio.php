<div class="portfolio-wrapper <?php $this->_c('portfolio-top') ?>">

	<?php if ($this->countModules('portfolio-top')){ ?>

	<div class="portfolio-top">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">
					
					<jdoc:include type="modules" name="<?php $this->_p('portfolio-top') ?>" style="raw" />		
					


				</div>
			</div>
		</div>
	</div>

	<?php } ?>
	<?php if ($this->countModules('portfolio')){ ?>
	<div class="portfolio <?php $this->_c('portfolio') ?>">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('portfolio') ?>" style="raw" />		

				</div>
			</div>
		</div>
	</div>

	<?php } ?>
	<?php if ($this->countModules('portfolio-bottom')){ ?>
	<div class="portfolio-bottom">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('portfolio-bottom') ?>" style="raw" />		

				</div>
			</div>
		</div>
	</div>

	<?php } ?>

</div>