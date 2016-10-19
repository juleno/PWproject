<?php
$titlePage = "Accueil";
include "includes/header.php";
?>

    <div class="jumbotron top">
        <div class="container">
            <h1>Bienvenue !</h1>
            <p>Echangez vos compétences en programmation au sein d'un groupe.<br>Partagez vos fichiers, demandez de l'aide, des avis exterieurs et progressez !</p>
            <p><a class="btn btn-primary btn-md" role="button" data-toggle="modal" data-target="#inscriptionModal">Inscription &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="img/club.png" alt="Club privé ou public" class="img-rounded">
                <h2>Créez votre club</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            </div>
            <div class="col-md-4">
                <img src="img/coloration.png" alt="Coloration syntaxique" class="img-rounded">
                <h2>Partagez vos fichiers</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            </div>
            <div class="col-md-4">
                <img src="img/rencontre.png" alt="Rencontre entre développeurs" class="img-rounded">
                <h2>Faites connaissance</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            </div>
        </div>
    </div>

<?php
include "includes/footer.php";
?>