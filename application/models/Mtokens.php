<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mtokens extends CI_Model
{
	public $data = array();
	protected $table = "tokens";

	public function __construct(){
		parent::__construct();
	}

	public function set_data($post_array){
		$this->data = $post_array;
	}

	public function is_valid(){
		$result = true;
		if(!isset($this->data['utype']) || empty($this->data['utype'])){
			$result = false;
		}

		if(!isset($this->data['user_id']) || empty($this->data['user_id'])){
			$result = false;
		}

		if(!isset($this->data['vars']) || empty($this->data['vars'])){
			$result = false;
		}

		return $result;
	}

	public function create(){

		$clinic_id = trim($this->mmodel->getGUID(), '{}');
		$date = date("Y-m-d H:i:s");
        $this->data['id'] = $clinic_id;
        $this->data['created'] = $date;

        $this->mmodel->insert($this->table, $this->data);
        return ($this->db->affected_rows() > 0);
	}

	public function get($token_id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $token_id);
        return $this->db->get()->row();
	}

	public function consume($token_id, $token=null){

		if(is_null($token) ){
			$token = $this->get($token_id);
		}

		$token->uses += 1;
		$this->db->where('id', $token->id);
		$this->db->update($this->table, $token);

		return ($this->db->affected_rows() > 0);
	}
}