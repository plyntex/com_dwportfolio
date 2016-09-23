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
 * DWPortfolio View
 *
 * @since  0.0.1
 */

class DWPortfolioViewDWPortfolio extends JViewLegacy 
{
	/**
	 * View form
	 *
	 * @var         form
	 */
	protected $form = null;
	
	/**
	 * Display the DWPortfolio view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null) {
		// Get data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');
		
		//errors check
		if( count($errors = $this->get('Errors')) )
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		//Add ToolBar
		$this->addToolBar();
		

		//Display Template
		parent::display($tpl);
		
		//set document
		$this->setDocument();
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		if ($isNew)
		{
			$title = JText::_('COM_DWPORTFOLIO_MANAGER_DWPORTFOLIO_NEW');
		}
		else
		{
			$title = JText::_('COM_DWPORTFOLIO_MANAGER_DWPORTFOLIO_EDIT');
		}

		JToolBarHelper::title($title, 'dwportfolio');
		JToolBarHelper::save('dwportfolio.save');
		JToolBarHelper::cancel(
			'dwportfolio.cancel',
			$isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
		);
	}
	
	/**	
	* Method to set up the document properties	 
	* 	 
	* @return void	 
	**/	
	protected function setDocument() 
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_DWPORTFOLIO_DWPORTFOLIO_CREATING') : 
				JText::_('COM_DWPORTFOLIO_DWPORTFOLIO_EDITING'));	
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "administrator/components/com_dwportfolio/views/dwportfolio/submitbutton.js");
		Jtext::script('COM_DWPORTFOLIO_DWPORTFOLIO_ERROR_UNACCEPTABLE');
	}
	
}