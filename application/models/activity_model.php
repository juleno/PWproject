<?php

Class Activity_model extends CI_Model
{
    public function get_activity($idreceiver, $isnotif)
    {
        if ($idreceiver === FALSE) {
            $query = $this->db->get('activity');
            return $query->result_array();
        }

        $query = $this->db->get_where('activity', array('idreceiver' => $idreceiver, 'isnotif' => $isnotif), 10);
        return $query->result_array();
    }

}

?>