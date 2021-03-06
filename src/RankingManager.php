<?php

declare(strict_types = 1);

namespace SocialPoint\PhpBootstrap;
use SocialPoint\PhpBootstrap\User;

final class RankingManager
{
    
    private $users = [];

    public function __construct(array $users)
    {
        $this->users = $users;
        $this->users = $this->sortUserbyScore($this->getUsers(), 'score');
    }

    public function setUsers(array $users): array
    {
        return $this->users;
    }

    public function getUsers(): ?array
    {
        return $this->users;
    }

    public function newUserInput(?USer $user): self
    {        
        $createNew = true;

        foreach($this->getUsers() as &$findExisting) {
            
            if ($user->getName() == $findExisting->getName()){
                $findExisting->setScore($this->scoreManage($user, $findExisting->getScore()));
                $createNew = false;
                break;
            } 
        }
        if($createNew) {
            array_push($this->users, $user);
        } 
        // echo var_export($this->getUsers(), true);      

        $this->users = $this->sortUserbyScore($this->getUsers(), 'score');
        return $this;
    }

    private function scoreManage(User $user, string $currentScore): ?string
    {

        $score = intval($user->getScore());
        $currentScore = intval($currentScore);        
        $currentScore += $score;

        return strval($currentScore);
    }

    public function getRelativeRanking(int $relativePosition, int $range) : array
    {
                
        $starting = $relativePosition - $range -1;
        $total = $range*2 + 1;
        $ranking = array_slice($this->getUsers(), $starting);
        $ranking = array_slice($ranking, 0, $total);
        
        return $ranking;        
    }    


    public function getAbsoluteRanking(int $rankigRange): array
    {
       return array_slice($this->getUsers(), 0, $rankigRange);
    }

    public function sortUserbyScore($array, $property): array
    {
        usort($array, function ($a, $b) use ($property) {
            return (($a->$property == $b->$property) ? 0 : (($a->$property > $b->$property) ? -1 : 1));
        });
        return $array;
    }
}
