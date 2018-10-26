<?php 

class Register_model extends CI_Model {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    }

	public function insert() {
		$data = array(
			'nome' => $this->input->post('nome'),
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			'telefone' => $this->input->post('telefone'),
			'rg' => $this->input->post('rg')
		);

		$insert = $this->db->insert('user', $data);
		return $insert;
	}
}