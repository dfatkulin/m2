<?php

namespace Training\Test\Plugin\Model;

use Magento\Framework\App\Request\Http;
use Magento\Framework\UrlInterface;

/**
 * Class Url
 * @package Training\Test\Plugin\Model
 */
class Url
{
    /**
     * @param UrlInterface $subject
     * @param null $routePath
     * @return string
     */
    public function beforeGetUrl(
        UrlInterface $subject,
        $routePath = null)
    {
        if ($routePath== 'customer/account/create') {
            return 'customer/account/login';
        }
        return $routePath;
    }
}