<?php

namespace App\Model;


class Game
{
private $id;
private $id_player1;
private $id_player2;

    /**
     * Game constructor.
     * @param  $joueur1
     * @param  $joueur2
     */
    public function __construct(
        $id = null,
        $id_player1 = null,
        $id_player2 = null
    )
    {
        $this->id = $id;
        $this->id_player1 = $id_player1;
        $this->id_player2 = $id_player2;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    public function getIdPlayer1()
    {
        return $this->id_player1;
    }

    /**
     * @param $id_player1
     */
    public function setIdPlayer1($id_player1): void
    {
        $this->id_player1 = $id_player1;
    }


    public function getIdPlayer2()
    {
        return $this->id_player2;
    }

    /**
     * @param $id_player2
     */
    public function setIdPlayer2($id_player2): void
    {
        $this->id_player2 = $id_player2;
    }



    /** Transforme un object provenant de la BDD en Game
     * @param $object
     * @return Game
     */
    public static function toGameFromDB($object) {
        return new self(
            (int)$object->id,
            (int) $object->fk_user1_id,
            (int) $object->fk_user2_id
        );
    }



    /** Ajoute les bateau au tableau de bateau du joueur 1
     * @param Player $player1
     */
    public function AddShipsForPlayer1(Player $player1){
        //instantation d'un managerShip pour enregistrer les bateaux en db
        $managerPlayer= new PlayerManager(ConnexionBDD::getInstance());

        // Creation de tous les bateau du joueur 1
       $player1->setShips([
           $_POST['porte-avion-debut-j1'].",".$_POST['porte-avion-fin-j1'],
            $_POST['croiseur-debut-j1'].",".$_POST['croiseur-fin-j1'],
            $_POST['contre-torpilleurs-debut-j1'].",".$_POST['contre-torpilleurs-fin-j1'],
            $_POST['sous-marin-debut-j1'].",".$_POST['sous-marin-fin-j1'],
            $_POST['torpilleur-debut-j1'].",".$_POST['torpilleur-fin-j1']
       ]);
        // Mise à jour du joueur en DB
        $managerPlayer->update($player1);
    }



    /** Ajoute les bateau au tableau de bateau du joueur 2
     * @param Player $player2
     */
    public function AddShipsForPlayer2(Player $player2){
        //instantation d'un managerShip pour enregistrer les bateaux en db
        $managerPlayer= new PlayerManager(ConnexionBDD::getInstance());

        // Creation de tous les bateau du joueur 2
        $player2->setShips([
            $_POST['porte-avion-debut-j2'].",".$_POST['porte-avion-fin-j2'],
            $_POST['croiseur-debut-j2'].",".$_POST['croiseur-fin-j2'],
            $_POST['contre-torpilleurs-debut-j2'].",".$_POST['contre-torpilleurs-fin-j2'],
            $_POST['sous-marin-debut-j2'].",".$_POST['sous-marin-fin-j2'],
            $_POST['torpilleur-debut-j2'].",".$_POST['torpilleur-fin-j2']
        ]);
        // Mise à jour du joueur en DB
        $managerPlayer->update($player2);
    }


}
