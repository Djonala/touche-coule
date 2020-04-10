<?php


namespace App\Controller;


use App\Model\ConnexionBDD;
use App\Model\GameManager;
use App\Model\GameViewService;
use App\Model\PlayerManager;
use App\Security\Session;

class EndController extends AbstractController
{
    function endGame(){
    // on recupere la session
        session_start();
        $session = new Session();

        // On recupère le game grace à l'id de la sessions
        $gameManager = new GameManager(ConnexionBDD::getInstance());
        $idGame = $session->getIdGameFromSession();
        $game = $gameManager->findById($idGame);

        // on recupère les joueurs grace aux id contenu dans le game
        $joueurManager = new PlayerManager(ConnexionBDD::getInstance());
        $player1 = $joueurManager->findPlayerById($game->getIdPlayer1());
        $player2 = $joueurManager->findPlayerById($game->getIdPlayer2());

        //on instancie le service GameViewService
        $gameService = new GameViewService();
        $plateauJ1 = $gameService->generateBoardgame($player1,$player2);
        $plateauJ2 = $gameService->generateBoardgame($player2,$player1);
        $session->logout();



        require(__DIR__ . '/../View/end.php');
    }
}