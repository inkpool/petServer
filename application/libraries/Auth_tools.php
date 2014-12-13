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
		$cookie_expire=2592000;
		//md5明文字符串
		$token=md5($email.$passwd.$cookie_expire.$webKey);
		//用户名、有效时间、md5明文字符串连接
		//设置cookie
		$cookie_string=$email.':'.$cookie_expire.':'.$token;
		$this->CI->my_tools->my_set_cookie('auth_cookie',base64_encode($cookie_string));
	}
	
	public function checkCookie($cookie)
	{
		$auth_info=$this->CI->input->cookie('auth_cookie');
		split($pattern, $string)
	}
}