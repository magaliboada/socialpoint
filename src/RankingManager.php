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

    public function getRelativeRanking(User $user) {
        
        $users = array_search($user, $this->getUsers());

        return $user;
    }

    public function getAbsoluteRanking(int $RankigRange)
    {
        if (!is_int($RankigRange)) exit();

       return array_slice($this->getUsers(), 0, $RankigRange);
  
    }

    public function sortUserbyScore($array, $property)
    {
        usort($array, function ($a, $b) use ($property) {
            return (($a->$property == $b->$property) ? 0 : (($a->$property > $b->$property) ? -1 : 1));
        });
        return $array;
    }
}
