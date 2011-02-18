<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wrzcms_users extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }



	function verifyme($user,$pass){
		$this->db->select('id,username');
		$this->db->where('username',$user);
		$this->db->where('password', sha1($pass));
		$this->db->where('status', 'active');
		$this->db->limit(1);
		$query = $this->db->get('users');
		$this->session->set_userdata('lastquery', $this->db->last_query());
		if ($query->num_rows() > 0){
			$row = $query->row_array();
			return $row;
		}else{
			$this->session->set_flashdata('error', 'OMG OMG OMG ! WTF WTF WTF !');	
			return array();
		}		
	}

}
