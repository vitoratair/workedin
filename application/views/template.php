<?php

	$logged = $this->session->userdata('logged');	
	$this->load->view("template/header");
	
	if ($logged == 0)
	{	
		if ($main_content == 'employee/homeEmpty')
		{
			$this->load->view("template/menu_user");
			$this->load->view($main_content);
			$this->load->view("template/footer");
		}	

		$this->load->view($main_content);	
	}
	else
	{		
		if ($this->session->userdata('type') == USER_COMPANY)
		{
			$this->load->view("template/menu_company");	
			$data['money'] = $this->company_model->getMoney($this->session->userdata('id'));
			$data['money'] = $data['money'][0]->money;
			$this->load->view($main_content);
			$this->load->view("template/footer");
		}
		else if ($this->session->userdata('type') == USER_EMPLOYEE)
		{
			$this->load->view("template/menu_employee");	
			$this->load->view($main_content);
			$this->load->view("template/footer");
		}		
	}	

?>