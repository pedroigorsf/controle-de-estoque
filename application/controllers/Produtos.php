<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produtos_model', 'produtos');
	}
	public function index()
	{
		$data['produtos'] = $this->produtos->list();

		$this->load->view('paginas/cadastrarProduto', $data);
	}

	public function alter($cod = 0)
	{
		$data['id_produto'] = '';
		$data['cod_barra'] = isset($cod) ? $cod : '';
		$data['nome_produto'] = '';
		$data['udm'] = '';
		$data['categoria'] = '';
		$data['status'] = '';

		$data['produtos'] = $this->produtos->list();

		foreach ($data['produtos'] as $key => $value) {
			if ($value['id_produto'] == $cod) {
				$data['id_produto'] = $value->id_produto;
				$data['cod_barra'] = $cod;
				$data['nome_produto'] = $value->nome_produto;
				$data['udm'] = $value->udm;
				$data['categoria'] = $value->categoria;
				$data['status'] = $value->status;
			}
		}

		$this->load->view('paginas/cadastrarProduto', $data);
	}

	public function save()
	{
		$insert = $this->produtos->save($_POST);

		$_SESSION['tipo'] = 'success';
		$_SESSION['cor'] = 'success';
		$_SESSION['icone'] = 'check_circle';
		$_SESSION['titulo'] = 'Sucesso!';
		$_SESSION['mensagem'] = 'Registro de movimentação realizada com sucesso!';

		redirect('Produtos');
	}

}
