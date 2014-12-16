<?php

class Auth_tools
{
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function generateCookie($email,$passwd)
	{
		$session_id=$this->CI->session->userdata('session_id');
		$this->CI->my_tools->my_set_cookie('session_id',$session_id);
		//自定义webKey
		$webKey="inkjake@sjtu";
		//md5明文字符串
		$token=md5($email.$passwd.$webKey);
		//用户名、有效时间、md5明文字符串连接
		//设置cookie
		$cookie_string=$email.':'.$token;
		$this->CI->my_tools->my_set_cookie('auth_cookie',base64_encode($cookie_string));
	}
	
	public function checkCookie($auth_info)
	{
		if(isset($auth_info))
		{
			$auth_array=explode(':', base64_decode($auth_info));
			if(count($auth_array)!=2) //数组长度是否异常
			{
				return false;
			}
			else{
				$email=$auth_array[0];
				$token=$auth_array[1];
				$this->CI->load->model('User_model','user');
				$aUser=$this->CI->user->getUserByEmail($email);
				$right_token=md5($aUser['email'].$aUser['password'].'inkjake@sjtu');
				if(strcmp($token, $right_token))
				{
					return false;
				}else
				{
					return $aUser;
				}
			}
		}else{
			return false;
		}

		
	}
}