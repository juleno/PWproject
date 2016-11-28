<div class="container top">
    <h1 class="top"><?php echo $club['name'] ?></h1>

    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <p class="lead">Club crée le <?php echo date("d/m/Y", $club['clubdate']) ?></p>
                <em>
                    <?php echo $club['desc'] ?>
                </em><br><br><h4><?php echo $club['strlabel'] ?></h4><br>
                <a href="#"></a>

                <span data-toggle="modal" data-target="#collaboratorListModal">
                    <button class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right" title="Liste des collaborateurs à afficher ici (juste pseudo)">35 collaborateurs &raquo;</button>
                </span>
                <br><br>
                <a href="<?php echo base_url() . 'file/' . $club['id'] ?>">Voir les fichiers partagés &raquo;</a>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                           aria-expanded="false" aria-controls="collapseOne">
                            Ajouter une publication
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <form action="">
                            <label for="name">Titre :</label>
                            <input type="text" class="form-control" name="title" id="title" required><br>

                            <label for="comment">Contenu :</label>
                            <textarea class="form-control" rows="7" id="content" name="content" required></textarea><br>
                        </form>
                        <form action="<?php echo base_url(); ?>File/add" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                            </div>
                        </form>
                        <hr>
                        <button type="submit" class="btn btn-primary pull-right">Publier</button>
                    </div>
                </div>
            </div>

            <h3>Dernières publications</h3>
            <?php
            foreach ($publications as $publi) {
                ?>
                <div class="well">
                    <h2><?php echo $publi['title'] ?></h2>
                    <h5>
                        Publié le <?php echo date('d/m/y à H:i', $publi['publidate']) ?> par <a
                            href="<?php echo base_url() ?>user/<?php echo $publi['pseudo'] ?>"><?php echo $publi['pseudo'] ?></a>
                    </h5><br>
                    <p><?php echo $publi['desc'] ?></p>

                    <?php
                    if (sizeof($publi['files']) > 0) {
                        ?>
                        <hr>
                        <h4>Fichiers joints</h4>
                        <div class="row">
                            <?php
                            foreach ($publi['files'] as $file) {
                                echo '<div class="col-sm-6 col-md-4">
                                        <div class="thumbnail"><br>
                                          <img width="90px" src="' . base_url() . 'img/exticons/' . $file['extensionfile'] . '.png">
                                          <div class="caption">
                                            <p>' . $file['name'] . '</p>
                                            <p><a href="' . base_url() . 'file/' . $club['id'] . '/' . $file['id'] . '" class="btn btn-sm btn-default" role="button">Voir</a> <a href="#" class="btn btn-sm btn-success" role="button">Télécharger</a></p>
                                          </div>
                                        </div>
                                      </div>';
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <hr>
                    <h4>Commentaires</h4>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-md-4" id="sidebar">

        </div>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="collaboratorListModal" tabindex="-1" role="dialog" aria-labelledby="collaboratorListModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <center><b>Liste des collaborateurs</b></center>
                </h4>
            </div>
            <div class="modal-body">
                <table class="table">
                   <!--Affichage du pseudo + image des collaborateurs du club-->
                </table>
            </div>
        </div>
    </div>
</div>