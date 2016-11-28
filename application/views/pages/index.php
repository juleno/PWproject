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
            <h3>Qu'il soit public ou privé, créez votre club et invitez-y vos amis/collègues/camarades et commencez à
                échanger.</h3>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row" data-sr="enter bottom after 2.15s over 1s">
        <div class="col-md-8">
            <h1>Partagez vos fichiers</h1>
            <h3>Publiez votre code dans un club, ce dernier sera affiché avec une coloration syntaxique selon le langage
                de programmation. Partagez également des images, fichiers compressés, pdf...</h3>
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
            <h3>Rencontrez des développeurs, intégrez des clubs publics, faites des rencontres. Construisez-vous un
                réseau professionnel avec des gens ayant les mêmes compétences que vous.</h3>
        </div>
    </div>
</div>
