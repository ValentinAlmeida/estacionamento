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

            //Cadastro de novo o usuario

            $this->form_validation->set_rules('first_name', 'nome', 'trim|required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('username', 'usuario', 'trim|required|min_length[3]|max_length[20]|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'email', 'valid_email|trim|required|min_length[5]|max_length[200]|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'senha', 'trim|min_length[8]|required');
            $this->form_validation->set_rules('confirmacao', 'confirmar senha', 'trim|min_length[5]|matches[password]|required');

                if($this->form_validation->run()){
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $email = $this->input->post('email');
                    $additional_data = array(
                        'first_name' => html_escape($this->input->post('first_name')),
                        'last_name' => html_escape($this->input->post('last_name')),
                        'active' => html_escape($this->input->post('active')),
                    );
                    $group = array($this->input->post('perfil')); // Sets user to admin.

                    $additional_data = html_escape($additional_data);

                    if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
                       $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
                    }else{
                        $this->session->set_flashdata('danger', 'Erro ao salvar os dados!');
                    }

                    redirect($this->router->fetch_class());
                }else{

                    //Erro de validação

                    $data = array(
                        'titulo' => 'Cadastrar usuario',
                        'sub_titulo' => 'Cadastrando um novo usuario',
                        'icone_view' => 'ik ik-user',
                        'page_usuarios' => $this->router->fetch_class(),
                        'usuario' => $this->ion_auth->user($usuario_id)->row(), //pegar todos os usuarios
                        'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),

                    );

                }

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/core');
            $this->load->view('layout/footer');
                }else{
            //Editar o usuário

            if(!$this->ion_auth->user($usuario_id)->row()){
                exit('Usuario não existe');

            }else {

                //Editar usuario

                $perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();

                $this->form_validation->set_rules('first_name', 'nome', 'trim|required|min_length[3]|max_length[20]');
                $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required|min_length[3]|max_length[20]');
                $this->form_validation->set_rules('username', 'usuario', 'trim|required|min_length[3]|max_length[20]|callback_username_check');
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

                        $perfil_post = $this->input->post('perfil');

                        //se for diferente atualiza o grupo
                        if($perfil_atual->id != $perfil_post){

                            $this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
                            $this->ion_auth->add_to_group($perfil_post, $usuario_id);

                        }

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

    public function del($usuario_id = NULL){

        if(!$usuario_id || !$this->core_model->get_by_id('users', array('id' => $usuario_id))){

            $this->session->set_flashdata('danger', 'Usuário não encontrado');
            redirect($this->router->fetch_class());

        }else{

            //Delete

            if($this->ion_auth->is_admin()){

                $this->session->set_flashdata('danger', 'Administrador não pode ser excluido');
                redirect($this->router->fetch_class());

            }

            if($this->ion_auth->delete_user($usuario_id);){
                $this->session->set_flashdata('success', 'Usuario excluido com sucesso!');
            }else{
                $this->session->set_flashdata('danger', 'Não foi possivel exvluir o usuario!');
            }
            redirect($this->router->fetch_class());
        }

    }
}