<br><br>
<footer>
    <!--<div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3>A propos</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">Lien 1</a></li>
                    <li class="list-group-item"><a href="#">Lien 2</a></li>
                    <li class="list-group-item"><a href="#">Lien 3</a></li>
                    <li class="list-group-item"><a href="#">Lien 4</a></li>
                </ul>
            </div>
            <div class="col-md-5">
                <h3>Mentions légales</h3>
            </div>
        </div>
    </div>-->
    <div class="footer-bottom">
        <br><center><a href = "mentionslegales.php">Mentions Légales</a>     --   <a href = "apropos.php">A propos</a></br></br>Copyright &copy; <?php echo date('Y'); ?> - Tous droits réservés   </center><br>
    </div>

</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/highlight.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script src="js/dropzone.js"></script>
<script src="js/md5.js"></script>

<!--<SCRIPT LANGUAGE="JavaScript">

    function addField(){
        var field = "<input type='text' class='form-control' /><br/>";
        document.getElementById('fields').innerHTML += field;
    }

</SCRIPT>-->

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