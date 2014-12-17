<?php

class Login extends CI_Controller {
	
	//login默认方法，用来登陆
	public function index()
	{
		$this->load->model('User_model','user');
		$postData=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);	
		if(empty($postData['userinfo']['email'])||empty($postData['userinfo']['password']))
		{
			$this->my_tools->output(2, 'Infomation not complete.');
		}
		else {
			$email=$postData['userinfo']['email'];
			$passwd=$postData['userinfo']['password'];
			if($this->user->ifExist($email)==0)
			{
				$this->my_tools->output(3, 'Username not exists.');
			}else{
				if($this->user->checkPassword($email,$passwd))
				{
					$this->auth_tools->generateCookie($email,$passwd);
					$this->my_tools->output(0, 'Login successfully.');
				}
				else{
					$this->my_tools->output(1, 'Password wrong.');
				}
			}
		}
	}

	public function register()
	{
		$this->load->model('User_model','user');
		$postData=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);	
		if(empty($postData['userinfo']['email'])||empty($postData['userinfo']['password']))
		{
			$this->my_tools->output(2, 'Infomation not complete.');
		}
		else
		{
			$email=$postData['userinfo']['email'];
			$passwd=$postData['userinfo']['password'];
			if($this->user->ifExist($email))
			{
				$this->my_tools->output(4, 'This email already existed.');
			}
			else
			{
				$this->user->addUser($email,$passwd);
				$this->my_tools->output(0, 'Register successfully.');
			}
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->cookie->delete_cookie('auth_cookie');
		$this->my_tools->output(0, 'Logout successfully.');
	}
	
	public function test()
	{
		$this->auth_tools->generateCookie('test3','123');
	}
	
	public function test2()
	{
		$this->load->model('Post_model','post');
		$posts=$this->post->getPostsByUserid(1,1,0);
		var_dump(json_encode($posts));
// 		var_dump($this->input->cookie('auth_cookie'));
// 		$current_user=$this->auth_tools->checkCookie($this->input->cookie('auth_cookie'));
// 		var_dump($current_user);

	}
}