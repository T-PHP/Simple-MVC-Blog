<?php 
namespace Models\Admin;
 
use Core\Model;

class Auth extends Model 
{
    function __construct(){
        parent::__construct();
    } 
    
	public function getHash($username){
		$data = $this->db->select('SELECT member_password FROM '.PREFIX.'members WHERE member_username = :username',array(':username' => $username));
        return $data[0]->member_password;
	}
    
    public function get_user_infos($username){
		return $this->db->select('SELECT member_id FROM '.PREFIX.'members WHERE member_username = :username',array(':username' => $username));
        
	}
}
