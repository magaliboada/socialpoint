<?php

declare(strict_types = 1);

namespace CodelyTv\PhpBootstrapTest;

use CodelyTv\PhpBootstrap\User;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    /** @var User */
    private $User;

    /** @var string */
    private $greeting;

    // public function tearDown()
    // {
    //     parent::tearDown();

    //     $this->User = null;
    //     $this->greeting = null;
    // }

    /** @test */
    public function shouldSayHelloWhenGreeting()
    {
        $this->createNewUser();

        // $this->whenItGreets();

        // $this->thenItShouldSayCodelyTv();
    }

    private function createNewUser()
    {
        $this->User = new User("Magali");
        $this->assertEquals('Magali', $this->User->getName());
    }


    // private function thenItShouldSayCodelyTv()
    // {
    //     $this->assertEquals("CodelyTV", 'CodelyTB');
    // }
}
