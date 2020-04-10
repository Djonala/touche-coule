<?php


namespace App\Model;


class Player
{
    private $id;
    private $pseudo;
    private $shoots;
    private $ships;

    /**
     * Player constructor.
     * @param $id
     * @param $pseudo
     * @param $shoots
     * @param null $ships
     */
    public function __construct(
        $id = null,
        $pseudo = null,
        $shoots = null,
        $ships=null
    )
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->shoots = $shoots;
        $this->ships = $ships;
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
     * @return null
     */
    public function getShips()
    {
        return $this->ships;
    }

    /**
     * @param null $ships
     */
    public function setShips($ships): void
    {
        $this->ships = $ships;
    }




    /** Transforme un object provenant de la BDD en Player
     * @param $object
     * @return Player
     */
    public static function toPlayerFromDB($object){
        // j'unserialize les tableaux enregistrés en DB
        $shoots = unserialize($object->shoots);
        $ships = unserialize($object->ships);

        // Je créer un objet de type Player avec les élements reçu en paramètre
        return new self(
            (int)$object->id,
            $object->pseudo,
            $shoots,
            $ships
        );
    }

}
