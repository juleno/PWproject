<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller
{

    function index()
    {
        $this->load->model('user_model');
        $mail = $this->input->post('mail');
        $pwd = $this->input->post('pwd');
        $result = $this->user_model->login($mail, $pwd);
        if ($result != false) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'pseudo' => $row->pseudo,
                    'mail' => $row->mail,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'score' => $row->score,
                    'mailvalid' => $row->mailvalid,
                    'isadmin' => $row->isadmin,
                    'profilpic' => $row->profilpic,
                    'bio' => $row->bio,
                    'inscridate' => $row->inscridate
                );
                $this->session->set_userdata('login', $sess_array);
            }
            $status = 0;
            $msg = "ok";
        } else {
            $status = 1;
            $msg = "Mauvaise adresse email et/ou mot de passe.";
        }
        $return = array("status" => $status, 'message' => $msg);
        echo json_encode($return);
    }

    function logout()
    {
        $this->session->unset_userdata('login');
        redirect(base_url());
    }
}

?>