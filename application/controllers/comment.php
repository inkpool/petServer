<?php

class Comment extends CI_Controller {
	
	public function index(){
		
		$this->load->model('Comment_model','comment');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
	
		if($aUser)
		{
			$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$user_id=$aUser['index'];
			$post_id=$data['post_id'];
			$content=$data['content'];
			
			//回复某人的评论
			$to_user_id=$data['user_id'];
			$comment_id=$this->comment->insertComment($post_id,$user_id,$to_user_id,$content);
			$body=array('comment_id'=>$comment_id);
			$this->my_tools->output(0,$body);
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function getComment(){
		$this->load->model('Comment_model','comment');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		
		if($aUser)
		{
			$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$comment_id=$data['comment_id'];
			$post_id=$data['post_id'];
			//如果$cooment_id为0，获取最新的comment
			//如果$comment_id不为0,获取早于这个comment的10条
			$comments=$this->comment->getComment($post_id,$comment_id);
			
			$comment_units=array();
			foreach ($comments as $key => $value)
			{
				$user_id=$value['user_id'];
				$to_user_id=$value['to_user_id'];
				$this->load->model('User_model','user');
				$aUser=$this->user->getUserById($user_id);
				
				$comment_user=array(
						'user_id'=>intval($aUser['index']),
						'user_name'=>$aUser['user_name'],
						'user_location'=>$aUser['user_location'],
						'sex'=>intval($aUser['sex']),
						'avatar'=>AVATAR_URL.$aUser['avatar'],
						'intro'=>$aUser['intro'],
				);
				
				$to_user=null;
				
				if($to_user_id!=0)
				{
					
					$aUser=$this->user->getUserById($to_user_id);
					
					$to_user=array(
							'user_id'=>intval($aUser['index']),
							'user_name'=>$aUser['user_name'],
							'user_location'=>$aUser['user_location'],
							'sex'=>intval($aUser['sex']),
							'avatar'=>AVATAR_URL.$aUser['avatar'],
							'intro'=>$aUser['intro'],
					);
				}
				

				$aComment=array(
						'comment_id'=>intval($value['id']),
						'comment_user'=>$comment_user,
						'to_user'=>$to_user,
						'content'=>$value['content'],
						'time'=>intval($value['add_time']),
				);
				array_push($comment_units, $aComment);
			}			
			$this->my_tools->output(0,$comment_units);
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	
}