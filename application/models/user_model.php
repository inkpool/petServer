<?php

class User_model extends CI_Model{
	/*
	 * User_model对应my_users表
	 */
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
	
	//根据email获得用户信息数组
	function getUserByEmail($email)
	{
		$query=$this->db->select('*')->from('my_users')->where('email',$email);
		return $query->get()->row_array();
	}
	
	//根据id获取用户信息
	function getUserById($id)
	{
		$query=$this->db->select('*')->from('my_users')->where('index',$id);
		return $query->get()->row_array();
	}
	
	function getIdByEmail($email)
	{
		$query=$this->db->select('*')->from('my_users')->where('email',$email);
		$result=$query->get()->row_array();
		return $result['index'];
	}
	
	function getEmailById($index)
	{
		$query=$this->db->select('*')->from('my_users')->where('index',$index);
		$result=$query->get()->row_array();
		return $result['email'];
	}
	
}