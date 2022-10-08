<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	//#########################################
	public function index()
	{
		if ($this->session->has_userdata('id')) {
			$this->menuinicial();
		}
		else{
			$this->login();
		}
	}

	//#########################################
	public function login()
	{
		if ($this->session->has_userdata('id')) {
			$this->menuinicial();
		}

		$this->load->view('layouts/topo');
		$this->load->view('login');
		$this->load->view('layouts/rodape');
	}

	//#########################################
	public function menuinicial()
	{
		if (!$this->session->has_userdata('id')) {
			$this->login();
		}
		else{
			redirect('Gestao/home');
		}
	}

	//#########################################
	public function setup()
	{

		$this->load->view('layouts/topo');
		$this->load->view('setup');
		$this->load->view('layouts/rodape');
	}

	//#########################################
	public function resetdb()
	{
		$this->load->model('Basedados');
		$this->Basedados->reset();

		$this->load->view('layouts/topo');

		$dados = [
			"mensagem" => "Base de dados reiniciada.",
			"tipo" => "warning"
		];

		$this->load->view('mensagem', $dados);

		$this->load->view('layouts/rodape');
	}

	//#########################################
	public function addusuarios()
	{
		$this->load->model('Basedados');
		$this->Basedados->inserir_usuarios();

		$this->load->view('layouts/topo');

		$dados = [
			"mensagem" => "Usuários cadastrados.",
			"tipo" => "success"
		];

		$this->load->view('mensagem', $dados);

		$this->load->view('layouts/rodape');
	}

	//#########################################
	public function addprodutos()
	{
		$this->load->model('Basedados');
		$this->Basedados->inserir_produtos();

		$this->load->view('layouts/topo');

		$dados = [
			"mensagem" => "Produtos cadastrados.",
			"tipo" => "success"
		];

		$this->load->view('mensagem', $dados);

		$this->load->view('layouts/rodape');
	}

	//#########################################
	public function verificarlogin()
	{
		$this->load->model('Usuarios');

		if ($this->Usuarios->verficar_login()) {
			$this->menuinicial();
		}
		else{
			$this->load->view('layouts/topo');

			$dados = [
				"mensagem" => "login invalido.",
				"tipo" => "danger"
			];
	
			$this->load->view('mensagem', $dados);
	
			$this->load->view('layouts/rodape');
		}
	}

	//#########################################

	public function logout()
	{
		if ($this->session->has_userdata('id')) {
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('usuario');
		}

		$this->menuinicial();
	}
}
