<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('activity_model');
    }

    public function index()
    {
        $activities = $this->activity_model->get_activity();
        foreach ($activities as $activity) {
            echo 'notif à formater';
        }
    }

    public function last($iduser)
    {
        $activities = $this->activity_model->get_activity($iduser);
        foreach ($activities as $activity) {
            echo '<tr><td><a href="' . $activity['pagedest'] . '">' . $activity['text'] . '</a></td></tr>';
        }
    }

    public function notif($iduser)
    {
        $activities = $this->activity_model->get_activity($iduser, 1);
        foreach ($activities as $activity) {
            echo '<h5>' . $activity['text'] . '</h5><hr>';
        }
    }

}
