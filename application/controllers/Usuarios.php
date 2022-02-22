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

            }else {

                //Editar usuario

                $this->form_validation->set_rules('first_name', 'nome', 'trim|required|min_length[5]|max_length[20]');
                $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required|min_length[5]|max_length[20]');
                $this->form_validation->set_rules('username', 'usuario', 'trim|required|min_length[5]|max_length[20]|callback_username_check');
                $this->form_validation->set_rules('email', 'email', 'valid_email|trim|required|min_length[5]|max_length[200]|callback_email_check');
                $this->form_validation->set_rules('password', 'senha', 'trim|min_length[8]');
                $this->form_validation->set_rules('confirmacao', 'confirmar senha', 'trim|min_length[5]|matches[password]');

                if($this->form_validation->run()){

                    $data = elements(

                        array(

                            'first_name',
                            'last_name',
                            'username',
                            'email',
                            'password',
                            'active',

                        ), $this->input->post()

                    );

                    $password = $this->input->post('password');

                    if(!$password){

                        unset($data['password']);

                    }


                    $data = html_escape($data);

                    if($this->ion_auth->update($usuario_id, $data)){

                        $this->session->set_flashdata('success', 'Dados atualizados com sucesso!');


                    }else{

                        $this->session->set_flashdata('danger', 'Não foi possivel atualizar os dados');

                    }

                    redirect($this->router->fetch_class());


                }else{

                    //Erro de validação

                    $data = array(
                        'titulo' => 'Editar usuario',
                        'sub_titulo' => 'Editando o usuario selecionado na interface',
                        'icone_view' => 'ik ik-user',
                        'page_usuarios' => $this->router->fetch_class(),
                        'usuario' => $this->ion_auth->user($usuario_id)->row(), //pegar todos os usuarios
                        'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),

                    );

                }

                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/core');
                $this->load->view('layout/footer');

            }

        }

    }

    public function username_check($username){

        $usuario_id = $this->input->post('usuario_id');

        if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){
            $this->form_validation->set_message('username_check', 'Esse usuario já existe');
        return FALSE;
        }else{
            return true;
        }

    }

    public function email_check($email){

        $usuario_id = $this->input->post('usuario_id');

        if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){
            $this->form_validation->set_message('email_check', 'Esse email já existe');
        return FALSE;
        }else{
            return true;
        }

    }
}