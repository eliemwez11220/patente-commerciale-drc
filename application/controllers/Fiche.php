<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Fiche extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fiche_model');
    } 

    /*
     * Listing of fiches
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('fiche/index?');
        $config['total_rows'] = $this->Fiche_model->get_all_fiches_count();
        $this->pagination->initialize($config);

        $data['fiches'] = $this->Fiche_model->get_all_fiches($params);
        
        $data['_view'] = 'fiche/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new fiche
     */
    function add()
    {   
       $this->load->library('form_validation');

        $this->form_validation->set_rules('client_sid','Contribuable concerné','required');
        $this->form_validation->set_rules('ipr_numero','Numéro Impôt','required');
        $this->form_validation->set_rules('raison_sociale','Raison sociale','required');
        $this->form_validation->set_rules('mode_paiement','Mode de paiement','required');
         
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
            );
            
            $fiche_id = $this->Fiche_model->add_fiche($params);
            redirect('fiche/index');
        }
        else
        {
			$this->load->model('Client_model');
			$data['all_clients'] = $this->Client_model->get_all_clients();
            
            $data['_view'] = 'fiche/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a fiche
     */
    function edit($fiche_id)
    {   
        // check if the fiche exists before trying to edit it
        $data['fiche'] = $this->Fiche_model->get_fiche($fiche_id);
        
        if(isset($data['fiche']['fiche_id']))
        {
             $current_time=date('Y-m-d H:i:s');
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $status = $this->input->post('status');
                $params = array(
				'client_sid' => $this->input->post('client_sid'),
				'statut_declaration' => $status,
				'date_validation' =>  (($status == "valide"))? $current_time: null,
				'numero_impot' => $this->input->post('ipr_numero'), 
                'raison_sociale' => $this->input->post('raison_sociale'), 
                'revenue' => $this->input->post('revenue'),
				'mode_paiement' => $this->input->post('mode_paiement'),
				'observation' => $this->input->post('observation'),
                );

                $this->Fiche_model->update_fiche($fiche_id,$params);            
                redirect('fiche/index');
            }
            else
            {
				$this->load->model('Client_model');
			$data['all_clients'] = $this->Client_model->get_all_clients();

                $data['_view'] = 'fiche/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The fiche you are trying to edit does not exist.');
    } 

    /*
     * Deleting fiche
     */
    function remove($fiche_id)
    {
        $fiche = $this->Fiche_model->get_fiche($fiche_id);

        // check if the fiche exists before trying to delete it
        if(isset($fiche['fiche_id']))
        {
            $this->Fiche_model->delete_fiche($fiche_id);
            redirect('fiche/index');
        }
        else
            show_error('The fiche you are trying to delete does not exist.');
    }
    
}