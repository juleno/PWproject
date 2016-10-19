<?php
$titlePage = "Board";
include "includes/header.php";
?>
<div class="container top">
    <div class="row">
        <div class="col-md-9">
            <h3>Mes clubs</h3>
            <div class="list-group">
                <a href="#" class="list-group-item">Club 1</a>
                <a href="#" class="list-group-item">Club 2</a>
                <a href="#" class="list-group-item">Club 3</a>
                <a href="#" class="list-group-item active">
                    <span class="glyphicon glyphicon-plus-sign"></span> Créer un club
                </a>
            </div>
            <h3>Clubs intégrés</h3>
            <div class="list-group">
                <a href="#" class="list-group-item">Club 1</a>
                <a href="#" class="list-group-item">Club 2</a>
                <a href="#" class="list-group-item">Club 3</a>
                <a href="#" class="list-group-item active">
                    <span class="glyphicon glyphicon-search"></span> Explorer les clubs publics
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <br><br><br>
            <div class="well center">
                <img class="img-circle profilpic" src="<?php echo $_SESSION['login']['profilpic']; ?>" alt="<?php echo $_SESSION['login']['pseudo']; ?>">
                <h3><?php echo $_SESSION['login']['pseudo']; ?></h3>
                <h4><span class="label label-success"><?php echo $_SESSION['login']['score']; ?> points</span></h4>
            </div>
            <h4>Mes amis</h4>
            <h4>Dernières activités</h4>
        </div>
    </div>
</div>
<?php
include "includes/footer.php";
?>
