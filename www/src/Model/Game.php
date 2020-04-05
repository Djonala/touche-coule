<?php

namespace App\Model;


class Game
{
private int $id;
private User $joueur1;
private User $joueur2;

    /**
     * Game constructor.
     * @param User $joueur1
     * @param User $joueur2
     */
    public function __construct(User $joueur1, User $joueur2)
    {
        $this->joueur1 = $joueur1;
        $this->joueur2 = $joueur2;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getJoueur1(): User
    {
        return $this->joueur1;
    }

    /**
     * @param User $joueur1
     */
    public function setJoueur1(User $joueur1): void
    {
        $this->joueur1 = $joueur1;
    }

    /**
     * @return User
     */
    public function getJoueur2(): User
    {
        return $this->joueur2;
    }

    /**
     * @param User $joueur2
     */
    public function setJoueur2(User $joueur2): void
    {
        $this->joueur2 = $joueur2;
    }


}
