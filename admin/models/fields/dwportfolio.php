<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_dwportfolio
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
JFormHelper::loadFieldClass('list');
 
/**
 * DWPortfolio Form Field class for the DWPortfolio component
 *
 * @since  0.0.1
 */

class JFormFieldDWPortfolio extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'DWPortfolio';
	
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__dwportfolio.id as id,#__dwportfolio.title as title, #__categories.title as category, catid');
		$query->from('#__dwportfolio');
		$query->leftJoin('#__categories on catid=#__categories.id');
		// Retrieve only published items
		$query->where('#__dwportfolio.published = 1');
		$db->setQuery((string) $query);
		$items = $db->loadObjectList();
		$options  = array();
	
		if ($items)
		{
			foreach ($items as $item)
			{
				$options[] = JHtml::_('select.option', $item->id, $item->title .
					($item->catid ? ' (' . $item->category . ')' : ''));
			}
		}
	
		$options = array_merge(parent::getOptions(), $options);
	
		return $options;
	}
}