<?php

namespace Training\TestOM\Controller\Index;

use Training\TestOM\Model\Test;

/**
 * Class Index
 * @package Training\TestOM\Controller\Index
 */
class Index implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var Test
     */
    private $test;

    /**
     * Index constructor.
     * @param Test $test
     */
    public function __construct(
        Test $test
    ) {
        $this->test = $test;
    }


    public function execute()
    {
        $this->test->log();
        exit();
    }
}
