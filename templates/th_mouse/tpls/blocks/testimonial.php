<div class="testimonial-wrapper">

	<?php if ($this->countModules('testimonial-top')){ ?>

	<div class="testimonial-top">
			<div class="row"> 
				<div class="col-xs-12">					
					<jdoc:include type="modules" name="<?php $this->_p('testimonial-top') ?>" style="raw" />		
				</div>
			</div>
	</div>

	<?php } ?>
	<?php if ($this->countModules('testimonial')){ ?>
	<div class="testimonial">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('testimonial') ?>" style="raw" />		

				</div>
			</div>
		</div>
	</div>

	<?php } ?>
	<?php if ($this->countModules('testimonial-bottom')){ ?>
	<div class="testimonial-bottom">
		<div class="container">
			<div class="row"> 
				<div class="col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('testimonial-bottom') ?>" style="raw" />		

				</div>
			</div>
		</div>
	</div>

	<?php } ?>

</div>