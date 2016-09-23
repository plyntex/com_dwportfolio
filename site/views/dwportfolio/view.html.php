<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_dwportfolio
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the DWPortfolio Component
 *
 * @since  0.0.1
 */
 
JHtml::_('jquery.framework');
$document = JFactory::getDocument();
$document->addScript(JURI::base(true).'/components/com_dwportfolio/assets/js/isotope.pkgd.min.js');
$document->addScript(JURI::base(true).'/components/com_dwportfolio/assets/js/dwportfolio.js');
//$document->addScript(JURI::base(true).'components/com_dwportfolio/assets/js/jquery.colio.min.js');



 
class DWPortfolioViewDWPortfolio extends JViewLegacy
{
	/**
	 * Display the DWPortfolio view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->filters = $this->get('Filters');
		
		$app = JFactory::getApplication('site');
		$active       = $app->getMenu()->getActive();
		$this->params = $active->params;
			
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
		
			return false;
		}
 
		// Display the view
		parent::display($tpl);
	}
}