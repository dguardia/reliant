<?php
	/*
	# mod_sp_tweet - Twitter Module by JoomShaper.com
	# -----------------------------------------------
	# Author    JoomShaper http://www.joomshaper.com
	# Copyright (C) 2010 - 2013 JoomShaper.com. All Rights Reserved.
	# license - GNU/GPL V2 or Later
	# Websites: http://www.joomshaper.com
	*/

    // no direct access
    defined('_JEXEC') or die('Restricted access');
    
	//Parameters
    $layout					= $params->get('layout','default');
    $moduleName             = basename(dirname(__FILE__));
    $moduleID               = $module->id;
    $moduleClass            = $params->get('moduleclass_sfx','');

    $document               = JFactory::getDocument();
    $cssFile_main           = JPATH_THEMES. '/'.$document->template.'/css/'.$moduleName.'.css';
    $cssFile_layout         = JPATH_THEMES. '/'.$document->template.'/css/'.$moduleName.'-'.$layout.'.css';



    if(file_exists($cssFile_main)) {
        $document->addStylesheet(JURI::base(true) . '/templates/'.$document->template.'/css/'. $moduleName. '.css');
    }

    if(file_exists($cssFile_layout)) {
        $document->addStylesheet(JURI::base(true) . '/templates/'.$document->template.'/css/'. $moduleName.'-'.$layout. '.css');
    }


    require(JModuleHelper::getLayoutPath($moduleName,$layout));