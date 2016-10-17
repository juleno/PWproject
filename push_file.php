<?php
/**
 * Created by PhpStorm.
 * User: Portable
 * Date: 17/10/2016
 * Time: 14:17
 */

require_once "api/classes/ConnDB.class.php";

$file = "C:\\wamp64\\www\\PWproject\\InsertInteger.java";
echo "directory = ".$file;
$contenu =file_get_contents($file);

//echo $contenu;

//echo "Contenu du fichier : ".$contenu;

$req = new ConnDB();
$req->query("INSERT INTO file(id, iduser, extensionfile, publidate, content, name) VALUES ('', '1', 'java', '14844559101', :contenu, 'FILE_ABC')");
$req->bind(":contenu",$contenu);
$req->execute();

$req->query("SELECT * FROM file WHERE id=11");
$req->execute();

$data = $req->single();

echo "<pre>".$data['content']."</pre>";


/*$myFile = file_get_contents('http://www.example.com/');
echo $myFile;*/


?>