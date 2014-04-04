<div class="bottom-wrapper">

	<?php if ($this->countModules('bottom-before')){ ?>

	<div class="bottom-before">
		
			<div class="row"> 
				<div class="col-xs-12">
					
					<jdoc:include type="modules" name="<?php $this->_p('bottom-before') ?>" style="raw" />		
					
				</div>
			</div>
		
	</div>

	<?php } ?>
	<?php if ($this->countModules('bottom')){ ?>
	<div class="bottom">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('bottom') ?>" style="raw" />		
				</div>
			</div>
		</div>
	</div>

	<?php } ?>

	<div class="bottom-after">
		<div class="container">
			<div class="row"> 
				<div class="col-md-3 col-sm-6  col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('twitter') ?>" style="raw" />							
				</div>				

				<div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-1">

					<div class="row">
					<?php $this->loadBlock('spotlight-bottom-1') ?>
					</div>

					<div class="row">
					<?php $this->loadBlock('spotlight-bottom-2') ?>
					</div>	

				</div>
			</div>
		</div>
	</div>


</div>