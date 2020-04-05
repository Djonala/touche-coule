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
        $this->gameboard = new Gameboard();

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
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }/**
     * @return Gameboard
     */
    public function getGameboard(): Gameboard
    {
        return $this->gameboard;
    }/**
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
