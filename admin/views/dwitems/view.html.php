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
 * Forms View
 *
 * @since  0.0.1
 */

class DWPortfolioViewDWItems extends JViewLegacy 
{
	/**
	 * Display the Forms view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$context = "dwportfolio.list.admin.dwportfolio";
		
		//Get data from model
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');
		$this->filter_order = $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'title', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');		
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');
		
		//Check errors
		if(count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Set the submenu
		DWPortfolioHelper::addSubmenu('dwitems');
		
		//Set the toolbar
		$this->addToolBar();
		
		//display template
		parent::display($tpl);
		
		//set the document
		$this->setDocument();
	}
	
	
	protected function addToolBar()
	{
		$title = JText::_('COM_DWPORTFOLIO_MANAGER_DWITEMS');
		
		if($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}
		
		
		JToolBarHelper::title($title, 'dwportfolio');
		JToolBarHelper::addNew('dwportfolio.add');
		JToolBarHelper::editList('dwportfolio.edit');
		JToolBarHelper::deleteList('', 'dwitems.delete');
	}
	
	/**	 
	* Method to set up the document properties	 
	* 
	* @return void	 
	*/
	protected function setDocument() {
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_DWPORTFOLIO_ADMINISTRATION'));
	}
	
}