<?php

class Login_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	// Valida o usuário //
	function validate()
	{

		 $this->db->where('email', $this->input->post('email'));
		 $this->db->where('senha',$this->input->post('senha'));
		 $query = $this->db->get('usuario');

		 if ($query->num_rows == 1)
		 {
		 	return $query->result();
		 }
	}


}

?>