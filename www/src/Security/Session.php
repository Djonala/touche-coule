<?php


namespace App\Security;


class Session
{
    public function setIdGameToSession($idGame) {
        $_SESSION['idGame'] = serialize($idGame);
    }

    public function getIdGameFromSession() {
        $idGame = null;
        if (isset($_SESSION['idGame'])) {
            $idGame = unserialize($_SESSION['idGame']);
        }
        return $idGame;
    }

    public function logout()
    {
        session_destroy();
    }
}