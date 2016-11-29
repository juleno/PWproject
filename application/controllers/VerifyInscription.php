<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyInscription extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function echoVerifMail()
    {
        echo $this->verifMail();
    }

    public function echoVerifPseudo()
    {
        echo $this->verifPseudo();
    }

    public function echoVerifPwd()
    {
        echo $this->verifPwd();
    }

    public function verifMail()
    {
        $mail = $this->input->post('mail');
        //si mail n'est pas une adresse
        if (!isset($mail)) {
            $status = 1;
            $message = 'Veuillez renseigner une adresse email.';
        } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $status = 1;
            $message = 'Votre adresse email n\'est pas valide.';
        } //si mail existe deja en base
        else if ($this->user_model->mailExists($mail)) {
            //TODO: créer la fonction mailExists dans le user_model
            $status = 1;
            $message = 'Cette adresse email est déjà enregistrée.';
        } else {
            $status = 0;
            $message = 'ok';
        }
        //on creer une array contenant le status et le message
        $return = array('status' => $status, 'message' => $message);
        //on echo le json
        return json_encode($return);
    }

    public function verifPseudo()
    {
        $pseudo = $this->input->post('pseudo');
        //si mail n'est pas une adresse
        if (!isset($pseudo)) {
            $status = 1;
            $message = 'Veuillez renseigner un pseudo.';
        } else if (strlen($pseudo) < 5) {
            $status = 1;
            $message = 'Votre pseudo comporte moins de 6 caractères';
        } //si mail existe deja en base
        else if ($this->user_model->mailExists($pseudo)) {
            //TODO: créer la fonction pseudoExists dans le user_model
            $status = 1;
            $message = 'Ce pseudo est déjà attribué';
        } else {
            $status = 0;
            $message = 'ok';
        }
        //on creer une array contenant le status et le message
        $return = array('status' => $status, 'message' => $message);
        //on echo le json
        return json_encode($return);

    }

    public function verifPwd()
    {
        $pwd = $this->input->post('pwd');
        $pwd2 = $this->input->post('pwd2');
        if (!isset($pwd) || !isset($pwd2)) {
            $status = 1;
            $message = 'Veuillez renseigner un mot de passe';
        } else if ($pwd != $pwd2) {
            $status = 1;
            $message = 'Les deux mot de passe ne sont pas correspondants';
        }
        else if (strlen($pwd) < 5) {
            $status = 1;
            $message = 'Le mot de passe doit comporter plus de 6 caractères';
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
        $mail = $this->input->post('mail');
        $pseudo = $this->input->post('pseudo');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $pwd = $this->input->post('pwd');
        if (isset($firstname) && isset($lastname)) {
            $verifMail = $this->verifMail();
            $verifMail = json_decode($verifMail, true);
            $verifPseudo = $this->verifPseudo();
            $verifPseudo = json_decode($verifPseudo, true);
            $verifPwd = $this->verifPwd();
            $verifPwd = json_decode($verifPwd, true);
            if ($verifMail['status'] == 0 && $verifPseudo['status'] == 0 && $verifPwd['status'] == 0) {
                $this->user_model->insertIntoDatabase($pseudo, $mail, $pwd, $firstname, $lastname);
                $status = 0;
                $message = 'ok';
            } else {
                $status = 1;
                $message = 'WTF OMG';
            }
        } else {
            $status = 1;
            $message = 'Veuillez remplir tous les champs.';
        }
        $return = array('status' => $status, 'message' => $message);
        //on echo le json
        echo json_encode($return);
    }

}

?>