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
    <link href="<?php echo base_url(); ?>css/monokai.css" rel="stylesheet">
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
            <form id="form_insript" method="POST" action="inscription">
                <div class="modal-body">
                    <div id="pb_lastname" style="color:red;visibility:hidden;"><i>Nom incorrect</i></div>Nom <input type="text" id="lastname_form" name="lastname" onblur="verifLastName()" placeholder="Dupont"  class="form-control" required>
                    <div id="pb_firstname" style="color:red;visibility:hidden;"><i>Prenom incorrect</i></div>Prenom <input type="text" id="firstname_form" name="firstname" onblur="verifFirstName()" placeholder="Dupont" class="form-control" required>
                    <div id="pb_email" style="color:red;visibility:hidden;"><i>L'information saisie n'est pas une adresse email</i></div>Email<input type="email" id="email_form" name="email" onblur="verifMail()" placeholder="dupont.dupont@dupont.fr" class="form-control"
                                 required>
                    <div id="pb_pseudo" style="color:red;visibility:hidden;"><i>Pseudo incorrect (6 carac. min. / caractères autorisés [A-Z], [0-9] et _)</i></div>Pseudo (6 carac. min)<input type="text" id="pseudo_form" name="pseudo" onblur="verifPseudo()" placeholder="dupont35000" class="form-control" required>
                    <div id="pb_pwd" style="color:red;visibility:hidden;"><i>Mot de passe incorrect</i></div>Mot de passe<input type="password" id="pwd_form" name="password" onblur="verifPwd1()" class="form-control" required>
                    <div id="pb_pwd2" style="color:red;visibility:hidden;"><i>Les deux mots de passe ne sont pas égaux</i></div>Confirmation mot de passe<input type="password" id="pwd2_form" onblur="verifPwd2()" name="confirmepassword" class="form-control"
                                                     required><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <!--<button type="submit" id="button_save_inscription" class="btn btn-primary" disabled="true">Enregistrer</bu0tton>-->
                    <button type="submit" id="button_save_inscription" class="btn btn-primary">Enregistrer</button>
                </div>

            </form>
        </div>
    </div>
</div>


<!--<!-- SCRIPT VERIF FORM INSCRIPTION -->

<!--<script type="text/javascript">

    var valid_pseudo = false;
    var valid_lastname = false;
    var valid_firstname = false;
    var valid_email = false;
    var valid_pwd = false;
    var valid_pwd1 = false;

    function deblock_val() {
        if (valid_pseudo && valid_lastname && valid_firstname && valid_email && valid_pwd && valid_pwd1) {
            document.getElementById("button_save_inscription").disabled = false;
        }
    }

    function verifPseudo() {
        var regex2 = new RegExp('[^a-zA-Z0-9_]');
        var pseudo = document.getElementById("pseudo_form").value;
        if(!regex2.test(pseudo)) {
            document.getElementById("pseudo_form").style.border = "2px solid green";
            document.getElementById("pb_pseudo").style.visibility = "hidden";
            valid_pseudo = true;
        }
        else {
            document.getElementById("pseudo_form").style.border = "2px solid red";
            document.getElementById("pb_pseudo").style.visibility = "visible";
            valid_pseudo = false;
        }

        /* Cas pseudo déjà pris */

        deblock_val();
    }


    function verifLastName() {
        var size_name = document.getElementById("lastname_form").value.length;
        if (size_name < 2) {
            document.getElementById("lastname_form").style.border = "2px solid red";
            document.getElementById("pb_lastname").style.visibility = "visible";
            valid_lastname = false;
        } else {
            document.getElementById("lastname_form").style.border = "2px solid green";
            document.getElementById("pb_lastname").style.visibility = "hidden";
            valid_lastname = true;
        }
        deblock_val();
    }

    function verifFirstName() {
        var size_firstname = document.getElementById("firstname_form").value.length;
        if (size_firstname < 2) {
            document.getElementById("firstname_form").style.border = "2px solid red";
            document.getElementById("pb_firstname").style.visibility = "visible";
            valid_firstname = false;
        } else {
            document.getElementById("firstname_form").style.border = "2px solid green";
            document.getElementById("pb_firstname").style.visibility = "hidden";
            valid_firstname = true;
        }
        deblock_val();
    }


    function validateEmail(email_form) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email_form);
    }

    function verifMail() {
        $("#result").text("");
        var email = document.getElementById("email_form").value;
        if (validateEmail(email)) {
            document.getElementById("email_form").style.border = "2px solid green";
            document.getElementById("pb_email").style.visibility = "hidden";
            valid_email = true;
        } else {
            document.getElementById("email_form").style.border = "2px solid red";
            document.getElementById("pb_email").style.visibility = "visible";
            valid_email = false;
        }
        return false;
    }


    function verifPwd1() {
        var size_pseudo = document.getElementById("pwd_form").value.length;
        if (size_pseudo < 6) {
            document.getElementById("pwd_form").style.border = "2px solid red";
            document.getElementById("pb_pwd").style.visibility = "visible";
            valid_pwd = false;
        } else {
            document.getElementById("pwd_form").style.border = "2px solid green";
            document.getElementById("pb_pwd").style.visibility = "hidden";
            valid_pwd = true;
        }
        deblock_val();
    }

    function verifPwd2() {
        if (document.getElementById("pwd2_form").value != document.getElementById("pwd_form").value) {
            document.getElementById("pwd2_form").style.border = "2px solid red";
            document.getElementById("pb_pwd2").style.visibility = "visible";
            valid_pwd1 = false;
        } else {
            document.getElementById("pwd2_form").style.border = "2px solid green";
            document.getElementById("pb_pwd2").style.visibility = "hidden";
            valid_pwd1 = true;
        }
        deblock_val();
    }


</script>

-->