<?php
    /**
     * @package   Hippo Shortcode Button
     * @author    ThemeHippo http://www.themehippo.com
     * @copyright Copyright (c) 2013 - 2014 ThemeHippo
     * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
     */

    //no direct accees
    defined('_JEXEC') or die ('resticted aceess');



    class plgButtonHippoShortcodeButton extends JPlugin
    {

        public function onDisplay($name)
        {

           $link = $this->getLink();

           $button = new JObject;
           $button->modal = true;
           $button->link = $link;
           $button->class = 'btn';
           $button->text = 'Hippo Shortcodes';
           $button->name = 'blank';
           if( JVERSION > 3 ){
            $button->name = 'briefcase';
        } 

        $button->options =  "{handler: 'iframe', size: {x: 800, y: 600}}";

        return $button;

    }

    private function getLink(){

        return '../plugins/editors-xtd/hipposhortcodebutton/popup/index.html';
    }

}

