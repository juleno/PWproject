<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: /");
}
require_once "api/classes/Club.class.php";
$club = new Club($_GET['id'], '', '', '', '', '', '');
if (!$club->getFromId()) {
    header("Location: /");
}

require_once "api/classes/User.class.php";
$owner = new User($club->iduser, '', '', '', '', '', '', '', '', '', '', '');
$owner->getFromId();

$titlePage = $club->name;
include "includes/header.php";
?>

<div class="container">
    <h1 class="top"><?php echo $club->name ?></h1>

        <div class="row">
            <div class="col-md-8">
                <div class="well">
                    <p class="lead">Club crée par <a href="profil.php?id=<?php echo $owner->id ?>"><?php echo $owner->pseudo ?></a> le <?php echo date("d/m/Y", $club->clubdate) ?></p>
                    <em>
                        <?php echo $club->desc ?>
                    </em><br><br>
                    <a href="#">35 collaborateurs &raquo;</a>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>

    <h3>Ajouter une publication</h3>

    <h3>Dernières publications</h3>
</div>

<?php
include "includes/footer.php";
?>