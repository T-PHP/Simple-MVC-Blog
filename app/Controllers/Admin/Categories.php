<?php
namespace Controllers\Admin;

use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\SimpleImage;
use Core\View;
use Core\Controller;

class Categories extends Controller{
    
    private $model;
    
	public function __construct(){

		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->model = new \Models\Admin\Categories();
	}
    
    public function index(){

		$data['title'] = 'Categories';
		$data['categories'] = $this->model->get_categories();

		View::renderadmintemplate('header',$data);
		View::render('admin/categories/categories',$data);
		View::renderadmintemplate('footer',$data);
	}
    
    public function sub_categories($id){

		$data['title'] = 'Sub Categories';
		$data['categories'] = $this->model->get_sub_categories($id);

		View::renderadmintemplate('header',$data);
		View::render('admin/categories/sub_categories',$data);
		View::renderadmintemplate('footer',$data);
	}
    
    public function add(){
		
		$data['title'] = 'Add Category';
        $data['token'] = Csrf::makeToken();
        
		if(isset($_POST['submit'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
			$category_name = $_POST['category_name'];
			$category_description = $_POST['category_description'];
            
			if($category_name == ''){
				$error[] = 'Name is required';
			}

			if(!$error){

				$postdata = array(
					'category_name' => $category_name,
					'category_description' => $category_description, 
                    'category_url' => Url::generateUrl($category_name)
				);
				$this->model->insert_category($postdata);

				Session::set('message','Category Added');
				Url::redirect('admin/categories');

			}
            
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/categories/add',$data,$error);
		View::renderadmintemplate('footer',$data);
	}
    
    public function edit($id){
		
		$data['title'] = 'Edit Category';
        $data['token'] = Csrf::makeToken();
		$data['row'] = $this->model->get_category($id);
        $data['categories'] = $this->model->get_categories();
        
		if(isset($_POST['submit'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
			$category_name = $_POST['category_name'];
            $category_id_parent = $_POST['category_id_parent'];
			$category_description = $_POST['category_description'];
            
			if($category_name == ''){
				$error[] = 'Name is required';
			}

			if(!$error){

				$postdata = array(
					'category_name' => $category_name,
                    'category_id_parent' => $category_id_parent, 
					'category_description' => $category_description
				);
				$where = array('category_id' => $id);
				$this->model->update_category($postdata,$where);

				Session::set('message','Category Updated');
				Url::redirect('admin/categories/edit/'.$id.'');

			}

		}
        
        if(isset($_POST['seo'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
            $category_title = $_POST['category_title'];
            $category_meta_desc = $_POST['category_meta_desc'];
            $category_meta_robots = $_POST['category_meta_robots'];
            $category_url = $_POST['category_url'];
            
			if($category_url == ''){
				$error[] = 'Url is required';
			}

			if(!$error){

				$postdata = array(
                    'category_title' => $category_title, 
                    'category_meta_desc' => $category_meta_desc, 
                    'category_meta_robots' => $category_meta_robots, 
                    'category_url' => Url::generateUrl($category_url)
				);
				$where = array('category_id' => $id);
				$this->model->update_category($postdata,$where);

				Session::set('message','SEO Informations Updated');
				Url::redirect('admin/categories/edit/'.$id.'');

			}

		}
        
        if(isset($_POST['image'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
            if($_FILES['category_image']['size'] > 0){
                if (!is_dir('images/categories/'.$id.'')) {
                    mkdir('images/categories/'.$id.'');
                }

                $extension_img = substr($_FILES['category_image']['name'], -4);
                $name_without_extension = substr(($_FILES['category_image']['name']), 0, -4);   
                $image_name = Url::generateUrl($name_without_extension).$extension_img;
               //var_dump($_FILES['brand_image']['name']); exit;
                $file = 'images/categories/'.$id.'/'.$image_name;
                $file_mini = 'images/categories/'.$id.'/m-'.$image_name;

                move_uploaded_file($_FILES['category_image']['tmp_name'], $file);
                move_uploaded_file($_FILES['category_image']['tmp_name'], $file_mini);

                $img = new SimpleImage($file);
                $img->save($file, 70);

                $img_mini = new SimpleImage($file);
                $img_mini->load($file)->fit_to_width(300)->fit_to_height(300)->save($file_mini);

                $postdata = array(
                    'category_image' => $file
                );

                $where = array('category_id' => $id);
                $this->model->update_category($postdata,$where);

                Session::set('message','Image Updated');
                Url::redirect('admin/categories/edit/'.$id.'');
            }
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/categories/edit',$data,$error);
		View::renderadmintemplate('footer',$data);

	}
    
   
    
}