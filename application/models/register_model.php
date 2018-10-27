<?php 

class Register_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert() {
		/* Table User */
		$data = array( 
			'nome' => $this->input->post('nome'),
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			'telefone' => $this->input->post('telefone'),			
			'rg' => $this->input->post('rg')
		);
		$this->db->trans_begin();
		$this->db->insert('user', $data);
		$last_id = $this->db->insert_id();
		/* Table Endereços */
		$endereco = array(
			'id_user' => $last_id,
			'cep' => $this->input->post('cep'),
			'rua' => $this->input->post('rua'),
			'bairro' => $this->input->post('bairro'),
			'cidade' => $this->input->post('cidade'),
			'estado' => $this->input->post('estado')
		);
		$this->db->insert('enderecos', $endereco);

		if($this->db->trans_status() === FALSE) 
			return $this->db->trans_rollback();
		else {
			return $this->db->trans_commit();
		}
	}
}