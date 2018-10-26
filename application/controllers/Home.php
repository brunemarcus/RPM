<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{ 
		$this->load->library('session');
 		//Set condições form
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email','Email', 'required|valid_email');
		$this->form_validation->set_rules('senha','Senha', 'required|min_length[6]');
		$this->form_validation->set_rules('confsenha', 'Confsenha', 'required|min_length[6]|matches[senha]');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		$this->form_validation->set_rules('rg', 'Rg', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('home');
		}
		else {
			$this->load->model('register_model','register');
			$insert = $this->register->insert();

			if($insert) 
				$this->session->set_flashdata('success', "Usuário inserido com sucesso");
			else 
				$this->session->set_flashdata('error', "Erro ao inserir usuário");

			redirect(base_url('/'),'refresh');
		}
	}
}
