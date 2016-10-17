<?php
/**
 * Created by PhpStorm.
 * User: Portable
 * Date: 17/10/2016
 * Time: 14:17
 */

require_once "api/classes/ConnDB.class.php";
include "includes/header.php";

$file = "C:\\Users\\Jules\\Desktop\\InsertionInteger.java";
echo "directory = ".$file;
$contenu =file_get_contents($file);

//echo $contenu;

//echo "Contenu du fichier : ".$contenu;

$req = new ConnDB();
$req->query("INSERT INTO file(id, iduser, extensionfile, publidate, content, name) VALUES ('', '1', 'java', '14844559101', :contenu, 'FILE_ABC')");
$req->bind(":contenu",utf8_encode($contenu));
$req->execute();

$lastid=$req->lastInsertId();

$req->query("SELECT * FROM file WHERE id=:id");
$req->bind(":id", $lastid);
$req->execute();

$data = $req->single();

echo "<pre><code class='java'>".$data['content']."</code></pre>";


/*$myFile = file_get_contents('http://www.example.com/');
echo $myFile;*/

include "includes/footer.php";


?>