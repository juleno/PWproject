<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('club_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /Index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
            $data['clubs_user'] = $this->club_model->get_clubs_created_by_user($data['login']['id']);
            $data['clubs_other'] = $this->club_model->get_clubs_joined_by_user($data['login']['id']);
            $data['title'] = 'Board';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('clubs/board', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect(base_url());
        }
    }

    public function view($id = NULL)
    {
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
        }
        $data['club'] = $this->club_model->get_club($id);

        if (empty($data['club'])) {
            redirect(base_url() . '404');
        }

        $data['title'] = $data['club']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('clubs/club', $data);
        $this->load->view('templates/footer', $data);
    }
}
