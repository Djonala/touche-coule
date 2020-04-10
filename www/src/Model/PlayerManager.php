<?php


namespace App\Model;


class PlayerManager
{
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }


    /***GET - FIND PLAYER IN DB BY ID ****************
     * @param int $id
     * @return Player
     */
    public function findPlayerById(int $id) {
        $this->connexion->connect();
        $sql = 'SELECT * FROM player where id=$1';
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            $sql,
            [$id]
        );
        $players = null;
        while ($data = pg_fetch_object($result)) {
            $players = Player::toPlayerFromDB($data);
        }
        pg_free_result($result);

        return $players;
    }


    /** CREATE PLAYER TO DB **************************
     * @param Player $user
     * @return object|null
     */
    public function create(Player $player) {
        $this->connexion->connect();
        $shoots = $player->getShoots();
        $pseudo = $player->getPseudo();
        $scoreWin = $player->getScoreWin();
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            'INSERT INTO player (pseudo, shoots, score_win) VALUES ($1, $2, $3) RETURNING * ',
            array($pseudo, $shoots, $scoreWin)
        );
        $players = null;
        while ($data = pg_fetch_object($result)) {
            $players = Player::toPlayerFromDB($data);
        }
        pg_free_result($result);

        return $players;
    }
    /** UPDATE PLAYER TO DB **************************
     * @param Player $user
     * @return Player
     */
    public function update(Player $player) {
        $this->connexion->connect();
        $shoots = serialize($player->getShoots());
        $pseudo = $player->getPseudo();
        $id = $player->getId();
        $scoreWin = $player->getScoreWin();
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            'UPDATE player SET pseudo=$1, shoots=$2, score_win=$3 WHERE id=$4 RETURNING * ',
            array($pseudo, $shoots, $scoreWin,$id)
        );
        $players = null;
        while ($data = pg_fetch_object($result)) {
            $players = Player::toPlayerFromDB($data);
        }
        pg_free_result($result);

        return $players;
    }

}
