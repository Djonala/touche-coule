<?php


namespace App\Model;


class ShipManager
{
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    /***GET - FIND ALL SHIP IN DB BY PLAYER_ID **********
     * @param int $idJoueur
     * @return array
     */
    public function findAllShipByIdPlayer(int $idJoueur) {
        $this->connexion->connect();
        $sql = 'SELECT * FROM ship where fk_player_id=$1';
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            $sql,
            [$idJoueur]
        );
        while ($data = pg_fetch_object($result)) {
            //on les ajoutes au tableaux
            $ships[] = Ship::toShipFromDB($data);
        }

        pg_free_result($result);

        return $ships;
    }


    /***GET - FIND SHIP IN DB BY ID ****************
     * @param int $id
     * @return object|null
     */
    public function findShipById(int $id) {
        $this->connexion->connect();
        $sql = 'SELECT * FROM ship where id=$1';
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            $sql,
            [$id]
        );
        $ship = null;
        while ($data = pg_fetch_object($result)) {
            $ship = Ship::toShipFromDB($data);
        }
        pg_free_result($result);

        return $ship;
    }


    /** CREATE Ship TO DB **************************
     * @param Ship $ship
     * @return object|null
     */
    public function create(Ship $ship) {
        $this->connexion->connect();

        $coordonnees= $ship->getCoordonnees();
        $stateArray = serialize($ship->getStateArray());
        $shipState = $ship->getShipState();
        $fkPlayerId = $ship->getFkPlayerId();
        $sql = 'INSERT INTO ship (coordonnees, fk_player_id, state_array, ship_state) VALUES ($1, $2, $3, $4) RETURNING * ';
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            $sql,
            array($coordonnees, $fkPlayerId, $stateArray, $shipState)
        );
        $ship = null;
        while ($data = pg_fetch_object($result)) {
            $ship = Ship::toShipFromDB($data);
        }
        pg_free_result($result);

        return $ship;
    }
}