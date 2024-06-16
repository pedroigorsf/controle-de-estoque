<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Fornecedores extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Fornecedores_model', 'fornecedores');
	}
	public function index()
	{
		$data['fornecedores'] = $this->fornecedores->list();

		$this->load->view('paginas/cadastrarFornecedor', $data);
	}

	public function save()
	{
		$insert = $this->fornecedores->save($_POST);

		$_SESSION['message'] = 'Fornecedor cadastrado com sucesso!';
		redirect('Fornecedores');
	}
}
