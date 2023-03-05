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
		$this->load->model('msalesrep', 'salesreps');
		$this->load->model('mlocations');
		$this->load->model('Mcommunicatoremailqueue', 'memail');
		$this->load->model('mtokens', 'token');

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
		$data['managers'] = $this->salesreps->get_managers();
		$this->load->view('managers/manager_list', $data);
		$this->load->view('footer');
	}

	public function new_manager()
	{
		$this->load->view('header');
		$this->load->view('managers/manager');
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

		$now = date("Y-m-d H:i:s");

		$imageExtention = pathinfo($_FILES["nic_front"]["name"], PATHINFO_EXTENSION);
		// echo $imageExtention;

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

		$post_data["id"] = trim($this->mmodel->getGUID(), '{}');
		$post_data["nic_front"] = $file1_name;
		$post_data["nic_back"] = $file2_name;
		$post_data["agreement"] = $file3_name;
		$post_data["updated"] = $now ;
		$post_data["created"] = $now ;
		$post_data['manager'] = $this->mmodel->getEmptyGUID();
		$post_data['is_manager'] = true;
		$post_data["updated_by"] = $this->session->userdata('user_id');
		$post_data["created_by"] = $this->session->userdata('user_id');

		if ( $this->mmodel->insert('sales_persons', $post_data) > 0 ) {

			// create a login for the sales staf
			$login_data['id'] =  trim($this->mmodel->getGUID(), '{}');
			$login_data['entity_id'] = $post_data['id'];
			$login_data['username'] = $post_data['email'];
			$login_data['mobile'] = $post_data['phone'];
			$login_data['entity_type'] = EntityType::SalesRep;
			$login_data['is_confirmed'] = false;
			$login_data['is_deleted'] = false;
			$login_data['is_active'] = false;
			$login_data['updated'] = $now ;
			$login_data['created'] = $now ;
			$login_data['updated_by'] = $this->session->userdata('user_id');
			$login_data['created_by'] = $this->session->userdata('user_id');
			
			if( $this->mmodel->insert('muliti_user_login', $login_data)) {
				// write an Email to the manager
				$token_data = array(
	                'utype' => EntityType::SalesRep,
	                'user_id' => $login_data['id'],// sales_persons.id
	                'vars' => md5($post_data['email'])
	            );

	            $this->token->set_data($token_data);
	            if($this->token->is_valid()){

	                $this->token->create();

	                //create email record: clinic welcome
	                $email_data['sender_name'] = EmailSender::mynumber_info;
	                $email_data['send_to'] = $post_data['email'];
	                $email_data['send_schedule'] = date("Y-m-d H:i:s", strtotime("-1 sec"));
	                $email_data['template_id'] = EmailTemplate::add_manager;
	                $email_data['email_type_id'] = EmailType::reps;
	                
	                $vars['##NAME##'] = sprintf("%s %s", $post_data['first_name'], $post_Data['last_name']);
	                $vars['##SUBJECT##'] = "Welcome on Board";
	                $vars['##EMAILVERIFICATION_URL##'] = EmailConfigs::verification_url($this->token->data['id']);

	                $email_data['content'] = json_encode($vars);
	                $this->memail->set_data($email_data);
	                $this->memail->create();
	            }

				$this->set_flash_data("New Manager Created Successfully");	
			}else{
				$this->set_flash_data("Failed create login for the manager", "alert-warning");
			}

		} else {
			$this->set_flash_data(print_r($this->mmodel->the_error,true), "alert-danger");
		}

		redirect('managers');
	}

}
