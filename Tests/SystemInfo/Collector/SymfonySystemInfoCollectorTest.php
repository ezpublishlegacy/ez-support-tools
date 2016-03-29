<?php

/**
 * File containing the SymfonySystemInfoCollectorTest class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzSupportToolsBundle\Tests\SystemInfo\Collector;

use EzSystems\EzSupportToolsBundle\SystemInfo\Collector\SymfonySystemInfoCollector;
use EzSystems\EzSupportToolsBundle\SystemInfo\Value\SymfonySystemInfo;
use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpKernel\Kernel;

class SymfonySystemInfoCollectorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \EzSystems\EzSupportToolsBundle\SystemInfo\Collector\SymfonySystemInfoCollector::collect()
     */
    public function testCollect()
    {
        $expected = new SymfonySystemInfo([
            'environment' => 'dev',
            'debugMode' => true,
            'version' => Kernel::VERSION,
            'bundles' => [
                'AppBundle' => 'AppBundle\\AppBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'eZPlatformUIBundle' => 'EzSystems\\PlatformUIBundle\\EzSystemsPlatformUIBundle',
                'EzPublishCoreBundle' => 'eZ\\Bundle\\EzPublishCoreBundle\\EzPublishCoreBundle',
                'EzSystemsEzSupportToolsBundle' => 'EzSystems\\EzSupportToolsBundle\\EzSystemsEzSupportToolsBundle',
            ],
            'rootDir' => '/srv/www/ezpublish-platform/app',
            'name' => 'app',
            'cacheDir' => '/srv/www/ezpublish-platform/app/cache/prod',
            'logsDir' => '/srv/www/ezpublish-platform/app/logs',
            'charset' => 'UTF-8',
            'containterClass' => 'appProdDebugProjectContainer',
        ]);

        $symfonyCollector = new SymfonySystemInfoCollector(
            $expected->environment,
            $expected->debugMode,
            $expected->bundles,
            $expected->rootDir,
            $expected->name,
            $expected->cacheDir,
            $expected->logsDir,
            $expected->charset,
            $expected->containterClass
        );

        $value = $symfonyCollector->collect();

        self::assertInstanceOf('EzSystems\EzSupportToolsBundle\SystemInfo\Value\SymfonySystemInfo', $value);

        self::assertEquals($expected, $value);
    }
}