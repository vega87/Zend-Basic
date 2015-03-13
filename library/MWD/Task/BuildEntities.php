<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */



use Doctrine\ORM\Mapping\MappingException;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArgvInput;

/**
 * Show information about mapped entities
 *
 * @license http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link    www.doctrine-project.org
 * @since   2.1
 * @author  Benjamin Eberlei <kontakt@beberlei.de>
 */
class MWD_Task_BuildEntities extends MWD_Task_Abstract
{
    protected $output = null;
    protected function configure()
    {
        $this
            ->setName('MWD:build-entities')
            ->setDescription('creates entities from current database')
            ->setHelp(<<<EOT
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        
        $entityManager = $this->getHelper('em')->getEntityManager();
        
        $this->output->writeln('Deleting current files');
        
        $basePath = APPLICATION_PATH.'/models/entities/';
        $mappingPath = APPLICATION_PATH.'/models/yml/';
        
        $this->deleteDirContent($basePath);
        //$this->deleteDirContent($mappingPath);
        
        $this->output->writeln('');
        $this->output->writeln('Generating base annotations from database');
        
        $argv = array();
        $argv[] = './doctrine';
        $argv[] = 'MWD:convert-mapping';
        $argv[] = '--namespace=Entity_';
        $argv[] = '--extend=MWD_Doctrine_Entity_Abstract';
        $argv[] = '--from-database';
        $argv[] = 'annotation';
        $argv[] = $basePath;
        
        $this->executeExternalCommand($argv);
        $argv = array();
        $argv[] = './doctrine';
        $argv[] = 'orm:generate-entities';
        $argv[] = '--update-entities';
        $argv[] = '--extend=MWD_Doctrine_Entity_Abstract';
        $argv[] = $basePath;

        $this->executeExternalCommand($argv);

        $entityClassNames = $entityManager->getConfiguration()
                                          ->getMetadataDriverImpl()
                                          ->getAllClassNames();

        if (!$entityClassNames) {
            throw new \Exception(
                'You do not have any mapped Doctrine ORM entities according to the current configuration. '.
                'If you have entities or mapping files you should check your mapping configuration for errors.'
            );
        }

        $this->output->writeln('');
    }
    
    protected function executeExternalCommand($argvInput) {
        
        $argv = new ArgvInput($argvInput);
        
        $this->getApplication()->setAutoExit(false);
        
        $cli = clone $this->getApplication();
        
        $cli->run($argv, $this->output);
    }
}
