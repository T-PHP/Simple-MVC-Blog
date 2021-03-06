<?php 
namespace Models;
 
use Core\Model;

class Blog extends Model {
    
    /* Categories Functions */
	public function get_categories(){
		return $this->db->select("
            SELECT 
                * 
            FROM 
                ".PREFIX."categories 
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
    
    /* Posts Functions */
	public function get_posts(){
		return $this->db->select("
            SELECT DISTINCT
                p.post_id, 
                p.post_name, 
                p.post_short_description, 
                p.post_url, 
                p.post_image, 
                p.post_created, 
                p.post_modified, 
                c.category_name, 
                m.member_username 
            FROM 
                ".PREFIX."posts p 
            LEFT JOIN 
                ".PREFIX."categories c ON (c.category_id = p.post_category_id) 
            LEFT JOIN 
                ".PREFIX."members m ON (m.member_id = p.post_member_id)
        ");
	}
    
	public function get_post($id, $url){
		return $this->db->select("
            SELECT 
                * 
            FROM 
                ".PREFIX."posts 
            WHERE 
                post_id = :id
            AND 
                post_url = :url
            ",array(':id' => $id, ':url' => $url));

    }
    
    public function get_posts_by_category($id, $url, $limit){
		return $this->db->select("
			SELECT 
				p.post_id, 
                p.post_name, 
                p.post_short_description, 
                p.post_url, 
                p.post_image, 
                p.post_created, 
                p.post_modified, 
				c.category_name, 
                c.category_description, 
				c.category_url,
                c.category_title,
                c.category_meta_desc,
                m.member_username
			FROM ".PREFIX."posts p  
            LEFT JOIN 
                ".PREFIX."categories c ON (c.category_id = p.post_category_id)
            LEFT JOIN 
                ".PREFIX."members m ON (m.member_id = p.post_member_id)
			WHERE
                c.category_id = :id
            AND 
                c.category_url = :url
			ORDER BY 
				post_id DESC ".$limit,array(':url' => $url, ':id' => $id));
	}
    
    public function get_posts_by_category_total($id){
		return $this->db->select("
			SELECT 
				post_id
			FROM ".PREFIX."posts
			WHERE
                post_category_id  = $id
			ORDER BY 
				post_id DESC ",array(':id' => $id));
	}
}