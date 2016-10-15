<?php

    class User {
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
            return json_encode($this);
        }

        /**
         * @param mixed $bio
         */
        public function setBio($bio)
        {
            $this->bio = $bio;
        }

        /**
         * @param mixed $firstname
         */
        public function setFirstname($firstname)
        {
            $this->firstname = $firstname;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @param mixed $inscridate
         */
        public function setInscridate($inscridate)
        {
            $this->inscridate = $inscridate;
        }

        /**
         * @param mixed $isadmin
         */
        public function setIsadmin($isadmin)
        {
            $this->isadmin = $isadmin;
        }

        /**
         * @param mixed $lastname
         */
        public function setLastname($lastname)
        {
            $this->lastname = $lastname;
        }

        /**
         * @param mixed $mail
         */
        public function setMail($mail)
        {
            $this->mail = $mail;
        }

        /**
         * @param mixed $mailvalide
         */
        public function setMailvalide($mailvalide)
        {
            $this->mailvalide = $mailvalide;
        }

        /**
         * @param mixed $profilpic
         */
        public function setProfilpic($profilpic)
        {
            $this->profilpic = $profilpic;
        }

        /**
         * @param mixed $pseudo
         */
        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;
        }

        /**
         * @param mixed $score
         */
        public function setScore($score)
        {
            $this->score = $score;
        }
    }

?>