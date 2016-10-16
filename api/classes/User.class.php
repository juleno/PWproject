<?php

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
        public function __construct($id, $pseudo, $mail, $firstname, $lastname, $score, $mailvalide, $isadmin, $profilpic, $bio, $inscridate)
        {
            $this->id = $id;
            $this->pseudo = $pseudo;
            $this->mail = $mail;
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

    }

?>