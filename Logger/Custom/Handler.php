<?php
declare(strict_types=1);

namespace TechDriven\CustomLogger\Logger\Custom;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class Handler extends Base
{
    protected $loggerType = Logger::INFO;
    protected $fileName = '/var/log/custom.log';
}
