<?php
class EntradaSaida_model extends CI_Model
{

    public function listProdutos()
    {
        $query = $this->db->query("SELECT DISTINCT 
                                        id_produto, 
                                        nome_produto 
                                    FROM tab_produtos
                                    GROUP BY nome_produto");
        return $query->result_array();
    }

    public function listMovimentacoes()
    {
        $filtro = isset($_SESSION['filtro']) ? $_SESSION['filtro'] : 'mensal';

        switch ($filtro) {
            case 'diario':
                $sql = "SELECT * FROM sua_tabela WHERE DATE(coluna_data) = CURDATE()";
                break;
            case 'semanal':
                $sql = "SELECT * FROM sua_tabela WHERE WEEK(coluna_data) = WEEK(CURDATE())";
                break;
            case 'mensal':
                $sql = "SELECT * FROM sua_tabela WHERE MONTH(coluna_data) = MONTH(CURDATE())";
                break;
            case 'anual':
                $sql = "SELECT * FROM sua_tabela WHERE YEAR(coluna_data) = YEAR(CURDATE())";
                break;
            default:
                // Se nenhum filtro válido for selecionado, exibe uma mensagem de erro
                echo "Filtro inválido.";
                break;
        }
        switch ($filtro) {
            case 'diario':
                $sql = "SELECT 
                        m.id_movimentacao, 
                        m.tipo_movimentacao, 
                        p.nome_produto, 
                        p.udm, 
                        m.quantidade_movimentada,
                        DATE_FORMAT(m.dta_movimentacao, '%d/%m/%Y - %H:%i:%s') AS dta_movimentacao,
                        u.nome_usuario
                    FROM 
                        tab_movimentacoes m
                    INNER JOIN 
                        tab_usuarios u ON u.id_usuario = m.fk_usuario
                    INNER JOIN 
                        tab_produtos p ON p.id_produto = m.id_produto
                    WHERE DATE(m.dta_movimentacao) = CURDATE()
                    ORDER BY m.id_movimentacao DESC";
                break;
            case 'semanal':
                $sql = "SELECT 
                        m.id_movimentacao, 
                        m.tipo_movimentacao, 
                        p.nome_produto, 
                        p.udm, 
                        m.quantidade_movimentada,
                        DATE_FORMAT(m.dta_movimentacao, '%d/%m/%Y - %H:%i:%s') AS dta_movimentacao,
                        u.nome_usuario
                    FROM 
                        tab_movimentacoes m
                    INNER JOIN 
                        tab_usuarios u ON u.id_usuario = m.fk_usuario
                    INNER JOIN 
                        tab_produtos p ON p.id_produto = m.id_produto
                    WHERE WEEK(m.dta_movimentacao) = WEEK(CURDATE())
                    ORDER BY m.id_movimentacao DESC";
                break;
            case 'mensal':
                $sql = "SELECT 
                        m.id_movimentacao, 
                        m.tipo_movimentacao, 
                        p.nome_produto, 
                        p.udm, 
                        m.quantidade_movimentada,
                        DATE_FORMAT(m.dta_movimentacao, '%d/%m/%Y - %H:%i:%s') AS dta_movimentacao,
                        u.nome_usuario
                    FROM 
                        tab_movimentacoes m
                    INNER JOIN 
                        tab_usuarios u ON u.id_usuario = m.fk_usuario
                    INNER JOIN 
                        tab_produtos p ON p.id_produto = m.id_produto
                    WHERE MONTH(m.dta_movimentacao) = MONTH(CURDATE())
                    ORDER BY m.id_movimentacao DESC";
                break;
            case 'anual':
                $sql = "SELECT 
                        m.id_movimentacao, 
                        m.tipo_movimentacao, 
                        p.nome_produto, 
                        p.udm, 
                        m.quantidade_movimentada,
                        DATE_FORMAT(m.dta_movimentacao, '%d/%m/%Y - %H:%i:%s') AS dta_movimentacao,
                        u.nome_usuario
                    FROM 
                        tab_movimentacoes m
                    INNER JOIN 
                        tab_usuarios u ON u.id_usuario = m.fk_usuario
                    INNER JOIN 
                        tab_produtos p ON p.id_produto = m.id_produto
                    WHERE YEAR(m.dta_movimentacao) = YEAR(CURDATE())
                    ORDER BY m.id_movimentacao DESC";
                break;
            default:
                // Se nenhum filtro válido for selecionado, exibe uma mensagem de erro
                echo "Filtro inválido.";
                break;
        }

        $resultado = $this->db->query($sql);

        return $resultado->result_array();
    }

    public function verificarProdutoEstoque()
    {
        $produto_no_estoque = isset($_POST['id_produto']) ? $_POST['id_produto'] : null;

        $query = $this->db->query("SELECT 
                                        id_produto_estoque AS id_estq, 
                                        id_produto_fk AS id_prod
                                    FROM 
                                        tab_estoque 
                                    WHERE 
                                        id_produto_fk = $produto_no_estoque
                                    LIMIT 1");
        return $query->result_array();
    }

    public function verificarSaldo()
    {
        $produto_no_estoque = isset($_POST['id_produto']) ? $_POST['id_produto'] : null;
        $tipo_movimentacao = isset($_POST['tipo_movimentacao']) ? $_POST['tipo_movimentacao'] : null;
        $quantidade_movimentada = isset($_POST['quantidade_movimentada']) ? $_POST['quantidade_movimentada'] : null;

        if ($tipo_movimentacao == 'saida') {
            $query = $this->db->query(" SELECT 
                                            quantidade
                                        FROM 
                                            tab_estoque 
                                        WHERE 
                                            id_produto_fk = $produto_no_estoque
                                            AND quantidade >= $quantidade_movimentada
                                        LIMIT 1");
            if (empty($query)) {
                return false;
            }
        }

        return true;
    }

    public function atualizarEstoque($pesquisa)
    {
        $estoque = $pesquisa[0]['id_estq'];
        $produto = $pesquisa[0]['id_prod'];

        $tipo_mov = isset($_POST['tipo_movimentacao']) ? $_POST['tipo_movimentacao'] : null;
        $quant_mov = isset($_POST['quantidade_movimentada']) ? $_POST['quantidade_movimentada'] : null;
        $usu_resp = isset($_POST['fk_usuario']) ? $_POST['fk_usuario'] : 1;

        $query = $this->db->query("INSERT INTO tab_movimentacoes (tipo_movimentacao, 
                                                                  id_produto,
                                                                  id_estoque,
                                                                  quantidade_movimentada,
                                                                  dta_movimentacao, 
                                                                  fk_usuario) 
                                   VALUES ('$tipo_mov', $produto, $estoque, $quant_mov, NOW(), $usu_resp)");

        return $query;
    }

    public function cadastrarProdutoEstoque()
    {
        $id_produto = isset($_POST['id_produto']) ? $_POST['id_produto'] : null;
        $quant_mov = isset($_POST['quantidade_movimentada']) ? $_POST['quantidade_movimentada'] : null;
        $usu_resp = isset($_POST['fk_usuario']) ? $_POST['fk_usuario'] : null;

        $query = $this->db->query("INSERT INTO tab_estoque (id_produto_fk, quantidade, dta_entrada) VALUES ($id_produto, $quant_mov, NOW())");
        // echo 'Inserção na tabela tab_estoque: ' . $this->db->last_query();
        // exit;

        $novo_id = $this->db->insert_id();

        $query = $this->db->query("INSERT INTO tab_movimentacoes (tipo_movimentacao, id_produto, id_estoque, quantidade_movimentada, dta_movimentacao, fk_usuario) 
                                   VALUES ('entrada', $id_produto, $novo_id, $quant_mov,  NOW(), $usu_resp)");

        return $query;
    }

}
