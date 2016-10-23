<?php
/**
 * Created by PhpStorm.
 * User: Portable
 * Date: 23/10/2016
 * Time: 18:25
 */

    require "api/classes/Club.class.php";
    $club = new Club('', '', '', '', '', '', '', '', '', '', '', '');

    $club->addClub('', str_replace("'"," ",$_POST['name']), '', str_replace("'"," ",$_POST['desc']), '', '', $_POST['statut'],str_replace("'"," ",$_POST['skill1']), str_replace("'"," ",$_POST['skill2']), str_replace("'"," ",$_POST['skill3']));

    header('Location: club.php');

?>