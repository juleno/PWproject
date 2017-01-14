<?php

Class Club_model extends CI_Model
{
    public function get_club($id = FALSE, $user = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('club');
            return $query->result_array();
        }

        $query = $this->db->get_where('club', array('id' => $id));
        $result = $query->row_array();

        if (!isset($result['id'])) {
            return false;
        }

        if ($result['ispublic']) {
            return $result;
        }

        if ($user !== FALSE) {
            if ($this->is_contributor($id, $user) == 2) {
                return $result;
            } else {
                return false;
            }
        }
    }

    public function get_club_public()
    {
        $query = $this->db->get_where('club', array('ispublic' => 1));
        return $query->result_array();
    }

    public function get_clubs_created_by_user($iduser)
    {
        $query = $this->db->get_where('club', array('iduser' => $iduser));
        return $query->result_array();
    }

    public function get_clubs_joined_by_user($iduser)
    {
        //TODO: faire la jointure pour les clubs rejoints (actuellement tous les clubs non crées par user)
        $query = $this->db->get_where('club', array('iduser !=' => $iduser));
        return $query->result_array();
    }

    public function get_contributors_by_club($idclub)
    {
        $this->db->distinct();
        $this->db->select('user.pseudo');
        $this->db->where('record', $record);

        //TODO: Requete : SELECT DISTINCT user.pseudo FROM user, userclub WHERE user.id = userclub.iduser AND userclub.idclub = 3
    }

    public function is_contributor($idclub, $iduser)
    {
        $query = $this->db->get_where('userclub', array('iduser' => $iduser, 'idclub' => $idclub));
        $result = $query->row_array();
        if (!isset($result['id'])) {
            return 0;
        }
        if ($result['joindate'] == 0) {
            return 1;
        }
        return 2;
    }

    public function add_club($name, $iduser, $desc,$public) {
        $data = array(
            'id' => '',
            'name' => $name,
            'iduser' => '',
            'desc' =>$desc,
            'clubpic' => '',
            'clubdate' => time(),
            'ispublic' => $public,
            'lastactivity' => ''
        );
        $this->db->insert('club', $data);
    }

    public function clubExists($name) {
        $query = $this->db->get_where('club', array('name' => $name));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_skills_to_club($idskill, $idclub) {

    }
}

?>