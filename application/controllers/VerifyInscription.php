<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyInscription extends CI_Controller
{

    //TODO: charger le modèle user
    //on peut creer un constructeur pour initier des variables globales au constructeur ou charger des models, librairies
    //pas besoin de charger la librairie Database, elle est chargée par default dans tous les controleurs
    //grace au fichier application/config/autoload.php
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function verifMail()
    {
        $mail = $this->input->post('mail');
        //si mail n'est pas une adresse
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
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
        echo json_encode($return);
    }

    public function verifPseudo()
    {
        $pseudo = $this->input->post('pseudo');
        //si mail n'est pas une adresse
        if (strlen($pseudo) < 6) {
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
        echo json_encode($return);

    }

    public function verifPwd()
    {
        $pwd = $this->input->post('pwd');
        $pwd2 = $this->input->post('pwd2');
        if ($pwd != $pwd2) {
            $status = 1;
            $message = 'Les deux mot de passe ne sont pas correspondants';
        } //si mail existe deja en base
        else if (strlen($pwd) < 6) {
            $status = 1;
            $message = 'Le mot de passe doit comporter plus de 6 caractères';
        } else {
            $status = 0;
            $message = 'ok';
        }
        //on creer une array contenant le status et le message
        $return = array('status' => $status, 'message' => $message);
        //on echo le json
        echo json_encode($return);
    }

    public function valider()
    {
        //TODO: valider()
        //on récupère tous les champs cette fois ci
        //on vérifie à nouveau que chaque champ remplit chaque conditions (sinon l'utilisateur peut faire n'importe quoi)
        //on ajoute le tout en bdd en utilisant une fonction du modele user qui fera la requete INSERT
    }

}

?>