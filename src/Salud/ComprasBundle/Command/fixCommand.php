<?php

/*
 * This file can by used to help in generating the correct entity files for Doctrine when using them with annotations
 *
 * (c) Florin Patan <florinpatan@gmail.com>
 *
 * You need to have Symfony 2 Beta 4 in order to use this.
 * If you don't use it in the default Acme\DemoBundle you also need to create the 'Command' directory
 * under your bundle directory and place this under FixCommand.php file (like this: /src/Acme/DemoBundle/Command/FixCommand.php)
 *
 * Hope this helps you and if you have any improvements for it let me know :)
 */

namespace Salud\ComprasBundle\Command;

//use Symfony\Bundle\FrameworkBundle\Command\Command;
use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

class FixCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('doctrine:fixentities')
            ->setDescription('Fix entities generated by doctrine:mapping:import using annotations')
            ->addArgument('bundlename', InputArgument::REQUIRED, 'Name of the bundle that should be fixed')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bundleName = $input->getArgument('bundlename');

        $bundle = $this->getApplication()->getKernel()->getBundle($bundleName);

        $path = $bundle->getPath() . '/Entity/';

        $finder = new Finder();
        $finder->files()->name('/\.php$/')->in($path);

        foreach ($finder as $file) {
            $entity = $file->getRealpath();

            $content = file_get_contents($entity);

            $find = '@use Doctrine\\\ORM\\\Mapping as ORM@iu';

            $count = preg_match_all($find, $content, $matches);

            if($count == 0) {
                $find    = array("@namespace " . str_replace('\\', '\\\\',$bundle->getNamespace()) . "\\\Entity;@iu");
                $replace = array("namespace " . $bundle->getNamespace() . "\\Entity;\n\nuse Doctrine\\ORM\\Mapping as ORM;\n");
                $content = preg_replace($find, $replace, $content);
            }

            $find = array(
                "/@Column/iu",
                "/@ChangeTrackingPolicy/iu",
                "/@DiscriminatorColumn/iu",
                "/@DiscriminatorMap/iu",
                "/@Entity/iu",
                "/@GeneratedValue/iu",
                "/@HasLifecycleCallbacks/iu",
                "/@Index/iu",
                "/@Id/iu",
                "/@InheritanceType/iu",
                "/@JoinColumn/iu",
                "/@JoinTable/iu",
                "/@ManyToOne/iu",
                "/@ManyToMany/iu",
                "/@MappedSuperclass/iu",
                "/@OneToOne/iu",
                "/@OneToMany/iu",
                "/@OrderBy/iu",
                "/@PostLoad/iu",
                "/@PostPersist/iu",
                "/@PostRemove/iu",
                "/@PostUpdate/iu",
                "/@PrePersist/iu",
                "/@PreRemove/iu",
                "/@PreUpdate/iu",
                "/@SequenceGenerator/iu",
                "/@Table/iu",
                "/@UniqueConstraint/iu",
                "/@Version/iu"
            );

            $replace = array(
                "@ORM\\Column",
                "@ORM\\ChangeTrackingPolicy",
                "@ORM\\DiscriminatorColumn",
                "@ORM\\DiscriminatorMap",
                "@ORM\\Entity",
                "@ORM\\GeneratedValue",
                "@ORM\\HasLifecycleCallbacks",
                "@ORM\\Index",
                "@ORM\\Id",
                "@ORM\\InheritanceType",
                "@ORM\\JoinColumn",
                "@ORM\\JoinTable",
                "@ORM\\ManyToOne",
                "@ORM\\ManyToMany",
                "@ORM\\MappedSuperclass",
                "@ORM\\OneToOne",
                "@ORM\\OneToMany",
                "@ORM\\OrderBy",
                "@ORM\\PostLoad",
                "@ORM\\PostPersist",
                "@ORM\\PostRemove",
                "@ORM\\PostUpdate",
                "@ORM\\PrePersist",
                "@ORM\\PreRemove",
                "@ORM\\PreUpdate",
                "@ORM\\SequenceGenerator",
                "@ORM\\Table",
                "@ORM\\UniqueConstraint",
                "@ORM\\Version"
            );

            $content = preg_replace($find, $replace, $content);

            file_put_contents($entity, $content);

            $output->writeln("File <info>".$entity."</info> was converted");
        }
    }
}
