<?php

declare(strict_types = 1);

namespace SocialPoint\PhpBootstrap;


final class User 
{
    public $score;

    private $name;

    public function __construct(string $name, string $score = '0')
    {
        $this->name = $name;
        $this->score = $score;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

 
}
