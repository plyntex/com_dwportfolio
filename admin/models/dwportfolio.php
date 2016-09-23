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
 * DWPortfolio Model
 *
 * @since  0.0.1
 */

class DWPortfolioModelDWPortfolio extends JModelAdmin
{
	 /**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = "DWPortfolio", $prefix = 'DWPortfolioTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	
	public function getForm($data = array(), $loadData = true)
	{
		//Get Form
		$form = $this->loadForm(
				'com_dwportfolio.dwportfolio',
				'dwportfolio',
				array(
						'control' => 'jform',
						'load_data' => $loadData
				)
		);
		
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	
	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  mixed  Object on success, false on failure.
	 */
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk))
		{
			if (!empty($item->id))
			{
				$item->tags = new JHelperTags;
				$item->tags->getTagIds($item->id, 'com_dwportfolio.dwportfolio');
			}
		}

		return $item;
	}
	
	/**	 
	* Method to get the script that have to be included on the form	 
	*
	* @return string	Script files	
	*/
	public function getScript()
	{
		return 'administrator/components/com_dwportfolio/models/forms/dwportfolio.js';	
	}
	
	
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check seeesion for preciously entered form data
		$data = JFactory::getApplication()->getUserState(
				'com_dwportfolio.edit.dwportfolio.data',
				array()
		);
		if (empty($data))
		{
			$data = $this->getItem();
		}
		
		return $data;
	}
	
}