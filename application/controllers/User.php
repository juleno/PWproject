<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'friend_model'));
        $this->session->set_userdata('referred_from', current_url());
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
            if ($data['login']['isadmin']) {
                $data['users'] = $this->user_model->get_user();
                $data['title'] = 'User list';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu', $data);
                $this->load->view('users/userlist', $data);
                $this->load->view('templates/footer', $data);
            } else {
                redirect(base_url() . '404');
            }
        } else {
            redirect(base_url());
        }
    }

    public function view($pseudo = NULL)
    {
        $data['user'] = $this->user_model->get_user($pseudo);
        $data['friends'] = $this->friend_model->get_friend($data['user']['id']);
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
            $data['isfriend'] = $this->friend_model->isfriend($data['user']['id']);
        }

        if (empty($data['user'])) {
            redirect(base_url() . '404');
        }

        $data['title'] = $data['user']['pseudo'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('users/profil', $data);
        $this->load->view('templates/footer', $data);
    }
}
