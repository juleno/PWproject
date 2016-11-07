<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('friend_model');
    }

    public function getall($iduser)
    {
        $friends = $this->friend_model->get_friend($iduser);
        foreach ($friends as $friend) {
            echo '<tr><td>' . $friend['text'] . '</td></tr>';
        }
    }

    public function getone($iduser, $idfriend)
    {
        $friends = $this->friend_model->get_friend($iduser, $idfriend);
        foreach ($friends as $friend) {
            echo '<tr><td>' . $friend['text'] . '</td></tr>';
        }
    }

    public function invite($iduser)
    {
        $this->friend_model->add_friend($iduser);
    }

    public function accept($friendid)
    {
        $this->friend_model->accept_friend($friendid);
    }

    public function remove($friendid)
    {
        $this->friend_model->remove_friend($friendid);
    }

}
