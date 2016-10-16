<?php

require_once "api/classes/ConnDB.class.php";
require_once "api/classes/User.class.php";

$req = new ConnDB();
$req->query("SELECT * FROM user");
$req->execute();
$data = $req->resultset();
foreach ($data as $index => $userDb) {
    $newuser = new User(
        $userDb['id'],
        $userDb['pseudo'],
        $userDb['mail'],
        $userDb['firstname'],
        $userDb['lastname'],
        $userDb['score'],
        $userDb['mailvalid'],
        $userDb['isadmin'],
        $userDb['profilpic'],
        $userDb['bio'],
        $userDb['inscridate']
    );
    $users[] = $newuser;
}

foreach ($users as $key => $user) {
  //  echo $user->getJson();
}

echo json_encode($users, JSON_NUMERIC_CHECK);

?>