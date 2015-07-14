<?php
namespace Controllers\Admin;

use Helpers\Data;
use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Core\View;
use Core\Controller;

class Seo extends Controller{
    
    private $model;
    
	public function __construct(){

		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
	}

	public function index(){

		$data['title'] = 'Users';
		$data['users'] = $this->model->getusers();

		View::renderadmintemplate('header',$data);
		View::render('admin/users/users',$data);
		View::renderadmintemplate('footer',$data);
	}

	public function robots(){
		
		$data['title'] = 'Edit robots.txt';
        
        $data['robots_url'] = 'robots.txt';
        
        
        if (!file_exists($data['robots_url'])):
            $data['robots_status'] = '
                <button type="button" class="btn btn-danger">Empty file</button>
                <button type="button" class="btn btn-danger">File doesn\'t exist</button>
			';
		else:
			//fichier existe
			$data['robots_content'] = file_get_contents($data['robots_url']);
			if(!empty($data['robots_content']))
                $data['robots_status'] = '
                    <button type="button" class="btn btn-success">File not empty</button>
                    <button type="button" class="btn btn-success">File exist</button>
			     ';				
			else
               $data['robots_status'] = '
                    <button type="button" class="btn btn-danger">Empty file</button>
                    <button type="button" class="btn btn-success">File exist</button>
			     ';	
		endif;
        
		if(isset($_POST['submit'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
        
            file_put_contents($data['robots_url'], $_POST['robots']);
            Session::set('message','File updated');
            Url::redirect('admin/seo/robots');	

		}

		View::renderadmintemplate('header',$data);
		View::render('admin/seo/robots',$data,$error);
		View::renderadmintemplate('footer',$data);

	}

}