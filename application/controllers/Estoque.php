<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Estoque extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Estoque_model', 'estoque');
	}

	public function index()
	{
		$data['estoque'] = $this->estoque->listEstoque();

		// echo "<pre>";
		// print_r($data['estoque']);
		// exit;

		$this->load->view('paginas/estoque', $data);
	}

	public function save()
	{
		$insert = $this->estoque->save($_POST);

		$_SESSION['message'] = 'Produto adicionado ao estoque com sucesso!';
		redirect('Estoque');
	}
}
