<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wrzcms extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    session_start();
                $this->load->model('wrzcms_posts');
                $this->load->model('wrzcms_category');
                $this->load->model('wrzcms_users');
                $this->load->helper('typography');
                $this->load->helper('url');
                $this->load->helper('html');
                $this->load->library('session');
                $this->load->library('pagination');
                $this->load->library('parser');
	}

	function index()
	{
               $config['maintitle'] = "WrzCMS Alpha Release";
               $config['maindescription'] = "WrzCMS";
               $config['index'] = $this->wrzcms_posts->getIndexPosts();
               $config['cats'] = $this->wrzcms_category->getAllCats();
               $config['cat'] = $this->wrzcms_posts->getIndexPosts();
               $lol = base_url()."morewarez";
               $config['base_url'] = "$lol";
               $config['total_rows'] = $this->db->count_all('posts');
               $config['per_page'] = '10';
               $this->pagination->initialize($config); 
               $this->parser->parse('scherzo/index',$config);
               // just tired the parsing class :D
	      // $this->load->view('scherzo/index',$config);
	}



	function morewarez($x)
	{
                $x=$this->uri->segment(2);
                $config['cats'] = $this->wrzcms_category->getAllCats();
                $config['maintitle'] = "WrzCMS Alpha Release";
                $config['maindescription'] = "WrzCMS";
                $config['index'] = $this->wrzcms_posts->getPage($x);
                $page = base_url()."morewarez";
                $config['base_url'] = "$page";
                $config['total_rows'] = $this->db->count_all('posts');
                $config['per_page'] = '10';
                $this->pagination->initialize($config);
               $this->parser->parse('scherzo/index',$config);
	}

        function download($id)
        {
         $data['maintitle'] = "WrzCMS Alpha Release";
         $data['maindescription'] = "WrzCMS";
         $data['cats'] = $this->wrzcms_category->getAllCats();
	 $data['post'] = $this->wrzcms_posts->getWarez($id);
	 $this->load->view('scherzo/single',$data);  
  
        }

        function login()
        {
        $data['maintitle'] = "WrzCMS Alpha Release";
	$this->load->view('scherzo/login',$data);  
        }
        
       function verify(){
  	$this->load->library('encrypt');
	if ($this->input->post('username')){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$row = $this->wrzcms_users->verifyme($user,$pass);
		if (count($row)){
			$_SESSION['userid'] = $row['id'];
			redirect('hood/downloads/create','refresh');
		}else{
			redirect('wrzcms/login','refresh');
		}
	}else{
		redirect('wrzcms/login','refresh');
	}  
   
  }   
  

       
}



/* End of file wrzcms.php */
/* Location: ./application/controllers/wrzcms.php */
