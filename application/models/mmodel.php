<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Created by PhpStorm.
 * User: Buddhimal Gunasekara
 * Date: 9/25/2019
 * Time: 10:20 PM
 */
class MModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function query($query)
    {
        return $this->db->query($query);
    }


    public function add_client($post_data)
    {
        $res = $this->db->query("SELECT * FROM sirikatha_client WHERE client_id='" . $post_data['client_id'] . "'");
        if ($res->num_rows() == 0)
            $this->db->insert('sirikatha_client', $post_data);
        return true;
    }

    public function update_client($post_data, $id)
    {
//        $res = $this->db->query("SELECT * FROM sirikatha_client WHERE client_id='" . $post_data['client_id'] . "'");
//        if ($res->num_rows() == 0)
        $this->db->set($post_data);
        $this->db->where('id', $id);
        $this->db->update('sirikatha_client');
        return true;
    }

    public function add_client_group($post_data)
    {
        $res = $this->db->query("SELECT * FROM sirikatha_loan_group WHERE group_id='" . $post_data['group_id'] . "'");
        if ($res->num_rows() == 0) {
            $group_data['group_id'] = $post_data['group_id'];
            $group_data['group_name'] = $post_data['group_name'];

            $this->db->insert('sirikatha_loan_group', $group_data);
            $grp_id = $this->db->insert_id();

            $row = 0;
            foreach ($post_data['client'] as $grp_client) {
                $grp_client_data['sirikatha_loan_group_id'] = $grp_id;
                $grp_client_data['sirikatha_client_id'] = $grp_client;
                $grp_client_data['line_loc'] = ++$row;
                $this->db->insert('sirikatha_loan_group_client', $grp_client_data);
            }
        }

//        var_dump($post_data);
//        die();
//        $res = $this->db->query("SELECT * FROM sirikatha_client WHERE client_id='" . $post_data['client_id'] . "'");
//        if ($res->num_rows() == 0)
//            $this->db->insert('sirikatha_client', $post_data);
        return true;
    }

    public function select_client_details()
    {
        return $this->db->query('CALL sp_getClientDetails(?)', array(''));
    }


    public function generate_client_number()
    {
        $this->db->select("id");
        $this->db->from("sirikatha_client");
        $this->db->limit(1);
        $this->db->order_by('id', "DESC");
        $result = $this->db->get();
        if ($result->num_rows() == 0)
            $rowcount = 0;
        else {
            $rowcount = $result->row()->id;
        }
        $rowcount++;
        if ($rowcount < 10) $client_number = "SIRIKATHA0000" . $rowcount;
        else if ($rowcount < 100) $client_number = "SIRIKATHA000" . $rowcount;
        else if ($rowcount < 1000) $client_number = "SIRIKATHA00" . $rowcount;
        else if ($rowcount < 10000) $client_number = "SIRIKATHA0" . $rowcount;
        else $client_number = "SIRIKATHA" . $client_number;


        return $client_number;
    }

    public function generate_group_number()
    {
        $this->db->select("id");
        $this->db->from("sirikatha_loan_group");
        $this->db->limit(1);
        $this->db->order_by('id', "DESC");
        $result = $this->db->get();
        if ($result->num_rows() == 0)
            $rowcount = 0;
        else {
            $rowcount = $result->row()->id;
        }
        $rowcount++;
        if ($rowcount < 10) $group_number = "GRP0000" . $rowcount;
        else if ($rowcount < 100) $group_number = "GRP000" . $rowcount;
        else if ($rowcount < 1000) $group_number = "GRP00" . $rowcount;
        else if ($rowcount < 10000) $group_number = "GRP0" . $rowcount;
        else $group_number = "GRP" . $group_number;


        return $group_number;
    }

    public function generate_loan_number()
    {
        $this->db->select("id");
        $this->db->from("sirikatha_loan");
        $this->db->limit(1);
        $this->db->order_by('id', "DESC");
        $result = $this->db->get();
        if ($result->num_rows() == 0)
            $rowcount = 0;
        else {
            $rowcount = $result->row()->id;
        }
        $rowcount++;
        if ($rowcount < 10) $group_number = "LOAN0000" . $rowcount;
        else if ($rowcount < 100) $group_number = "LOAN000" . $rowcount;
        else if ($rowcount < 1000) $group_number = "LOAN00" . $rowcount;
        else if ($rowcount < 10000) $group_number = "LOAN0" . $rowcount;
        else $group_number = "LOAN" . $group_number;


        return $group_number;
    }

    public function select_available_group_members()
    {
        return $this->db->query("SELECT
                                    c.id,
                                    c.client_id,
                                    c.client_name 
                                FROM
                                    sirikatha_client AS c 
                                WHERE
                                    NOT EXISTS (
                                    SELECT
                                        sirikatha_client_id 
                                    FROM
                                        sirikatha_loan_group_client lgc
                                        INNER JOIN sirikatha_loan_group AS lg ON lg.id = lgc.sirikatha_loan_group_id 
                                    WHERE
                                        c.id = sirikatha_client_id 
                                        AND lg.active_status = 1 
                                    ) 
                                    AND c.active_status = 1");
    }

    public function select_available_groups()
    {
        return $this->db->query("SELECT
                                    lg.id,
                                    lg.group_id,
                                    lg.group_name 
                                FROM
                                    sirikatha_loan_group AS lg 
                                WHERE
                                    lg.active_status = 1");
    }


}