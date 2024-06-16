<?php
class Categorias_model extends CI_Model
{

    public function list()
    {
        $query = $this->db->get('tab_categorias');
        return $query->result_array();
    }
    public function save($post)
    {
        $dados = $post;
        $query = $this->db->insert('tab_categorias', $dados);
        return $query;
    }
}
