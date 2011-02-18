<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Downloads extends CI_Controller {

	function __construct()
	{
		parent::__construct();
 session_start();

	if ($_SESSION['userid'] < 1){
    	redirect('wrzcms/login','refresh');
    }
                $this->load->model('wrzcms_posts');
                $this->load->model('wrzcms_category');
                $this->load->helper('typography');
                $this->load->helper('url');
                $this->load->library('session');
                $this->load->library('pagination');
                $this->load->library('parser');
	}


	function index()
	{
               $config['index'] = $this->wrzcms_posts->getAllPosts();
               $lol = base_url()."wrzcms/more";
               $config['base_url'] = "$lol";
               $config['total_rows'] = $this->db->count_all('posts');
               $config['per_page'] = '10';
               $this->pagination->initialize($config); 
	       $this->load->view('wrzcms_index',$config);
	}

  function create(){
   	if ($this->input->post('title')){
  		$this->wrzcms_posts->addPost();
  		$this->session->set_flashdata('message','Post created');
  		redirect('wrzcms','refresh');
  	}else{
		$data['title'] = "Add Warez";
		$data['wareztype'] = $this->wrzcms_category->warezMenu();
		$this->load->view('scherzo/admin/admin_posts_create',$data);    
	} 
      }

  function edit($id=0){
//the worst way :P , has to be updated 
  	if ($this->input->post('title')){
  		$this->wrzcms_posts->editPost();
  		$this->session->set_flashdata('message','Post updated');
  		redirect('admin/posts/index','refresh');
  	}else{
		//$id = $this->uri->segment(4);
		$data['title'] = "Edit Post";
		$data['post'] = $this->wrzcms_posts->getWarez($id);
		$data['cats']  = $this->wrzcms_category->getWarezType();
		$this->load->vars($data);
		$this->load->view('dashboard');    
	}
  }

 function delete($id){
	$id = $this->uri->segment(4);
	$this->wrzcms_posts->deletePost($id);
	$this->session->set_flashdata('message','Post deleted');
	redirect('hood/downloads/index','refresh');
  }


}
