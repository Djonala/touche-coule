<?php
namespace App\Controller;

use App\Model\ConnexionBDD;
use App\Model\Game;
use App\Model\GameManager;
use App\Model\Player;
use App\Model\PlayerManager;
use App\Security\Session;

class SetupController extends AbstractController
{
    function setupUserAndgame(){
        // On demarre ou on recupère la session
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Creation de nouveau player à partir des pseudos renseignés par l'utilisateur
            $player1 = new Player();
            $player1->setPseudo($_POST['joueur1']);
            $player2= new Player();
            $player2->setPseudo($_POST['joueur2']);


            // instantiation d'un userManager et enregistrement des users en BDD
            $userManager = new PlayerManager(ConnexionBDD::getInstance());
            $playerDB1 = $userManager->create($player1);
            $playerDB2 = $userManager->create($player2);

            //Creation de la partie (game)
            $game = new Game();
            $game->setIdPlayer1($playerDB1->getId());
            $game->setIdPlayer2($playerDB2->getId());

            //instantiation d'un gameManager et enregistrement de la partie(game) en BDD
            $gameManager = new GameManager(ConnexionBDD::getInstance());
            $gameDB = $gameManager->create($game);

            //Recupération de l'id de la partie et enregistrement en session
            $session = new Session();
            $session->setIdGameToSession($gameDB->getId());

            //redirection vers la page de setup
            $this->redirect302('/setup');
        }
        require(__DIR__ .'/../View/pseudo.html');
    }

    function setupShips(){
        // on recupere la session
        session_start();
        $session = new Session();
        if(isset($_SESSION['idGame'])) {
            $gameManager = new GameManager(ConnexionBDD::getInstance());
            $idGame = $session->getIdGameFromSession();
            $game = $gameManager->findById($idGame);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $game->AddShipsForPlayer1();
            $game->AddShipsForPlayer2();
            $this->redirect302('/gameJ1');
        }
        require(__DIR__ .'/../View/setup.html');
    }
}
