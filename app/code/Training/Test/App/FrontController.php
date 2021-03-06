<?php

namespace Training\Test\App;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class FrontController
 * @package Training\Test\App
 */
class FrontController
{
    /**
     * @var \Magento\Framework\App\RouterListInterface
     */
    protected $routerList;
    /**
     * @var ResponseInterface
     */
    protected $response;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    /**
     * @param \Magento\Framework\App\RouterListInterface $routerList
     * @param ResponseInterface $response
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\RouterListInterface $routerList,
        ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->routerList = $routerList;
        $this->response = $response;
        $this->logger = $logger;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|null
     * @throws LocalizedException
     */
    public function dispatch(RequestInterface $request)
    {
        foreach ($this->routerList as $router) {
            $this->logger->info(get_class($router));
        }
        return null;
    }
}