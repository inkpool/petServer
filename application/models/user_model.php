<?php

class User_model extends CI_Model{
	
	var $index=null;
	var $email='';
	var $password='';
	var $add_time=null;
	var $user_name='';
	var $sex=null;
	var $intro='';
	
	function __construct(){
		
		parent::__construct();
	}
	
    function ifExist($email)
	{
		$this->db->select('user_id')->from('my_users')->where('email',$email);
		$num=$this->db->count_all_results();
		return $num;
	}
	
	function addUser($email,$password)  //注册时只提供两个信息，其余信息为空
	{
		$timestamp=time();
		$userData = array(
				'index' => '',
				'email' => $email ,
				'password' => $password ,
				'add_time' => $timestamp,
				'user_name'=>'',
				'sex'=>'',
				'intro'=>'',
		);
		$this->db->insert('my_users', $userData);
	}
	
	function checkPassword($email,$password)
	{
		$this->db->select('password')->from('my_users')->where('email',$email);
		$row=$this->db->get()->row();
		if(strcmp($password, $row->password))
			return False;
		return TRUE;
	}
}