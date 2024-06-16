<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Componentes extends CI_Controller
{

	public function index()
	{
		$this->load->view('templates/templates');
	}

	public function tables()
	{
		$this->load->view('templates/tables');
	}

	public function charts()
	{
		$this->load->view('templates/charts');
	}

	public function buttons()
	{
		$this->load->view('templates/buttons');
	}

	public function cards()
	{
		$this->load->view('templates/cards');
	}
	public function borders()
	{
		$this->load->view('templates/border');
	}
	public function animations()
	{
		$this->load->view('templates/animation');
	}

	public function colors()
	{
		$this->load->view('templates/color');
	}

	public function photo()
	{
		$this->load->view('templates/photo');
	}

	public function others()
	{
		$this->load->view('templates/animation');
	}


}
