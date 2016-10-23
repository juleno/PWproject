<?php
session_start();

if (isset($_SESSION['login']) && $titlePage == "Accueil") {
    header("Location: board.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillDev - <?php echo $titlePage; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/monokai.css" rel="stylesheet">
    <link href="css/dropzone.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

<!-- Modal -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><center><b>Nouvelle inscription</b></center></h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="test.php">
                    Nom <input type="text" name="lastname" placeholder="Dupont" class="form-control" required><br>
                    Prenom <input type="text" name="firstname" placeholder="Dupont" class="form-control" required><br>
                    Email <input type="email" name="email" placeholder="dupont.dupont@dupont.fr" class="form-control" required><br>
                    Pseudo <input type="text" name="pseudo" placeholder="dupont35000" class="form-control" required><br>
                    Mot de passe <input type="password"  name="password" class="form-control" required><br>
                    Confirmation mot de passe <input type="password" name="confirmepassword" class="form-control" required><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>

            </form>
        </div>
    </div>
</div>
<?php
include "menu.php";
?>