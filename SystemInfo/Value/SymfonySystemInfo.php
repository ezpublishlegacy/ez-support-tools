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

    /**
     * Root directory.
     *
     * Example: /srv/www/ezpublish-platform/app
     *
     * @var string
     */
    public $rootDir;

    /**
     * Name.
     *
     * Example: app
     *
     * @var string
     */
    public $name;

    /**
     * Cache directory.
     *
     * Example: /srv/www/ezpublish-platform/app/cache/prod
     *
     * @var string
     */
    public $cacheDir;

    /**
     * Log file directory.
     *
     * Example: /srv/www/ezpublish-platform/app/logs
     *
     * @var string
     */
    public $logsDir;

    /**
     * Character set.
     *
     * Example: UTF-8
     *
     * @var string
     */
    public $charset;

    /**
     * Container class.
     *
     * Example: appProdDebugProjectContainer
     *
     * @var string
     */
    public $containterClass;
}
