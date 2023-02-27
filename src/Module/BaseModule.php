<?php

namespace nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Module;

use nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Base\BaseCore;
use nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Database\Database;

/**
 * Class BaseModule
 *
 * @package   nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Module
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseModule extends BaseCore
{
    /**
     * BaseModule constructor.
     *
     * @param array $options
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->logger->setLoggerSubPath(__CLASS__);
        $this->db = new Database($options);
    }
}
