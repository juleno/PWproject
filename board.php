<?php

$titlePage = "Board";
include "includes/header.php";
require "api/classes/Club.class.php";
require "api/classes/Skill.class.php";
require_once "api/classes/ConnDB.class.php";

?>
<div class="container top">
    <div class="row">
        <div class="col-md-9">
            <h3>Mes clubs</h3>
            <div class="list-group">

                <p style="overflow:auto;max-height: 250px;">
                <?php

                    $req = new ConnDB();
                    $req->query("SELECT DISTINCT*, club.id AS idclub FROM club, user WHERE user.id = club.iduser AND iduser = :iduser");
                    $req->bind(":iduser", $_SESSION['login']['id']);
                    $req->execute();
                    if ($req->rowCount() > 0) {
                        $data = $req->resultset();
                        foreach ($data as $key=>$club) {
                            $clubs[$key] = new Club($club['idclub'], $club['name'], $club['iduser'], $club['desc'], $club['clubpic'], $club['clubdate'], $club['ispublic']);
                            echo '<a href="club.php?id='.$clubs[$key]->id.'" class="list-group-item"><span class="glyphicon glyphicon-question-sign"></span>  ' .$clubs[$key]->name.'</a>';
                        }
                    } else {
                        echo '<li class="list-group-item">Aucun club !</li>';
                    }

                ?>
                    </p>

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
                            <h4 class="modal-title" id="myModalLabel"><center><b>Création d'un nouveau club</b></center></h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="newclub.php">
                                <div class="form-group">

                                    <center>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="statut" id="statutPublic" value="1" autocomplete="off" checked> Club public
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="statut" id="statutPrive" value ="0" autocomplete="off"> Club privé
                                            </label>
                                        </div>
                                    </center>


                                    <label for="name">Nom du club:</label>
                                    <input type="text" class="form-control" name="name" id="name" required><br>

                                    <label for="comment">Description (500 carac. max):</label>
                                    <textarea class="form-control" rows="7" id="comment" name="desc" maxlength="500" required></textarea><br>

                                    <label for="name">Compétences requises:</label>
                                    <!--<input type="text" class="form-control" name ="skill1" id="skill1" required><br>
                                    <input type="text" class="form-control" name ="skill2" id="skill2"><br>
                                    <input type="text" class="form-control" name ="skill3" id="skill3"><br>-->

                                    <div class="modal-body">
                                        <div class="row">

                                    <?php

                                    $req = new ConnDB();
                                    $req->query("SELECT * FROM skill");
                                    $req->execute();
                                    if ($req->rowCount() > 0) {
                                        $data = $req->resultset();
                                        foreach ($data as $key=>$skill) {
                                            $skill[$key] = new Skill($skill['id'], $skill['name'], $skill['desc'], $skill['category']);
                                            //echo '<a href="club.php?id='.$skill[$key]->id.'" class="list-group-item">'.$skill[$key]->name.'</a>';
                                           echo ' <div class="col-md-4"><input type="checkbox" id="'.$skill[$key]->id.'" value="'.$skill[$key]->id.'"> '.$skill[$key]->name.'</div>';
                                        }
                                    } else {
                                        echo '<li class="list-group-item">Aucune compétence connue</li>';
                                    }

                                    ?>

                                        </div>
                                    </div>
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
                <p style="overflow:auto;max-height: 250px;">

                <?php

                $req = new ConnDB();
                $req->query("SELECT DISTINCT club.* FROM club, userclub WHERE userclub.idclub = club.id AND userclub.iduser = :iduser");
                $req->bind(":iduser", $_SESSION['login']['id']);
                $req->execute();
                if ($req->rowCount() > 0) {
                    $data = $req->resultset();
                    foreach ($data as $key=>$club) {
                        $clubs[$key] = new Club($club['id'], $club['name'], $club['iduser'], $club['desc'], $club['clubpic'], $club['clubdate'], $club['ispublic']);
                        echo '<a href="club.php?id='.$clubs[$key]->id.'" class="list-group-item" ><span class="glyphicon glyphicon-question-sign" ></span> '. $clubs[$key]->name.'</a>';
                    }
                } else {
                    echo '<li class="list-group-item">Aucun club !</li>';
                }

                ?>

                    </p>

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

                                <?php

                                $req = new ConnDB();
                                $req->query("SELECT * FROM club WHERE ispublic = 1 AND id NOT IN (SELECT club.id FROM club, userclub WHERE userclub.idclub = club.id AND userclub.iduser = 66)");
                                $req->bind(":iduser", $_SESSION['login']['id']);
                                $req->execute();
                                if ($req->rowCount() > 0) {
                                    $data = $req->resultset();
                                    foreach ($data as $key=>$club) {
                                        $clubs[$key] = new Club($club['id'], $club['name'], $club['iduser'], $club['desc'], $club['clubpic'], $club['clubdate'], $club['ispublic']);
                                        echo '<a href="club.php?id='.$clubs[$key]->id.'" class="list-group-item"><span class="glyphicon glyphicon-question-sign"></span> ' .$clubs[$key]->name.'</a>';
                                    }
                                } else {
                                    echo '<li class="list-group-item">Aucun club !</li>';
                                }

                                ?>






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
