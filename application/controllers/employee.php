<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function logged()
	{
		$logged = $this->session->userdata('logged');
		$userType = $this->session->userdata('type');

		if(!isset($logged) || $logged != true)
			redirect('home');

		elseif ($userType != USER_EMPLOYEE)
			redirect('home');

	}

	public function getOpenJobs()
	{
		$data['openJobs'] = $this->employee_model->getJsonOpenJobs();

		print json_encode($data['openJobs']);
	}

	public function home()
	{

		$data['main_content'] = 'employee/home';
		$this->parser->parse('template', $data);
	}

	public function perfil()
	{
		
		$this->logged();
		$user = $this->session->userdata('id');

		$data['employeeData'] = $this->employee_model->getEmployee($user);
		$data['employeeEducation'] = $this->employee_model->getEducation($user);
		$data['employeeProfession'] = $this->employee_model->getProfession($user);
		$data['employeeEmail'] = $this->session->userdata('email');
		
		$data['main_content'] = 'employee/perfil';
		$this->parser->parse('template', $data);
	}

	public function editPerfil()
	{

		$this->logged();
		$user = $this->session->userdata('id');
		$data['employeeData'] = $this->employee_model->getEmployee($user);
		$data['civilStatus'] = $this->employee_model->getCivilStatus();
		$data['license'] = $this->employee_model->getLicense();
		$data['states'] = $this->employee_model->getStates();
		

		$data['main_content'] = 'employee/editPerfil';
		$this->parser->parse('template', $data);
	}

	public function notify()
	{
		$data['main_content'] = 'employee/notify';
		$this->load->view('template', $data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
