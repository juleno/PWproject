<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('club_model', 'file_model'));
    }

    public function index()
    {
        redirect(base_url() . '404');
    }

    public function view($idclub = NULL)
    {
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
            $data['club'] = $this->club_model->get_club($idclub, $data['login']['id']);
        } else {
            $data['club'] = $this->club_model->get_club($idclub);
        }
        if ($data['club'] == false) {
            redirect(base_url() . '404');
        }
        if (!isset($data['club']['id'])) {
            redirect(base_url() . '404');
        }
        $data['files'] = $this->file_model->get_file($idclub);
        $data['title'] = $data['club']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('files/filelist', $data);
        $this->load->view('templates/footer', $data);
    }

    public function viewfile($idclub = NULL, $idfile = NULL)
    {
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
            $data['club'] = $this->club_model->get_club($idclub, $data['login']['id']);
        } else {
            $data['club'] = $this->club_model->get_club($idclub);
        }
        if ($data['club'] == false) {
            redirect(base_url() . '404');
        }
        if (!isset($data['club']['id'])) {
            redirect(base_url() . '404');
        }
        $data['file'] = $this->file_model->get_file($idclub, $idfile);
        $data['title'] = $data['file']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('files/viewfile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $data = file_get_contents($_FILES['file']['tmp_name']);
        $data = base64_encode($data);

    }
}
