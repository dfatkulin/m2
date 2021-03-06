<?php

namespace Training\Test\Controller\Page;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Helper\Page as PageHelper;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class View
 * @package Training\Test\Controller\Page
 */
class View extends \Magento\Cms\Controller\Page\View
{
    protected $resultJsonFactory;
    protected $pageRepository;


    /**
     * View constructor.
     * @param Context $context
     * @param ForwardFactory $resultForwardFactory
     * @param JsonFactory $resultJsonFactory
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory,
        JsonFactory $resultJsonFactory,
        PageRepositoryInterface $pageRepository,
        RequestInterface $request,
        PageHelper $pageHelper,
        PageFactory $pageFactory
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->pageRepository = $pageRepository;
        $this->forwardFactory = $resultForwardFactory;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context, $request, $pageHelper, $resultForwardFactory);
    }

    /**
     * @return Json|ResultInterface
     */
    public function execute()
    {
        if ($this->getRequest()->isAjax()) {
            $data = ['status' => 'success', 'message' => ''];

            $pageId = $this->getRequest()->getParam('page_id', $this->getRequest()->getParam('id', false));
            $resultJson = $this->resultJsonFactory->create();
            try {
                $page = $this->pageRepository->getById($pageId);
                $data['title'] = $page->getTitle();
                $data['content'] = $page->getContent();
            } catch (NoSuchEntityException $e) {
                $data['status'] = 'error';
                $data['message'] = 'Not found';
            } catch (\Exception $e) {
                $data['status'] = 'error';
                $data['message'] = 'Something wrong';
            }
            $resultJson->setData($data);
            return $resultJson;
        }
        return $this->_pageFactory->create();
    }
}