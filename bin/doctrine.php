<?php
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
define("APPLICATION_ENV", 'development');

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

// Doctrine and Symfony Classes
require_once APPLICATION_PATH.'/../library/Doctrine/Common/ClassLoader.php';
require_once APPLICATION_PATH.'/../library/MWD/System/Autoloader.php';
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', APPLICATION_PATH . '/../library');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Symfony', APPLICATION_PATH . '/../library/Doctrine');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Entities', APPLICATION_PATH . '/models');
$classLoader->setNamespaceSeparator('_');
$classLoader->register();

require_once('../public/bootstrap.php');

/** Zend_Application */
require_once 'Zend/Application.php';
Zend_Loader_Autoloader::getInstance()->registerNamespace('MWD_');
MWD_Doctrine_DoctrineLoader::init();

$registry = Zend_Registry::getInstance();
// generate the Doctrine HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($registry->entitymanager->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($registry->entitymanager)
));

$cli = new Symfony\Component\Console\Application('Doctrine Command Line Interface', \Doctrine\ORM\Version::VERSION);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);

$cli->addCommands(array(
    // DBAL Commands
    new \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand(),
    new \Doctrine\DBAL\Tools\Console\Command\ImportCommand(),

    // ORM Commands
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
    new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
    new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(),
    new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
    new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand(),
    new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
    new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
    new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
    new \Doctrine\ORM\Tools\Console\Command\RunDqlCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand(),


    // MWD COMMANDS
    new MWD_Task_BuildEntities(),
    new MWD_Task_ConvertMapping()


));


$cli->run();

//\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);

?>
