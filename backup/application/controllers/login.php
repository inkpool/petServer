<?php

class Login extends CI_Controller {

	public function index()
	{
		
		if(empty($_POST['userid'])||empty($_POST['password']))
		{
			$this->output('0002', 'Infomation not complete.');
		}
		else {
			$userid=$this->input->post('userid');
			$passwd=$this->input->post('password');
			$this->db->select('password')->from('xmc_users')->where('user_id',$userid);
			$query=$this->db->get();
			if($query->num_rows()==0)
			{
				$this->output('0003', 'Userid not exists.');
			}else{
				$row=$query->row();
				if(strcmp($passwd, $row->password))
				{
					$this->output('0001', 'Password wrong.');
				}else{
					$this->output('0000', 'Login successfully.');
				}
			}
		}
		echo $session_id = $this->session->userdata('session_id');
	}
	
	public function checkSession()
	{
		
	}
	
	public function register()
	{
		var_dump($_POST);
		if(empty($_POST['userid'])||empty($_POST['password']))
		{
			$this->output('0002', 'Infomation not complete.');
		}
		else
		{
			$userid=$this->input->post('userid');
			$passwd=$this->input->post('password');
			$this->db->select('user_id')->from('xmc_users')->where('user_id',$userid);
			$ifExsit=$this->db->count_all_results();
			if($ifExsit!=0)
			{
				$this->output('0004', 'This userid already existed.');
			}
			else
			{
				$timestamp=time();
				$userData = array(
						'index' => '',
						'user_id' => $userid ,
						'password' => $passwd ,
						'add_time' => $timestamp,
				);
				$this->db->insert('xmc_users', $userData);
				$this->output('0000', 'Register successfully.');
			}
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->output('0000', 'Logout successfully.');
	}
	
	public function output($code,$content)
	{
		$message=array(
				'error_code'=>$code,
				'error_content'=>$content,
		);
		echo json_encode($message);
		exit();
	}
}