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

    public function __construct($environment, $debugMode, array $bundles)
    {
        $this->environment = $environment;
        $this->debugMode = $debugMode;
        $this->bundles = $bundles;
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
        ]);
    }
}
