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
        <center>
            Copyright &copy; <?php echo date('Y'); ?> - Tous droits réservés <br>
            <small><a href="<?php echo base_url() ?>legal">Mentions Légales</a> &nbsp;&bull;&nbsp; <a
                    href="<?php echo base_url() ?>about">A
                    propos</a></small>
        </center>
        <br>
    </div>

</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script src="<?php echo base_url(); ?>js/dropzone.js"></script>
<script src="<?php echo base_url(); ?>js/prism.js"></script>
<script src="//select2.github.io/select2/select2-3.4.1/select2.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/list.js"></script>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="<?php echo base_url(); ?>js/c3.min.js"></script>
<script src="<?php echo base_url(); ?>js/scrollReveal.js"></script>
<script>
    window.sr = ScrollReveal();
</script>


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
                    var responseData = jQuery.parseJSON(data);
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

        //INSCRIPTION - Verif email

        var valid_email = false;
        var valid_firstname = false;
        var valid_lastname = false;
        var valid_pseudo = false;
        var valid_pwd = false;
        var valid_pwd2 = false;

        $('#email_form').focusout(function() {
            var email = document.getElementById("email_form").value;
            var dataMail = 'mail=' + email;

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyInscription/echoVerifMail',
                data: dataMail,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data);
                    if (responseData.status == 1) {
                        document.getElementById("email_form").style.border = "2px solid red";
                        document.getElementById("pb_email").textContent = responseData.message;
                        document.getElementById("pb_email").style.visibility = "visible";
                        valid_email = false;
                    }
                    else {
                        document.getElementById("email_form").style.border = "2px solid green";
                        document.getElementById("pb_email").style.visibility = "hidden";
                        valid_email = true;
                        activeBtn();
                    }
                }
            });
        });


        //INSCRIPTION - Verif pseudo

        $('#pseudo_form').focusout(function() {
            var pseudo = document.getElementById("pseudo_form").value;
            var dataPseudo = 'pseudo=' + pseudo;

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyInscription/echoVerifPseudo',
                data: dataPseudo,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data);
                    if (responseData.status == 1) {
                        document.getElementById("pseudo_form").style.border = "2px solid red";
                        document.getElementById("pb_pseudo").textContent = responseData.message;
                        document.getElementById("pb_pseudo").style.visibility = "visible";
                        valid_pseudo = false;
                    }
                    else {
                        document.getElementById("pseudo_form").style.border = "2px solid green";
                        document.getElementById("pb_pseudo").style.visibility = "hidden";
                        valid_pseudo = true;
                        activeBtn();
                    }
                }
            });
        });



        //INSCRIPTION - Verif firstname

        $('#firstname_form').focusout(function() {
            var firstname = document.getElementById("firstname_form").value;
            var dataFirstname = 'firstname=' + firstname;

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyInscription/echoFirstnameExist',
                data: dataFirstname,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data);
                    if (responseData.status == 1) {
                        document.getElementById("firstname_form").style.border = "2px solid red";
                        document.getElementById("pb_firstname").textContent = responseData.message;
                        document.getElementById("pb_firstname").style.visibility = "visible";
                        valid_firstname = false;
                    }
                    else {
                        document.getElementById("firstname_form").style.border = "2px solid green";
                        document.getElementById("pb_firstname").style.visibility = "hidden";
                        valid_firstname = true;
                        activeBtn();
                    }
                }
            });
        });



        //INSCRIPTION - Verif lastname

        $('#lastname_form').focusout(function() {
            var lastname = document.getElementById("lastname_form").value;
            var dataLastname = 'lastname=' + lastname;

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyInscription/echoLastnameExist',
                data: dataLastname,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data);
                    if (responseData.status == 1) {
                        document.getElementById("lastname_form").style.border = "2px solid red";
                        document.getElementById("pb_lastname").textContent = responseData.message;
                        document.getElementById("pb_lastname").style.visibility = "visible";
                        valid_lastname = false;
                    }
                    else {
                        document.getElementById("lastname_form").style.border = "2px solid green";
                        document.getElementById("pb_lastname").style.visibility = "hidden";
                        valid_lastname = true;
                        activeBtn();
                    }
                }
            });
        });


        //INSCRIPTION - Verif pwd (1)


        $('#pwd_form').focusout(function() {
            var pwd = document.getElementById("pwd_form").value;
            var dataPwd = 'pwd=' + pwd;

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyInscription/echoPwdExist',
                data: dataPwd,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data);
                    if (responseData.status == 1) {
                        document.getElementById("pwd_form").style.border = "2px solid red";
                        document.getElementById("pb_pwd").textContent = responseData.message;
                        document.getElementById("pb_pwd").style.visibility = "visible";
                        valid_pwd = false;
                    }
                    else {
                        document.getElementById("pwd_form").style.border = "2px solid green";
                        document.getElementById("pb_pwd").style.visibility = "hidden";
                        valid_pwd = true;
                        activeBtn();
                    }
                }
            });
        });

        //INSCRIPTION - Verif pwd2

        $('#pwd2_form').keyup(function() {
            var pwd = document.getElementById("pwd_form").value;
            var pwd2 = document.getElementById("pwd2_form").value;
            var dataPwd = 'pwd=' + pwd;
            var dataPwd2 = '&pwd2=' + pwd2;
            var dataPassword = dataPwd + dataPwd2;

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyInscription/echoVerifPwd',
                data: dataPassword,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data);
                    if (responseData.status == 1) {
                        document.getElementById("pwd2_form").style.border = "2px solid red";
                        document.getElementById("pb_pwd2").textContent = responseData.message;
                        document.getElementById("pb_pwd2").style.visibility = "visible";
                        valid_pwd2 = false;
                    }
                    else {
                        document.getElementById("pwd2_form").style.border = "2px solid green";
                        document.getElementById("pb_pwd2").style.visibility = "hidden";
                        valid_pwd2 = true;
                        activeBtn();
                    }
                }
            });
        });


        //TODO : Débloquer bouton si champ tous ok (pour le moment le "disabled" a été supprimé du form d'inscription)


        //TODO Envoi du formulaire - Test en dessous, ne fonctionne pas

        $('#form_insript').submit(function () {

            var pseudo = document.getElementById("pseudo_form").value;
            var firstname = document.getElementById("firstname_form").value;
            var lastname = document.getElementById("lastname_form").value;
            var email = document.getElementById("email_form").value;
            var pwd = document.getElementById("pwd_form").value;
            var pwd2 = document.getElementById("pwd2_form").value;

            var dataPseudo = 'pseudo=' + pseudo;
            var dataLastname = '&lastname=' + lastname;
            var dataFirstname = '&firstname=' + firstname;
            var dataEmail = '&mail=' + email;
            var dataPwd = '&pwd=' + pwd;
            var dataPwd2 = '&pwd2=' + pwd2;

            var dataAll = dataPseudo + dataLastname + dataFirstname + dataEmail + dataPwd + dataPwd2;

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>VerifyInscription/valider',
                data: dataAll,
                success: function (data) {
                    var responseData = jQuery.parseJSON(data);
                    if (responseData.status == 1) {
                        console.log('oula');
                    }
                    else {
                        window.location = "<?php echo base_url(); ?>validmailsent";
                    }
                }
            });
            return false;
        });

        function activeBtn() {
            if (valid_email == true && valid_firstname == true && valid_lastname == true && valid_pseudo == true && valid_pwd == true && valid_pwd2 == true) {
                document.getElementById("button_save_inscription").classList.remove("disabled");
            } else {
                document.getElementById("button_save_inscription").classList.add("disabled");
            }
        }








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