<?php
require_once (APPLICATION_PATH . '/../library/Doctrine/Common/ClassLoader.php');

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration as DoctrineConfiguration,
    Doctrine\Common\EventManager as DoctrineEventManager,
    Doctrine\ORM\EntityManager as DoctrineEntityManager,
    Doctrine\Common\Cache\ApcCache as DoctrineApcCache,
    Doctrine\Common\Cache\ArrayCache as DoctrineArrayCache;
/**
 * Created by JetBrains PhpStorm.
 * User: XeroX
 * Date: 24.03.13
 * Time: 23:20
 * To change this template use File | Settings | File Templates.
 */
class MWD_Doctrine_DoctrineLoader extends MWD_Singleton{
    public static function init() {
        self::_initClassLoader();
        self::_initDoctrine2();
        self::_datatypeHotfixes();
    }

    protected static function _initClassLoader() {
        /**
         *
         * DOCTRINE AUTOLOADER
         *
         */
        $doctrineLoader = new \Doctrine\Common\ClassLoader(
            'Doctrine',
            APPLICATION_PATH . '/../library/'
        );

        $doctrineAutoloader = array($doctrineLoader, 'loadClass');
        spl_autoload_unregister($doctrineAutoloader);

        /**
         *
         * SYMFONY AUTOLOADER
         *
         */
        $symfonyLoader = new \Doctrine\Common\ClassLoader(
            'Symfony',
            APPLICATION_PATH . '/../library/Doctrine/'
        );

        $symfonyAutoloader = array($symfonyLoader, 'loadClass');
        spl_autoload_unregister($doctrineAutoloader);

        /**
         *
         * MWD AUTOLOADER
         *
         */
        $MWDLoader = MWD_System_ClassManager::getInstance('MWD_System_Autoloader');
        $MWDAutoloader = array($MWDLoader, 'loadClass');

        /**
         *
         * INIT ALL AUTOLOADER BY DEFINED NAMESPACES
         *
         */
        $autoloader = MWD_System_ClassManager::getStaticInstance('Zend_Loader_Autoloader', 'getInstance');
        $autoloader->pushAutoloader($doctrineAutoloader, 'Doctrine\\');
        $autoloader->pushAutoloader($symfonyAutoloader, 'Symfony\\');
        $autoloader->pushAutoloader($MWDAutoloader, array('Schema','Entity', 'Repository'));



    }

    protected static function _initDoctrine2() {
        /**
         *
         * INIT DOCTRINE 2
         *
         */
        // create the Doctrine configuration
        $config = new \Doctrine\ORM\Configuration();
        $cache = new \Doctrine\Common\Cache\ArrayCache;

        // configure doctrine2
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // configure annotations driver
        $driver = $config->newDefaultAnnotationDriver(APPLICATION_PATH.'/models/entities/');
        $config->setMetadataDriverImpl($driver);

        // configure proxies
        $config->setProxyDir(APPLICATION_PATH . '/models/proxies');
        $config->setProxyNamespace('Proxies_');
        $config->setAutoGenerateProxyClasses(true);

        //Doctrine LOGGER aktivieren
        //$config->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());


        // now create the entity manager and use the connection
        // settings we defined in our application.ini
        $configPath = APPLICATION_PATH . DS . 'configs'. DS . 'application.ini';

        if (file_exists($configPath)) {
            $supplementalConfig = MWD_System_ClassManager::getInstance('MWD_Config', $configPath);
            //print_r($supplementalConfig); exit;
            MWD_System_ClassManager::getStaticInstance('MWD_Config', 'createInstance', $supplementalConfig);
        }
        $connectionSettings = MWD_System_ClassManager::getStaticInstance('MWD_Config', 'getInstance')->getValue('doctrine.connectionParameters');

        //print_r($connectionSettings);
        $conn = array(
            'driver'    => $connectionSettings['driver'],
            'user'      => $connectionSettings['user'],
            'password'  => $connectionSettings['password'],
            'dbname'    => $connectionSettings['dbname'],
            'host'      => $connectionSettings['host'],
            'port'      => empty($connectionSettings['port']) ? 3306 : $connectionSettings['port']
        );

        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

        // $entityManager is an instance of EntityManager
        // Add UTF8 handler to EntityManager
        $entityManager->getEventManager()->addEventSubscriber(
            new \Doctrine\DBAL\Event\Listeners\MysqlSessionInit('utf8', 'utf8_unicode_ci')
        );

        // push the entity manager into our registry for later use
        $registry = Zend_Registry::getInstance();
        $registry->entitymanager = $entityManager;

        return $entityManager;
    }

    protected static function _datatypeHotfixes() {
        $entityManager = Zend_Registry::get('entitymanager');
        $entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum','string');
        $entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('date','string');
        $entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('datetime','string');

    }
}