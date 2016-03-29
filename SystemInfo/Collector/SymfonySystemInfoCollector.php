<?php

/**
 * File containing the SymfonySystemInfoCollector class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzSupportToolsBundle\SystemInfo\Collector;

use EzSystems\EzSupportToolsBundle\SystemInfo\Value;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Collects information about the Symfony installation we are using.
 */
class SymfonySystemInfoCollector implements SystemInfoCollector
{
    /**
     * Symfony environment.
     *
     * "dev" or "prod".
     *
     * @var string
     */
    private $environment;

    /**
     * True if Symfony is in debug mode.
     *
     * @var bool
     */
    private $debugMode;

    /**
     * An array containing the active bundles (keys) and the corresponding namespace.
     *
     * @var array
     */
    private $bundles;

    /**
     * Root directory.
     *
     * @var string
     */
    private $rootDir;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Cache directory.
     *
     * @var string
     */
    private $cacheDir;

    /**
     * Log file directory.
     *
     * @var string
     */
    private $logsDir;

    /**
     * Character set.
     *
     * @var string
     */
    private $charset;

    /**
     * Container class.
     *
     * @var string
     */
    private $containterClass;

    public function __construct(
        $environment,
        $debugMode,
        array $bundles,
        $rootDir,
        $name,
        $cacheDir,
        $logsDir,
        $charset,
        $containterClass
    )
    {
        $this->environment = $environment;
        $this->debugMode = $debugMode;
        $this->bundles = $bundles;
        $this->rootDir = $rootDir;
        $this->name = $name;
        $this->cacheDir = $cacheDir;
        $this->logsDir = $logsDir;
        $this->charset = $charset;
        $this->containterClass = $containterClass;
    }

    /**
     * Collects information about Symfony.
     *
     * @return Value\SymfonySystemInfo
     */
    public function collect()
    {
        ksort($this->bundles, SORT_FLAG_CASE | SORT_STRING);

        return new Value\SymfonySystemInfo([
            'environment' => $this->environment,
            'debugMode' => $this->debugMode,
            'version' => Kernel::VERSION,
            'bundles' => $this->bundles,
            'rootDir' => $this->rootDir,
            'name' => $this->name,
            'cacheDir' => $this->cacheDir,
            'logsDir' => $this->logsDir,
            'charset' => $this->charset,
            'containterClass' => $this->containterClass,
        ]);
    }
}
