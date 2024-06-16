<?php
class Fornecedores_model extends CI_Model
{

    public function list()
    {
        $query = $this->db->get('tab_fornecedores');
        return $query->result_array();
    }
    public function save($post)
    {
        $dados = $post;
        $query = $this->db->insert('tab_fornecedores', $dados);
        return $query;
    }
}
