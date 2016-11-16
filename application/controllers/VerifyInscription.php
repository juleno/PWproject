<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyInscription extends CI_Controller
{

    //TODO: charger le modèle user
    //on peut creer un constructeur pour initier des variables globales au constructeur ou charger des models, librairies
    //pas besoin de charger la librairie Database, elle est chargée par default dans tous les controleurs
    //grace au fichier application/config/autoload.php

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
        //TODO: verifPseudo()
    }

    public function verifPwd()
    {
        $pwd = $this->input->post('pwd');
        $pwd2 = $this->input->post('pwd2');
        //TODO: verifPwd()
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