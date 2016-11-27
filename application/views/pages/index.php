<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="jumbotron top">
    <video id="video-background" preload muted autoplay loop>
        <source src="<?php echo base_url(); ?>img/background.mp4" type="video/mp4">
    </video>
    <div class="container welcome">
        <h1>Bienvenue !</h1>
        <p>Echangez vos compétences en programmation au sein d'un groupe.<br>Partagez vos fichiers, demandez de l'aide,
            des avis exterieurs et progressez !</p>
        <p><a class="btn btn-primary btn-md" role="button" data-toggle="modal" data-target="#inscriptionModal">Inscription &raquo;</a>
        </p>
    </div>
</div>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo base_url(); ?>img/club.png" alt="Club privé ou public"
                 class="img-rounded img-responsive">
        </div>
        <div class="col-md-8">
            <h1>Créez votre club</h1>
            <h3>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </h3>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row" data-sr="enter bottom after 2.15s over 1s">
        <div class="col-md-8">
            <h1>Partagez vos fichiers</h1>
            <h3>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </h3>
        </div>
        <div class="col-md-4">
            <img src="<?php echo base_url(); ?>img/coloration.png" alt="Coloration syntaxique"
                 class="img-rounded img-responsive">
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo base_url(); ?>img/rencontre.png" alt="Rencontre entre développeurs"
                 class="img-rounded img-responsive">
        </div>
        <div class="col-md-8">
            <h1>Faites connaissance</h1>
            <h3>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                fermentum massa justo sit amet risus.</h3>
        </div>
    </div>
</div>
