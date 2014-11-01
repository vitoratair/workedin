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

	public function contact()
	{

		$config['protocol']	= 'smtp';
		$config['smtp_host']	= 'ssl://smtp.gmail.com';
		$config['smtp_port']	= '465';
		$config['smtp_timeout']	= '7';
		$config['smtp_user']	= '******'; //replace before commit
		$config['smtp_pass']	= '******';	//replace before commit
		$config['charset']	= 'utf-8';
		$config['newline']	= "\r\n";
		$config['mailtype']	= 'html';
		$config['validation']	= TRUE;

		$this->email->initialize($config);
		$this->email->from($this->input->post('email'), $this->input->post('contactName'));
		$this->email->to('vitor.ruts@gmail.com');
		$this->email->subject('Message from the ' . $this->input->post('contactName'));
		$this->email->message($this->input->post('comments'));
		$this->email->send();

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
