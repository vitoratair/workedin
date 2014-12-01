<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	/*
	 * Must be saved the users data on session browser
	 */	
	function setSession($userData)
	{
		$dataSession = array(
			'email' 	=> $userData->email,
			'type' 		=> $userData->idTipoUsuario,
			'id' 		=> $userData->idUsuario,				
			'logged' 	=> true
		);
		$this->session->set_userdata($dataSession);
	}

	/*
	 * Must be redirected to the correct page
	 */	
	function redirect($userType)
	{

		if ($userType == USER_EMPLOYEE)
			redirect('employee/home');
		
		elseif ($userType == USER_COMPANY)
			redirect('company/home');

	}

	/*
	 * Must be validated the email / password and redirected to the correct function
	 */	
	public function loginValidate()
	{
		$query = $this->login_model->validate();
		$userID = $query[0]->result;
		$userData = $this->login_model->getUser($userID)[0];

		
		if (empty($userData))
		{
			$this->session->set_userdata('msg', 'Nome de usuário ou senha estão inseridos de forma incorreta.');
			redirect('home');
		}

		elseif ($userData->idEstadoUsuario == USER_NOT_ACTIVE)
		{
			$this->session->set_userdata('msg', 'Usuário não esta ativo');
			redirect('home');
		}
		
		$this->setSession($userData);

		$this->redirect($userData->idTipoUsuario);

	}


	/**
	 * Must be done the log out
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */