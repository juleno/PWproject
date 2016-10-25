<?php
require_once "ConnDB.class.php";

class Skill {

    /**
     * Skill constructor.
     * @param $id
     * @param $name
     * @param $desc
     * @param $category

     */
    public function __construct($id, $name, $desc, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getJson() {
        return json_encode($this, JSON_NUMERIC_CHECK);
    }

    }

?>