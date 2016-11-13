<div class="container top">
    </br><h2>Inscription</h2>
    <p class="" lead>
<?php

var_dump($_POST);

if(!empty($_POST['lastname'])) {
    if(!empty($_POST['firstname'])) {
        if(!empty($_POST['email'])) {
            if(!empty($_POST['pseudo'])) {
                if(!empty($_POST['password'])) {
                    if(!empty($_POST['confirmepassword']) && ($_POST['password'] == $_POST['confirmepassword'])) {

                        echo "insert ?";

                    }else {echo "Champ 'Nom' vide"; }
                }else {echo "Champ 'Prenom' vide"; }
            }else {echo "Champ 'Email' vide"; }
        } else {echo "Champ 'Pseudo' vide"; }
    } else {echo "Champ 'Mot de passe' vide";}
} else {echo "Champ 'Confirmation mot de passe' vide";}



?>

    </p>
</div>
