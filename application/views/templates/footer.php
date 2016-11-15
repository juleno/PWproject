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
        <br>
        <center><a href="<?php echo base_url() ?>legal">Mentions Légales</a> &nbsp;&bull;&nbsp; <a
                href="<?php echo base_url() ?>about">A
                propos</a></br></br>Copyright &copy; <?php echo date('Y'); ?> - Tous droits réservés
        </center>
        <br>
    </div>

</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script src="<?php echo base_url(); ?>js/dropzone.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/list.js"></script>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="<?php echo base_url(); ?>js/c3.min.js"></script>


<!--<SCRIPT LANGUAGE="JavaScript">

    function addField(){
        var field = "<input type='text' class='form-control' /><br/>";
        document.getElementById('fields').innerHTML += field;
    }

</SCRIPT>-->

<script>
    $(document).ready(function() {

        var chart = c3.generate({
            bindto: '#chart',
            data: {
                columns: [
                    ['Nombre de contributions', 30, 200, 100, 400, 150, 250, 30, 200, 100, 400, 150, 250, 30, 200, 100, 400, 150, 250, 30, 200, 100, 400, 150, 250, 30, 200, 100, 400, 150, 250, 30, 200, 100, 400, 150, 250],

                ],
                type: 'bar'
            },
            bar: {
                width: {
                    ratio: 0.9 // this makes bar width 50% of length between ticks
                }
                // or
                //width: 100 // this makes bar width 100px
            }
        });

        var offsetFn = function () {
            return $('#sidebar').position().top;
        }

        $('#sidebar').affix({
            offset: {top: offsetFn}
        });

        $('.textlog').hide();

        //LOGIN
        $('#loginForm').submit(function () {
            var mail = $('#mail').val();
            var pwd = $('#pwd').val();
            var dataMail = 'mail=' + mail;
            var dataPwd = '&pwd=' + pwd;
            var dataString = dataMail + dataPwd;
            console.log('yo');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyLogin',
                data: dataString,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data)
                    if (responseData.status == 1) {
                        $('.textlog').fadeIn();
                        // $('.textlog').text(responseData.message);
                    }
                    else {
                        location.reload();
                    }
                }
            });
            return false;
        });

        //INSCRIPTION



        refreshActivities();
        refreshNotifs();

        $('[data-toggle="popover"]').popover({
            html: true,
            content: $('#notifcenter').html()
        });

        $('[data-toggle="tooltip"]').tooltip();

        <?php
        if ($title == "Explorer") {
        ?>
        var options = {
            valueNames: ['name', 'desc', 'lastactivity', 'nbmembers', 'clubdate']
        };

        var clubList = new List('clubs', options);
        clubList.sort('lastactivity', {order: "desc"});
        <?php
        }
        ?>

        <?php
        if ($title == "Rechercher un utilisateur") {
        ?>
        var options2 = {
            valueNames: ['pseudo', 'firstname', 'lastname', 'score', 'inscridate']
        };

        var userList = new List('users', options2);
        userList.sort('pseudo', {order: "asc"});
        <?php
        }
        ?>

    });





    <?php
    if (isset($login))
    {
    ?>
    function refreshActivities() {
        $.ajax({
            url: "<?php echo base_url() ?>activity/last/<?php echo $login['id'] ?>",
            success: function (html) {
                lastactivities = document.getElementById("liveactivities");
                lastactivities.innerHTML = html;
            }
        });
    }
    function refreshNotifs() {
        $.ajax({
            url: "<?php echo base_url() ?>activity/notif/<?php echo $login['id'] ?>",
            success: function (html) {
                lastnotifs = document.getElementById("livenotifs");
                lastnotifs.innerHTML = html;
            }
        });
    }
    <?php
    }
    ?>
</script>
</body>
</html>