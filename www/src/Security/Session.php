<?php


namespace App\Security;


class Session
{
    /** fonction qui permet d'ajouter un idGame à la session
     * @param $idGame
     */
    public function setIdGameToSession($idGame) {
        $_SESSION['idGame'] = serialize($idGame);
    }

    /** fonction qui permet de recupérer un idGame de la session
     * @return mixed|null
     */
    public function getIdGameFromSession() {
        $idGame = null;
        if (isset($_SESSION['idGame'])) {
            $idGame = unserialize($_SESSION['idGame']);
        }
        return $idGame;
    }

    /**
     *Fonction qui permet de detruire la session.
     */
    public function logout()
    {
        session_destroy();
    }
}