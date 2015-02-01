<?php

class Like extends CI_Controller {
	public function index()
	{
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$post_id=$data['post_id'];
			$user_id=$aUser['index'];
			$this->load->model('Like_model','like');
			
			if($this->like->ifLike($user_id,$post_id))
			{
				$this->my_tools->output(1,'Already liked.');
				die();
			}
			$this->like->insertLike($post_id,$user_id);
			$this->my_tools->output(0,'Like sucessfully.');
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}		
		
	}
	
	public function unlike()
	{
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$post_id=$data['post_id'];
			$user_id=$aUser['index'];
			$this->load->model('Like_model','like');
			$this->like->deleteLike($post_id,$user_id);
			$this->my_tools->output(0,'Unlike sucessfully.');
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function getLike()
	{
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$like_id=$data['like_id'];
			$post_id=$data['post_id'];
			$this->load->model('Like_model','like');
			$this->load->model('User_model','user');
			$likes=$this->like->getLikes($post_id,$like_id);
			$like_units=array();
			
			foreach ($likes as $key => $value)
			{
				$lover_id=$value['lover_id'];
				$aUser=$this->user->getUserById($lover_id);
				$lover=array(
						'user_id'=>intval($aUser['index']),
						'user_name'=>$aUser['user_name'],
						'user_location'=>$aUser['user_location'],
						'sex'=>intval($aUser['sex']),
						'avatar'=>AVATAR_URL.$aUser['avatar'],
						'intro'=>$aUser['intro'],
				);
				$aLike=array(
						'like_id'=>intval($value['id']),
						'user'=>$lover,
				);
				array_push($like_units,$aLike);
			}
			
			$this->my_tools->output(0,$like_units);
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
}