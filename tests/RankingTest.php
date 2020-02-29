<?php

declare(strict_types = 1);

namespace SocialPoint\PhpBootstrapTest;

use SocialPoint\PhpBootstrap\RankingManager;
use PHPUnit\Framework\TestCase;
use SocialPoint\PhpBootstrap\User;

final class RankingManagerTest extends TestCase
{
    /** @var RankingManager */
    private $RankingManager;


    // public function tearDown()
    // {
    //     parent::tearDown();

    //     $this->RankingManager = null;
    //     $this->greeting = null;
    // }

    /** @test */
    public function manageRanking()
    {
        $this->initalizeRanking();

        $this->getAbsoluteRanking();

        // $this->getRelativeRanking();

        // $this->thenItShouldSaySocialPoint();
    }

    private function initalizeRanking()
    {
        //init
        $this->RankingManager = new RankingManager([new User('Magalí', 500), new User('Meggi', 2)]);
     
        //addNew
        $this->userScore = new User('Maggie', 150);
        $this->RankingManager = $this->RankingManager->newInputUser($this->userScore);
        $this->assertEquals(150, $this->userScore->getScore());
       
        $this->assertTrue(true);
        
    }


    private function getAbsoluteRanking()
    {
        $usersArray = [];
        $users = $this->RankingManager->getUsers();
        // echo var_export($users , true);
        $ranking = $this->RankingManager->getAbsoluteRanking(2);
        $this->assertGreaterThanOrEqual($ranking, $users);
        // $this->assertEquals("SocialPoint", 'CodelyTB');
    }

    private function getRealativeRanking()
    {
        $usersArray = [];
        $users = $this->RankingManager->getUsers();
        $ranking = $this->RankingManager->getAbsoluteRanking(2);
        $this->assertGreaterThanOrEqual($users, $ranking);
        // echo var_export($prova, true);
    }
}
