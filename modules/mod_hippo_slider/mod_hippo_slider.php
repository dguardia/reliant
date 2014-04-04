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

    
	//Parameters
    $layout					= $params->get('layout','default');
    $moduleName             = basename(dirname(__FILE__));
    $moduleID               = $module->id;
    $moduleClass            = $params->get('moduleclass_sfx','');

    $document               = JFactory::getDocument();
    $cssFile                = JPATH_ROOT. '/modules/'.$moduleName.'/css/style.css';
    $cssFile_main           = JPATH_THEMES. '/'.$document->template.'/css/'.$moduleName.'.css';
    $cssFile_layout         = JPATH_THEMES. '/'.$document->template.'/css/'.$moduleName.'-'.$layout.'.css';


    $data = array();

    for( $i=1; $i<=10; $i++ ){

        if( $params->get('sliderdata_'.$i,'') ){

            $slider = array(

                'backgroundtype'=>$params->get('backgroundtype_'.$i,'image'),
                'backgroundimage'=>$params->get('backgroundimage_'.$i,''),
                'backgroundvideomp4'=>$params->get('backgroundvideomp4_'.$i,''),
                'backgroundvideowebm'=>$params->get('backgroundvideowebm_'.$i,''),
                'backgroundvideoogv'=>$params->get('backgroundvideoogv_'.$i,''),
                'content'=>$params->get('sliderdata_'.$i,''),       

                );

            array_push($data, $slider);
        }
    }


    if(file_exists($cssFile)) {
        $document->addStylesheet(JURI::base(true) . '/modules/'.$moduleName.'/css/style.css');
    }
    
    if(file_exists($cssFile_main)) {
        $document->addStylesheet(JURI::base(true) . '/templates/'.$document->template.'/css/'. $moduleName. '.css');
    }

    if(file_exists($cssFile_layout)) {
        $document->addStylesheet(JURI::base(true) . '/templates/'.$document->template.'/css/'. $moduleName.'-'.$layout. '.css');
    }


    require(JModuleHelper::getLayoutPath($moduleName,$layout));