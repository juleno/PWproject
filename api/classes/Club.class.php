<?php
require_once "ConnDB.class.php";

    class Club {

        /**
         * Club constructor.
         * @param $id
         * @param $name
         * @param $desc
         * @param $clubpic
         * @param $clubdate
         * @param $ispublic
         */
        public function __construct($id, $name, $iduser, $desc, $clubpic, $clubdate, $ispublic)
        {
            $this->id = $id;
            $this->name = $name;
            $this->iduser = $iduser;
            $this->desc = $desc;
            $this->clubpic = $clubpic;
            $this->clubdate = $clubdate;
            $this->ispublic = $ispublic;
        }

        /**
         * @return bool
         */
        public function getFromId()
        {
            $req = new ConnDB();
            $req->query("SELECT * FROM club WHERE id = :id");
            $req->bind(":id", $this->id);
            $req->execute();
            if ($req->rowCount() > 0) {
                $data = $req->single();
                $this->name = $data['name'];
                $this->iduser = $data['iduser'];
                $this->desc = $data['desc'];
                $this->clubpic = $data['clubpic'];
                $this->clubdate = $data['clubdate'];
                $this->ispublic = $data['ispublic'];
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
            $req->query("INSERT INTO club VALUES ('".implode("', '", (array) $this)."')");
            $req->execute();
            if (!empty($req->lastInsertId())) {
                $this->id = $req->lastInsertId();
                return true;
            }
            return false;
        }

        /**
         * @return bool
         */
        public function removeFromDatabase() {
            $req = new ConnDB();
            $req->query("DELETE FROM club WHERE id = :id");
            $req->bind(":id", $this->id);
            if ($req->execute()) {
                return true;
            }
            return false;
        }

        public function addClub($id, $name, $iduser, $desc, $clubpic, $clubdate, $ispublic, $skill1, $skill2, $skill3) {
            $req = new ConnDB();
            $req->query("INSERT INTO club VALUES ('".$id."', '".$name."', '".$iduser."', '".$desc."', '".$clubpic."', '".$clubdate."', '".$ispublic."', '".$skill1."', '".$skill2."', '".$skill3."')");
            $req->execute();
        }


        //Fonction pour liste les clubs, ne fonctionne pas (sort une ligne mais pb pour en sortir plusieurs)

       /* public function findClubByUser()
        {
            $req = new ConnDB();
            $req->query("SELECT * FROM club WHERE id IN (SELECT idclub FROM userclub WHERE iduser = :iduser)");
            $req->bind(":iduser", $this->iduser);
            $req->execute();
            if ($req->rowCount() > 0) {
                $data = $req->single();
                $this->id = $data['id'];
                $this->desc = $data['desc'];
                $this->name = $data['name'];
                echo $data['name'];
                // return true;
            } else {
                echo "erreur";
                // return false;
            }
        }    */
    }

?>