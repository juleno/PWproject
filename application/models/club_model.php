<?php

Class Club_model extends CI_Model
{
    public function get_club($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('club');
            return $query->result_array();
        }

        $query = $this->db->get_where('club', array('id' => $id));
        return $query->row_array();
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
}

?>