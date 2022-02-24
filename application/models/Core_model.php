<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model{

    public function get_all($table=NULL, $condition=NULL){

            if($table && $this->db->table_exists($table)){

                if(is_array($condition)) {

                    $this->db->where($condition);
                }
                    return $this->db->get($table)->result();

            }else{
                return FALSE;
            }

    }

    public function get_by_id($table=NULL, $condition=NULL){

        if($table && $this->db->table_exists($table) && is_array($condition)){

            $this->db->where($condition);
            $this->db->limit(1);

            return $this->db->get($table)->row();

        }else{
            return FALSE;
        }

    }

    public function insert($table=NULL, $data=NULL){

        if($table && $this->db->table_exists($table) && is_array($data)){

            $table->db->insert($table, $data);

            if($this->db->affected_rows()>0){ //se ocorrer a inserção ele entra no if

                $table->session->set_flashdata('success', 'Dados salvos com Sucesso!');

            }else{

                $table->session->set_flashdata('danger', 'Não foi possivel salvar os dados');

            }

        }else{

            return false;

        }

    }

    public function update($table=NULL, $data=NULL, $condition=NULL){

        if($table && $this->db->table_exists($table) && is_array($data) && is_array($condition)){

            if($this->db->update($table, $data, $condition)){

                $this->session->set_flashdata('success', 'Dados salvos com sucesso!');

            }else{
                $this->session->set_flashdata('danger', 'Não foi possivel atualizar os dados!');
            }

        }else{
            return false;
        }

    }

    public function delete($table=NULL, $condition=NULL){

        if($table && $this->db->table_exists($table) && is_array($data)){

            if($this->db->delete($table, $condition)){

                $this->session->set_flashdata('success', 'Registro excluido com sucesso!');

            }else{

                $this->session->set_flashdata('danger', 'Não foi possivel fazer o registro');

            }

        }

    }

}
