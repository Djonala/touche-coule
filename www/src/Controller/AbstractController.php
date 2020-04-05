<?php


namespace App\Controller;


class AbstractController
{
    public function redirect302($location) {
        header('Location: ' . $location);
        exit(); // stop l'execution
    }
}
