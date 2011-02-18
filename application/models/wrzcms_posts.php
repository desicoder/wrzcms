<?
class Wrzcms_posts extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

 function getIndexPosts(){
     $data = array();
     $this->db->where('status', 'published');
    $this->db->order_by("pubdate", "desc"); 
     $query = $this->db->get('posts',10);
     if ($query->num_rows() > 0){
       foreach ($query->result_array() as $row){
         $data[] = $row;
       }
    }
    return $data; 
 }

 function getAllPosts(){
     $data = array();
    $this->db->order_by("pubdate", "desc"); 
     $query = $this->db->get('posts',10);
     if ($query->num_rows() > 0){
       foreach ($query->result_array() as $row){
         $data[] = $row;
       }
    }
    return $data; 
 }


 function getPage($x){
     $data = array();
     $this->db->where('status', 'published');
    $this->db->order_by("pubdate", "desc"); 
     $query = $this->db->get('posts',10,$x);
     if ($query->num_rows() > 0){
       foreach ($query->result_array() as $row){
         $data[] = $row;
       }
    }
    return $data; 
 }


function getWarez($id){
    $data = array();
    $this->db->where('permaurl',$id);
    $this->db->limit(1);
    $query = $this->db->get('posts');
    if ($query->num_rows() > 0){
      $data = $query->row_array();
    }
    return $data;    
 }


function addPost(){
$title = $this->input->post('title');
$permaurl = url_title($title);
$tags = $this->input->post('tags');
$status =  $this->input->post('status');
$body =  $this->input->post('body');
$file =  $this->input->post('body2');
$category_id =  $this->input->post('category_id');
$date = date('Y-m-d H:i:s');
$this->db->set('title', $title);
$this->db->set('permaurl' , $permaurl);
$this->db->set('tags', $tags);
$this->db->set('status', $status);
$this->db->set('body', $body);
$this->db->set('filehosts', $file);
$this->db->set('category_id', $category_id);
$this->db->set('pubdate', $date);
$this->db->insert('posts');
}


 function editPost(){
	$data = array( 
		'title' => $this->input->post('title'),
		'tags' => $this->input->post('tags'),
		'status' => $this->input->post('status'),
		'body' => $this->input->post('body'),
		'category_id' => $this->input->post('category_id'),
		'user_id' => $_SESSION['userid']

	);

 	$this->db->where('id', $this->input->post('id'));
	$this->db->update('posts', $data);	
 
 }


 function deleteWarez($id){
 	$this->db->where('id', $id);
	$this->db->delete('posts');	
 }




}
?>
