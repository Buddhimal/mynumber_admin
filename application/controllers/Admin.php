<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mmodel');
        $this->load->model('user/muser');
        $this->load->model('mclinic');

        if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url'  => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}


	public function clinic_list()
	{
		$this->load->view('header');
		$object['controller'] = $this;
		$object['active_main_tab'] = "Clinics";
		$object['active_tab'] = "clinic_list";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');

        $data['clinic_list'] = $this->mclinic->get_all();

		$this->load->view('clinic/clinic_list',$data);
		$this->load->view('footer');
	}

}
