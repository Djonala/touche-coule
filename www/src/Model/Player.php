<?php


namespace App\Model;


class Player
{
    private $id;
    private $pseudo;
    private $shoots;

    /**
     * Player constructor.
     * @param $id
     * @param $pseudo
     * @param $shoots
     */
    public function __construct(
        $id = null,
        $pseudo = null,
        $shoots = null
    )
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->shoots = $shoots;
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

    /** Transforme un object provenant de la BDD en Player
     * @param $object
     * @return Player
     */
    public static function toPlayerFromDB($object){
        $shoots = unserialize($object->shoots);
        return new self(
            (int)$object->id,
            $object->pseudo,
            $shoots
        );
    }

}
