<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller{

    public function index(){

        $data = array(
            'titulo' => 'Usuarios cadastrados',
            'sub_titulo' => 'Listando todos os usuarios cadastrados no banco de dados',

            'styles' => array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css'
            ),

            'scripts' => array(
             '/plugins/datatables.net/js/jquery.dataTables.min.js',
                '/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                '/plugins/datatables.net/js/estacionamento.js'
            ),

            'usuarios' => $this->ion_auth->users()->result(), //pegar todos os usuarios
        );



        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');

    }

    public function core($usuario_id = NULL){

        if(!$usuario_id){

            exit('Pode cadastrar um novo usuario');

            //Cadastro de novo o usuario

        }else{

            //Editar o usuário

            if(!$this->ion_auth->user($usuario_id)->row()){

                exit('Usuario não existe');

            }else{

                //Editar usuario

                $data = array(
                    'titulo' => 'Editar usuario',
                    'sub_titulo' => 'Editando o usuario selecionado na interface',
                    'icone_view' => 'ik ik-user',
                    'page_usuarios' => $this->router->fetch_class(),
                    'usuario' => $this->ion_auth->user($usuario_id)->row(), //pegar todos os usuarios
                );



                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/core');
                $this->load->view('layout/footer');

            }

        }

    }


}