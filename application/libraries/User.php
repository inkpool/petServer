<?php
class User{
	private $CI;
	public $index;
	public $email;
	public $password;
	public $add_time;
	public $user_name;
	public $sex;
	public $intro;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function ifExist($email)
	{
		$this->CI->db->select('user_id')->from('my_users')->where('email',$email);
		$num=$this->CI->db->count_all_results();
		return $num;
	}
	
	public function addUser($email,$password)  //注册时只提供两个信息，其余信息为空
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
		$this->CI->db->insert('my_users', $userData);
	}
	
	public function checkPassword($email,$password)
	{
		$this->CI->db->select('password')->from('my_users')->where('email',$email);
		$row=$this->CI->db->get()->row();
		if(strcmp($password, $row->password))
			return False;
		return TRUE;
	}
	
}