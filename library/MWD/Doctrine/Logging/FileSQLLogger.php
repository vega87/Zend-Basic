<?php
/**
 * Created by PhpStorm.
 * User: MWD
 * Date: 16.03.15
 * Time: 15:26
 */

use Doctrine\DBAL\Logging\SQLLogger;

/**
 * A SQL logger that logs to the standard output using echo/var_dump.
 *
 * @license http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link    www.doctrine-project.org
 * @since   2.0
 * @version $Revision$
 * @author  Benjamin Eberlei <kontakt@beberlei.de>
 * @author  Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author  Jonathan Wage <jonwage@gmail.com>
 * @author  Roman Borschel <roman@code-factory.org>
 */
class MWD_Doctrine_Logging_FileSQLLogger implements SQLLogger
{
    /**
     * {@inheritdoc}
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
        $connectionSettings = MWD_System_ClassManager::getStaticInstance('MWD_Config', 'getInstance')->getValue('doctrine');

        if(!is_dir($connectionSettings['logPath'])){
            mkdir($connectionSettings['logPath']);
            chmod($connectionSettings['logPath'],0777);
        }


        $log = "[ ".date('d.m.Y H:i:s')." ] \n".$sql . PHP_EOL;

        if ($params) {
            $log .= print_r($params,true);
        }

        if ($types) {
            $log .= print_r($types,true);
        }

        file_put_contents($connectionSettings['logPath'].'doctrine2_query_log.log',$log."\n");
    }

    /**
     * {@inheritdoc}
     */
    public function stopQuery()
    {

    }
}