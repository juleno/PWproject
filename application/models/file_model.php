<?php

Class File_model extends CI_Model
{
    public function get_file($idclub, $idfile = FALSE)
    {

        if ($idfile === FALSE) {
            $query = $this->db->get_where('file', array('idclub' => $idclub));
            $result = $query->result_array();
            return $result;
        } else {
            $query = $this->db->get_where('file', array('idclub' => $idclub, 'id' => $idfile));
            $result = $query->row_array();
            return $result;
        }

    }
}

?>