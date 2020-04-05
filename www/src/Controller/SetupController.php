<?php


namespace App\Controller;



use App\Model\ConnexionBDD;
use App\Model\Gameboard;
use App\Model\User;
use App\Model\UserManager;

class SetupController extends AbstractController
{
    function createUser(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user1 = new User($_POST['joueur1']);
            $user2 = new User($_POST['joueur2']);
            $userManager = new UserManager(ConnexionBDD::getInstance());
            echo("ouvou");
            $userDB = $userManager->create($user1);
            $userDB = $userManager->create($user2);

            $this->redirect302('/setup');
        }
        require(__DIR__ .'/../View/pseudo.html');
    }
    function createBoardgame(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->redirect302('/');
        }
        require(__DIR__ .'/../View/setup.html');
    }
}
