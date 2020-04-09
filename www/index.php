<?php
use App\Controller\SetupController;
use App\Controller\GameController;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_URI'] === '/') {
    $setupController = new SetupController();
    $setupController->setupUserAndgame();
} elseif ($_SERVER['REQUEST_URI'] === '/setup'){
    $setupController = new SetupController();
    $setupController->setupShips();
} elseif ($_SERVER['REQUEST_URI'] === '/gameJ1'){
    $gameController = new GameController();
    $gameController->runGameJ1();
} elseif ($_SERVER['REQUEST_URI'] === '/gameJ2'){
    $gameController = new GameController();
    $gameController->runGameJ2();
} elseif ($_SERVER['REQUEST_URI'] === '/end'){
    echo("c'est la fin");
}
