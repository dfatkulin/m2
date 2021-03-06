<?php

namespace Training\TestOM\Model;

/**
 * Class Test
 * @package Training\TestOM\Model
 */
class Test
{
    private $manager;
    private $arrayList;
    private $name;
    private $number;
    private $managerFactory;

    /**
     * Test constructor.
     * @param ManagerTestInterface $manager
     * @param $name
     * @param int $number
     * @param array $arrayList
     */
    public function __construct(
        \Training\TestOM\Model\ManagerTestInterface $manager,
        $name,
        int $number,
        array $arrayList,
        \Training\TestOM\Model\ManagerTestInterfaceFactory $managerFactory
    ) {
        $this->manager = $manager;
        $this->name = $name;
        $this->number = $number;
        $this->arrayList = $arrayList;
        $this->managerFactory = $managerFactory;
    }

    public function log()
    {
        print_r(get_class($this->manager));
        echo '<br>';
        print_r($this->name);
        echo '<br>';
        print_r($this->number);
        echo '<br>';
        print_r($this->arrayList);
        echo '<br>';
        $newManager = $this->managerFactory->create();
        print_r(get_class($newManager));
    }
}
