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
		$last_id = $this->db->insert_id();

		$endereco = array(
			'id_user' => $last_id,
			'cep' => $this->input->post('cep'),
			'rua' => $this->input->post('rua'),
			'bairro' => $this->input->post('bairro'),
			'cidade' => $this->input->post('cidade'),
			'estado' => $this->input->post('estado')
		);

		if($insert) 
			$endereco_insert = $this->db->insert('enderecos', $endereco);

		return $endereco_insert;
	}
}