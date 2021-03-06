<?php

namespace Training\Test\App;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterListInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

/**
 * Class FrontController
 * @package Training\Test\App
 */
class FrontController extends \Magento\Framework\App\FrontController
{
    /**
     * @var RouterListInterface
     */
    protected $routerList;
    /**
     * @var ResponseInterface
     */
    protected $response;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * FrontController constructor.
     * @param RouterListInterface $routerList
     * @param ResponseInterface $response
     * @param LoggerInterface $logger
     */
    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        $this->routerList = $routerList;
        $this->response = $response;
        $this->logger = $logger;
        parent::__construct(       $routerList,
         $response,
        $requestValidator = null,
         $messageManager = null);
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface|ResultInterface|null
     * @throws LocalizedException
     */
    public function dispatch(RequestInterface $request)
    {
        foreach ($this->routerList as $router) {
            $this->logger->info(get_class($router));
        }
        return parent::dispatch($request);
    }
}