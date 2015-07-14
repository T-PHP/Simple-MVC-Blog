<?php 
namespace Models\Admin;
 
use Core\Model;

class Members extends Model {

	public function get_members(){
		return $this->db->select("SELECT * FROM ".PREFIX."members ORDER BY member_username");
	}

	public function get_member($id){
		return $this->db->select("SELECT * FROM ".PREFIX."members WHERE member_id = :id",array(':id' => $id));
	}

	public function insert_member($data){
		$this->db->insert(PREFIX."members",$data);
	}

	public function update_member($data,$where){
		$this->db->update(PREFIX."members",$data, $where);
	}

}