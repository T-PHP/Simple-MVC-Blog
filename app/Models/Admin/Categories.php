<?php 
namespace Models\Admin;
 
use Core\Model;

class Categories extends Model {
    
    public function get_all_categories(){
		return $this->db->select("
            SELECT 
                * 
            FROM 
                ".PREFIX."categories 
            ORDER BY 
                category_name
        ");
	}
    
	public function get_categories(){
		return $this->db->select("
            SELECT 
                * 
            FROM 
                ".PREFIX."categories 
            WHERE 
                category_id_parent = 0
            ORDER BY 
                category_name
        ");
	}

    public function get_sub_categories($id){
		return $this->db->select("
            SELECT 
                * 
            FROM 
                ".PREFIX."categories 
            WHERE 
                category_id_parent = :id
            ORDER BY 
                category_name
        ",array(':id' => $id));
	}
    
	public function get_category($id){
		return $this->db->select("SELECT * FROM ".PREFIX."categories WHERE category_id = :id",array(':id' => $id));
	}
    
	public function insert_category($data){
		$this->db->insert(PREFIX."categories",$data);
	}

	public function update_category($data,$where){
		$this->db->update(PREFIX."categories",$data, $where);
	}

}