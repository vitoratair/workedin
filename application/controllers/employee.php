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

	function addEmployee()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('senha');

		$this->employee_model->save($email, $password);

		$query = $this->login_model->validate($email, $password);
		$userData = $this->login_model->getUser($query[0]->result)[0];

		$this->setSession($userData);

		redirect("employee/home/", 'refresh');	
	}

	function formatDate($date)
	{
		$date = explode("/", $date);	
		return $date[2] . "-" . $date[1] . "-" . $date[0];
	}

	function saveNewEmployee()
	{
		$invalidChars = array(" ", ".", "-", "(", ")");
	
		$data['idUsuario'] = $this->session->userdata('id');
		
		// $data['idCidade'] = $this->input->post('city');
		$data['idCidade'] = 4457;		
		$data['idEstado'] = (int)$this->input->post('state');		
		$data['idHabilitacao'] = $this->input->post('license');
		$data['idEstadoCivil'] = $this->input->post('civilStatus');
		$data['nome'] = $this->input->post('name');
		$data['sobrenome'] = $this->input->post('lastName');
		$data['idSexo'] = $this->input->post('sex');
		$data['trabalhando'] = (int)$this->input->post('isWorking');
		$data['necessidadeEspecial'] = (int)$this->input->post('specialNeeds');	
		$data['telefone'] = str_replace($invalidChars, "", $this->input->post('phone')); 
		$data['bairro'] = $this->input->post('neighborhood');
		$data['dataNascimento'] = $this->formatDate($this->input->post('birth'));
		
		$this->employee_model->saveNewEmployee($data);
		redirect('employee/home');		
	}

	function homeEmpty()
	{
		$data['main_content'] = 'employee/homeEmpty';
		$this->parser->parse('template', $data);		
	}

	public function getOpenJobs()
	{
		$data['openJobs'] = $this->employee_model->getJsonOpenJobs();

		print json_encode($data['openJobs']);
	}

	public function home()
	{

		$logged = $this->session->userdata('logged');

		if(!isset($logged) || $logged != true)
			return $this->homeEmpty();

		$data['main_content'] = 'employee/home';
		$this->parser->parse('template', $data);
	}

	function employeeEmpty()
	{
		$data['civilStatus'] = $this->employee_model->getCivilStatus();
		$data['license'] = $this->employee_model->getLicense();
		$data['states'] = $this->employee_model->getStates();		
		$data['sex'] = $this->employee_model->getSex();		

		$data['main_content'] = 'employee/perfilEmpty';
		$this->parser->parse('template', $data);
	}

	public function perfil()
	{
		
		$this->logged();
		$user = $this->session->userdata('id');

		$data['employeeData'] = $this->employee_model->getEmployee($user);
		
		if (empty($data['employeeData']))
			return $this->employeeEmpty();

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
