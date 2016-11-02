<div class="container top">
    <div class="row top">
        <div class="col-md-3">
            <div class="well center">
                <img class="img-circle profilpic" src="<?php echo $user['profilpic']; ?>"
                     alt="<?php echo $user['pseudo']; ?>">
                <h3><?php echo $user['pseudo']; ?></h3>
                <h5><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h5>
                <h4><span class="label label-success"><?php echo $user['score']; ?> points</span></h4>
                <em><?php echo $user['bio'] ?></em><br>
                <?php
                if (isset($login['id']) && $user['id'] == $login['id']) {
                    echo '<br><a class="btn btn-xs btn-default" href="' . base_url() . 'user/edit">Editer mon profil</a>';
                }
                ?>
            </div>
            <h4>Amis</h4>
            <h4>Dernières activités</h4>
        </div>
        <div class="col-md-9">
            <h3>Contributions</h3>
            <h3>Clubs crées</h3>
            <h3>Clubs intégrés</h3>
        </div>
    </div>

</div>