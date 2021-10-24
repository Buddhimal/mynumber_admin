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
		$this->load->model('mlocations');
		$this->load->library('upload');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

	private function set_flash_data($msg, $alert_type = "alert-success")
	{
		$this->session->set_flashdata('msg', $msg);
		$this->session->set_flashdata('alert_type', $alert_type);
	}

	private function json_formatter($data, $status = true, $msg = "")
	{
		$array_sending = array(
			'status' => $status,
			'data' => $data,
			'msg' => $msg
		);
		echo json_encode($array_sending);
	}

	public function clinic_list()
	{
		$this->load->view('header');
		$data['clinic_list'] = $this->mclinic->get_all();
		$this->load->view('clinic/clinic_list', $data);
		$this->load->view('footer');
	}


	public function manager_list()
	{
		$this->load->view('header');
		$data['clinic_list'] = $this->mclinic->get_all();
		$this->load->view('managers/manager_list', $data);
		$this->load->view('footer');
	}

	public function new_manager()
	{
		$this->load->view('header');
		$data['clinic_list'] = $this->mclinic->get_all();
		$this->load->view('managers/manager', $data);
		$this->load->view('footer');
	}

	public function verify_clinic()
	{

		$clinic_id = $this->input->get_post('clinic_id');
		if ($this->mclinic->verify_clinic($clinic_id))
			echo json_encode("success " . $clinic_id);
	}

	public function clinic_profile()
	{
		$clinic_id = $this->input->get('clinic_id');

		$this->load->view('header');
		$data['clinic'] = $this->mclinic->get($clinic_id);
		$data['location'] = $this->mlocations->get($data['clinic']->location_id);
		$this->load->view('clinic/clinic_profile', $data);
		$this->load->view('footer');
	}

	public function update_consultant_image()
	{
		$this->load->view('header');
		$this->load->view('image_upload/consultant');
		$this->load->view('footer');
	}

	public function update_patient_image()
	{
		$this->load->view('header');
		$this->load->view('image_upload/patient');
		$this->load->view('footer');
	}

	public function save_manager(){
		$post_data = $this->input->post();

		$file1_name = "";
		$file2_name = "";
		$file3_name = "";

		$imageExtention = pathinfo($_FILES["nic_front"]["name"], PATHINFO_EXTENSION);
//		echo $imageExtention;

		$config['upload_path'] = realpath(APPPATH . '../uploads');;
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;

		if (($_FILES['nic_front']["name"])) {
			$file1_name = time() . '_nic_front.' . pathinfo($_FILES["nic_front"]["name"], PATHINFO_EXTENSION);
			$config['file_name'] = $file1_name;
			$this->upload->initialize($config);
			$this->upload->do_upload('nic_front');
		}

		if (($_FILES['nic_back']["name"])) {
			$file2_name = time() . '_nic_back.' . pathinfo($_FILES["nic_back"]["name"], PATHINFO_EXTENSION);
			$config['file_name'] = $file2_name;
			$this->upload->initialize($config);
			$this->upload->do_upload('nic_back');
		}

		if (($_FILES['agreement']["name"])) {
			$file1_name = time() . '_agreement.' . pathinfo($_FILES["agreement"]["name"], PATHINFO_EXTENSION);
			$config['agreement'] = $file1_name;
			$this->upload->initialize($config);
			$this->upload->do_upload('agreement');
		}

		$post_data["id"] = trim($this->mmodel->getGUID(), '{}');;
		$post_data["nic_front"] = $file1_name;
		$post_data["nic_back"] = $file2_name;
		$post_data["agreement"] = $file3_name;
		$post_data["updated"] = date("Y-m-d H:i:s");
		$post_data["created"] = date("Y-m-d H:i:s");
		$post_data["updated_by"] = $this->session->userdata('user_id');
		$post_data["created_by"] = $this->session->userdata('user_id');

		if ($this->mmodel->insert('sales_persons', $post_data)) {
			$this->set_flash_data("New Manager Created Successfully");
		} else {
			$this->set_flash_data("Failed to add new manager", "alert-danger");

		}
		redirect('managers');
	}

}
