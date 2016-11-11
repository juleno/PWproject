<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('friend_model', 'activity_model'));
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
        $login = $this->session->userdata('login');
        $this->friend_model->add_friend($iduser);
        $this->activity_model->add_activity($iduser, $login['pseudo'] . ' vous a envoyé une demande d\'ami', base_url() . 'user/' . $login['pseudo'], 1);
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from);
    }

    public function accept($iduser)
    {
        $login = $this->session->userdata('login');
        $this->friend_model->accept_friend($iduser);
        $this->activity_model->add_activity($iduser, $login['pseudo'] . ' a accepté votre demande d\'ami', base_url() . 'user/' . $login['pseudo'], 1);
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from);
    }

    public function remove($iduser)
    {
        $this->friend_model->remove_friend($iduser);
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from);
    }

}
