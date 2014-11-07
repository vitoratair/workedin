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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
