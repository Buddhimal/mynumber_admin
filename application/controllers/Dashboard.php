<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('mmodel');
		$this->load->model('user/muser');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url'  => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

	public function index1()
	{
		$this->load->view('header');
		$object['controller'] = $this;
		$object['active_tab'] = "Dashboard";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function index()
	{



		$this->load->view('header');
		$object['controller'] = $this;
		$object['active_tab'] = "Dashboard";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');



		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function add_new_client()
	{
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {
			$post_data = $this->input->post();

			if ($post_data['monthly_income'] == '')
				unset($post_data['monthly_income']);
			if ($post_data['steward_income'] == '')
				unset($post_data['steward_income']);
			if ($post_data['number_of_family_members'] == '')
				unset($post_data['number_of_family_members']);
			if ($post_data['loan_amount'] == '')
				unset($post_data['loan_amount']);
//            if ($post_data['other_income_monthly'] == '')
//                unset($post_data['other_income_monthly']);
			if ($post_data['business_monthly_income'] == '')
				unset($post_data['business_monthly_income']);
			if ($post_data['business_monthly_outcome'] == '')
				unset($post_data['business_monthly_outcome']);
			if ($post_data['business_profit'] == '')
				unset($post_data['business_profit']);

			if ($this->mmodel->add_client($post_data)) {
				$link = "<a href=" . base_url() . "index.php/client_list>   Click to Client List</a>";

				$data['msg'] = "User (" . $post_data['client_name'] . ") Successfully Updated " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}

		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "add_new_client";
		$this->load->view('top_menu', $object);
		$data['client_number'] = $this->mmodel->generate_client_number();
		$this->load->view('client/add_new_client', $data);
		$this->load->view('footer');
	}

	public function update_client()
	{
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {
			$post_data = $this->input->post();

//            var_dump($post_data);
//            die();

			$client_id = $post_data['id'];

			unset($post_data['id']);
			unset($post_data['client_id']);

			if ($post_data['monthly_income'] == '')
				unset($post_data['monthly_income']);
			if ($post_data['steward_income'] == '')
				unset($post_data['steward_income']);
			if ($post_data['number_of_family_members'] == '')
				unset($post_data['number_of_family_members']);
			if ($post_data['loan_amount'] == '')
				unset($post_data['loan_amount']);
			if ($post_data['other_income_monthly'] == '')
				unset($post_data['other_income_monthly']);
			if ($post_data['business_monthly_income'] == '')
				unset($post_data['business_monthly_income']);
			if ($post_data['business_monthly_outcome'] == '')
				unset($post_data['business_monthly_outcome']);
			if ($post_data['business_profit'] == '')
				unset($post_data['business_profit']);

			if ($this->mmodel->update_client($post_data, $client_id)) {
				$link = "<a href=" . base_url() . "index.php/client_list>   Click to Client List</a>";

				$data['msg'] = "User (" . $post_data['client_name'] . ") Successfully Updated " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$this->client_profile($client_id);

//        $this->load->view('header');
//        $this->load->view('top_header');
//        $this->load->view('top_menu');
//        $data['client_number'] = $this->mmodel->generate_client_number();
//        $this->load->view('client/add_new_client', $data);
//        $this->load->view('footer');
	}


	public function client_list()
	{
		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "client_list";
		$this->load->view('top_menu', $object);
		$data['client_details'] = $this->mmodel->select_client_details();
		$this->load->view('client/client_list', $data);
//        $this->load->view('client/client_list');
		$this->load->view('footer');
	}

	public function client_profile($c_id = '')
	{
		if ($c_id == '')
			$client_id = base64_decode($this->input->get_post('client_id'));
		else
			$client_id = $c_id;
		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "client_list";
		$this->load->view('top_menu', $object);
		$data['client_data'] = $this->mmodel->query("Select * from sirikatha_client where id=" . $client_id . " ");
		$this->load->view('client/client_profile', $data);
		$this->load->view('footer');
	}

	public function edit_client()
	{
		$client_id = base64_decode($this->input->get_post('client_id'));
		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "add_new_client";
		$this->load->view('top_menu', $object);
		$data['client_data'] = $this->mmodel->query("Select * from sirikatha_client where id=" . $client_id . " ");
		$this->load->view('client/edit_client', $data);
		$this->load->view('footer');
	}

	public function inactive_client()
	{
		$client_id = base64_decode($this->input->get_post('client_id'));
	}

	public function blacklist_client()
	{
		$client_id = $this->input->get_post('client_pk');
		$loan_id = $this->input->get_post('loan_pk');
		$reason = $this->input->get_post('reason');


	}


	public function client_group()
	{
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {
			$post_data = $this->input->post();
			if ($this->mmodel->add_client_group($post_data)) {
				$link = "<a href=" . base_url() . "index.php/group_list>   Click to Group List</a>";

				$data['msg'] = "Group (" . $post_data['group_name'] . ") Successfully Updated " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}

		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "client_group";
		$this->load->view('top_menu', $object);
		$data['client_number'] = $this->mmodel->generate_group_number();
		$data['client_names'] = $this->mmodel->select_available_group_members();
		$this->load->view('client/add_client_group', $data);
		$this->load->view('footer');
	}


	public function group_list()
	{
		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "group_list";
		$this->load->view('top_menu', $object);
		$data['group_data'] = $this->db->query('CALL SP_GetUserGroupInfo');
		$this->load->view('client/group_list', $data);
		$this->load->view('footer');
	}

	public function testing_controller()
	{
		$data = "4444";
		echo json_encode($data);
	}


	public function new_loan()
	{
		$return_data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$loan_id = $this->input->get_post('loan_id');
			$group_id = $this->input->get_post('group_id');
			$client_id = $this->input->get_post('client_id');
			$client_level = $this->input->get_post('client_level');
			$loan_type_id = $this->input->get_post('loan_type_id');
			$loan_date = $this->input->get_post('loan-date');
			$loan_amount = str_replace(',', '', $this->input->get_post('loan_amount'));
			$loan_installment = str_replace(',', '', $this->input->get_post('loan_installment'));
			$no_of_installment = str_replace(',', '', $this->input->get_post('no_of_installment'));
			$first_installment = $this->input->get_post('first_installment');
			$last_installment = $this->input->get_post('last_installment');
			$total_amount = str_replace(',', '', $this->input->get_post('total_amount'));


			$data['loan_id'] = $loan_id;
			$data['user_group_id'] = $group_id;
			$data['client_id'] = $client_id;
			$data['client_level'] = $client_level;
			$data['loan_type_id'] = $loan_type_id;
			$data['loan_amount'] = $loan_amount;
			$data['number_of_installments'] = $no_of_installment;
			$data['first_installment_date'] = date("Y-m-d", strtotime($first_installment));
			$data['loan_end_date'] = date("Y-m-d", strtotime($last_installment));
			$data['installment_amount'] = $loan_installment;
			$data['payable_amount'] = $total_amount;
			$data['loan_date'] = date("Y-m-d", strtotime($loan_date));
			$data['created_by'] = $this->session->userdata('name');

			$res = $this->db->query("select * from sirikatha_loan where loan_id='" . $loan_id . "'");
			if ($res->num_rows() == 0) {
				$this->db->insert('sirikatha_loan', $data);
				$link = "<a href=" . base_url() . "index.php/loan_list>   Click to loan List</a>";

				$return_data['msg'] = "Loan (" . $loan_id . ") Successfully Created " . $link . "";
				$return_data['class_alert'] = "alert-success";
			}


//            $post_data = $this->input->post();
//            if ($this->mmodel->add_client_group($post_data)) {
//                $link = "<a href=" . base_url() . "index.php/loan_list>   Click to loan List</a>";
//
//                $data['msg'] = "Loan (" . $post_data['group_name'] . ") Successfully Updated " . $link . "";
//                $data['class_alert'] = "alert-success";
//            }
		}

		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "add_new_loan";
		$this->load->view('top_menu', $object);
		$return_data['loan_number'] = $this->mmodel->generate_loan_number();
		$return_data['group_names'] = $this->mmodel->select_available_groups();
		$return_data['loan_types'] = $this->db->query('SELECT id,loan_name,loan_amount AS amount FROM sirikatha_loan_type where  active_status=1');
		$this->load->view('loan/set_loan', $return_data);
		$this->load->view('footer');
	}

	public function select_clients_for_group()
	{
		$group_id = $this->input->get_post('group_id');
		$result = $this->db->query("SELECT
                                        sp.id,
                                        sp.client_id,
                                        sp.client_name,
                                        SUM( active_loans ) AS active_loans 
                                    FROM
                                        (
                                        SELECT
                                            sirikatha_client.id,
                                            sirikatha_client.client_id,
                                            sirikatha_client.client_name,
                                            ( CASE WHEN l.loan_status = 'ACTIVE' OR l.loan_status = 'BLACKLISTED' THEN 1 ELSE 0 END ) AS active_loans 
                                        FROM
                                            sirikatha_loan_group_client AS cgc
                                            INNER JOIN sirikatha_client ON sirikatha_client.id = cgc.sirikatha_client_id
                                            LEFT JOIN sirikatha_loan AS l ON l.client_id = sirikatha_client.id 
                                        WHERE
                                            cgc.sirikatha_loan_group_id = $group_id
                                        ) sp                                     
                                    GROUP BY
                                        id,
                                        client_id,
                                        client_name                                        
                                    HAVING
                                        SUM( active_loans )= 0 ");

		$client_arr = array();

		foreach ($result->result() as $client) {

			$client_id = $client->client_id;
			$name = $client->client_name;

			$client_arr[] = array("id" => $client->id, "client_id" => $client_id, "name" => $name);
		}

		echo json_encode($client_arr);

	}

	public function select_client_level()
	{
		$client_id = $this->input->get_post('client_id');

		$res = $this->db->query("Select COUNT(id) as loan_level From sirikatha_loan where client_id=$client_id AND loan_status='FINISHED'");

		$data['loan_level'] = $res->row()->loan_level;

		echo json_encode($data);


	}

	public function select_loan_details()
	{
		$loan_type_id = $this->input->get_post('loan_type_id');

		$res = $this->db->query("Select * From sirikatha_loan_type where id=$loan_type_id AND active_status=1");

		$data['loan_amount'] = $res->row()->loan_amount;
		$data['instalment_amount'] = $res->row()->instalment_amount;
		$data['numbe_of_installments'] = $res->row()->numbe_of_installments;

		echo json_encode($data);


	}


	public function loan_list()
	{
		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "loan_list";
		$this->load->view('top_menu', $object);

		if (empty($this->input->get_post('loan_type_id'))) {
			$loan_type_id = '';
		} else
			$loan_type_id = $this->input->get_post('loan_type_id');

//        var_dump($loan_type_id);
//        die();

//        $data['loan_details'] = $this->db->query('CALL sp_getLoanDetails');
		$data['loan_details'] = $this->db->query('CALL sp_getLoanDetails(?,?)', array('',$loan_type_id));

		$this->load->view('loan/loan_list', $data);
		$this->load->view('footer');
	}


	public function add_payment()
	{

		$loan_id = base64_decode($this->input->get_post('loan_id'));


//        $res = $this->db->query("SELECT
//                                    l.id,
//                                    l.loan_id,
//                                    c.client_id,
//                                    c.client_name,
//                                    UPPER(lt.loan_name ) loan_name,
//                                    CAST(l.loan_date AS DATE) loan_date,
//                                    l.loan_amount,
//                                    l.installment_amount,
//                                    l.number_of_installments,
//                                    CAST(l.loan_end_date AS DATE) loan_end_date,
//                                    l.payable_amount,
//                                    l.loan_status,
//                                    CAST(l.last_paid_date AS DATE) last_paid_date,
//                                    l.total_paid_amount
//                                FROM
//                                    sirikatha_loan AS l
//                                    INNER JOIN sirikatha_client AS c ON l.client_id = c.id
//                                    INNER JOIN sirikatha_loan_type AS lt ON l.loan_type_id = lt.id
//                                WHERE l.id=$loan_id");

//        $res = $this->db->query("CALL sp_getLoanDetails");
		$res = $result = $this->db->query('CALL sp_getLoanDetails(?,?)', array($loan_id,''));

		$data['loan_details'] = $res;


		$this->load->view('header');
		$this->load->view('top_header');
		$object['controller'] = $this;
		$object['active_tab'] = "loan_list";
		$this->load->view('top_menu', $object);
		$this->load->view('loan/make_payment', $data);
		$this->load->view('footer');
	}

}
