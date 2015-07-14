<?php
namespace Controllers\Admin;

use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\Password;
use Core\View;
use Core\Controller;

class Members extends Controller{
    
    private $model;
    
	public function __construct(){

		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->model = new \Models\Admin\Members();
	}

	public function index(){

		$data['title'] = 'Members';
		$data['members'] = $this->model->get_members();

		View::renderadmintemplate('header',$data);
		View::render('admin/members/members',$data);
		View::renderadmintemplate('footer',$data);
	}

	public function add(){
		
		$data['title'] = 'Add Member';

		if(isset($_POST['submit'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			if($username == ''){
				$error[] = 'Username is required';
			}

			if($password == ''){
				$error[] = 'Password is required';
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $error[] = 'Email is not valid';
			}

			if(!$error){

				$postdata = array(
					'member_username' => $username,
					'member_password' => Password::make($password),
					'member_email' => $email
				);
				$this->model->insert_member($postdata);

				Session::set('message','Member Added');
				Url::redirect('admin/members');

			}

		}

		View::renderadmintemplate('header',$data);
		View::render('admin/members/add',$data,$error);
		View::renderadmintemplate('footer',$data);

	}

	public function edit($id){
		
		$data['title'] = 'Edit Member';
		$data['row'] = $this->model->get_member($id);

		if(isset($_POST['submit'])){
            if ($_POST['token'] != Session::get('token')) {
                Url::redirect('admin/login');
            }
            
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];

			if($username == ''){
				$error[] = 'Username is required';
			}

			if($password == ''){
				$error[] = 'Password is required';
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $error[] = 'Email is not valid';
			}

			if(!$error){

				$postdata = array(
					'member_username' => $username,
					'member_password' => Password::make($password),
					'member_email' => $email
				);
				$where = array('member_id' => $id);
				$this->model->update_member($postdata,$where);

				Session::set('message','Member Updated');
				Url::redirect('admin/members');

			}

		}

		View::renderadmintemplate('header',$data);
		View::render('admin/members/edit',$data,$error);
		View::renderadmintemplate('footer',$data);

	}

}