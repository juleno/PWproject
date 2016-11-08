<?php

Class Friend_model extends CI_Model
{
    public function get_friend($iduser, $idfriend = FALSE)
    {
        if ($idfriend === FALSE) {
            $sql = 'SELECT * FROM user U LEFT JOIN friend F ON U.id = F.idrequester WHERE F.idreceiver = ? AND F.isaccepted = 1 UNION SELECT * FROM user U LEFT JOIN friend F ON U.id = F.idreceiver WHERE F.idrequester = ? AND F.isaccepted = 1';
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
        $login = $this->session->userdata('login');
        $sql = 'UPDATE friend SET isaccepted = 1, frienddate = ? WHERE (idreceiver = ? OR idreceiver = ?) AND (idrequester = ? OR idrequester = ?)';
        $this->db->query($sql, array(time(), $login['id'], $friendid, $login['id'], $friendid));
    }

    public function remove_friend($friendid)
    {
        $login = $this->session->userdata('login');
        $sql = 'DELETE FROM friend WHERE (idreceiver = ? OR idreceiver = ?) AND (idrequester = ? OR idrequester = ?)';
        $this->db->query($sql, array($login['id'], $friendid, $login['id'], $friendid));
    }

    public function isfriend($friendid) //0 pas ami, 1 en attente, 2 demande d'ami à valider, 3 amis
    {
        $login = $this->session->userdata('login');
        $sql = 'SELECT * FROM friend WHERE (idreceiver = ? OR idreceiver = ?) AND (idrequester = ? OR idrequester = ?)';
        $query = $this->db->query($sql, array($login['id'], $friendid, $login['id'], $friendid));
        $data = $query->row_array();
        if ($data == null) {
            return 0;
        }
        if ($data['isaccepted']) {
            return 3;
        }
        if ($data['idreceiver'] == $friendid) {
            return 2;
        }
        return 1;
    }
}

?>