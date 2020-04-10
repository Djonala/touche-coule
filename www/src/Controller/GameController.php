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
        $plateauJ1 = $gameService->generateBoardgame($player1,$player2); // pour affichage complet du plateau
        $plateauJ2 = $gameService->generateBoardgame($player2,$player1); //pour affichage des tirs et à l'eau

        // si une requete post est lancée
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //on ajoute les tirs à la liste du joueur en cours et on le met à jour en DB
            $player1->setShoots($_POST['tir']);
            $player1 = $joueurManager->update($player1);

            // on réinitialise avec ces données le plateau du joueur adverse
            $plateauAdverse = $gameService->generateBoardgame($player2,$player1);

            //Si le $plateau adverse est vide, c'est la fin, sinon, on continue
            if($gameService->isOver($plateauAdverse)){
                $this->redirect302('/end');
            } else {
                $this->redirect302('/gameJ2');
            }


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

        //on instancie le service GameViewService et on genère un plateau pour le player en cours
        $gameService = new GameViewService();
        $plateauJ2 = $gameService->generateBoardgame($player2,$player1);  // pour affichage complet du plateau
        $plateauJ1 = $gameService->generateBoardgame($player1,$player2);//pour affichage des tirs et à l'eau

        // si une requete post est lancée
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //on ajoute les tirs à la liste du joueur en cours et on le met à jour en DB
            $player2->setShoots($_POST['tir']);
            $player2 = $joueurManager->update($player2);

            // on réinitialise avec ces données le plateau du joueur adverse
            $plateauAdverse = $gameService->generateBoardgame($player1,$player2);

            //Si le $plateau adverse est vide, c'est la fin, sinon, on continue
            if($gameService->isOver($plateauAdverse)){
                $this->redirect302('/end');
            } else {
                $this->redirect302('/gameJ1');
            }
        }

        require(__DIR__ . '/../View/joueur2.php');
    }
}
