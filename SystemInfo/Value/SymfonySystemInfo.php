<?php

/**
 * File containing the SymfonySystemInfo class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzSupportToolsBundle\SystemInfo\Value;

use eZ\Publish\API\Repository\Values\ValueObject;

/**
 * Value for information about the Symfony installation we are using.
 */
class SymfonySystemInfo extends ValueObject implements SystemInfo
{
    /**
     * Symfony environment.
     *
     * "dev" or "prod".
     *
     * @var string
     */
    public $environment;

    /**
     * True if Symfony is in debug mode.
     *
     * @var bool
     */
    public $debugMode;

    /**
     * Symfony version.
     *
     * Example: 2.7.10
     *
     * @var string
     */
    public $version;

    /**
     * Installed bundles.
     *
     * A hash containing the active bundles (keys) and the corresponding namespaces.
     *
     * Example:
     * array (
     *   'AppBundle' => 'AppBundle\\AppBundle',
     *   'AsseticBundle' => 'Symfony\\Bundle\\AsseticBundle\\AsseticBundle',
     * )
     *
     * @var array
     */
    public $bundles;
}
