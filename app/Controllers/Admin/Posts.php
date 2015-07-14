<?php
namespace Controllers\Admin;

use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\SimpleImage;
use Core\View;
use Core\Controller;

class Posts extends Controller{
    
    private $model;
    
	public function __construct(){

		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->posts = new \Models\Admin\Posts();
        $this->categories = new \Models\Admin\Categories();
	}
    
    public function index(){

		$data['title'] = 'Posts';
		$data['posts'] = $this->posts->get_posts();

		View::renderadmintemplate('header',$data);
		View::render('admin/posts/posts',$data);
		View::renderadmintemplate('footer',$data);
	}
    
    public function add(){
		$data['title'] = 'Add Post';
        $data['token'] = Csrf::makeToken();
        $data['categories'] = $this->categories->get_all_categories();
        
		if(isset($_POST['submit'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
			$post_name = $_POST['post_name'];
            $post_category_id = $_POST['post_category_id'];
			$post_short_description = $_POST['post_short_description'];
            
			if($post_name == ''){
				$error[] = 'Name is required';
			}

			if(!$error){

				$postdata = array(
                    'post_member_id' => Session::get('member_id'),
					'post_name' => $post_name,
                    'post_category_id' => $post_category_id,
					'post_short_description' => $post_short_description, 
                    'post_url' => Url::generateUrl($post_name), 
                    'post_created' => (new \DateTime())->format('Y-m-d H:i:s'), 
				);
				$this->posts->insert_post($postdata);

				Session::set('message','Post Added');
				Url::redirect('admin/posts');

			}
            
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/posts/add',$data,$error);
		View::renderadmintemplate('footer',$data);
	}
    
    public function edit($id){
		
		$data['title'] = 'Edit Post';
        $data['token'] = Csrf::makeToken();
		$data['row'] = $this->posts->get_post($id);
        $data['posts'] = $this->posts->get_posts();
        $data['categories'] = $this->categories->get_all_categories();
        
		if(isset($_POST['submit'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
            $post_name = $_POST['post_name'];
            $post_category_id = $_POST['post_category_id'];
			$post_short_description = $_POST['post_short_description'];
            $post_long_description = $_POST['post_long_description'];
            
			if($post_name == ''){
				$error[] = 'Name is required';
			}

			if(!$error){

				$postdata = array(
					'post_name' => $post_name,
                    'post_category_id' => $post_category_id,
					'post_short_description' => $post_short_description, 
                    'post_long_description' => $post_long_description, 
                    'post_modified' => (new \DateTime())->format('Y-m-d H:i:s')
				);
				$where = array('post_id' => $id);
				$this->posts->update_post($postdata,$where);

				Session::set('message','Post Updated');
				Url::redirect('admin/posts/edit/'.$id.'');

			}

		}
        
        if(isset($_POST['seo'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
            $post_title = $_POST['post_title'];
            $post_meta_description = $_POST['post_meta_description'];
            $post_meta_robots = $_POST['post_meta_robots'];
            $post_url = $_POST['post_url'];
            
			if($post_url == ''){
				$error[] = 'Url is required';
			}

			if(!$error){

				$postdata = array(
                    'post_title' => $post_title, 
                    'post_meta_description' => $post_meta_description, 
                    'post_meta_robots' => $post_meta_robots, 
                    'post_url' => Url::generateUrl($post_url), 
                    'post_modified' => (new \DateTime())->format('Y-m-d H:i:s')
				);
				$where = array('post_id' => $id);
				$this->posts->update_post($postdata,$where);

				Session::set('message','SEO Informations Updated');
				Url::redirect('admin/posts/edit/'.$id.'');

			}

		}
        
        if(isset($_POST['image'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
            if($_FILES['post_image']['size'] > 0){
                if (!is_dir('images/posts/'.$id.'')) {
                    mkdir('images/posts/'.$id.'');
                }

                $extension_img = substr($_FILES['post_image']['name'], -4);
                $name_without_extension = substr(($_FILES['post_image']['name']), 0, -4);   
                $image_name = Url::generateUrl($name_without_extension).$extension_img;
               //var_dump($_FILES['brand_image']['name']); exit;
                $file = 'images/posts/'.$id.'/'.$image_name;
                $file_mini = 'images/posts/'.$id.'/m-'.$image_name;

                move_uploaded_file($_FILES['post_image']['tmp_name'], $file);
                move_uploaded_file($_FILES['post_image']['tmp_name'], $file_mini);

                $img = new SimpleImage($file);
                $img->save($file, 70);

                $img_mini = new SimpleImage($file);
                $img_mini->load($file)->fit_to_width(850)->fit_to_height(355)->save($file_mini);

                $postdata = array(
                    'post_image' => $image_name, 
                    'post_modified' => (new \DateTime())->format('Y-m-d H:i:s')
                );

                $where = array('post_id' => $id);
                $this->posts->update_post($postdata,$where);

                Session::set('message','Image Updated');
                Url::redirect('admin/posts/edit/'.$id.'');
            }
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/posts/edit',$data,$error);
		View::renderadmintemplate('footer',$data);

	}
    
   
    
}