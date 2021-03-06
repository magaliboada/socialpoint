<?php

declare(strict_types = 1);

namespace SocialPoint\PhpBootstrapTest;

use SocialPoint\PhpBootstrap\User;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    /** @var User */
    private $User;


    /** @test */
    public function createProgress()
    {
        $this->createNewUser();
    }

    private function createNewUser()
    {
        //whithout score
        $this->User = new User("Magali");
        $this->assertEquals('Magali', $this->User->getName());

        //with score
        $this->User = new User("Magali", '150');
        $this->assertEquals(150, $this->User->getScore());
    }
}