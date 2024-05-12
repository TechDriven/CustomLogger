<?php
declare(strict_types=1);

namespace TechDriven\CustomLogger\Logger\Custom;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
class Handler extends Base
{
    protected $loggerType = Logger::INFO;
    private TimezoneInterface $timezone;

    public function __construct(
        DriverInterface $filesystem,
        TimezoneInterface $timezone,
        Filesystem $corefilesystem,
        ?string $filePath = null,
        ?string $fileName = null,
    ) {
        $this->timezone = $timezone;
        $corefilesystem = $corefilesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        $logpath = $corefilesystem->getAbsolutePath('log/');
        $customDir = 'custom_dir/';
        $fileName = 'custom_file_'. $this->getDate() .'.log';
        $filePath = $logpath . $customDir;
        parent::__construct($filesystem, $filePath, $fileName);
    }

    public function getDate()
    {
        return $this->timezone->date()->format('Y_m_d');
    }
}
