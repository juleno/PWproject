<div class="container top">
    <h3><?php echo $title; ?></h3>
    <div id="users">
        <input type="text" class="form-control search" placeholder="Rechercher..."><br>
        <label>Trier par</label><br>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="pseudo">Pseudo</button>
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="score">Score</button>
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="inscridate">Date d'inscription</button>
        </div>
        <br><br>
        <table class="table table-hover">
            <thead>
            <th></th>
            <th>Pseudo</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Score</th>
            <th>Date inscription</th>
            <th></th>
            </thead>
            <tbody class="list">
            <?php
            foreach ($users as $user) {
                echo '<tr><td><img height="25px" src="' . $user['profilpic'] . '"></td><td class="pseudo"><a href ="' . base_url() . 'user/' . $user['pseudo'] . '">' . $user['pseudo'] . '</a></td><td class="firstname">' . $user['firstname'] . '</td><td class="lastname">' . $user['lastname'] . '</td><td class="score">' . $user['score'] . '</td><td class="inscridate">' . date('d/m/y H:i:s', $user['inscridate']) . '</td><td>';
                if ($user['id'] != $login['id']) {
                    switch ($user['isfriend']) {
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
                }
                echo '</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>