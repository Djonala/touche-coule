<?php


namespace App\Model;


/**
 * Class ConnexionBDD
 * @package App\Model
 */
class ConnexionBDD
{
    private static $instance;
    private $connexion;

    private function __construct() {

    }


    /** fonction qui permet de recupérer une instance en cours ou dans créer une nouvelle si nécessaire
     * @return ConnexionBDD
     */
    public static function getInstance(): ConnexionBDD {
        if (self::$instance === null) {
            self::$instance = new ConnexionBDD();
        }
        return self::$instance;
    }

    /** fonction qui permet de se connecter à la base de données
     * @return false|resource
     */
    public function connect() {
        if ($this->connexion === null) {
            $this->connexion = pg_connect('host=127.0.0.1 port=5432 dbname=touche-coule user=johanna password=test');
        }
        return $this->connexion;
    }

    /** fonction qui permet de recupérer la version du SGBD
     * (Au cas ou tu aurais besoin de connaitre la version de ton SGBD...)
     * @return String
     */
    public function getVersion():String {
        $result = pg_query($this->connexion, "SELECT version();");
        $version = '';
        while ($data = pg_fetch_object($result)) {
            $version = $data->version;
        }
        pg_free_result($result);
        return $version;
    }

    /**
     * fonction qui permet de se déconnecter de la base de données
     * (oui, je sais, inutilisée mais je te la laisse, au cas où... Cadeau =D)
     */
    public function disconnect() {
        if ($this->connexion !== null) {
            pg_close($this->connexion);
            $this->connexion = null;
        }
    }

    /** function qui permet de recupérer la connexion
     * @return mixed
     */
    public function getConnexion() {
        return $this->connexion;
    }
}
