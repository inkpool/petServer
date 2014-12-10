<?php

class My_tools
{
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function output($code,$content)
	{
		$message=array(
				'status'=>$code,
				'error_content'=>$content,
		);
		echo json_encode($message);
		exit();
	}
	
	public function my_set_cookie($name,$value)
	{
		$cookie = array(
				'name'   => $name,
				'value'  => $value,
				'expire' => '2592000',
		);
			
		$this->CI->input->set_cookie($cookie);
	}
}