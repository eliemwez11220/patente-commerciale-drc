<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Secure_model');
        $this->load->model('Client_model');
        $this->load->model('Fiche_model');
        $this->load->model('Educazad_model');
    }

    public function index()
    {
        if ($this->session->logged_in === TRUE) {
            redirect('dashboard/index');
        } else {
            $data['title'] = "Gestion Perception Impôt Professionnelle de Rémunération";
            $data['_view'] = "guest/home";
            $this->load->view('home', $data);
        }
    }
    public function signin()
    {
        if ($this->session->logged_in === TRUE) {
            redirect('dashboard/index');
        } else {
            $data['title'] = "Authenticate";
            $this->load->view('session/login_users', $data);
        }
    }
    public function login()
    {
        # recuperation of username
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'Username is required',
        ));

        # recuperation of password
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Password is required',
        ));

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->Secure_model->login_data($username, $password)) {

                $infos_agent = $this->Secure_model->login_data($username, $password);

                if ($infos_agent) {
                    $userdata = array(
                        'id' => $infos_agent->id_asset,
                        'fullname' => $infos_agent->asset_fullname,
                        'username' => $infos_agent->asset_username,
                        'phone' => $infos_agent->asset_phone,
                        'matricule' => $infos_agent->asset_matricule,
                        'status_account' => $infos_agent->account_activated,
                        'loglogin' => $infos_agent->date_connected,
                        'email' => $infos_agent->asset_email,
                        'role' => $infos_agent->asset_type,
                        'fonction' => $infos_agent->asset_fonction,
                        'sexe' => $infos_agent->asset_sexe,
                        'created' => $infos_agent->date_ajout,
                        'updated' => $infos_agent->date_update,
                        'avatar' => $infos_agent->asset_avatar,
                        'logged_in' => TRUE
                    );
                    //verification du statut de l'agent
                    if ($infos_agent->account_activated == "active") {
                        //stock data in session
                        $this->session->set_userdata($userdata);                    #//session  //redirect to control panel for admin
                        redirect(base_url() . 'dashboard/index');
                    } else {
                        # Redirect to login page and show the message error
                        $this->setError("Votre compte est déjà bloqué. Veuillez conctacter un webmaster ou un administrateur système");
                    }
                } else {
                    // redirect if username or password is not true
                    $this->setError("Compte utilisateur non existant dans le système.");
                }
            } else {
                // redirect if username or password is not true
                $this->setError("Mot de passe ou nom utilisateur incorrect.");
            }

        } else {
            // redirect if username or password is not true
            $this->setError("Vous devez disposer un compte utilisateur pour accéder à cette application.
                         Veuillez conctacter l'administrateur système pour plus de détails.");
        }
    }

    public function setError($rror)
    {
        $data['title'] = "Error login";
        $data['page_error'] = $rror;
        $this->load->view('session/login_users', $data);
    }

    public function logOut()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    /*
     * Adding a new fiche
     */
    function assujettis($code_client=null)
    {   
        $data['categories'] = $this->Educazad_model->get_multiple('categories', array());

       $this->load->library('form_validation');
        $this->form_validation->set_rules('ipr_numero','ipr_numero','required');
        $this->form_validation->set_rules('raison_sociale','raison_sociale','required');
        $this->form_validation->set_rules('annee','annee','required');
        $this->form_validation->set_rules('revenue','revenue','required');
        $this->form_validation->set_rules('mode_paiement','mode_paiement','required');
        $this->form_validation->set_rules('nombre_employes','nombre_employes','required');
        $this->form_validation->set_rules('periode','periode','required');
        $this->form_validation->set_rules('numero_fiche','numero_fiche','required');
        if($this->form_validation->run())     
        { 
            $current_time=date('Y-m-d H:i:s');
            $params = array(
				'client_sid' => $this->input->post('client_sid'),
				'statut_declaration' => 'encours',
				'numero_fiche' => $this->input->post('numero_fiche'),
				'date_creation' =>  $current_time,
				'numero_impot' => $this->input->post('ipr_numero'), 
                'raison_sociale' => $this->input->post('raison_sociale'), 
                'revenue' => $this->input->post('revenue'),
				'mode_paiement' => $this->input->post('mode_paiement'),
                'annee' => $this->input->post('annee'),
				'observation' => $this->input->post('observation'),
                'nombre_travailleur' => $this->input->post('nombre_employes'),
                'periode_declaration' => $this->input->post('periode'),
            );
            //var_dump($params); exit();
            if($this->Fiche_model->add_fiche($params)){
                redirect('authenticate/success');
            }else
                {
                    $data['client'] = $this->Client_model->get_client_number($code_client);
                    $data['failed'] = "Erruer de données. Vérifiez votre déclaration puis réessayer !";
                    $data['_view'] = 'guest/declaration';
                    $this->load->view('home',$data);
                }
        }
        
        else
        {
            $data['client'] = $this->Client_model->get_client_number($code_client);
            $data['_view'] = 'guest/declaration';
            $this->load->view('home',$data);
        }
    } 
    function success(){
        $data['message'] = "Votre déclaration a été envoyée avec succès. Vous serez notifier ultérierment";
        $data['_view'] = 'guest/success';
        $this->load->view('home',$data);
    }
     /*
     * Editing a client
     */
    function searchContributor()
    {    $data['categories'] = $this->Educazad_model->get_multiple('categories', array());
			if($this->input->get('code'))     
            {   
                $code_client = trim($this->input->get('code'));

                $data['client'] = $this->Client_model->get_client_number($code_client);

                //var_dump($data['client']); exit();

                if(isset($data['client']['client_code'])){
                    $data['_view'] = 'guest/declaration';
                    $this->load->view('home',$data);
                }
                else
                {
                    $data['failed'] = "Ce numéro n'existe pas. Vous n'êtes pas encore enregistré en 
                    tant qu'un Assujetti pour la patente commerciale. 
                    Vous devez vous faire enregistrer avant de faire une déclaration en ligne
                     auprès du service competent notamment la DRHKAT.";
                    $data['_view'] = 'guest/declaration';
                    $this->load->view('home',$data);
                }
            }
            else
            {
                $data['_view'] = 'guest/declaration';
                $this->load->view('home',$data);
            }
    } 

    public function stripePayment()
    {
        if($this->request->getVar('amount')){
            
            require_once('application/libraries/stripe-php/init.php');
        
            $stripeSecret = 'sk_test_j5k0976GOLSOtiRzbDLpKqat00og5iM3cY';

            \Stripe\Stripe::setApiKey($stripeSecret);
        
            $stripe = \Stripe\Charge::create ([
                    "amount" => $this->request->getVar('amount'),
                    "currency" => "usd",
                    "source" => $this->request->getVar('tokenId'),
                    "description" => "Test payment from tutsmake.com." 
            ]);
                
            // after successfull payment, you can store payment related information into your database
                
            $data = array('success' => true, 'data'=> $stripe);

            echo json_encode($data);
        }else{
        
            $data['_view'] = 'guest/declaration';
            $this->load->view('home',$data);
        }
    }
}