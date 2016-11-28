<?php

Class Publication_model extends CI_Model
{
    public function get_publi($idclub, $idpubli = FALSE)
    {

        if ($idpubli === FALSE) {
            $this->db->select('*')->from('publication')->join('user', 'publication.iduser = user.id')->where(array('idclub' => $idclub));
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        } else {
            $this->db->select('*')->from('publication')->join('user', 'publication.iduser = user.id')->where(array('idclub' => $idclub, 'id' => $idpubli));
            $query = $this->db->get();
            $result = $query->row_array();
            return $result;
        }

    }
}

?>