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


    /** @test */
    public function manageRanking()
    {
        $this->initalizeRanking();

        $this->getAbsoluteRanking();

        $this->getRelativeRanking();

        // $this->thenItShouldSaySocialPoint();
    }

    private function initalizeRanking()
    {
        //init
        $this->RankingManager = new RankingManager([new User('Magalí', 550), new User('Meggi', 2), new User('Tesla', 788), new User('Turing', 44),new User('Magalí2', 300), new User('Meggi2', 2), new User('Tesla2', 788), new User('Turing2', 44), 
        new User('Mig2', 28)]);
     
        //addNew
        $this->userScore = new User('Maggie', 150);
        $this->RankingManager = $this->RankingManager->newInputUser($this->userScore);
        $this->assertEquals(150, $this->userScore->getScore());
       
        $this->assertTrue(true);
        
    }


    private function getAbsoluteRanking()
    {
        $users = $this->RankingManager->getUsers();
        $ranking = $this->RankingManager->getAbsoluteRanking(100);
        $this->assertGreaterThanOrEqual($ranking, $users);
        
    }

    private function getRelativeRanking()
    {
        

        

        $ranking = $this->RankingManager->getRelativeRanking(4, 3);
        $this->assertEquals(count($ranking), 4*2+1);
    }
}
