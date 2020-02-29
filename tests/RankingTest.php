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

        $this->newInputUser();

        $this->getAbsoluteRanking();

        $this->getRelativeRanking();


    }

    private function initalizeRanking()
    {
        //init
        $this->RankingManager = new RankingManager([new User('Magalí', '550'), new User('Meggi', '2'), new User('Tesla', '788'), new User('Turing', '44'),new User('Magalí2', '300'), new User('Meggi2', '2'), new User('Tesla2', '788'), new User('Turing2', '44'), 
        new User('Mig2', '28')]);
     
        // //addNew
        // $this->userScore = new User('Maggie', '150');
        // $this->RankingManager = $this->RankingManager->newInputUser($this->userScore);
        // $this->assertEquals(150, $this->userScore->getScore());
       
        $this->assertTrue(true);
        
    }

    private function newInputUser()
    {
        //Setting score to 0
        $userOnlyName = new User('Frusciante');
        $this->RankingManager = $this->RankingManager->newInputUser($userOnlyName);

        //Setting score to -
        $userTotalScore = new User('Magalí', '-55');
        $this->RankingManager = $this->RankingManager->newInputUser($userTotalScore);

        //Setting score to +
        $userTotalScore = new User('Meggi', '+25');
        $this->RankingManager = $this->RankingManager->newInputUser($userTotalScore);
        
        // echo var_export($this->RankingManager, true);
        $this->assertTrue(true);
    }
   
    private function getAbsoluteRanking()
    {
        $users = $this->RankingManager->getUsers();
        $ranking = $this->RankingManager->getAbsoluteRanking(100);
        $this->assertGreaterThanOrEqual($ranking, $users);

        // echo var_export($ranking, true);
        
    }

    private function getRelativeRanking()
    {        
        $position = 3;
        $rangeElements = 2;

        $ranking = $this->RankingManager->getRelativeRanking($position,$rangeElements);
        $this->assertEquals(count($ranking), $rangeElements*2+1);
    }
}
