<?php 
namespace Models\Admin;
 
use Core\Model;

class Posts extends Model {

	public function get_posts(){
		return $this->db->select("
            SELECT 
                * 
            FROM 
                ".PREFIX."posts
            ORDER BY 
                post_name
        ");
	}
    
	public function get_post($id){
		return $this->db->select("SELECT * FROM ".PREFIX."posts WHERE post_id = :id",array(':id' => $id));
	}
    
	public function insert_post($data){
		$this->db->insert(PREFIX."posts",$data);
	}

	public function update_post($data,$where){
		$this->db->update(PREFIX."posts",$data, $where);
	}

}