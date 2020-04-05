<?php


namespace App\Model;


class UserManager
{
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }


    /** GET USER FROM DB *******************
     * @param int $id
     * @return object|null
     */
    public function get(int $id) {
        $this->connexion->connect();
        $sql = 'SELECT * FROM user where id=$1';
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            $sql,
            [$id]
        );
        $user = null;
        while ($data = pg_fetch_object($result)) {
            $user = $data;
        }
        pg_free_result($result);
        return $user;
    }


    /** CREATE USER TO DB *****
     * @param User $user
     * @return object|null
     */
    public function create(User $user) {
        $this->connexion->connect();
        $result = pg_query_params(
            $this->connexion->getConnexion(),
            "INSERT INTO user (pseudo, gameboard) VALUES ($1, serialize($2))
            RETURNING *
            ;",
            [$user->getPseudo(), $user->getGameboard()]
        );
        $users = null;
        while ($data = pg_fetch_object($result)) {
            $users = $data;
        }
        pg_free_result($result);
        return $users;
    }


}
