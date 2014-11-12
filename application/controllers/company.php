<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$idUser = $this->session->userdata('');

		$data['main_content'] = 'company/home';
		$this->load->view('template', $data);
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
		// $email = 'iasjdoasd@paoskd';
		// $password = 'asdasd';

		$this->company_model->save($email, $password);
		// $user = 2;

		redirect("company/home/", 'refresh');	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
