<?php

/**
 * Created by PhpStorm.
 * User: Portable
 * Date: 17/10/2016
 * Time: 14:32
 */
class File
{

    public function __construct($id, $iduser, $extensionFile, $publiDate, $content, $name) {
        $this->id = $id;
        $this->$iduser = $iduser;
        $this->$extensionFile = $extensionFile;
        $this->$publiDate = $publiDate;
        $this->$content = $content;
        $this->$name = $name;
    }

    public function getJson() {
        return json_encode($this, JSON_NUMERIC_CHECK);
    }

}