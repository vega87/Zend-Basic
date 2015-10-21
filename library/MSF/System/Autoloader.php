<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Application
 * @subpackage Module
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @version    $Id: Autoloader.php 23775 2011-03-01 17:25:24Z ralph $
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

/** @see Zend_Loader_Autoloader_Resource */
require_once 'Zend/Loader/Autoloader/Resource.php';

/**
 * Resource loader for application module classes
 *
 * @uses       Zend_Loader_Autoloader_Resource
 * @category   Zend
 * @package    Zend_Application
 * @subpackage Module
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class MSF_System_Autoloader extends Zend_Loader_Autoloader_Resource
{
    private static $_staticRoutes;

    /**
     * Constructor
     *
     * @param  array|Zend_Config $options
     * @return void
     */
    public function __construct($options = array())
    {
        $this->_initStaticRoutes();

        // can be deactivated for singleton call
        if(!empty($options)) {
            parent::__construct($options);
            $this->initDefaultResourceTypes();
        }
    }

    private function _initStaticRoutes() {
        self::$_staticRoutes = array(
            'Entity_' => APPLICATION_PATH.'/models/entities/',
            'Repository_' => APPLICATION_PATH.'/models/repositories/',
            'Mapping_' => APPLICATION_PATH.'/models/mapping/',
        );
    }

    public function loadClass($className)
    {
        foreach(self::$_staticRoutes as $name => $path) {
            if(strpos($className, $name) !== false) {
                require_once($path.DIRECTORY_SEPARATOR.$className.".php");
                return true;
            }
        }
    }

    /**
     * Initialize default resource types for module resource classes
     *
     * @return void
     */
    public function initDefaultResourceTypes()
    {
        $basePath = $this->getBasePath();
        $this->addResourceTypes(array(
            'schemabase' => array(
                'namespace' => 'Schema_Entity_Base',
                'path'      => APPLICATION_PATH.'/../data/db/Base/',
            ),
            'dbtable' => array(
                'namespace' => 'Entity',
                'path'      => APPLICATION_PATH.'/models/entities/',
            )
        ));
        $this->setDefaultResourceType('application');
    }
}
