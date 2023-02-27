<?php

namespace nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Repository;

use nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Base\BaseCore;

/**
 * Class BaseRepository
 *
 * @package   nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Repository
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseRepository extends BaseCore
{
    /**
     * BaseRepository constructor.
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
    }
}
