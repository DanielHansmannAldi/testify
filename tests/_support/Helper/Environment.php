<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Testify\Helper;

use Codeception\Configuration;
use Codeception\Lib\ModuleContainer;
use Codeception\Module;
use Codeception\TestCase;

class Environment extends Module
{

    const MODE_ISOLATED = 'isolated';

    const MODE_DEFAULT_ROOT = '../../../../..';
    const MODE_ISOLATED_ROOT = 'vendor/spryker/testify';

    /**
     * @return void
     */
    public function _initialize()
    {
        $path = self::MODE_DEFAULT_ROOT;

        if (isset($this->config['mode']) && $this->config['mode'] === self::MODE_ISOLATED) {
            $path = self::MODE_ISOLATED_ROOT;
        }

        $applicationRoot = Configuration::projectDir() . $path;

        defined('APPLICATION_ENV') || define('APPLICATION_ENV', 'devtest');
        defined('APPLICATION_STORE') || define('APPLICATION_STORE', 'DE');
        defined('APPLICATION') || define('APPLICATION', 'ZED');

        defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', $applicationRoot);
        defined('APPLICATION_SOURCE_DIR') || define('APPLICATION_SOURCE_DIR', APPLICATION_ROOT_DIR . '/src');
        defined('APPLICATION_VENDOR_DIR') || define('APPLICATION_VENDOR_DIR', APPLICATION_ROOT_DIR . '/vendor');
    }

}
