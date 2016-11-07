<?php

Class Activity_model extends CI_Model
{
    public function get_activity($idreceiver, $isnotif = 0)
    {
        if ($idreceiver === FALSE) {
            $query = $this->db->order_by('activitydate', 'DESC')->get('activity');
            return $query->result_array();
        }
        if ($isnotif == 0) {
            $query = $this->db->order_by('activitydate', 'DESC')->get_where('activity', array('idreceiver' => $idreceiver));
            return $query->result_array();
        }
        $query = $this->db->order_by('activitydate', 'DESC')->get_where('activity', array('idreceiver' => $idreceiver, 'isnotif' => $isnotif), 6);
        return $query->result_array();
    }

    public function add_activity($idreceiver, $text, $page, $isnotif)
    {
        $login = $this->session->userdata('login');
        $data = array(
            'text' => $text,
            'idreceiver' => $idreceiver,
            'idactor' => $login['id'],
            'pagedest' => $page,
            'activitydate' => time(),
            'isnotif' => $isnotif
        );
        $this->db->insert('activity', $data);
    }

}

?>