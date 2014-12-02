<?php

	$logged = $this->session->userdata('logged');
	
	if ($this->session->userdata('type') == USER_COMPANY)
	{
		$this->load->view("template/header");
		$this->load->view("template/menu_company");	
		$data['money'] = $this->company_model->getMoney($this->session->userdata('id'));
		$data['money'] = $data['money'][0]->money;
		$this->load->view("template/logout_company", $data);
		$this->load->view($main_content);
		$this->load->view("template/footer");
	}
	if ($this->session->userdata('type') == USER_EMPLOYEE)
	{
		$this->load->view("template/header");
		$this->load->view("template/menu_employee");	
		// $this->load->view("template/logout_company", $data);
		$this->load->view($main_content);
		$this->load->view("template/footer");
	}		
	elseif ($main_content == 'employee/homeEmpty')
	{
		$this->load->view("template/header");
		$this->load->view("template/menu_user");
		$this->load->view($main_content);
		$this->load->view("template/footer");
	}
	else
	{
		$this->load->view($main_content);	
	}	

?>