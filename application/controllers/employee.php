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
		
		$data['idCidade'] = (int)$this->input->post('city');
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

	function getJobs($position, $salary)
	{
		
		$data['jobs'] = $this->employee_model->getJsonJobs($this->session->userdata('id'), $position, $salary);
		// print_r($this->db->last_query());
		print json_encode($data['jobs']);
	}

	function getOpenJobs()
	{
		$data['jobs'] = $this->employee_model->getJsonOpenJobs();		
		print json_encode($data['jobs']);
	}

	function delCombine($vacancy)
	{
		$user = $this->session->userdata('id');
		$data['idEstadoCombinacao'] = 7;
		$this->company_model->delCombine($vacancy, $user, $data);

		redirect('employee/home/');
	}

	function newCombine($vacancy, $status)
	{
		$data['idUsuario'] = $this->session->userdata('id');
		$data['idVaga'] = $vacancy;
		$data['idEstadoCombinacao'] = $status;
		$this->company_model->newCombine($data);

		redirect('employee/home/');
	}

	public function home()
	{

		$logged = $this->session->userdata('logged');

		if(!isset($logged) || $logged != true)
			return $this->homeEmpty();
		
		$data['hasPerfil'] = $this->employee_model->hasPerfil($this->session->userdata('id'));
		$data['notificationNotRead'] = $this->employee_model->getNotifyNotRead($this->session->userdata('id'));
		$data['positions'] = $this->company_model->getPosition();
		$data['main_content'] = 'employee/home';
		$this->parser->parse('template', $data);
	}

	function employeeEmpty()
	{
		$data['civilStatus'] = $this->employee_model->getCivilStatus();
		$data['license'] = $this->employee_model->getLicense();
		$data['states'] = $this->employee_model->getStates();		
		$data['sex'] = $this->employee_model->getSex();		
		$data['notificationNotRead'] = $this->employee_model->getNotifyNotRead($this->session->userdata('id'));
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
		$data['phone'] = $data['employeeData'][0]->employeePhone;
		$data['schoolLevel'] = $this->employee_model->getSchoolLevel();
		$data['positions'] = $this->company_model->getPosition();
		$data['durations'] = $this->company_model->getDurations();
		$data['notificationNotRead'] = $this->employee_model->getNotifyNotRead($this->session->userdata('id'));
		$data['main_content'] = 'employee/perfil';
		$this->parser->parse('template', $data);
	}

	function formatDateFromMysql($date)
	{
		$date = explode("-", $date);	
		return $date[2] . "/" . $date[1] . "/" . $date[0];
	}

	public function editPerfil()
	{

		$this->logged();
		$user = $this->session->userdata('id');
		$data['employeeData'] = $this->employee_model->getEmployee($user);
		$data['employeeData'][0]->employeeBirth = $this->formatDateFromMysql($data['employeeData'][0]->employeeBirth);

		if ($data['employeeData'][0]->employeeIsWorking == 1)
			$data['employeeData'][0]->employeeIsWorkingDescription = 'Sim';
		else
			$data['employeeData'][0]->employeeIsWorkingDescription = 'Não';

		if ($data['employeeData'][0]->employeeNeeds == 1)
			$data['employeeData'][0]->employeeNeedsDescriptions = 'Sim';
		else
			$data['employeeData'][0]->employeeNeedsDescriptions = 'Não';		

		$data['civilStatus'] = $this->employee_model->getCivilStatus();
		$data['license'] = $this->employee_model->getLicense();
		$data['states'] = $this->employee_model->getStates();
		$data['sex'] = $this->employee_model->getSex();
		

		$data['main_content'] = 'employee/editPerfil';
		$this->parser->parse('template', $data);
	}

	function updateEmployee()
	{
		$invalidChars = array(" ", ".", "-", "(", ")");
	
		$user = $this->input->post('candidate');
		
		$data['idCidade'] = $this->input->post('city');
		$data['idEstado'] = $this->input->post('state');		
		$data['idSexo'] = $this->input->post('sex');
		$data['idHabilitacao'] = $this->input->post('license');
		$data['idEstadoCivil'] = $this->input->post('civilStatus');
		$data['nome'] = $this->input->post('name');
		$data['sobrenome'] = $this->input->post('lastName');
		$data['trabalhando'] = (int)$this->input->post('isWorking');

		if ($this->formatDate($this->input->post('birth')) != 0)
			$data['dataNascimento'] = $this->formatDate($this->input->post('birth'));

		if (str_replace($invalidChars, "", $this->input->post('phone')) != 0)
			$data['telefone'] = str_replace($invalidChars, "", $this->input->post('phone')); 


		$data['necessidadeEspecial'] = (int)$this->input->post('specialNeeds');			
		$data['bairro'] = $this->input->post('neighborhood');
		$this->employee_model->updateEmployee($user, $data);
		redirect('employee/perfil');	
	}

	function formatNotify($data)
	{
		foreach ($data as $key => $value) {
			$data[$key]->count = $key;
			$data[$key]->notifyDate = $this->formatDateFromMysql($data[$key]->notifyDate);
		}
		return $data;
	}

	public function notify()
	{
		$user = $this->session->userdata('id');
		$data['notifications'] = $this->employee_model->getNotification($user);
		$data['notifications'] = $this->formatNotify($data['notifications']);		
		$this->employee_model->setAllRead($user);
		$data['notificationNotRead'] = $this->employee_model->getNotifyNotRead($this->session->userdata('id'));
		
		$data['main_content'] = 'employee/notify';
		$this->parser->parse('template', $data);
	}	

	function addSchool()
	{
		$data['idUsuario'] = $this->session->userdata('id');
		$data['idNivelAcademico'] = $this->input->post('schoolLevel');
		$data['idEstadoFormacaoAcademica'] = ACTIVE;
		$data['instituicao'] = $this->input->post('schoolName');
		
		if ($this->input->post('course') == null)
			$data['curso'] = NULL;
		else
			$data['curso'] = $this->input->post('course');
	
		$this->employee_model->saveSchool($data);

		redirect('employee/perfil');

	}

	function addExperience()
	{
		$data['idUsuario'] = $this->session->userdata('id');
		$data['idDuracao'] = $this->input->post('duration');
		$data['idEstadoExperienciaProfissional'] = ACTIVE;
		$data['empresa'] = $this->input->post('company');
		$data['cargo'] = $this->input->post('position');

		$this->employee_model->saveNewExperience($data);

		redirect('employee/perfil');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
