<?php

declare(strict_types = 1);

namespace SocialPoint\PhpBootstrap;
use SocialPoint\PhpBootstrap\User;

class RankingManager
{
    
    private $users = [];

    public function __construct(array $users)
    {
        $this->users = $users;
        $this->users = $this->sortUserbyScore($this->getUsers(), 'score');
    }

    public function setUsers(array $users)
    {
        return $this->users;
    }

    public function getUsers(): ?array
    {
        return $this->users;
    }

    public function newInputUser(?USer $user): self
    {        
        array_push($this->users, $user);
        


        $this->users = $this->sortUserbyScore($this->getUsers(), 'score');
        return $this;
    }

    public function getRelativeRanking(int $relativePosition, int $range) {
       
        if (!is_int($relativePosition)) exit();
        
        $starting = $relativePosition - $range -1;
        $total = $range*2 +1;
        $ranking = array_slice($this->getUsers(), $starting);
        $ranking = array_slice($ranking, 0, $total);
        echo var_export($ranking);
        return $ranking;        
    }    


    public function getAbsoluteRanking(int $rankigRange)
    {

       return array_slice($this->getUsers(), 0, $rankigRange);
  
    }

    public function sortUserbyScore($array, $property)
    {
        usort($array, function ($a, $b) use ($property) {
            return (($a->$property == $b->$property) ? 0 : (($a->$property > $b->$property) ? -1 : 1));
        });
        return $array;
    }
}
