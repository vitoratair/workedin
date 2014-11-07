<?php

	$this->load->view("template/header");

	$this->load->view("template/menu");

	$this->load->view("template/login_logout");

	$this->load->view($main_content);

	$this->load->view("template/footer");

?>