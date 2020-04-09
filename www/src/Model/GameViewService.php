<?php




namespace App\Model;


class GameViewService
{
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

    public function generateBoardgame(Player $player, Player $playerAdversaire)
    {
        $managerShip = new ShipManager(ConnexionBDD::getInstance());
        $ships = $managerShip->findAllShipByIdPlayer($player->getId());
        $tab = array();

        // Initialisation du tableau
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                $tab[$i][$j] = 0;
            }
        }
        foreach ($ships as $ship) { // Pou chque bateau :

            // Divise la string en 2 coordonnées
            $coorArray = preg_split("/,/", $ship->getCoordonnees());

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
            // on boucle sur le tableau
            for ($i = 0; $i < $size + 1; $i++) {

                if ($isHorizontale) {
                    if ($i == 0) {
                        $tab[$y1][($x1 + $i)] = 1;
                    } elseif ($i == $size) {
                        $tab[$y1][($x1 + $i)] = 3;
                    } else {
                        $tab[$y1][($x1 + $i)] = 5;
                    }
                } else {
                    if ($i == 0) {
                        $tab[($y1 + $i)][$x1] = 7;
                    } elseif ($i == $size) {
                        $tab[($y1 + $i)][$x1] = 9;
                    } else {
                        $tab[($y1 + $i)][$x1] = 11;
                    }
                }
            }
        }

        // On ajoute les tirs du joueur adversaire
        $shoots = $playerAdversaire->getShoots();
        if(isset($shoots)) {
            //on boucle sur tous les tirs de l'adversaire
            foreach ($shoots as $shoot) {
                //Recupère la lettre sous forme de chiffre ou on recupère le chiffre
                $x1 = $this->alphabet[substr($shoot, 0, 1)];
                $y1 = (int)substr($shoot, 1) - 1; // je retire 1 car mon tableau débute à 0

                //Si la valeur est différente de 0 (donc s'il y a un bateau)
                if ($tab[$y1][$x1] != 0 && $tab[$y1][$x1] != 13 && $tab[$y1][$x1] % 2 == 1) {
                    $tab[$y1][$x1]++;
                } elseif ($tab[$y1][$x1] == 0) {
                    $tab[$y1][$x1] = 13;
                }
            }
        }

        return $tab;

    }

    private function isOver(){

    }
}

