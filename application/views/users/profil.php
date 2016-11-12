<div class="container top">
    <div class="row top">
        <div class="col-md-3">
            <div class="well center">
                <img class="img-circle profilpic" src="<?php echo $user['profilpic']; ?>"
                     alt="<?php echo $user['pseudo']; ?>">
                <h3><?php echo $user['pseudo']; ?></h3>
                <h5><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h5>
                <h4><span class="label label-success"><?php echo $user['score']; ?> points</span></h4>
                <small>Inscrit depuis le <?php echo date('d/m/Y', $user['inscridate']); ?></small>
                <br>
                <?php
                if (isset($login['id']) && $user['id'] == $login['id']) {
                    echo '<br><a class="btn btn-xs btn-default" href="' . base_url() . 'user/edit"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Editer mon profil</a>';
                }
                ?>
            </div>
            <h4>Amis</h4>
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
                                <center><b>Amis de <?php echo $user['pseudo'] ?></b></center>
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
            <?php
            if (isset($login['id']) && $user['id'] == $login['id']) {
                ?>
                <a href="<?php echo base_url() ?>user">Ajouter un ami &raquo;</a>
                <br>
                <?php
            }
            ?>
            <h4>Dernières activités</h4>
        </div>
        <div class="col-md-9">
            <br>
            <?php
            if (isset($login['id']) && $user['id'] != $login['id']) {
                ?>
                <div class="btn-group btn-group-sm" role="group">
                    <?php
                    switch ($isfriend) {
                        case 0:
                            ?>
                            <a href="<?php echo base_url() . 'friend/invite/' . $user['id'] ?>"
                               class="btn btn-sm btn-primary"><span
                                    class="glyphicon glyphicon-user"></span>&nbsp; Ajouter</a>
                            <?php
                            break;
                        case 1:
                            ?>
                            <a href="<?php echo base_url() . 'friend/accept/' . $user['id'] ?>"
                               class="btn btn-sm btn-success"><span
                                    class="glyphicon glyphicon-ok"></span>&nbsp; Accepter</a>
                            <?php
                            break;
                        case 2:
                            ?>
                            <a href="<?php echo base_url() . 'friend/invite/' . $user['id'] ?>"
                               class="btn btn-sm btn-primary disabled"><span
                                    class="glyphicon glyphicon-user"></span>&nbsp; En attente</a>
                            <?php
                            break;
                        case 3:
                            ?>
                            <a href="<?php echo base_url() . 'friend/remove/' . $user['id'] ?>"
                               class="btn btn-sm btn-danger"><span
                                    class="glyphicon glyphicon-user"></span>&nbsp; Retirer</a>
                            <?php
                            break;
                    }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="newMessage" tabindex="-1" role="dialog"
                         aria-labelledby="newMessageModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        <center><b>Envoyer un message à <?php echo $user['pseudo'] ?></b></center>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <textarea class="form-control" rows="14" id="msg" name="msg" required=""
                                                  placeholder="Rédigez votre message"></textarea>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Continuer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#newMessage" class="btn btn-sm btn-default"><span
                            class="glyphicon glyphicon-envelope"></span>&nbsp;
                        Envoyer un message</a>
                </div>
                <br>
                <?php
            }
            ?>
            <br>
            <blockquote>
                <p><?php echo $user['bio'] ?></p>
            </blockquote>
            <h3>Contributions</h3>
            <p>Les 30 derniers jours</p>
            <div id="chart"></div>
            <h3>Clubs crées</h3>
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
            </div>
        </div>
    </div>

</div>