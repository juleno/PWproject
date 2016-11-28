<?php

Class File_model extends CI_Model
{
    public function get_file($idclub, $idfile = FALSE)
    {

        if ($idfile === FALSE) {
            $this->db->select('*')->from('file')->join('user', 'file.iduser = user.id')->where(array('idclub' => $idclub));
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        } else {
            $this->db->select('*')->from('file')->join('user', 'file.iduser = user.id')->where(array('idclub' => $idclub, 'file.id' => $idfile));
            $query = $this->db->get();
            $result = $query->row_array();
            return $result;
        }

    }

    public function get_file_publi($idpubli)
    {
        $this->db->select('*')->from('file')->where(array('idpubli' => $idpubli));
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}

?>