<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mmodel');
		$this->load->model('user/muser');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url'  => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url('login'));
		}
	}


	public function index()
	{
		$this->load->view('header');
		$object['controller'] = $this;
		$object['active_tab'] = "Dashboard";
		$this->load->view('top_header',$object);
//		$this->load->view('side_menu');

		$this->load->view('dashboard');
		$this->load->view('footer');
	}

}
