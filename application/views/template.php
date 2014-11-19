<?php

	$logged = $this->session->userdata('logged');
	
	$this->load->view("template/header");

	$this->load->view("template/menu");

	if(!isset($logged) || $logged != true)
		$this->load->view("template/login");	
	else
		$this->load->view("template/logout");
			

	$this->load->view($main_content);

	$this->load->view("template/footer");

?>