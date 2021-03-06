<?php
namespace Tpg\ExtjsBundle\Command;

use Sensio\Bundle\GeneratorBundle\Command\GenerateControllerCommand;
use Sensio\Bundle\GeneratorBundle\Command\Validators;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tpg\ExtjsBundle\Generator\RestControllerGenerator;

class GenerateRestControllerCommand extends GenerateControllerCommand {

    /** @var  InputInterface */
    protected $input;

    public function configure() {
        parent::configure();
        $this->setName('generate:rest:controller');
        $this->addOption('entity', '', InputOption::VALUE_REQUIRED, "Entity this rest controller will manage");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        Validators::validateEntityName($input->getOption('entity'));
        parent::execute($input, $output);
    }

    protected function createGenerator()
    {
        $generator = new RestControllerGenerator($this->getContainer()->get('filesystem'));
        list($bundle, $entity) = $this->parseShortcutNotation($this->input->getOption('entity'));
        $generator->setEntityName($entity);
        return $generator;
    }

    protected function getSkeletonDirs($bundle = null)
    {
        $dirs = parent::getSkeletonDirs($bundle);
        array_unshift($dirs, __DIR__.'/../Resources/skeleton');
        return $dirs;
    }
}