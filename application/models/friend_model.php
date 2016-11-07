<?php

Class Friend_model extends CI_Model
{
    public function get_friend($iduser, $idfriend = FALSE)
    {
        if ($idfriend === FALSE) {
            $sql = 'SELECT * FROM user U LEFT JOIN friend F ON U.id = F.idrequester WHERE F.idreceiver = ? UNION SELECT * FROM user U LEFT JOIN friend F ON U.id = F.idreceiver WHERE F.idrequester = ?';
            $query = $this->db->query($sql, array($iduser, $iduser));
            return $query->result_array();
        } else {
            $query = $this->db->get_where('friend', array('idreceiver' => $iduser, 'idrequester' => $idfriend))->or_where(array('idreceiver' => $idfriend, 'idrequester' => $iduser));
            return $query->row_array();
        }
    }

    public function add_friend($idfriend)
    {
        $login = $this->session->userdata('login');
        $data = array(
            'idrequester' => $login['id'],
            'idreceiver' => $idfriend,
            'isaccepted' => 0
        );

        $this->db->insert('friend', $data);
    }

    public function accept_friend($friendid)
    {
        $data = array(
            'isaccepted' => 1,
            'frienddate' => time()
        );

        $this->db->where('id', $friendid);
        $this->db->update('friend', $data);
    }

    public function remove_friend($friendid)
    {
        $this->db->delete('friend', array('id' => $friendid));
    }
}

?>