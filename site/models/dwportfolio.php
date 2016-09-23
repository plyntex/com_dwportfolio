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
 * DWPortfolio Model
 *
 * @since  0.0.1
 */
class DWPortfolioModelDWPortfolio extends JModelItem
{
	/**
	 * @var string message
	 */
	protected $items;
	protected $filters;
 	private $_parent = null;
	
	
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
	public function getTable($type = 'DWPortfolio', $prefix = 'DWPortfolioTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	/**
	 * Get the message
         *
	 * @return  string  The message to be displayed to the user
	 */
	public function getItems($catId = 0)
	{
		if (!is_array($this->items))
		{
			$this->items = array();
		}
 
		if (empty($this->items))
		{
			$db = JFactory::getDbo();
            // Create a new query object.
            $query = $db->getQuery(true);

            // Select all records from the user profile table where key begins with "custom.".
            // Order it by the ordering field.
            $query->select('#__dwportfolio.id as id,#__dwportfolio.title as title,image,menuitem, #__categories.title as category, #__categories.alias  as category_alias, catid');
			$query->from('#__dwportfolio');
			$query->leftJoin('#__categories on catid=#__categories.id');
			// Retrieve only published items
			$query->where('#__dwportfolio.published = 1');
			$query->order('created ASC');
			$db->setQuery((string) $query);
			$this->itemsitems = $db->loadObjectList();
           

            // Reset the query using our newly populated query object.
            $db->setQuery($query);

            // Load the results as a list of stdClass objects (see later for more options on retrieving data).
            $this->items = $db->loadObjectList();
		}
 
		return $this->items;
	}
	
	public function getFilters()
	{
		$recursive = false;
		jimport( 'joomla.application.categories' );
		$app = JFactory::getApplication();
			
		$options = array();
		$options['countItems'] = 20;
		$categories = JCategories::getInstance('DWPortfolio', $options);
		$this->_parent = $categories->get('root');
		if (is_object($this->_parent)) {
			$this->filters = $this->_parent->getChildren($recursive);
		}
		else {
			$this->filters = false;
		}
		
		return $this->filters;
	}
}