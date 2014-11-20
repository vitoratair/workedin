<?php

	$logged = $this->session->userdata('logged');
	
	$this->load->view("template/header");

	$this->load->view("template/menu");

	if(!isset($logged) || $logged != true)
		$this->load->view("template/login");	
	else
	{
		if ($this->session->userdata('type') == USER_COMPANY){
			$data['money'] = $this->company_model->getMoney($this->session->userdata('id'));
			$data['money'] = $data['money'][0]->money;
			$this->load->view("template/logout_company", $data);
		}
		else
			$this->load->view("template/logout");
	}
			

	$this->load->view($main_content);

	$this->load->view("template/footer");

?>