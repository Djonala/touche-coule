<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../assets/css/materialize.min.css" media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/app.css"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper indigo darken-4">
                <a href="/" class="brand-logo">Touché, Coulé</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="end.php">Fin</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3 class="center-align">A <?php echo $player2->getPseudo(); ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <h4 class="center-align"><?php echo $player1->getPseudo(); ?></h4>
                </div>
                <div class="col s6  offset-s1">
                    <h4 class="center-align"><?php echo $player2->getPseudo(); ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col s6 grid grid6">
                    <div> </div>
                    <div>A</div>
                    <div>B</div>
                    <div>C</div>
                    <div>D</div>
                    <div>E</div>
                    <div>F</div>
                    <div>G</div>
                    <div>H</div>
                    <div>I</div>
                    <div>J</div>
                    <?php
                    for($i=0;$i<10;$i++){
                        $ligne = $i+1;
                        echo "<div>$ligne</div>";
                        for($j=0;$j<10;$j++){
                            switch ($plateauJ1[$i][$j]){
                                case 0: echo("<div></div>");
                                    break;
                                case 4:
                                case 6:
                                case 8:
                                case 10:
                                case 12:
                                case 2: echo "<div>&#128165;</div>";
                                    break;
                                case 13: echo("<div>&#128167;</div>");
                                    break;
                                default : echo"<div></div>";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col s6 grid grid6">
                        <div> </div>
                        <div>A</div>
                        <div>B</div>
                        <div>C</div>
                        <div>D</div>
                        <div>E</div>
                        <div>F</div>
                        <div>G</div>
                        <div>H</div>
                        <div>I</div>
                        <div>J</div>

                        <?php
                        for($i=0;$i<10;$i++){
                            $ligne = $i+1;
                            echo "<div>$ligne</div>";
                            for($j=0;$j<10;$j++){
                                switch ($plateauJ2[$i][$j]){
                                    case 0: echo("<div></div>");
                                        break;
                                    case 1: echo("<div class='g2d-d'></div>");
                                        break;
                                    case 2: echo("<div class='g2d-d'>&#128165;</div>");
                                        break;
                                    case 3: echo("<div class='g2d-f'></div>");
                                        break;
                                    case 4: echo("<div class='g2d-f'>&#128165;</div>");
                                        break;
                                    case 5: echo("<div class='g2d-m'></div>");
                                        break;
                                    case 6: echo("<div class='g2d-m'>&#128165;</div>");
                                        break;
                                    case 7: echo("<div class='t2b-d'></div>");
                                        break;
                                    case 8: echo("<div class='t2b-d'>&#128165;</div>");
                                        break;
                                    case 9: echo("<div class='t2b-f'></div>");
                                        break;
                                    case 10: echo("<div class='t2b-f'>&#128165;</div>");
                                        break;
                                    case 11: echo("<div class='t2b-m'></div>");
                                        break;
                                    case 12: echo("<div class='t2b-m'>&#128165;</div>");
                                        break;
                                    case 13: echo("<div>&#128167;</div>");
                                        break;
                                }
                            }
                        }
                        ?>
                    </div>
            <div class="row">
                <div class="col s6">
                    <h5>Légende</h5>
                    <ul>
                        <li>&#128165; : Touché</li>
                        <li>&#128167; : Tir manqué</li>
                    </ul>
                </div>
                <div class="col s6">
                    <form class="col s6" method="POST" >
                        <div class="row">
                            <div class="input-field col s3">
                                <input id="tir" type="text" name="tir" class="validate">
                                <label for="tir">Tir</label>
                            </div>
                            <div class="col s3">
                                <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="action">Feu !
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="../../assets/js/materialize.min.js"></script>
    </body>
