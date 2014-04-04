<?php

// No direct access
 defined('_JEXEC') or die('Restricted access');
 
 jimport('joomla.form.formfield');
 
 /**
  * Book form field class
  */
 class JFormFieldhippomkdir extends JFormField
 {
        /**
         * field type
         * @var string
         */
        protected $type = 'hippomkdir';


		/**
		* Method to get the field input markup
		*/



		public function getInput()
		{

			if( !file_exists(JPATH_ROOT.'/images/mod_hippo_slider') ){
				mkdir(JPATH_ROOT.'/images/mod_hippo_slider');
			}


		}

		public function getLabel()
		{  

return false;
		}
 
 }


