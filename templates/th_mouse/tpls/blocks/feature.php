<div class="feature-wrapper">

	<?php if ($this->countModules('feature-top')){ ?>

	<div class="feature-top">
			<div class="row"> 
				<div class="col-xs-12">
					
					<jdoc:include type="modules" name="<?php $this->_p('feature-top') ?>" style="raw" />						

				</div>
			</div>
	</div>

	<?php } ?>
	<?php if ($this->countModules('feature')){ ?>
	<div class="feature">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('feature') ?>" style="raw" />		

				</div>
			</div>
		</div>
	</div>

	<?php } ?>
	<?php if ($this->countModules('feature-bottom')){ ?>
	<div class="feature-bottom">
		
			<div class="row"> 
				<div class="col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('feature-bottom') ?>" style="raw" />		

				</div>
			</div>
		
	</div>

	<?php } ?>

</div>