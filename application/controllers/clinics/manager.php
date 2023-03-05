<?php
defined('BASEPATH') or exit('No direct script access allowed');

class manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/muser');
        $this->load->model('user/mlogin');
        // $this->load->model('mloging');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url'  => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
    }

    public function index(){

    	$this->load->view('header');
		$object['controller'] = $this;
		$object['active_main_tab'] = "Administration";
		$object['active_tab'] = "clinic_list";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');

    }

}
