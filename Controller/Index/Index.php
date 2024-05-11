<?php declare(strict_types=1);

namespace TechDriven\CustomLogger\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use TechDriven\CustomLogger\Logger\Custom\Logger;

class Index implements HttpGetActionInterface
{
    /** @var PageFactory */
    private $pageFactory;
    private Logger $logger;

    /**
     * Index constructor.
     * @param PageFactory $pageFactory
     */
    public function __construct(
        PageFactory $pageFactory,
        Logger $logger,
    ) {
        $this->pageFactory = $pageFactory;
        $this->logger = $logger;
    }

    /**
     * @return Page
     */
    public function execute(): Page
    {
        $this->logger->debug("Hello India");
        $this->logger->info("Hello India");
        $this->logger->notice("Hello India");
        $this->logger->warning("Hello India");
        $this->logger->critical("Hello India");
        $this->logger->alert("Hello India");
        $this->logger->emergency("Hello India");
        die('Hello World');
        //return $this->pageFactory->create();
    }
}
