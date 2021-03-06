<?php

namespace Training\Test\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Index
 * @package Training\Test\Controller
 */
class Index extends Action
{

    private $resultRawFactory;
    public function __construct(
        Context $context,
        RawFactory $resultRawFactory)
    {
        $this->resultRawFactory = $resultRawFactory;
        parent::__construct($context);
    }
    /**
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $resultRaw = $this->resultRawFactory->create();
        $resultRaw->setContents('<strong>Simple text</strong>');
        return $resultRaw;
    }
}