<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['main_content'] = 'core/content';
		$this->load->view('template', $data);
	}

	public function company()
	{
		$data['main_content'] = 'company/index';
		$this->load->view('template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
