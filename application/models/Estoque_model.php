<?php
class Estoque_model extends CI_Model
{
    public function listEstoque()
    {
        $query = $this->db->query("SELECT 
    e.id_produto_estoque as id_estoque,
    p.nome_produto as nome_produto,
    e.quantidade as estoque_atual,
    p.udm,
    e.lote as lote_atual,
    DATE_FORMAT(e.dta_entrada, '%d-%m-%Y') dta_entrada,
    DATE_FORMAT(e.dta_validade, '%d-%m-%Y') dta_validade
FROM
    tab_estoque e
INNER JOIN tab_produtos p ON p.id_produto = e.id_produto_fk
GROUP BY
    p.nome_produto
ORDER BY 
    e.id_produto_estoque;

                                    ");
        return $query->result_array();
    }
    public function save($post)
    {
        $dados = $post;

        // echo "<pre>";
        // print_r($dados);
        // exit;

        $query = $this->db->insert('tab_estoque', $dados);
        return $query;
    }
}
