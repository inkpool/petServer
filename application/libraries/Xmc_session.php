<?php


class Xmc_session
{
	private $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function checkSession()
	{
		$session_id=$this->input->cookie('PHPSESSID');
		//判断session是否被回收，如果是null就是被回收了
		if(isset($_SESSION))
		{
			$this->CI->my_often->output('0000','Session works.');
		}
		else {
			$this->CI->my_often->output('0006','Session expire.');
		}
		
	}
	
	
}