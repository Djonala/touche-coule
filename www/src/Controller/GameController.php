<?php


namespace App\Controller;


use App\Model\ConnexionBDD;
use App\Model\GameManager;
use App\Model\GameViewService;
use App\Model\PlayerManager;
use App\Security\Session;

class GameController extends AbstractController
{

    function runGameJ1(){
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
        var_dump($player2->getShoots());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $player1->setShoots($_POST['tir']);
            $player1 = $joueurManager->update($player1);

            $this->redirect302('/gameJ2');
        }
        require(__DIR__ . '/../View/joueur1.php');
    }

    function runGameJ2(){
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
        $plateauJ2 = $gameService->generateBoardgame($player2,$player1);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $player2->setShoots($_POST['tir']);
            $player2 = $joueurManager->update($player2);


            $this->redirect302('/gameJ1');
        }

        require(__DIR__ . '/../View/joueur2.php');
    }
}
