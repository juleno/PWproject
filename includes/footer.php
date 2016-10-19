<br><br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>A propos</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">Lien 1</a></li>
                    <li class="list-group-item"><a href="#">Lien 2</a></li>
                    <li class="list-group-item"><a href="#">Lien 3</a></li>
                    <li class="list-group-item"><a href="#">Lien 4</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Réseaux sociaux</h3>
                <ul class="list-group">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Autre</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Accès rapide</h3>
                <ul class="list-group">
                    <li><a href="#">Lien 1</a></li>
                    <li><a href="#">Lien 2</a></li>
                    <li><a href="#">Lien 3</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <br>
            <p>Copyright &copy; <?php echo date('Y'); ?> - Tous droits réservés.</p>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/highlight.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script src="js/dropzone.js"></script>
<script src="js/md5.js"></script>

<!-- AJAX -->
<script>
    $(document).ready(function() {
        $('.textlog').hide();

        $('#loginForm').submit(function () {
            var mail = $('#mail').val();
            var pwd = $('#pwd').val();
            var dataMail = 'mail=' + mail;
            var dataPwd = '&pwd=' + calcMD5(pwd);
            var dataString = dataMail + dataPwd;
            console.log(dataPwd);

            $.ajax({
                type: 'POST',
                url: 'api/connexion.php',
                data: dataString,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data)
                    if (responseData.status == 1) {
                        $('.textlog').fadeIn();
                        $('.textlog').text(responseData.message);
                    }
                    else {
                        location.reload();
                    }
                }
            });
            return false;
        });
    });
</script>
</body>
</html>