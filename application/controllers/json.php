<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function getStates()
	{
		$data['state'] = $this->employee_model->getStates();

		print json_encode($data['state']);
	}

	public function getCity($state)
	{
		$data['city'] = $this->employee_model->getCity($state);
		print json_encode($data['city']);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
