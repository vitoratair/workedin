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
		$data['main_content'] = 'company/vacancy';
		$this->load->view('template', $data);
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

	public function candidates()
	{
		$data['main_content'] = 'company/candidates';
		$this->load->view('template', $data);
	}

	public function perfilCandidate()
	{
		$data['main_content'] = 'company/perfilCandidate';
		$this->load->view('template', $data);
	}

	public function management()
	{
		$data['main_content'] = 'company/management';
		$this->load->view('template', $data);
	}

	public function addCompany()
	{
		
		$email = $this->input->post('email');
		$password = $this->input->post('senha');

		$this->company_model->save($email, $password);

		redirect("company/home/", 'refresh');	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
