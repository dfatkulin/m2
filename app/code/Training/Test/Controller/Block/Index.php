<?php

namespace Training\Test\Controller\Block;

/**
 * Class Index
 * @package Training\Test\Controller\Block
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    private $layoutFactory;


    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        \Magento\Framework\Controller\Result\RawFactory $rawFactory
    ){
        $this->layoutFactory = $layoutFactory;
        $this->rawFactory =$rawFactory;
        parent:: __construct($context);
    }

    public function execute()
    {
        $resultRaw = $this->rawFactory->create();
        $resultRaw->setContents('<strong>Simple text</strong>');
        return $resultRaw;
    }
}