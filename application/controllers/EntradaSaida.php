<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EntradaSaida extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (isset($_GET['filtro'])) {
			$_SESSION['filtro'] = $_GET['filtro'] === 'diario' ? 'diario' :
				($_GET['filtro'] === 'semanal' ? 'semanal' :
					($_GET['filtro'] === 'mensal' ? 'mensal' : 'anual'));
		}

		$this->load->model('EntradaSaida_model', 'movimentacoes');
	}
	public function index()
	{
		$data['produtos'] = $this->movimentacoes->listProdutos();
		$data['movimentacoes'] = $this->movimentacoes->listMovimentacoes();

		$this->load->view('paginas/entradaSaida', $data);
	}

	public function save()
	{
		$verificarLoteNoEstoque = $this->movimentacoes->verificarProdutoEstoque();
		$verificarSaldo = $this->movimentacoes->verificarSaldo();

		if ($verificarSaldo == true) {
			if (!empty($verificarLoteNoEstoque)) { // EXISTE PRODUTO NO ESTOQUE - SERÁ ATUALIZADO A LINHA
				$this->movimentacoes->atualizarEstoque($verificarLoteNoEstoque);

				$_SESSION['tipo'] = 'success';
				$_SESSION['cor'] = 'success';
				$_SESSION['icone'] = 'check_circle';
				$_SESSION['titulo'] = 'Sucesso!';
				$_SESSION['mensagem'] = 'Registro de movimentação realizada com sucesso!';
			} else { // NÃO EXISTE PRODUTO NO ESTOQUE - SERÁ CRIADO UMA NOVA LINHA
				$this->movimentacoes->cadastrarProdutoEstoque();

				$_SESSION['tipo'] = 'success';
				$_SESSION['cor'] = 'success';
				$_SESSION['icone'] = 'check_circle';
				$_SESSION['titulo'] = 'Sucesso!';
				$_SESSION['mensagem'] = 'Foi adicionado um novo lote no estoque!';
			}
		} else {
			$_SESSION['tipo'] = 'danger';
			$_SESSION['cor'] = 'danger';
			$_SESSION['icone'] = 'warning';
			$_SESSION['titulo'] = 'Erro!';
			$_SESSION['mensagem'] = 'Não existe saldo suficiente para realizar a movimentação!';
		}

		redirect('EntradaSaida');
	}

	public function listarJson()
	{
		$dados = $this->movimentacoes->listMovimentacoes();
		$json = json_encode($dados);
		echo $json;
	}
}
