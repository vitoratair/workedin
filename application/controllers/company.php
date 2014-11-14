<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->logged();
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

	public function home()
	{
		
		$idUser = $this->session->userdata('id');

		$data['companyData'] = $this->company_model->getCompany($idUser);
		$data['companyAddress'] = $this->company_model->getCompanyAddress($idUser);

		$data['main_content'] = 'company/home';
		$this->parser->parse('template', $data);
	}

	public function vacancy()
	{

		$idUser = $this->session->userdata('id');

		$vacancyIds = $this->company_model->getArrayVacancyByUser($idUser);
		
		if (count($vacancyIds) == 0)
			$data['vacancy'] = array('asd' => '');
		
		else
			$data['vacancy'] = $this->company_model->getOpenVacancy($vacancyIds);	
	
		$data['main_content'] = 'company/vacancy';
		$this->parser->parse('template', $data);
	}

	public function candidates($vacancyId)
	{
		$data['candidate'] = $this->company_model->getCondidatesByVacancy($vacancyId);
		
		$data['main_content'] = 'company/candidates';
		$this->parser->parse('template', $data);
	}

	public function newVacancy()
	{
		$data['main_content'] = 'company/newVacancy';
		$this->load->view('template', $data);
	}

	public function editCompany()
	{
		$idUser = $this->session->userdata('id');

		$data['companyData'] = $this->company_model->getCompany($idUser);
		$data['companyActivityName'] = $data['companyData'][0]->companyActivity;
		$data['companyActivityId'] = $data['companyData'][0]->companyActivityId;

		$data['activity'] = $this->company_model->getActivity();
		$data['main_content'] = 'company/editCompany';
		$this->parser->parse('template', $data);
	}

	public function perfilCandidate($candidate)
	{	

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

	public function addCompany()
	{
		
		$email = $this->input->post('email');
		$password = $this->input->post('senha');

		$this->company_model->save($email, $password);

		redirect("company/home/", 'refresh');	
	}

	function updateCompany()
	{
		$invalidChars = array(" ", ".", "-", "(", ")");
	
		$data['idUsuario'] = $this->input->post('companyId');
		$data['nome'] = $this->input->post('company');
		$data['nomeContato'] = $this->input->post('contactName');
		$data['emailContato'] = $this->input->post('contactEmail');
		$data['descricao'] = $this->input->post('description');
		$data['idRamoAtividade'] = $this->input->post('activity');		
		$data['cnpj'] =  str_replace($invalidChars, "", $this->input->post('cnpj'));
		$data['cpf'] = str_replace($invalidChars, "", $this->input->post('cpf'));
		$data['telefoneContato'] = str_replace($invalidChars, "", $this->input->post('contactPhone'));
		
		$this->company_model->updateCompany($data);

		redirect('company/editCompany');

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
