<?php
/**
 * @version     $Id: name.php 1352 2012-01-03 20:01:20Z ercanozkaya $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * File Name Filter Class
 *
 * @author      Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 */

class ComFilesFilterFileName extends KFilterAbstract
{
	protected $_walk = false;

	protected function _validate($context)
	{
		$value = $this->_sanitize($context->caller->name);

		if ($value == '') {
			$context->setError(JText::_('Invalid file name'));
			return false;
		}
	}

	protected function _sanitize($value)
	{
		return $this->getService('com://admin/files.filter.path')->sanitize($value);
	}
}