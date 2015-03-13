<?php

use Doctrine\ORM\Mapping\MappingException;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArgvInput;

abstract class MWD_Task_Abstract extends Command {
    protected $output = null;
    
    protected function deleteDirContent($dirPath) {
        $dir = new DirectoryIterator($dirPath);
        foreach ($dir as $entity) {
            if($entity->isDot() || $entity->isDir()) {
                continue;
            }
            $this->output->writeln('Deleting '.$dirPath.DIRECTORY_SEPARATOR.$entity->getFilename());
            unlink($dirPath.DIRECTORY_SEPARATOR.$entity->getFilename());
        }
    }
    
}
?>
