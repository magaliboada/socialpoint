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

        $this->newUserInput();

        $this->getAbsoluteRanking();

        $this->getRelativeRanking();

    }

    private function initalizeRanking()
    {
        //init
        $this->RankingManager = new RankingManager(
            [new User('Magalí', '550'), 
            new User('Meggi',   '2'), 
            new User('Tesla',   '788'), 
            new User('Turing',  '44'),
            new User('Flea',    '300'), 
            new User('Gibbons', '2'), 
            new User('Maggie',  '788'), 
            new User('Chad',    '44'), 
            new User('Neil',    '28')]
        );

        // echo var_export($this->RankingManager, true);
       
        $this->assertIsArray($this->RankingManager->getUsers());
        
    }

    private function newUserInput()
    {
        //Setting score to 0
        $userOnlyName = new User('Frusciante');
        $this->RankingManager = $this->RankingManager->newUserInput($userOnlyName);
        $this->assertEquals('0', $userOnlyName->getScore());

        //Setting score to -
        $userTotalScore = new User('Magalí', '-55');
        $this->RankingManager = $this->RankingManager->newUserInput($userTotalScore);
        $this->assertEquals('-55', $userTotalScore->getScore());

        //Setting score to +
        $userTotalScore = new User('Meggi', '+25');
        $this->RankingManager = $this->RankingManager->newUserInput($userTotalScore);
        $this->assertEquals('+25', $userTotalScore->getScore());

        // echo var_export($this->RankingManager, true);
        $this->assertTrue(true);
    }
   
    private function getAbsoluteRanking()
    {
        $users = $this->RankingManager->getUsers();
        $ranking = $this->RankingManager->getAbsoluteRanking(5);
        $this->assertGreaterThanOrEqual($ranking, $users);

        // echo var_export($ranking, true);        
    }

    private function getRelativeRanking()
    {        
        $position = 3;
        $rangeElements = 2;

        $ranking = $this->RankingManager->getRelativeRanking($position,$rangeElements);
        $this->assertEquals(count($ranking), $rangeElements*2+1);

        // echo var_export($ranking, true);    
    }
}
