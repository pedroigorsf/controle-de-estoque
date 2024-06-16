<?php
class Produtos_model extends CI_Model
{

    public function list()
    {
        $query = $this->db->query("SELECT * FROM tab_produtos ORDER BY id_produto DESC LIMIT 5");
        return $query->result_array();
    }
    public function save($post)
    {
        $dados = $post;
        $query = $this->db->insert('tab_produtos', $dados);
        return $query;
    }
}
