<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function home()
	{
		$data['main_content'] = 'employee/home';
		$this->load->view('template', $data);
	}

	public function perfil()
	{
		$data['main_content'] = 'employee/perfil';
		$this->load->view('template', $data);
	}

	public function editPerfil()
	{
		$data['main_content'] = 'employee/editPerfil';
		$this->load->view('template', $data);
	}

	public function notify()
	{
		$data['main_content'] = 'employee/notify';
		$this->load->view('template', $data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
