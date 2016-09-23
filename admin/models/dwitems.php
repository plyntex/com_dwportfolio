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
 * HelloWorldList Model
 *
 * @since  0.0.1
 */
class DWPortfolioModelDWItems extends JModelList
{
	/**	 * Constructor.
	*
	* @param   array  $config  An optional associative array of configuration settings.	
	*	
	* @see     JController	 
	* @since   1.6	 
	*/
	public function __construct($config = array())
	{
		if(empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
					'id',
					'title',
					'created'
			);
		}
		
		parent::__construct($config);
	}
	
	
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function  getListQuery()
	{
		//initialize variable.
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		//create the base select statement.
		$query->select('*')
			->from($db->quoteName('#__dwportfolio'));
		
		//filter like / search
		$search = $this->getState('filter.search');
		
		if( !empty($search) )
		{
			$like = $db->quote('%'. $search .'%');
			$query->where('title LIKE '. $like);
		}
		
		//filter by publish state
		$published = $this->getState('filter.published');
		
		if( is_numeric($published) )
		{
			$query->where('published = '. (int)$published );
		}
		elseif( $published === '' )
		{
			$query->where('published IN (0,1)');
		}
		
		//Add the list ordering clause
		$orderCol = $this->state->get('list.ordering', 'title');
		$orderDirn = $this->state->get('list.direction', 'asc'); 
		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
		
		
		return $query;
		
		
	}
}