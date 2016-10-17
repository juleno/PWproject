<?php
require_once "ConnDB.class.php";

    class User {

        /**
         * User constructor.
         * @param $id
         * @param $pseudo
         * @param $mail
         * @param $firstname
         * @param $lastname
         * @param $score
         * @param $mailvalide
         * @param $isadmin
         * @param $profilpic
         * @param $bio
         * @param $inscridate
         */
        public function __construct($id, $pseudo, $mail, $pwd, $firstname, $lastname, $score, $mailvalide, $isadmin, $profilpic, $bio, $inscridate)
        {
            $this->id = $id;
            $this->pseudo = $pseudo;
            $this->mail = $mail;
            $this->pwd = $pwd;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->score = $score;
            $this->mailvalide = $mailvalide;
            $this->isadmin = $isadmin;
            $this->profilpic = $profilpic;
            $this->bio = $bio;
            $this->inscridate = $inscridate;
        }

        /**
         * @return string
         */
        public function getJson() {
            return json_encode($this, JSON_NUMERIC_CHECK);
        }

        public function insertIntoDatabase() {
            $req = new ConnDB();
            $req->query("INSERT INTO user VALUES ('".implode("', '", (array) $this)."')");
            $req->execute();
            if (!empty($req->lastInsertId())) {
                $this->id = $req->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

    }

?>