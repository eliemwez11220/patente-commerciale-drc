<?php

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
            $this->load->model('Educazad_model');

        $this->is_authenticate();         //Verifier si un admin est connecter puis changer son status online
    }

    private function is_authenticate()
    {
        $current_datetime = date('Y-m-d H:i:s');

        if (!$this->session->logged_in) {
            // code...
            redirect(base_url());
        }
    }

    public function get_username_via_email()
    {
        $email = $this->session->email;
        $domain = strstr($email, '@');
        // echo $domain; // Affiche : @example.com

        $username = strstr($email, '@', true);
        // echo $user; // Affiche : name

        $this->display_prevew("Domaine :" . $domain . " username:" . $username);
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }
    public function logOut()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
