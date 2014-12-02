<?php

class Login_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	// Valida o usuário //
	function validate($email = None, $password = None)
	{
		if ($email == None or $senha == None){
			$email = $this->input->post('email');
			$password = $this->input->post('password');			
		}

		$query = $this->db->query("SELECT fun_valida_usuario ('$email', '$password') as result");
		
		return $query->result();
	}

	function checkEmail($email)
	{
		$this->db->select('COUNT(idUsuario) as countUser');
		$this->db->from('Usuario');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->result();	
	}

	public function getUser($userID)
	{
		$this->db->select('*');
		$this->db->from('Usuario');
		$this->db->where('idUsuario', $userID);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

}

?>