<?php

namespace Training\TestOM\Controller\Index;

use Magento\Framework\App\ResponseInterface;
use Training\TestOM\Model\Test;
use Training\TestOM\Model\PlayWithTest;

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
     * @var PlayWithTest
     */
    private $playwithtest;

    /**
     * Index constructor.
     * @param Test $test
     */
    public function __construct(
        Test $test,
        PlayWithTest $playwithtest
    ) {
        $this->test = $test;
        $this->playwithtest = $playwithtest;
    }


    public function execute()
    {
        $this->test->log();
        $this->playwithtest->run();
        exit();
    }
}
