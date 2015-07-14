<?php
namespace Controllers\Admin;

use Helpers\Session;
use Helpers\Url;
use Core\View;
use Core\Controller;

class Admin extends Controller {

	public function __construct(){

		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}

	}

	public function index(){
		
		$data['title'] = 'Admin';

		View::renderadmintemplate('header',$data);
		View::render('admin/admin',$data);
		View::renderadmintemplate('footer',$data);

	}

}