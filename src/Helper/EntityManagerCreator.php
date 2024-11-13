<?php

namespace doctrine\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {

        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/..'],
            isDevMode: true
        );
        $config->setMiddlewares([
            new Middleware(
                new ConsoleLogger(
                    new ConsoleOutput(
                        OutputInterface::VERBOSITY_DEBUG)))]);

        // configuring the database connection
        $connection = DriverManager::getConnection([
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ], $config);

        // obtaining the entity manager
        return new EntityManager($connection, $config);
        
    }

}