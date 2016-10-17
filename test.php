<?php

require_once "api/classes/ConnDB.class.php";
require_once "api/classes/User.class.php";

$lucas = new User('', 'lucaslel', 'lucas@gmail.com', 'sd4v5ds415cqs41c5ds4f1sd54', 'Lucas', 'Lelievre', 45, true, true, 'http://sygfdsh.fr/img.jpg', 'Coucou je suis Lucas', 1425698745);
echo $lucas->getJson();
var_dump($lucas->insertIntoDatabase());
var_dump($lucas->removeFromDatabase());

$req = new ConnDB();
$req->query("SELECT * FROM user");
$req->execute();
$data = $req->resultset();
foreach ($data as $index => $userDb) {
    $users[]  = new User(
        $userDb['id'],
        $userDb['pseudo'],
        $userDb['mail'],
        $userDb['pwd'],
        $userDb['firstname'],
        $userDb['lastname'],
        $userDb['score'],
        $userDb['mailvalid'],
        $userDb['isadmin'],
        $userDb['profilpic'],
        $userDb['bio'],
        $userDb['inscridate']
    );
}


foreach ($users as $key => $user) {
  //  echo $user->getJson();
}

//echo json_encode($users, JSON_NUMERIC_CHECK);

?>