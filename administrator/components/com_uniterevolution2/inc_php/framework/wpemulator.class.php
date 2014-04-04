<?php
	
	global $wpdb;
	$wpdb = new UniteDBRev();
	
	define("WP_CONTENT_DIR",JPATH_BASE."/images/");
	
	
	/**
	 * 
	 * _e() emulator
	 */
	function _e($string, $textdomain = null){
		echo $string;
	}
	
	/**
	 * 
	 * __() emulator
	 */
	function __($string, $textdomain = null){
		return($string);
	}
	
	
	/**
	 * 
	 * add_action() emulator
	 */
	function add_action($action){
		
	}

	/**
	 * 
	 * load_plugin_textdomain emulator
	 */
	function load_plugin_textdomain($one, $two = null, $three = null, $four= null){
		
	}
	
	
	/**
	 * 
	 * ge bloginfo function
	 * @param $item
	 */	
	function get_bloginfo($item = null){
		
		$arrResponse = array();
		
		if(empty($item))
			return($arrResponse);
		
		if($item == "version")
			return("3.6");
		else
			return("");
	}
	
	/**
	 * 
	 * register_activation_hook emulator
	 */
	function register_activation_hook($one, $two){}
	
	/**
	 * get_post_types emulator
	 */
	 function get_post_types(){return(array());}
	 
	 
	 /**
	  * 
	  * get_post_type_object emulator
	  */
	 function get_post_type_object($obj){
	 	
	 	$strResponse = "";
	 	if(is_string($obj))
	 		$strResponse = $obj;
	 	
	 	$response = new stdClass();
	 	$response->labels = new stdClass();
	 	$response->labels->singular_name = $strResponse;
	 	
	 	return($response);
	 }
	 
	 
	 /**
	  * 
	  * wp_create_nonce emulator
	  */
	 function wp_create_nonce($param = null, $param2 = null){
	 	return("");
	 }
	 
	 
	/**
	 * 
	 * wp_verify_nonce emulator
	 */
	function wp_verify_nonce($nonce = null){
		return(true);
	}	 
	 
	
	 /**
	  * 
	  * content_url emulator
	  */
	 function content_url(){
	 	$urlContent = juri::root()."images/";
	 	return($urlContent);
	 }

	 
	 /**
	  * 
	  * wp_register_style emulator
	  */
	 function wp_register_style($handle, $url = null){
	 	
	 	if(empty($url))
	 		UniteFunctionsRev::throwError("wp register style error: empty url. handle: {$handle}");
	 	
		$document = JFactory::getDocument();
	 	$document->addStyleSheet($url);
	 }
	 
	 /**
	  * 
	  * wp_register_script emulator
	  */
	 function wp_register_script($handle, $url){
	 	
	 	if(empty($url))
	 		UniteFunctionsRev::throwError("wp register script error: empty url. handle: {$handle}");
	 		
		$document = JFactory::getDocument();
	 	$document->addScript($url);	
	 }
	 
	 
	 /**
	  * 
	  * wp_enqueue_style emulator
	  */
	 function wp_enqueue_style($handle, $url = null){
	 		 	
	 	 //wp_register_style($handle, $url);
	 }
	 
	 
	 /**
	  * 
	  * wp enqueue script emulator
	  */
	 function wp_enqueue_script($handle, $url = null){
	 	  //wp_register_script($handle, $url);
	 }
	 
	 /**
	  * 
	  * get_object_taxonomies emulator
	  */
	function get_object_taxonomies(){
		return array();
	} 
	
	/**
	 * 
	 * is_ssl emulator. return if it's ssl or not
	 */
	function is_ssl(){
		return JURI::getInstance()->isSSL();
	}
	
	
?>