<?php
class Dashboard_model extends CI_Model
{

    public function countProdutosEstoque()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM tab_estoque");

        return $query->result_array();
    }

    public function listQuantProdutoEntrada()
    {
        $query = $this->db->query("SELECT 
                                        e.id_produto_estoque as id_estoque,
                                        p.nome_produto as nome_produto,
                                        p.categoria as categoria,
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
                                        e.quantidade DESC
                                    LIMIT 5");
        return $query->result_array();
    }

    public function listQuantProdutoSaida()
    {
        $query = $this->db->query("SELECT 
                                        p.nome_produto, 
                                        SUM(quantidade_movimentada) AS saida, 
                                        e.quantidade
                                    FROM tab_movimentacoes m
                                    INNER JOIN tab_produtos p ON p.id_produto = m.id_produto
                                    INNER JOIN tab_estoque e ON e.id_produto_fk = m.id_produto
                                    WHERE tipo_movimentacao != 'entrada'
                                    GROUP BY p.nome_produto
                                    ORDER BY saida DESC
                                    LIMIT 5
                                    ");
        return $query->result_array();
    }



    public function countProdutosCadastrados()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM tab_produtos");

        return $query->result_array();
    }
    // public function listEstoque()
    // {
    //     $query = $this->db->query("SELECT 
    //                                     e.id_produto_estoque as id_estoque,
    //                                     p.nome_produto as nome_produto,
    //                                     e.quantidade as estoque_atual,
    //                                     p.udm,
    //                                     e.lote as lote_atual,
    //                                     DATE_FORMAT(e.dta_entrada, '%d-%m-%Y') dta_entrada,
    //                                     DATE_FORMAT(e.dta_validade, '%d-%m-%Y') dta_validade
    //                                 FROM
    //                                     tab_estoque e
    //                                 INNER JOIN tab_produtos p ON p.id_produto = e.id_produto_fk
    //                                 GROUP BY
    //                                     e.lote
    //                                 ORDER BY 
    //                                     p.nome_produto;

    //                                 ");
    //     return $query->result_array();
    // }
}
