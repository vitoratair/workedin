<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

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

		elseif ($userType != USER_COMPANY)
			redirect('home');
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

	public function home()
	{
		$this->logged();
		$idUser = $this->session->userdata('id');

		$data['companyData'] = $this->company_model->getCompany($idUser);
		$data['companyAddress'] = $this->company_model->getCompanyAddress($idUser);
		$data['states'] = $this->employee_model->getStates();

		$data['main_content'] = 'company/home';

		if (empty($data['companyAddress']))
		{
			$data['messageAddressEmpty'] = 'Não há endereços cadastrados';
		}

		if (empty($data['companyData']))
		{
			$title = "Notamos que bla bla bla";
			$description = "Notamos que bla bla blasd asda sidjoasi dsad";
			$data['companyMessage'][0]->title = $title;
			$data['companyMessage'][0]->description = $description;
			$data['activity'] = $this->company_model->getActivity();
			$data['main_content'] = 'company/home_empty';			
		}		

		$this->parser->parse('template', $data);
	}

	function displayVacancy($vacancy)
	{
		$data['vacancy'] = $this->company_model->getVacancy($vacancy);		
		

		$data['timeStart'] = $this->company_model->getTimeById($data['vacancy'][0]->vacancyTimeStartId)[0]->timeDescription;
		$data['timeEnd'] = $this->company_model->getTimeById($data['vacancy'][0]->vacancyTimeEndId)[0]->timeDescription;

		$data['salary'] = $data['vacancy'][0]->vacancySalary;

		$data['benefits'] = $this->company_model->getBenefitByVacancy($vacancy);
	
		// print_r($data['vacancy'][0]->vacancySalary);
		$data['main_content'] = 'company/displayVacancy';
		$this->parser->parse('template', $data);
	}

	public function vacancy()
	{

		$idUser = $this->session->userdata('id');
		$data['vacancy'] = $this->company_model->getOpenVacancy($idUser);		
		$data['main_content'] = 'company/vacancy';
		$this->parser->parse('template', $data);
	}

	public function candidates($vacancyId)
	{
		$data['candidate'] = $this->company_model->getCondidatesByVacancy($vacancyId);

		foreach ($data['candidate'] as $key => $candidate) {
			$data['candidate'][$key]->candidateProfession = $this->employee_model->getLastProfession($candidate->candidateId);			
		}

		$data['vacancyId'] = $vacancyId;
		$data['main_content'] = 'company/candidates';
		$this->parser->parse('template', $data);
	}

	public function newVacancy()
	{
		$idUser = $this->session->userdata('id');

		$data['times'] = $this->company_model->getTime();
		$data['benefits'] = $this->company_model->getBenefit();
		$data['positions'] = $this->company_model->getPosition();

		$data['address'] = $this->company_model->getCompanyAddress($idUser);

		$data['main_content'] = 'company/newVacancy';
		$this->parser->parse('template', $data);
	}

	public function addVacancy()
	{
		$invalidChars = array(" ", ".", ",");
		$data['idUsuario'] = $this->session->userdata('id');
		
		$data['idHorarioInicio'] = $this->input->post('timeStart');
		$data['idHorarioFim'] = $this->input->post('timeEnd');				
		$data['idEstadoVaga'] = VACANCY_PRIVATE;

		
		$addressData = $this->company_model->getAddress($this->input->post('address'))[0];

		$data['idCidade'] = $addressData->cityId;
		$data['idEstado'] = $addressData->stateId;
		$data['lat'] = $addressData->latitude;
		$data['lon'] = $addressData->longitude;
		
		$data['idTipoVaga'] = $this->company_model->getIdPosition($this->input->post('position'))[0]->positionId;
		$data['salario'] = str_replace($invalidChars, "", $this->input->post('salary')); 
		$data['descricao'] = $this->input->post('descriptions');		
		$data['recrutamentoAberto'] = RECRUITMENT_OPEN;

		$id = $this->company_model->addVacancy($data);
		
		$arrayBenefit = array();
		foreach ($this->input->post('benefit') as $key => $benefit) {
			$arrayBenefit[$key]['idVaga'] = $id;
			$arrayBenefit[$key]['idBeneficios'] = $benefit;
		}
		
		$this->company_model->addBenefit($arrayBenefit);		
		redirect('company/vacancy/');
		
	}

	public function editCompany()
	{
		$idUser = $this->session->userdata('id');

		$data['companyData'] = $this->company_model->getCompany($idUser);
		$data['companyActivityName'] = $data['companyData'][0]->companyActivity;
		$data['companyActivityId'] = $data['companyData'][0]->companyActivityId;

		$data['states'] = $this->employee_model->getStates();

		$data['activity'] = $this->company_model->getActivity();
		$data['main_content'] = 'company/editCompany';
		$this->parser->parse('template', $data);
	}

	public function perfilCandidate($candidate, $vacancy)
	{	
		$data['vacancy'] = $vacancy;
		$data['employeeData'] = $this->employee_model->getEmployee($candidate);	
		$data['employeeEducation'] = $this->employee_model->getEducation($candidate);
		$data['employeeProfession'] = $this->employee_model->getProfession($candidate);
		
		$data['main_content'] = 'company/perfilCandidate';
		$this->parser->parse('template', $data);
	}

	public function management()
	{
		$idUser = $this->session->userdata('id');

		$data['candidate'] = $this->company_model->getCondidatesManagement($idUser);
		$data['vacancy'] = $this->company_model->getVacancyByUser($idUser);
		
		$data['main_content'] = 'company/management';
		$this->parser->parse('template', $data);
	}

	function updateCompany()
	{
		$invalidChars = array(" ", ".", "-", "(", ")");
	
		$data['idUsuario'] = $this->input->post('companyId');
		$data['idRamoAtividade'] = $this->input->post('activity');
		$data['idCidade'] = $this->input->post('city');
		$data['idEstado'] = $this->input->post('state');
		$data['nome'] = $this->input->post('company');
		$data['cnpj'] =  str_replace($invalidChars, "", $this->input->post('cnpj'));
		$data['cpf'] = str_replace($invalidChars, "", $this->input->post('cpf'));
		$data['nomeContato'] = $this->input->post('contactName');
		$data['emailContato'] = $this->input->post('contactEmail');
		$data['telefoneContato'] = str_replace($invalidChars, "", $this->input->post('contactPhone'));
		$data['descricao'] = trim($this->input->post('description'));
		$data['bairro'] = $this->input->post('neighborhood');
		$data['rua'] = $this->input->post('street');
		$data['numero'] = $this->input->post('number');
		$data['cep'] = str_replace($invalidChars, "", $this->input->post('cep'));
		$data['complemento'] = $this->input->post('complement');
		
		$this->company_model->updateCompany($data);
		redirect('company/home');
	}

	function newCompany()
	{
		$invalidChars = array(" ", ".", "-", "(", ")");
	
		$data['idUsuario'] = $this->session->userdata('id');
		$data['idRamoAtividade'] = $this->input->post('activity');
		$data['idCidade'] = $this->input->post('city');
		$data['idEstado'] = $this->input->post('state');
		$data['nome'] = $this->input->post('company');
		$data['cnpj'] =  str_replace($invalidChars, "", $this->input->post('cnpj'));
		$data['cpf'] = str_replace($invalidChars, "", $this->input->post('cpf'));
		$data['nomeContato'] = $this->input->post('contactName');
		$data['emailContato'] = $this->input->post('contactEmail');
		$data['telefoneContato'] = str_replace($invalidChars, "", $this->input->post('contactPhone'));
		$data['descricao'] = trim($this->input->post('description'));
		$data['bairro'] = $this->input->post('neighborhood');
		$data['rua'] = $this->input->post('street');
		$data['numero'] = $this->input->post('number');
		$data['cep'] = str_replace($invalidChars, "", $this->input->post('cep'));
		$data['complemento'] = $this->input->post('complement');
				
		$this->company_model->saveNewCompany($data);

		redirect('company/home');
	}

	public function addCompany()
	{
		
		$email = $this->input->post('email');
		$password = $this->input->post('senha');

		$this->company_model->save($email, $password);

		$query = $this->login_model->validate($email, $password);
		$userData = $this->login_model->getUser($query[0]->result)[0];

		$this->setSession($userData);

		redirect("company/home/", 'refresh');	
	}

	function newAddress()
	{
		$data['main_content'] = 'company/newAddress';
		$this->parser->parse('template', $data);
	}

	function addAddress()
	{
		$data['idUsuario'] = $this->session->userdata('id');
		$data['lat'] = $this->input->post('txtLatitude');
		$data['lon'] = $this->input->post('txtLongitude');
		$data['idCidade'] = 4457;
		$data['idEstado'] = 24;
		$data['idEstadoEndereco'] = ACTIVE;
		$data['descricao'] = $this->input->post('addressName');;

		$this->company_model->saveNewAddress($data);
		redirect('company/home');
		
	}

	function setCombine($value, $vacancy, $candidate, $date)
	{
		$data['idEstadoCombinacao'] = $value;
		$this->company_model->setCombine($vacancy, $candidate, $data);		
		redirect("company/candidates/$vacancy");
	}

	function updateInterviewDate()
	{
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		$dataSaved = $this->input->post('dateSaved');
		$user = $this->input->post('user');
		$vacancy = $this->input->post('vacancy');
		$data['dataEntrevista'] = $date . " " . $time . ".000000";

		$this->company_model->updateInterviewDate($user, $vacancy, $dataSaved, $data);
		redirect('company/management');
	}

	function aupdateAddress()
	{
		$idEndereco = $this->input->post('addressId');
		$idUser = $this->session->userdata('id');
		$data['lat'] = $this->input->post('txtLatitude');
		$data['lon'] = $this->input->post('txtLongitude');
		$data['idCidade'] = 4457;
		$data['idEstado'] = 24;
		$data['idEstadoEndereco'] = ACTIVE;
		$data['descricao'] = $this->input->post('addressName');
		$this->company_model->updateAddress($idEndereco, $idUser, $data);
		redirect('company/home');
	}

	function editAddress($address)
	{
		$data['address'] = $this->company_model->getAddress($address);
		$data['addressId'] = $data['address'][0]->addressId;
		$data['addressName'] = $data['address'][0]->addressName;
		$data['lat'] = $data['address'][0]->latitude;
		$data['lon'] = $data['address'][0]->longitude;
		$data['main_content'] = 'company/editAddress';
		$this->parser->parse('template', $data);
	}

	function addressChangeStatus($status, $addressId)
	{
		$idUser = $this->session->userdata('id');
		$data['idEstadoEndereco'] = $status;
		$this->company_model->updateAddress($addressId, $idUser, $data);

		redirect('company/home');
	}

	function credits()
	{
		$data['main_content'] = 'company/credits';
		$this->parser->parse('template', $data);
	}
}	

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
