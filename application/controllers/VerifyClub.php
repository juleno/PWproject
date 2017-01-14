<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyInscription extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('club_model');
    }

    public function echoValider()
    {
        echo $this->valider();
    }

    public function verifName()
    {

        $name = $this->input->post('name');
        //si mail n'est pas une adresse
        if (!isset($name)) {
            $status = 1;
            $message = 'Veuillez renseigner un nom de club.';
        } //si club existe deja en base
        else if ($this->club_model->clubExists($name)) {
            $status = 1;
            $message = 'Ce nom de club est déjà utilisé';
        } else {
            $status = 0;
            $message = 'ok';
        }
        //on creer une array contenant le status et le message
        $return = array('status' => $status, 'message' => $message);
        //on echo le json
        return json_encode($return);

    }

    public function valider()
    {
        console.dir('passage pour insert');
        console.log('refdjiosk');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');

        if (isset($name) && isset($desc)) {
            if(isset($statut)) {
                $statut = 0;
            } else {
                $statut = $this->input->post('statut');
            }
            $verifName = $this->verifName();
            $verifName = json_decode($verifName, true);
            if ($verifName['status'] == 0) {

                $this->club_model->add_club($name, $desc, $statut);
                $status = 0;
                $message = 'ok';


            } else {
                $status = 1;
                $message = 'bug';
            }
        } else {
            $status = 1;
            $message = 'Veuillez remplir tous les champs.';
        }
        $return = array('status' => $status, 'message' => $message);
        //on echo le json
        // return json_encode($return);
        echo json_encode($return);
    }

}

?>