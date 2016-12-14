<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevClub - <?php echo $title; ?></title>

    <link rel="manifest" href="<?php echo base_url(); ?>icons/manifest.json">
    <meta name="msapplication-TileColor" content="#3e3f3a">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#3e3f3a">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/prism.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>icons/favicon-16x16.png">

</head>
<body>

<!-- Modal -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <center><b>Nouvelle inscription</b></center>
                </h4>
            </div>
            <form id="form_insript">
                <div class="modal-body">
                    Nom <input type="text" id="firstname_form" name="firstname" placeholder="Dupont"
                               class="form-control" required>
                    <small id="pb_firstname" style="color:red;visibility:hidden;"><i></i></small>
                    <br>
                    Prenom <input type="text" id="lastname_form" name="lastname" placeholder="Dupont"
                                  class="form-control" required>
                    <small id="pb_lastname" style="color:red;visibility:hidden;"><i></i></small>
                    <br>
                    Email<input type="email" id="email_form" name="email" placeholder="dupont.dupont@dupont.fr"
                                class="form-control" required>
                    <small id="pb_email" style="color:red;visibility:hidden;"><i></i></small>
                    <br>
                    Pseudo (6 carac. min)<input type="text" id="pseudo_form" name="pseudo" placeholder="dupont35000"
                                                class="form-control" required>
                    <small id="pb_pseudo" style="color:red;visibility:hidden;"><i></i></small>
                    <br>
                    Mot de passe<input type="password" id="pwd_form" name="password" class="form-control" required>
                    <small id="pb_pwd" style="color:red;visibility:hidden;"><i></i></small>
                    <br>
                    Confirmation mot de passe<input type="password" id="pwd2_form" name="confirmepassword"
                                                    class="form-control" required>
                    <small id="pb_pwd2" style="color:red;visibility:hidden;"><i></i></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <!--<button type="submit" id="button_save_inscription" class="btn btn-primary" disabled="true">Enregistrer</bu0tton>-->
                    <button type="submit" id="button_save_inscription" class="btn btn-primary disabled">Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
