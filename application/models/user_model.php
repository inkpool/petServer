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
	
    function ifExist($phone_number)
	{
		$query=$this->db->select('*')->from('my_users')->where('phone_number',$phone_number);
		$num=$query->count_all_results();
		return $num;
	}
	
	function addUser($phone_number,$password)  //注册时只提供两个信息，其余信息为空
	{
		$timestamp=time();
		$userData = array(
				'index' => '',
				'phone_number' => $phone_number ,
				'password' => $password ,
				'add_time' => $timestamp,
				'user_name'=>'',
				'user_location'=>'',
				'sex'=>'',
				'avatar'=>'',
				'intro'=>'',
		);
		$this->db->insert('my_users', $userData);
	}
	
	function updateUser($user_id,$user_name,$sex,$user_location,$avatar,$intro)
	{
		if($avatar)
		{
			$new_data=array(
		
					'user_name'=>$user_name,
					'sex'=>$sex,
					'user_location'=>$user_location,
					'avatar'=>$avatar,
					'intro'=>$intro,
					'if_old'=>1,
			);
		}else
		{
			$new_data=array(
			
					'user_name'=>$user_name,
					'sex'=>$sex,
					'user_location'=>$user_location,
					'intro'=>$intro,
					'if_old'=>1,
			);
		}
		
		$this->db->where('index', $user_id);
		$this->db->update('my_users', $new_data);
	}
	
	function checkPassword($phone_number,$password)
	{
		$this->db->select('password')->from('my_users')->where('phone_number',$phone_number);
		$row=$this->db->get()->row();
		if(strcmp($password, $row->password))
			return False;
		return TRUE;
	}
	
	//根据id获取用户信息
	function getUserById($id)
	{
		$query=$this->db->select('*')->from('my_users')->where('index',$id);
		return $query->get()->row_array();
	}
	
	function getUserByPhone($phone_number)
	{
		$query=$this->db->select('*')->from('my_users')->where('phone_number',$phone_number);
		$result=$query->get()->row_array();
		return $result;
	}
	
	function repack($user,$if_follow=true)
	{	
		$android_user=array(
				'user_id'=>intval($user['index']),
				'user_name'=>$user['user_name'],
				'user_location'=>$user['user_location'],
				'sex'=>intval($user['sex']),
				'avatar'=>AVATAR_URL.$user['avatar'],
				'intro'=>$user['intro'],
				'if_follow'=>$if_follow,
		);
		return $android_user;
	}
	
}