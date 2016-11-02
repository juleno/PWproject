<?php

Class User_model extends CI_Model
{
    public function login($mail, $pwd)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('mail', $mail);
        $this->db->where('pwd', MD5($pwd));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_user($pseudo = FALSE)
    {
        if ($pseudo === FALSE) {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array('pseudo' => $pseudo));
        return $query->row_array();
    }
}

?>