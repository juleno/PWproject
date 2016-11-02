<?php

class Pages extends CI_Controller
{

    public function view($page = 'index')
    {
        if ($page === 'index' && $this->session->has_userdata('login')) {
            redirect(base_url() . 'club');
        } elseif (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function err404()
    {
        if ($this->session->has_userdata('login')) {
            $data['login'] = $this->session->userdata('login');
        }
        $data['title'] = '404';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pages/err404');
        $this->load->view('templates/footer');
    }
}