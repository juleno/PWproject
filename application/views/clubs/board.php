<div class="container top">
    <div class="row">
        <div class="col-md-9">
            <h3>Mes clubs</h3>
            <div class="list-group">
                <?php
                if (sizeof($clubs_user) > 0) {
                    foreach ($clubs_user as $club) {
                        echo '<a href="club/' . $club['id'] . '" class="list-group-item">';
                        echo '<h4 class="list-group-item-heading">' . $club['name'] . '</h4>';
                        echo '<p class="list-group-item-text">' . $club['desc'] . '</p>';
                        echo '<br>';
                        echo '<span class="list-group-item-text">';
                        echo $club['strlabel'];
                        echo '<small class="pull-right">Dernière activité le 01/11/2016 à 17:21</small>&nbsp;';
                        echo '</span>';
                        echo '</a>';
                        }
                    } else {
                        echo '<li class="list-group-item">Aucun club !</li>';
                    }
                ?>
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
                                        <div class="btn-group btn-group-sm" data-toggle="buttons">
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="statut" id="statutPublic" value="1"
                                                       autocomplete="off" checked><span
                                                    class=" glyphicon glyphicon-globe"></span> Club public
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="statut" id="statutPrive" value="0"
                                                       autocomplete="off"><span class="glyphicon glyphicon-lock"></span>
                                                Club privé
                                            </label>
                                        </div>
                                    </center>


                                    <label for="name">Nom du club:</label>
                                    <input type="text" class="form-control" name="name" id="name" required><br>

                                    <label for="comment">Description (500 carac. max):</label>
                                    <textarea class="form-control" rows="7" id="comment" name="desc" maxlength="500" required></textarea><br>

                                    <label for="name">Compétences requises:</label>
                                    <div class="row">
                                        <?php
                                        foreach ($skills as $skill) {
                                            echo ' <div class="col-md-4"><input type="checkbox" id="' . $skill['id'] . '" value="' . $skill['id'] . '"> ' . $skill['name'] . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">



                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Continuer</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>

            <h3>Clubs intégrés</h3>
            <div class="list-group">
                <?php
                if (sizeof($clubs_other) > 0) {
                    foreach ($clubs_other as $club) {
                        echo '<a href="club/' . $club['id'] . '" class="list-group-item">';
                        echo '<h4 class="list-group-item-heading">' . $club['name'] . '</h4>';
                        echo '<p class="list-group-item-text">' . $club['desc'] . '</p>';
                        echo '<br>';
                        echo '<span class="list-group-item-text">';
                        echo $club['strlabel'];
                        echo '<small class="pull-right">Dernière activité le 01/11/2016 à 17:21</small>&nbsp;';
                        echo '</span>';
                        echo '</a>';
                    }
                } else {
                    echo '<li class="list-group-item">Aucun club !</li>';
                }
                ?>
                <a href="<?php echo base_url(); ?>club/explore" class="list-group-item active">
                    <span class="glyphicon glyphicon-search"></span> Explorer les clubs publics
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <br><br><br>
            <div class="well center">
                <img class="img-circle profilpic" src="<?php echo $login['profilpic']; ?>"
                     alt="<?php echo $login['pseudo']; ?>">
                <a href="<?php echo base_url() ?>user/<?php echo $login['pseudo']; ?>"
                   alt="Profil de <?php echo $login['pseudo']; ?>"><h3><?php echo $login['pseudo']; ?></h3></a>
                <h4><span class="label label-success"><?php echo $login['score']; ?> points</span></h4>
            </div>
            <h4>Mes amis</h4>
            <?php
            foreach ($friends as $key => $friend) {
                if ($key == 5) {
                    break;
                }
                echo '<a data-toggle="tooltip" data-placement="bottom" title="' . $friend['pseudo'] . '" href="' . base_url() . 'user/' . $friend['pseudo'] . '" alt="' . $friend['pseudo'] . '"><img src="' . $friend['profilpic'] . '" alt="' . $friend['pseudo'] . '" class="img-circle" height="40px"></a>&nbsp;';
            }
            ?>
            <a href="#" data-toggle="modal" data-target="#listFriends"><img
                    src="<?php echo base_url() ?>img/morefriends.png" alt="Voir plus" class="img-circle" height="40px"></a><br><br>

            <!-- Modal -->
            <div class="modal fade" id="listFriends" tabindex="-1" role="dialog" aria-labelledby="listClubsModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                <center><b>Mes amis</b></center>
                            </h4>
                        </div>
                        <div class="modal-body">
                                <table class="table">
                                    <?php
                                    if (sizeof($friends) > 0) {
                                        foreach ($friends as $friend) {
                                            echo '<tr><td><img src="' . $friend['profilpic'] . '" alt="' . $friend['pseudo'] . '" class="img-circle" height="25px"></td><td>' . $friend['pseudo'] . '</td><td><a href="' . base_url() . 'user/' . $friend['pseudo'] . '" alt="' . $friend['pseudo'] . '">Voir le profil &raquo;</a></td></tr>';
                                        }
                                    } else {
                                        echo '<p>Vous n\' avez encore aucun ami !';
                                    }

                                    ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <a href="<?php echo base_url() ?>user">Ajouter un ami &raquo;</a>
            <br>
            <h4>Dernières activités</h4>
            <table id="liveactivities" class="table">
                <script>
                    setInterval(function () {
                        refreshActivities();
                    }, 5000);
                </script>
            </table>
        </div>
    </div>
</div>