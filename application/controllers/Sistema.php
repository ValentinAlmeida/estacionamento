<?php
defined('BASEPATH') or exit('Ação não permitida');

class Sistema extends CI_Controller{

    /*public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in())
        {
            redirect('login');
        }

    }*/

    public function index(){

        $data = array(

            'titulo' => 'Editar informações do sistema',
            'sub_titulo' => 'Editando as informações do sistema',
            'icone_view' => 'ik ik-settings',
            'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),

        );

            $this->load->view('layout/header', $data);
            $this->load->view('sistema/index');
            $this->load->view('layout/footer');

}

}