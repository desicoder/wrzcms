<?
class Wrzcms_category extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

 function warezMenu(){
     $data = array();
     $this->db->select('id,name');
     $query = $this->db->get('categories');
     if ($query->num_rows() > 0){
       foreach ($query->result_array() as $row){
         $data[$row['id']] = $row['name'];
       }
    }
    return $data; 
 }

 function delCat($id){
 	$data = array('status' => 'inactive');
 	$this->db->where('id', $id);
	$this->db->update('categories', $data);	
 }

function getCat($id){
    $data = array();
    $options = array('id' => $id);
    $query = $this->db->getwhere('categories',$options,1);
    if ($query->num_rows() > 0){
      $data = $query->row_array();
    }
    return $data;    
 }


 function getAllCats(){
     $data = array();
     $query = $this->db->get('categories');
     if ($query->num_rows() > 0){
       foreach ($query->result_array() as $row){
         $data[] = $row;
       }
    }
    return $data; 
 }

function itToCat($id){
$lol=$this->db->select('name')->from('categories')->where('id', $id);
}


}
