<?php




namespace App\Model;

/**
 * Class GameViewService
 * @package App\Model
 * @note
 * Reference du tableau pour affichage dans la vue :
 * 0 = Rien
 * 1 = class g2d-d (bateau horizontal debut)
 * 2 = class g2d-d + tir valide (bateau hozitontal debut + touché)
 * 3 = class g2d-f (fin du bateau horizontal)
 * 4 = class g2d-f + tir (bateau horizontal fin + touché)
 * 5 = class g2d-m (bateau horizontal milieu)
 * 6 = class g2d-m + tir (bateau horizontal milieu + touché)
 * 7 = class t2d-d (bateau vertical debut)
 * 8 = class t2d-d + tir valide (bateau vertical debut + touché)
 * 9 = class t2d-f (fin du bateau vertical)
 * 10 = class t2d-f + tir (bateau vertical fin + touché)
 * 11 = class t2d-m (bateau vertical milieu)
 * 12 = class t2d-m + tir (bateau vertical milieu + touché)
 * 13 = A l'eau
 */
class GameViewService
{
    /**Tableau simplifiant la conversion lettre en nombre.
     * @var array
     */
    private $alphabet = array(
        'A' => 0,
        'B' => 1,
        'C' => 2,
        'D' => 3,
        'E' => 4,
        'F' => 5,
        'G' => 6,
        'H' => 7,
        'I' => 8,
        'J' => 9
    );

    /** Fonction qui génère un tableau contenant des chiffres de 0 à 13 pour un affichage personnalisé
     * @param Player $player
     * @param Player $playerAdversaire
     * @return array
     */
    public function generateBoardgame(Player $player, Player $playerAdversaire)
    {
        //On recupère les bateaux du joueur
        $ships = $player->getShips();
        $tab = array();

        // on initialise un tableau avec la valeur 0
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                $tab[$i][$j] = 0;
            }
        }
        //Pour chaque bateau :
        foreach ($ships as $ship) {

            // Divise la string en 2 coordonnées
            $coorArray = preg_split("/,/", $ship);

            //Recupère la lettre sous forme de chiffre ou on recupère le chiffre

            $x1 = $this->alphabet[substr($coorArray[0], 0, 1)];
            $y1 = (int)substr($coorArray[0], 1) - 1; // je retire 1 car mon tableau débute à 0
            $x2 = $this->alphabet[substr($coorArray[1], 0, 1)];
            $y2 = (int)substr($coorArray[1], 1) - 1;


            //On verifie le sens des coordonnées
            if (($x1 + $y1) > ($x2 + $y2)) {
                $temp = $x1;
                $x1 = $x2;
                $x2 = $temp;
                $temp = $y1;
                $y1 = $y2;
                $y2 = $temp;
            }

            // on vide le tableau coorArray
            unset($coorArray);

            // Si x1 == x2 alors on est a la verticale (colonne)
            if (abs($x1 == $x2)) {
                $isHorizontale = false;
                $size = abs($y1 - $y2);
            } else { // sinon on est a l'horizontale (ligne)
                $isHorizontale = true;
                $size = abs($x1 - $x2);
            }
            // on boucle sur le tableau pour ajouter les bateau
            for ($i = 0; $i < $size + 1; $i++) {
                if ($isHorizontale) {
                    if ($i == 0) {
                        $tab[$y1][($x1 + $i)] = 1; //Si c'est le début d'un bateau horizontal
                    } elseif ($i == $size) {
                        $tab[$y1][($x1 + $i)] = 3; // Si c'est le milieu d'un bateau horizontal
                    } else {
                        $tab[$y1][($x1 + $i)] = 5; // Si c'est la fin d'un bateau horizontal
                    }
                } else {
                    if ($i == 0) {
                        $tab[($y1 + $i)][$x1] = 7; //Si c'est le début d'un bateau vertical
                    } elseif ($i == $size) {
                        $tab[($y1 + $i)][$x1] = 9; // Si c'est le milieu d'un bateau vertical
                    } else {
                        $tab[($y1 + $i)][$x1] = 11; // Si c'est la fin d'un bateau vertical
                    }
                }
            }
        }

        // On ajoute les tirs du joueur adversaire
        $shoots = $playerAdversaire->getShoots();
        if(isset($shoots)) {

            //on boucle sur tous les tirs de l'adversaire
            foreach ($shoots as $shoot) {
                if($shoot!=null){

                    //Recupère la lettre sous forme de chiffre ou on recupère le chiffre
                    $x1 = $this->alphabet[substr($shoot, 0, 1)];
                    $y1 = (int)substr($shoot, 1) - 1; // je retire 1 car mon tableau débute à 0

                    /**
                     * Si la valeur est différente de 0 (donc qu'il y a un bateau)
                      ET que ce n'est pas valeur= 13 (donc un tir coulé)
                      ET que la valeur est impaire (donc un bateau non touché)
                     */
                    if ($tab[$y1][$x1] != 0 && $tab[$y1][$x1] != 13 && $tab[$y1][$x1] % 2 == 1) {

                        //on ajoute +1 ce qui le rend impaire (donc touché)
                        $tab[$y1][$x1]++;

                        // on met à jour le player en DB
                        $playerManager = new PlayerManager(ConnexionBDD::getInstance());
                        $playerManager->update($player);

                        // Sinon si la valeur est = 0 (donc qu'y n'y a pas de bateau)
                    } elseif ($tab[$y1][$x1] == 0) {

                        //La case prend la valeur 13 (donc coulé)
                        $tab[$y1][$x1] = 13;
                    }
                }
            }
        }
        return $tab;

    }

    /** Function qui indique si oui ou non le jeu est terminé, en fonction d'un tableau à jour et personnalisé
     * de l'adversaire.
     * @param $tab
     * @return bool
     */
    public function isOver($tab){
        // Initialisation de la variable à true
        $isOver = true;

        //double boucle sur l'ensemble du tableau
        for($i=0;$i<10;$i++){
            for($j=0;$j<10;$j++){
                // Si la case contient un nombre impaire (donc un bateau non touché) et est différente de 13 (coulé) la partie n'est pas terminée.
                if($tab[$i][$j] % 2 === 1 && $tab[$i][$j] != 13){
                    $isOver = false;
                    break;
                }
            }
            if(!$isOver){
                break;
            }
        }
        return $isOver;
    }

}

