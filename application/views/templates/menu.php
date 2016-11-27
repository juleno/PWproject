<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!--Logo provisoire, juste le nom à modif-->
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>img/logo.png" class="img-responsive" width="150px" ></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php
            if (isset($login)) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a role="button" tabindex="0" class="notification_bell" data-toggle="popover"
                           data-placement="bottom" data-html="true" data-trigger="focus" title="Notifications"
                           data-content="" data-original-title="" title=""><span class="glyphicon glyphicon-bell"
                                                                                 aria-hidden="true"></span> <span
                                class="badge">4</span></a>
                    </li>
                    <li>
                        <a role="button"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <span
                                class="badge">4</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>club/explore">Explorer</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>club">Board</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <?php echo $login['pseudo'] ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>user/<?php echo $login['pseudo'] ?>">Profil</a></li>
                            <li><a href="#">Paramètres</a></li>
                            <li><a href="<?php echo base_url(); ?>VerifyLogin/logout">Déconnexion</a></li>
                        </ul>
                    </li>

                </ul>
                <div id="notifcenter" class="hide">
                    <div class="notifcenter">
                        <div id="livenotifs">
                            <img src="<?php echo base_url() ?>img/loading.gif" class="text-center" width="20px"
                                 alt="Chargement"><br><br>
                            <script>
                                setInterval(function () {
                                    refreshNotifs();
                                }, 2000);
                            </script>
                        </div>
                        <a href="#">Voir plus &raquo;</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <form id="loginForm" method="post" class="navbar-form navbar-right">
                    <div class="form-group">
                        <small class="textlog">Mauvaise adresse email et/ou mot de passe. &nbsp;<br><a
                                href="<?php echo base_url() . 'oubli'; ?>">Mot de passe oublié ?</a></small>
                    </div>
                    <div class="form-group">
                        <input type="text" id="mail" name="mail" placeholder="Adresse email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Connexion</button>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#inscriptionModal">Inscription</a></br>
                </form>

                <?php
            }
            ?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>