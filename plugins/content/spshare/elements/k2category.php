<?php
/**
* @author    JoomShaper http://www.joomshaper.com
* @copyright Copyright (C) 2010 - 2013 JoomShaper
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
class JFormFieldK2Category extends JFormField {
	
	var	$type = 'k2category';
	
	function getInput(){
		$db = JFactory::getDBO();
		$fieldName = $this->name.'[]';
		
		if (file_exists(JPATH_BASE. '/components/com_k2')) {
			$query = 'SELECT m.* FROM #__k2_categories m WHERE published=1 AND trash = 0 ORDER BY parent, ordering';
			$db->setQuery($query);
			$mitems = $db->loadObjectList();
			if (count($mitems)) {
				$children = array();
				if ($mitems)
				{
					foreach ($mitems as $v)
					{
						$v->title = $v->name;
						$v->parent_id = $v->parent;
						$pt = $v->parent;
						$list = @$children[$pt] ? $children[$pt] : array();
						array_push($list, $v);
						$children[$pt] = $list;
					}
				}
				$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0);
				$mitems = array();

				foreach ($list as $item)
				{
					$item->treename = JString::str_ireplace('&#160;', '- ', $item->treename);
					$mitems[] = JHTML::_('select.option', $item->id, '   '.$item->treename);
				}

				$output = JHTML::_('select.genericlist', $mitems, $fieldName, 'class="inputbox" multiple="multiple" size="10"', 'value', 'text', $this->value);
			} else {
				$mitems[] = JHTML::_('select.option', 0, 'There is no K2 category available.');
				$output   = JHtml::_('select.genericlist', $mitems, $fieldName, 'class="inputbox" disabled="disabled" multiple="multiple" style="width:160px" size="5"', 'value', 'text', $this->value);		
			}
		
		} else {
			$mitems = array();
			$mitems[] = JHTML::_('select.option', 0, 'K2 is not installed');
			$output   = JHtml::_('select.genericlist', $mitems, $fieldName, 'class="inputbox" disabled="disabled" multiple="multiple" style="width:160px" size="5"', 'value', 'text', $this->value);
		}
		
		return $output;
	}
}