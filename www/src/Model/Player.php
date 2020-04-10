<?php


namespace App\Model;


class Player
{
    private $id;
    private $pseudo;
    private $shoots;
    private $scoreWin;

    /**
     * Player constructor.
     * @param $id
     * @param $pseudo
     * @param $shoots
     * @param int $scoreWin
     */
    public function __construct(
        $id = null,
        $pseudo = null,
        $shoots = null,
        $scoreWin= 0
    )
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->shoots = $shoots;
        $this->scoreWin = $scoreWin;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param null $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return null
     */
    public function getShoots()
    {
        return $this->shoots;
    }

    /**
     * @param $shoots
     */
    public function setShoots($shoots): void
    {
        $this->shoots[] = $shoots;
    }

    /**
     * @return mixed
     */
    public function getScoreWin()
    {
        return $this->scoreWin;
    }

    /**
     * @param mixed $scoreWin
     */
    public function setScoreWin($scoreWin): void
    {
        $this->scoreWin = $scoreWin;
    }

    /** Transforme un object provenant de la BDD en Player
     * @param $object
     * @return Player
     */
    public static function toPlayerFromDB($object){
        $shoots = unserialize($object->shoots);
        return new self(
            (int)$object->id,
            $object->pseudo,
            $shoots,
            $object->score_win
        );
    }

}
