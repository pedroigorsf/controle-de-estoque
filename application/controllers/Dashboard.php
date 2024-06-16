<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dashboard');
	}
	public function index() // DEFAULT: Mês
	{
		$data['countProdutosEstoque'] = $this->dashboard->countProdutosEstoque();
		$data['countProdutosCadastrados'] = $this->dashboard->countProdutosCadastrados();
		$data['listQuantProdutoEntrada'] = $this->dashboard->listQuantProdutoEntrada();
		$data['listQuantProdutoSaida'] = $this->dashboard->listQuantProdutoSaida();

		$this->load->view('paginas/dashboard.php', $data);
	}
}
