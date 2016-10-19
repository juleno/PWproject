<?php
require "../api/classes/User.class.php";
if (isset($_POST['mail']) && $_POST['mail'] != "" && isset($_POST['pwd']) && $_POST['pwd'] != "") {
    $login = new User('', '', $_POST['mail'], $_POST['pwd'], '', '', '', '', '', '', '', '');
    if ($login->connexion()) {
        session_start();
        $_SESSION['login'] = (array) $login;
        $status = 0;
        $msg = "ok";
    } else {
        $status = 1;
        $msg = "Mauvaise adresse email et/ou mot de passe.";
    }
} else {
    $status = 1;
    $msg = "Veuillez renseigner une adresse email et un mot de passe";
}
$return = array("status"=>$status, 'message'=>$msg);
echo json_encode($return);
?>
