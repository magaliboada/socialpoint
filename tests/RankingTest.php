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

        $this->getRankings();

        // $this->thenItShouldSaySocialPoint();
    }

    private function initalizeRanking()
    {
        //init
        $this->RankingManager = new RankingManager([new User('Magalí', 500), new User('Meggi', 2)]);
     
        //addNew
        $this->userScore = new User('Meggi', 150);
        $this->RankingManager = $this->RankingManager->newInputUser($this->userScore);
        $this->assertEquals(150, $this->userScore->getScore());
       
        $this->assertTrue(true);
        
    }


    private function getRankings()
    {
        $usersArray = [];
        $users = $this->RankingManager->getUsers();
        // echo var_export($users , true);
        $prova = $this->RankingManager->getAbsoluteRanking($this->userScore);
        
        echo var_export($prova, true);
        // $this->assertEquals("SocialPoint", 'CodelyTB');
    }
}
