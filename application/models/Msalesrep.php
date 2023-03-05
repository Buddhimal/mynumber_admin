<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//require_once(APPPATH . 'entities/EntityClinic.php');

class Msalesrep extends CI_Model
{
    public $validation_errors = array();
    private $post = array();
    protected $table = "sales_persons";

    function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidation');

    }

    public function set_data($post_array){
    	//
    }

    public function is_valid()
	{
		$result = true;

		/*
		 Validation logics goes here
		*/

		return $result;
	}

	public function get_managers(){

		return $this->db->select(
			'id, salutation, first_name, last_name, nic, address, phone, 
			email, nic_front, nic_back, agreement, has_email_verified, 
			updated, created, updated_by, created_by'
		)->from(
			$this->table
		)->where(
			array('is_deleted'=> 0, 'is_active' => true, 'is_manager' => true)
		)->get();
	}
}