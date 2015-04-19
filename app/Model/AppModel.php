<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	function getUniqueUrl($string, $field)
    {
        // Build URL
        
        $currentUrl = $this->_getStringAsURL($string);
        //echo $currentUrl ;
		
        // Look for same URL, if so try until we find a unique one
        
        $conditions = array($this->name . '.' . $field => 'LIKE ' . $currentUrl . '%');
        
        $result = $this->find('all',$conditions);
        
        if ($result !== false && count($result) > 0)
        {
            $sameUrls = array();
            
            foreach($result as $record)
            {
                $sameUrls[] = $record[$this->name][$field];
            }
        }
    
        if (isset($sameUrls) && count($sameUrls) > 0)
        {
            $currentBegginingUrl = $currentUrl;
    
            $currentIndex = 1;
    
            while($currentIndex > 0)
            {
                if (!in_array($currentBegginingUrl . '-' . $currentIndex, $sameUrls))
                {
                    $currentUrl = $currentBegginingUrl . '-' . $currentIndex;
    
                    $currentIndex = -1;
                }
    
                $currentIndex++;
            }
        }
        
        return $currentUrl;
    }
    
    function _getStringAsURL($string)
    {
        // Define the maximum number of characters allowed as part of the URL
        
        $currentMaximumURLLength = 100;
        
        $string = strtolower($string);
        
        // Any non valid characters will be treated as _, also remove duplicate _
        //$string = urlencode($string);
        $string = preg_replace('/(\s|[^\p{Arabic}\w0-9\-])+/u', '-', $string);
        
        
        // Cut at a specified length
        
        if (strlen($string) > $currentMaximumURLLength)
        {
            $string = substr($string, 0, $currentMaximumURLLength);
        }
        
        // Remove beggining and ending signs
        
        $string = preg_replace('/_$/i', '', $string);
        $string = preg_replace('/^_/i', '', $string);
        
        return $string;
    } 
}
