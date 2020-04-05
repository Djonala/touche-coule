<?php
use App\Controller\SetupController;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_URI'] === '/') {
    $setupController = new SetupController();
    $setupController->createUser();
} elseif ($_SERVER['REQUEST_URI'] === '/setup'){
    $setupController = new SetupController();
    $setupController->createBoardgame();
}
