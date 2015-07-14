<?php
namespace Controllers\Admin;

use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use Core\View;
use Core\Controller;

class Auth extends Controller {

	public function login(){

		if(Session::get('loggedin')){
			Url::redirect('admin');
		}

		$model = new \Models\Admin\Auth();

		$data['title'] = 'Login';
        
		if(isset($_POST['submit'])){

			$username = $_POST['member_username'];
			$password = $_POST['member_password'];
            
            if (Password::verify($_POST['member_password'], $model->getHash($_POST['member_username'])) == 0) {
				$error[] = 'Wrong username of password';
			} else {
                $data['user_infos'] = $model->get_user_infos($_POST['member_username']);
                
                Session::set('member_id', $data['user_infos'][0]->member_id);
                Session::set('member_username', $username);
                Session::set('member_password', ''.$password.'');
				Session::set('loggedin',true);
				Url::redirect('admin');
			}

		}

		View::renderadmintemplate('loginheader',$data);
		View::render('admin/login',$data,$error);
		View::renderadmintemplate('footer',$data);
	}

	public function logout(){

		Session::destroy();
		Url::redirect('admin/login');

	}

}