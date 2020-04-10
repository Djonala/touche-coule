<?php


namespace App\Controller;


class AbstractController
{
    /**Function qui redirige vers une route à definir
     * @param $location
     */
    public function redirect302($location) {
        header('Location: ' . $location);
        exit(); // stop l'execution
    }
}
