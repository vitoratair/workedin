<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
	}

	public function logged()
	{
		$logged = $this->session->userdata('logged');

		if($logged == true)
		{	
			$userType = $this->session->userdata('type');
			if ($userType == USER_COMPANY)
				redirect('company/home');
		}		
	}

	public function index()
	{
		$this->logged();
		$data['main_content'] = 'core/content';
		$this->load->view('template', $data);
	}

	public function company()
	{
		$this->logged();
		$data['main_content'] = 'core/company';
		$this->load->view('template', $data);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
