<?php


namespace App\Model;


class ConnexionBDD
{
    private static $instance;
    private $connexion;

    private function __construct() {

    }

    public static function getInstance(): ConnexionBDD {
        if (self::$instance === null) {
            self::$instance = new ConnexionBDD();
        }
        return self::$instance;
    }

    public function connect() {
        if ($this->connexion === null) {
            echo("ouvou2");
            $this->connexion = pg_connect('host=127.0.0.1 port=5432 dbname=touche-coule user=postgres password=postgres');
            echo("ouvou3");
        }
        return $this->connexion;
    }

    public function getVersion():String {
        $result = pg_query($this->connexion, "SELECT version();");
        $version = '';
        while ($data = pg_fetch_object($result)) {
            $version = $data->version;
        }
        pg_free_result($result);
        return $version;
    }

    public function disconnect() {
        if ($this->connexion !== null) {
            pg_close($this->connexion);
            $this->connexion = null;
        }
    }

    public function getConnexion() {
        return $this->connexion;
    }
}
