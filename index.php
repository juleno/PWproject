<?php
    require "api/classes/User.class.php";
    $jules = new User(1, "juleno", "Jules", "Esnault", "julesnault@gmail.com", 55, true, true, "http://juleno.fr/images.profil.png", "Salut à tous je suis étudiant en L3 Miage !", 1476546716);
    echo $jules->getJson();
?>