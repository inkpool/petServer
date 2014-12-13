<?php

class Login extends CI_Controller {
	
	//login默认方法，用来登陆
	public function index()
	{
		$this->load->library('user');
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
		$this->load->library('user');
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
		$session_id=$this->session->userdata('session_id');
		$this->session->set_userdata('test','hehe');
		$this->my_tools->my_set_cookie('session_id',$session_id);
	}
}