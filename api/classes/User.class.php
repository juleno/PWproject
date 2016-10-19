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
        public function __construct($id, $pseudo, $mail, $pwd, $firstname, $lastname, $score, $mailvalid, $isadmin, $profilpic, $bio, $inscridate)
        {
            $this->id = $id;
            $this->pseudo = $pseudo;
            $this->mail = $mail;
            $this->pwd = $pwd;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->score = $score;
            $this->mailvalid = $mailvalid;
            $this->isadmin = $isadmin;
            $this->profilpic = $profilpic;
            $this->bio = $bio;
            $this->inscridate = $inscridate;
        }

        public function getFromId()
        {
            $req = new ConnDB();
            $req->query("SELECT * FROM user WHERE id = :id");
            $req->bind(":id", $this->id);
            $req->execute();
            if ($req->rowCount() > 0) {
                $data = $req->single();
                $this->id = $data['id'];
                $this->pseudo = $data['pseudo'];
                $this->mail = $data['mail'];
                $this->pwd = $data['pwd'];
                $this->firstname = $data['firstname'];
                $this->lastname = $data['lastname'];
                $this->score = $data['score'];
                $this->mailvalid = $data['mailvalid'];
                $this->isadmin = $data['isadmin'];
                $this->profilpic = $data['profilpic'];
                $this->bio = $data['bio'];
                $this->inscridate = $data['inscridate'];
                return true;
            }
            return false;
        }

        /**
         * @return bool
         */
        public function connexion() {
            $req = new ConnDB();
            $req->query("SELECT * FROM user WHERE mail = :mail AND pwd = :pwd");
            $req->bind(":mail", $this->mail);
            $req->bind(":pwd", $this->pwd);
            $req->execute();
            if ($req->rowCount() > 0) {
                $data = $req->single();
                $this->id = $data['id'];
                $this->pseudo = $data['pseudo'];
                $this->mail = $data['mail'];
                $this->pwd = $data['pwd'];
                $this->firstname = $data['firstname'];
                $this->lastname = $data['lastname'];
                $this->score = $data['score'];
                $this->mailvalid = $data['mailvalid'];
                $this->isadmin = $data['isadmin'];
                $this->profilpic = $data['profilpic'];
                $this->bio = $data['bio'];
                $this->inscridate = $data['inscridate'];
                return true;
            }
            return false;
        }

        /**
         * @return string
         */
        public function getJson() {
            return json_encode($this, JSON_NUMERIC_CHECK);
        }

        /**
         * @return bool
         */
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

        /**
         * @return bool
         */
        public function removeFromDatabase() {
            $req = new ConnDB();
            $req->query("DELETE FROM user WHERE id = :id");
            $req->bind(":id", $this->id);
            if ($req->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }

?>