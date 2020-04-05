<?php


namespace App\Model;


class User
{
  private $id;
  private $pseudo;
  private $gameboard;

    /**
     * User constructor.
     * @param string $pseudo
     */
    public function __construct($pseudo)
    {
        $this->pseudo = $pseudo;
        for ($i=0;$i<10;$i++) {
            for ($j=0;$j<10; $j++) {
                $this->gameboard[$i][$j] = '-';
            }
        }

    }


    /**
     *
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }/**
     * @param string $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }/**
     * @return Gameboard
     */
    public function getGameboard()
    {
        return $this->gameboard;
    }
    /**
     * @param Gameboard $gameboard
     */
    public function setGameboard(Gameboard $gameboard): void
    {
        $this->gameboard = $gameboard;
    }

//    /**
//     * @param $object
//     * @return User
//     */
//    public static function toUserFromDB($object) {
//        return new self(
//            $object->id,
//            $object->pseudo,
//            $object->gameboard
//
//        );
//    }

}
