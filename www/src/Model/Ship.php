<?php


namespace App\Model;


class Ship
{
    private $id;
    private $coordonnees;
    private $ship_state;
    private $state_array;
    private $fk_player_id;

    /**
     * Ship constructor.
     * @param $id
     * @param $coordonnees
     * @param $ship_state
     * @param $state_array
     * @param $fk_player_id
     */
    public function __construct(
        $id = null,
        $coordonnees= null,
        $state_array = null,
        $ship_state = null,
        $fk_player_id = null
    )
    {
        $this->id = $id;
        $this->coordonnees = $coordonnees;
        $this->state_array = $state_array;
        $this->ship_state = $ship_state;
        $this->fk_player_id = $fk_player_id;
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
    public function getCoordonnees()
    {
        return $this->coordonnees;
    }

    /**
     * @param null $coordonnees
     */
    public function setCoordonnees($coordonnees): void
    {
        $this->coordonnees = $coordonnees;
    }

    /**
     * @return null
     */
    public function getShipState()
    {
        return $this->ship_state;
    }

    /**
     * @param null $ship_state
     */
    public function setShipState($ship_state): void
    {
        $this->ship_state = $ship_state;
    }

    /**
     * @return null
     */
    public function getStateArray()
    {
        return $this->state_array;
    }

    /**
     * @param null $state_array
     */
    public function setStateArray($state_array): void
    {
        $this->state_array = $state_array;
    }

    /**
     * @return mixed
     */
    public function getFkPlayerId()
    {
        return $this->fk_player_id;
    }

    /**
     * @param mixed $fk_player_id
     */
    public function setFkPlayerId($fk_player_id): void
    {
        $this->fk_player_id = $fk_player_id;
    }


    /**Transforme un object provenant de la BDD en Ship
     * @param $object
     * @return Ship
     */
    public static function toShipFromDB($object){
        $stateArray = unserialize($object->state_array);
        return new self(
            (int)$object->id,
            $object->coordonnees,
            $object->ship_state,
            $stateArray,
            (int)$object->fk_player_id
        );
    }



}