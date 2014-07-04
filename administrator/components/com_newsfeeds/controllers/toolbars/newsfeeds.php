<?php
/**
 * @version     $Id: newsfeeds.php 2100 2011-06-29 23:56:52Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Newsfeeds
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Newsfeeds Toolbar Class
 *
 * @author      Babs G�sgens <http://nooku.assembla.com/profile/babsgosgens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Newsfeeds
 */
class ComNewsfeedsControllerToolbarNewsfeeds extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()
			 ->addEnable()
			 ->addDisable();
	
	    return parent::getCommands();
    }
}