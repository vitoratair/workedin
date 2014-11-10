<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['main_content'] = 'company/index';
		$this->load->view('template', $data);
	}

	public function home()
	{
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
