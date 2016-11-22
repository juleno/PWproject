<div class="top">
    <div class="row">
        <div class="col-md-8">
            <pre><code class="java"><?php echo $file['content']; ?></code></pre>
        </div>
        <div class="col-md-4">
            <br>
            <h4><?php echo $title; ?></h4>
            <h5>Ajouté par <?php echo $file['iduser']; ?></h5>
            <div class="btn-group">
                <a href="#" class="btn btn btn-success"><span class=" glyphicon glyphicon-download-alt"></span>
                    Télécharger le fichier</a>
                <a href="#" class="btn btn btn-default"><span class=" glyphicon glyphicon-share"></span> Partager</a>
            </div>
            <br><br>
            <h5>Détail</h5>
            <hr>
            <h5>Commentaires</h5>
            <hr>
        </div>
    </div>
</div>