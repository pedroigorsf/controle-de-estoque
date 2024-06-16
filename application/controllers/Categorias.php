<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Categorias extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Categorias_model', 'categorias'); // Carrega o model Categorias_model
	}
	public function index()
	{
		$data['categorias'] = $this->categorias->list(); // Obtém todas as categorias
		$this->load->view('paginas/cadastrarCategoria', $data);
	}

	public function alter()
	{
		$this->load->view('paginas/cadastrarCategoria');
	}

	public function save()
	{
		$insert = $this->categorias->save($_POST);


		$_SESSION['message'] = 'Produto cadastrado com sucesso!';
		redirect('Produtos');
	}
}
