<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">skilldev.io</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php
            if (isset($_SESSION['login'])) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?php echo $_SESSION['login']['pseudo'] ?></a></li>
                    <li><a href="api/deconnexion.php">Déconnexion</a></li>
                </ul>
                <?php
            } else {
                ?>
                <form id="loginForm" method="post" action="api/connexion.php" class="navbar-form navbar-right">
                    <div class="form-group">
                        <span class="textlog"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" id="mail" name="mail" placeholder="Adresse email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Connexion</button>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#inscriptionModal">Inscription</a>
                </form>
                <?php
            }
            ?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>