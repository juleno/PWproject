<div class="top">
    <div class="row">
        <div class="col-md-8">
            <pre class="line-numbers" style="margin-top: -3px; margin-bottom: -42px;"><code
                    class="language-<?php echo $file['extensionfile']; ?>"><?php echo $file['content']; ?></code></pre>
        </div>
        <div class="col-md-4">
            <br>
            <h4><?php echo $title; ?></h4>
            <h5>Ajouté par <a
                    href="<?php echo base_url() ?>user/<?php echo $file['pseudo'] ?>"><?php echo $file['pseudo'] ?></a>
            </h5>
            <div class="btn-group">
                <a href="#" class="btn btn btn-success"><span class="glyphicon glyphicon-download-alt"></span>
                    Télécharger le fichier</a>
                <a href="#" data-toggle="modal" data-target="#share" class="btn btn btn-default"><span
                        class="glyphicon glyphicon-share"></span> Partager</a>
            </div>
            <div class="modal fade" id="share" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                <center><b>Partager</b></center>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style center">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_google_plus"></a>
                                <a class="a2a_button_telegram"></a>
                                <a class="a2a_button_skype"></a>
                                <a class="a2a_button_facebook_messenger"></a>
                                <a class="a2a_button_trello"></a>
                                <a class="a2a_button_copy_link"></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
                        </div>
                    </div>
                </div>
            </div>

            <br><br>
            <h5><b>Détails</b></h5>
            <p>Fichier <span class="text-uppercase"><?php echo $file['extensionfile'] ?></span></p>
            <hr>
            <h5><b>Commentaires</b></h5>
            <hr>
        </div>
    </div>
</div>