<?php
/**
 * PlayWithTest
 *
 * @copyright Copyright © 2021 Peretiatko Kyrylo. All rights reserved.
 * @author    batontramp@gmail.com
 */

namespace Training\TestOM\Model;


class PlayWithTest
{
    private $testObject;
    private $testObjectFactory;
    private $manager;

    public function __construct(
        \Training\TestOM\Model\Test $testObject,
        \Training\TestOM\Model\TestFactory $testObjectFactory,
        \Training\TestOM\Model\ManagerCustomImplementation $manager
    ) {
        $this->testObject = $testObject;
        $this->testObjectFactory = $testObjectFactory;
        $this->manager = $manager;
    }

    public function run()
    {
        // test object with constructor arguments managed by di.xml
        $this->testObject->log();
        // test object with custom constructor arguments
        // some arguments are defined here, others - from di.xml
        $customArrayList = ['item1' => 'aaaaa', 'item2' => 'bbbbb'];
        $newTestObject = $this->testObjectFactory->create([
            'arrayList' => $customArrayList,
            'manager' => $this->manager
        ]);
        $newTestObject->log();
    }
}
