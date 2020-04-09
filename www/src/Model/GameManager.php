<?php


namespace App\Model;



class GameManager
{
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    /***GET FIND GAME ID ***************************
     * @param $id
     * @return Game|null
     */
    public function findById($id) {
        //connexion à la db
        $this->connexion->connect();

        //création de la requête
        $sql = 'SELECT * FROM game where id=$1';

        //lancement de la requête à la DB
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            $sql,
            [$id]
        );
        $game = null;
        // recupération et transformation de l'objet retourné par la db
        while ($data = pg_fetch_object($result)) {
            $game = Game::toGameFromDB($data);
        }
        pg_free_result($result);
        return $game;
    }

    /** CREATE GAME TO DB ***************************
     */
    public function create(Game $game) {
        // Connexion à  la DB
        $this->connexion->connect();

        // Recupération des id de player
        $idJ1 = $game->getIdPlayer1();
        $idJ2 = $game->getIdPlayer2();

        // Requête et récupération de l'objet créé en base
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            'INSERT INTO game (fk_user1_id, fk_user2_id) VALUES ($1, $2) RETURNING * ',
            array($idJ1,$idJ2)
        );
        $game = null;
        while ($data = pg_fetch_object($result)) {
            // transformation de l'objet récupéré en objet de type Game
            $game = Game::toGameFromDB($data);
        }
        pg_free_result($result);
        return $game;
    }
}
