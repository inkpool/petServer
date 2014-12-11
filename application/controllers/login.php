<?php

class Login extends CI_Controller {

	public function index()
	{
		$postData=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);	
		if(empty($postData['userinfo']['email'])||empty($postData['userinfo']['password']))
		{
			$this->my_tools->output(2, 'Infomation not complete.');
		}
		else {
			$email=$postData['userinfo']['email'];
			$passwd=$postData['userinfo']['password'];
			$this->db->select('password')->from('xmc_users')->where('email',$email);
			$query=$this->db->get();
			if($query->num_rows()==0)
			{
				$this->my_tools->output(3, 'Username not exists.');
			}else{
				$row=$query->row();
				if(strcmp($passwd, $row->password))
				{
					$this->my_tools->output(1, 'Password wrong.');
				}else{					
					$this->auth_tools->generateCookie($email,$passwd);
					$this->my_tools->output(0, 'Login successfully.');
				}
			}
		}
	}

	public function register()
	{
		$postData=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);	
		if(empty($postData['userinfo']['email'])||empty($postData['userinfo']['password']))
		{
			$this->my_tools->output(2, 'Infomation not complete.');
		}
		else
		{
			$email=$postData['userinfo']['email'];
			$passwd=$postData['userinfo']['password'];
			$this->db->select('user_id')->from('xmc_users')->where('email',$email);
			$ifExsit=$this->db->count_all_results();
			if($ifExsit!=0)
			{
				$this->my_tools->output(4, 'This email already existed.');
			}
			else
			{
				$timestamp=time();
				$userData = array(
						'index' => '',
						'email' => $email ,
						'password' => $passwd ,
						'add_time' => $timestamp,
				);
				$this->db->insert('xmc_users', $userData);
				$this->my_tools->output(0, 'Register successfully.');
			}
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->my_tools->output(0, 'Logout successfully.');
	}
	
	public function test()
	{
		$session_id=$this->session->userdata('session_id');
		$this->session->set_userdata('test','hehe');
		$this->my_tools->my_set_cookie('session_id',$session_id);
	}
}