<?php
/**
*   Zanby Enterprise Group Family System
*
*    Copyright (C) 2005-2011 Zanby LLC. (http://www.zanby.com)
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*    To contact Zanby LLC, send email to info@zanby.com.  Our mailing
*    address is:
*
*            Zanby LLC
*            3611 Farmington Road
*            Minnetonka, MN 55305
*
* @category   Zanby
* @package    Zanby
* @copyright  Copyright (c) 2005-2011 Zanby LLC. (http://www.zanby.com)
* @license    http://zanby.com/license/     GPL License
* @version    <this will be auto generated>
*/

/**
 * Warecorp FRAMEWORK
 *
 * @package    Warecorp
 * @copyright  Copyright (c) 2007
 */

/**
 *
 *
 */
class BaseWarecorp_Templates_Main
{
    public $templates;
    public $userIdTemplate;
    public $isDrag;

    /**
     * Constructor.
     *
     */
    public function __construct($user_id = null, $is_drag = null)
    {
    	$this->userIdTemplate = $user_id;
    	$this->isDrag = $is_drag;
    	$this->templates = array(1 => 'main.tpl', 2 => 'main_anon.tpl', 3 => 'main_dd.tpl');
    }
    
    /**
	 * get template name
	 * @param 
	 * @return $this->templates[index]
	 * @author Kostevich Vadim
	 */
    public function GetTemplate()
    {
    	$index = $this->CheckAccess();
    	return $this->templates[$index];
    }
    
    /**
	 * check acess for some templates and return template index
	 * @param 
	 * @return template index
	 * @author Kostevich Vadim
	 */
    public function CheckAccess()
    {
    	if (!empty($this->isDrag))
    	{
    		return 3;
    	}
    	elseif (!empty($this->userIdTemplate) && ($this->userIdTemplate > 0))
    	{
    		return 1;
    	}
    	else 
    	{
    		return 2;
    	}
    }

}