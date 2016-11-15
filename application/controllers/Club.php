<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('club_model', 'friend_model', 'skill_model'));
    }

    public function index()
    {
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');

            $data['clubs_user'] = $this->club_model->get_clubs_created_by_user($data['login']['id']);
            foreach ($data['clubs_user'] as $key => $club) {
                $data['clubs_user'][$key]['strlabel'] = $this->skill_model->get_skill_label($club['id']);
            }
            $data['clubs_other'] = $this->club_model->get_clubs_joined_by_user($data['login']['id']);
            foreach ($data['clubs_other'] as $key => $club) {
                $data['clubs_other'][$key]['strlabel'] = $this->skill_model->get_skill_label($club['id']);
            }
            $data['skills'] = $this->skill_model->get_skill();
            $data['friends'] = $this->friend_model->get_friend($data['login']['id']);
            $data['title'] = 'Board';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('clubs/board', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect(base_url());
        }
    }

    public function explore()
    {
        $data['login'] = $this->session->userdata('login');
        $data['clubs'] = $this->club_model->get_club_public();
        foreach ($data['clubs'] as $key => $club) {
            $data['clubs'][$key]['strlabel'] = $this->skill_model->get_skill_label($club['id']);
        }
        $data['title'] = 'Explorer';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('clubs/explore', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($id = NULL)
    {
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
            $data['club'] = $this->club_model->get_club($id, $data['login']['id']);
        } else {
            $data['club'] = $this->club_model->get_club($id);
        }
        if ($data['club'] == false) {
            redirect(base_url() . '404');
        }
        if (!isset($data['club']['id'])) {
            redirect(base_url() . '404');
        }
        $data['club']['strlabel'] = $this->skill_model->get_skill_label($data['club']['id']);
        $data['title'] = $data['club']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('clubs/club', $data);
        $this->load->view('templates/footer', $data);
    }
}
