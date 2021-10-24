<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Created by PhpStorm.
 * User: Buddhimal Gunasekara
 * Date: 9/25/2019
 * Time: 10:20 PM
 */
class Mmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function query($query)
    {
        return $this->db->query($query);
    }

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function select_all($table)
	{
		$res = $this->db->select('*')->from($table)->get();
		return $res;
	}

	public function select_where($table, $where)
	{
		$res = $this->db->select('*')->from($table)->where($where)->get();
		return $res;
	}

	public function delete_where($table, $column, $value)
	{
		$this->db->where($column, $value);
		$this->db->delete($table);
	}

	public function update_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);

		return true;
	}

    public function getGUID()
    {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                . substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12)
                . chr(125);// "}"
            return $uuid;
        }
    }

}
