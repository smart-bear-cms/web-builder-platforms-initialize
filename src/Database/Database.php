<?php

namespace nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Database;

use nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Base\BaseCore;
use nguyenanhung\MyDatabase\Model\BaseModel;

/**
 * Class Database
 *
 * @package   nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Database
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Database extends BaseCore
{

    /** @var array $database */
    protected $database;

    /**
     * Database constructor.
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

    /**
     * Function setDatabase
     *
     * @param $database
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 27/02/2023 26:10
     */
    public function setDatabase($database)
    {
        $this->database = $database;

        return $this;
    }

    /**
     * Function connection
     *
     * @return \nguyenanhung\MyDatabase\Model\BaseModel
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 27/02/2023 26:12
     */
    public function connection()
    {
        $DB = new BaseModel();
        $DB->debugStatus = $this->options['debugStatus'];
        $DB->debugLevel = $this->options['debugLevel'];
        $DB->debugLoggerPath = $this->options['loggerPath'];
        $DB->debugLoggerFilename = 'Log-' . date('Y-m-d') . '.log';
        $DB->setDatabase($this->database);
        $DB->__construct($this->database);

        return $DB;
    }

    /**
     * Function checkExitsRecord
     *
     * @param $wheres
     * @param $tableName
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/08/2022 17:45
     */
    public function checkExitsRecord($wheres, $tableName)
    {
        $DB = $this->connection();
        $DB->setTable($tableName);
        $result = $DB->checkExists($wheres);
        $DB->disconnect();
        unset($DB);

        return $result === 1;
    }

    /**
     * Function initDBTable
     *
     * @param $table
     *
     * @return \nguyenanhung\MyDatabase\Model\BaseModel
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/01/2023 12:31
     */
    protected function initDBTable($table)
    {
        $DB = $this->connection();
        $DB->setTable($table);

        return $DB;
    }
}
