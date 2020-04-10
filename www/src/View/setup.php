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
            </div>
        </nav>
        <div class="container">
            <!-- Page Content goes here -->
            <div class="row">
                <form class="col s12" method="POST">
                    <div class="row">
                        <div class="col s12">
                            <h2><?php echo($player1->getPseudo()); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Porte-avion (5 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="porte-avion-debut-j1" value="A1">
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="porte-avion-fin-j1" value="A2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Croiseur (4 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="croiseur-debut-j1" >
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="croiseur-fin-j1" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Contre-torpilleurs (3 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="contre-torpilleurs-debut-j1" >
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="contre-torpilleurs-fin-j1" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Sous-marin (3 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="sous-marin-debut-j1" >
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="sous-marin-fin-j1" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Torpilleur (2 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="torpilleur-debut-j1" >
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="torpilleur-fin-j1" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h2><?php echo($player2->getPseudo()); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Porte-avion (5 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="porte-avion-debut-j2" value="A1">
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="porte-avion-fin-j2" value="E1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Croiseur (4 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="croiseur-debut-j2" value="A3">
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="croiseur-fin-j2" value="A6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Contre-torpilleurs (3 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="contre-torpilleurs-debut-j2" value="A7">
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="contre-torpilleurs-fin-j2" value="C7">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Sous-marin (3 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="sous-marin-debut-j2" value="H7">
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="sous-marin-fin-j2" value="J7">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <p>Torpilleur (2 cases)</p>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Début" type="text" class="validate" name="torpilleur-debut-j2" value="F9">
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="Fin" type="text" class="validate" name="torpilleur-fin-j2" value="F10">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="action">Go
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col s4 offset-s2 grid grid4">
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

                    <div>1</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>2</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>3</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>4</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>5</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>6</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>7</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>8</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                    <div>9</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>


                    <div>10</div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>
                    <div> </div>

                </div>
            </div>



        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="../../assets/js/materialize.min.js"></script>
    </body>
</html>
