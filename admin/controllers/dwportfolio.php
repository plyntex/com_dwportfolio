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
 * DWPortfolio Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_dwportfolio
 * @since       0.0.9
 */
class DWPortfolioControllerDWPortfolio extends JControllerForm
{
	public function save($key = null, $urlVar = null) {
		$return = parent::save($key, $urlVar);
		$this->setRedirect(JRoute::_('index.php?option=com_dwportfolio'));
		return $return;
	}

	public function cancel($key = null, $urlVar = null) {
		$return = parent::cancel($key, $urlVar);
		$this->setRedirect(JRoute::_('index.php?option=com_dwportfolio'));
		return $return;
	}
}