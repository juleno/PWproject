<?php

$titlePage = "Board";
include "includes/header.php";
require "api/classes/Club.class.php";
require_once "api/classes/ConnDB.class.php";

?>
<div class="container top">
    <div class="row">
        <div class="col-md-9">
            <h3>Mes clubs</h3>
            <div class="list-group">
                <?php


                    /*$club = new Club('', '', $_SESSION['login']['id'], '', '', '','');
                    $reponse = $club->findClubByUser();

                    /*while ($donnees = $club->findClubByUser()->fetch()){
                        echo $club->name;
                    }*/
                    /*if ($club->findClubByUser()) {
                        echo $club->name;
                    }*/

                ?>
                <a href="#" class="list-group-item">Club 1</a>
                <a href="#" class="list-group-item">Club 2</a>
                <a href="#" class="list-group-item">Club 3</a>
                <a href="#" class="list-group-item active" data-toggle="modal" data-target="#createClubModal">
                    <span class="glyphicon glyphicon-plus-sign"></span> Créer un club
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="createClubModal" tabindex="-1" role="dialog" aria-labelledby="createClubModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><center><b>Nouveau club</b></center></h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="newclub.php">
                                <div class="form-group">
                                    <center>
                                        <input type= "radio" name="statut" value="1" checked> Club public<br>
                                        <input type= "radio" name="statut" value="0"> Club privé<br>
                                    </center>


                                    <label for="name">Nom du club:</label>
                                    <input type="text" class="form-control" name="name" id="name" required><br>

                                    <label for="comment">Description (500 carac. max):</label>
                                    <textarea class="form-control" rows="7" id="comment" name="desc" maxlength="500" required></textarea><br>

                                    <label for="name">Compétences principales requises:</label>
                                    <input type="text" class="form-control" name ="skill1" id="skill1" required><br>
                                    <input type="text" class="form-control" name ="skill2" id="skill2"><br>
                                    <input type="text" class="form-control" name ="skill3" id="skill3"><br>

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>

            <h3>Clubs intégrés</h3>
            <div class="list-group">
                <a href="#" class="list-group-item">Club 1</a>
                <a href="#" class="list-group-item">Club 2</a>
                <a href="#" class="list-group-item">Club 3</a>
                <a href="#" class="list-group-item active" data-toggle="modal" data-target="#listClubs">
                    <span class="glyphicon glyphicon-search"></span> Explorer les clubs publics
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="listClubs" tabindex="-1" role="dialog" aria-labelledby="listClubsModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><center><b>Liste des clubs</b></center></h4>
                        </div>
                        <div class="modal-body">
                            <div class="list-group">
                                <a href="club.php?id=1" class="list-group-item">Club 1</a>
                                <a href="club.php?id=2" class="list-group-item">Club 2</a>
                                <a href="club.php?id=3" class="list-group-item">Club 3</a>
                                <a href="club.php?id=4" class="list-group-item">Club 4</a>
                                <a href="club.php?id=5" class="list-group-item">Club 5</a>
                                <a href="club.php?id=6" class="list-group-item">Club 6</a>
                                <a href="club.php?id=7" class="list-group-item">Club 7</a>
                                <a href="club.php?id=8" class="list-group-item">Club 8</a>
                                <a href="club.php?id=9" class="list-group-item">Club 9</a>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <br><br><br>
            <div class="well center">
                <img class="img-circle profilpic" src="<?php echo $_SESSION['login']['profilpic']; ?>" alt="<?php echo $_SESSION['login']['pseudo']; ?>">
                <h3><?php echo $_SESSION['login']['pseudo']; ?></h3>
                <h4><span class="label label-success"><?php echo $_SESSION['login']['score']; ?> points</span></h4>
            </div>
            <h4>Mes amis</h4>
            <h4>Dernières activités</h4>
        </div>
    </div>
</div>
<?php
include "includes/footer.php";
?>
