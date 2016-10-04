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
 
/**
 * DWPortfolio component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class DWPortfolioHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */
 
	public static function addSubmenu($vName) 
	{
       JHtmlSidebar::addEntry(
			JText::_('COM_DWPORTFOLIO_SUBMENU_ITEMS'),
			'index.php?option=com_dwportfolio&view=dwitems',
			$vName == 'dwitems'
		);
	
		JHtmlSidebar::addEntry(
			JText::_('COM_DWPORTFOLIO_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_dwportfolio',
			$vName == 'categories'
		);

	}
}