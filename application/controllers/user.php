<?php

class User extends CI_Controller {
	
	public function index(){
		$this->load->model('User_model','user');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		
		if($aUser)
		{
			$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$user_id=intval($data['user_id']);
			$target_user=$this->user->getUserById($user_id);
			
			$this->load->model('Follow_model','follow');
			$if_follow=$this->follow->ifFollow($user_id,$aUser['index']);
			
			$fans_num=$this->follow->getFollowerNum($user_id);
			$follow_num=$this->follow->getFollowNum($user_id);
			
			$this->load->model('Post_model','post');
			$post_num=$this->post->getPostNumByUserid($user_id);
			
			$target_array=array(
					'user_id'=>intval($target_user['index']),
					'user_name'=>$target_user['user_name'],
					'user_location'=>$target_user['user_location'],
					'sex'=>intval($target_user['sex']),
					'avatar'=>AVATAR_URL.$target_user['avatar'],
					'intro'=>$target_user['intro'],
					'if_follow'=>$if_follow,
					'post_num'=>$post_num,
					'follow_num'=>$follow_num,
					'fans_num'=>$fans_num,
			);
			
			$this->load->model('Pet_model','pet');
			$pets=$this->pet->getPetByUserid($target_user['index']);
			$pet_units=array();
			foreach ($pets as $key=>$value)
			{
				$aPet=array(
							'pet_id'=>intval($value['id']),
							'user_id'=>intval($value['user_id']),
							'pet_name'=>$value['name'],
							'pet_avatar'=>PET_AVATAR_URL.$value['avatar'],
							'sex'=>intval($value['sex']),
							'info'=>$value['info'],
							'imei'=>$value['imei'],
				);
				array_push($pet_units, $aPet);
			}
			$body=array(
					'user'=>$target_array,
					'pets'=>$pet_units,
			);
			$this->my_tools->output(0,$body);
		}
		else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function newProfile()
	{	
		$this->load->model('User_model','user');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$config['upload_path'] = AVATAR;
			$config['allowed_types'] = '*';
			$config['max_size'] = '1000';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$this->load->library('upload', $config);
			$this->upload->do_upload('avatar_pic');
			$data=$this->upload->data('avatar_pic');
			$avatar=$data['file_name'];
			$new_profile=json_decode($this->input->post('user'),true);
			
			$user_id=intval($aUser['index']);
			$user_name=$new_profile['user_name'];
			$sex=intval($new_profile['sex']);
			$user_location=$new_profile['user_location'];
			$intro=$new_profile['intro'];
			$this->user->updateUser($user_id,$user_name,$sex,$user_location,$avatar,$intro);
			$user=$this->user->getUserById($user_id);

			$user_array=array(
					'user_id'=>intval($user['index']),
					'user_name'=>$user['user_name'],
					'user_location'=>$user['user_location'],
					'sex'=>intval($user['sex']),
					'avatar'=>AVATAR_URL.$user['avatar'],
					'intro'=>$user['intro'],
					'if_follow'=>true,
				);
			
			$this->my_tools->output(0,$user_array);
		}
		else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function updateProfile()
	{
		$this->load->model('User_model','user');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$avatar=null;
			if(sizeof($_FILES))
			{
				$config['upload_path'] = AVATAR;
				$config['allowed_types'] = '*';
				$config['max_size'] = '1000';
				$config['max_width'] = '0';
				$config['max_height'] = '0';
				$this->load->library('upload', $config);
				$this->upload->do_upload('avatar_pic');
				$data=$this->upload->data('avatar_pic');
				$avatar=$data['file_name'];
			}
			$new_profile=json_decode($this->input->post('user'),true);
				
			$user_id=intval($aUser['index']);
			$user_name=$new_profile['user_name'];
			$sex=intval($new_profile['sex']);
			$user_location=$new_profile['user_location'];
			$intro=$new_profile['intro'];
			$this->user->updateUser($user_id,$user_name,$sex,$user_location,$avatar,$intro);
			$user=$this->user->getUserById($user_id);
			
			$user_array=array(
					'user_id'=>intval($user['index']),
					'user_name'=>$user['user_name'],
					'user_location'=>$user['user_location'],
					'sex'=>intval($user['sex']),
					'avatar'=>AVATAR_URL.$user['avatar'],
					'intro'=>$user['intro'],
					'if_follow'=>true,
			);
				
			$this->my_tools->output(0,$user_array);			
						
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function getPosts()
	{
		$this->load->model('Post_model','post');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			//加载model
			$this->load->model('Post_model','post');
			$this->load->model('User_model','user');
			$this->load->model('Follow_model','follow');
			$this->load->model('Comment_model','comment');
			$this->load->model('Like_model','like');
			$this->load->model('Pet_model','pet');
				
			$post_data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$target_id=$post_data['user_id'];
			
			$posts=$this->post->getNewPostsByUserid($target_id,20);
			
			$sender=$this->user->getUserById($target_id);
			$if_follow=$this->follow->ifFollow($target_id,$aUser['index']);
			
			$sender_array=array(
					'user_id'=>intval($sender['index']),
					'user_name'=>$sender['user_name'],
					'user_location'=>$sender['user_location'],
					'sex'=>intval($sender['sex']),
					'avatar'=>AVATAR_URL.$sender['avatar'],
					'intro'=>$sender['intro'],
					'if_follow'=>$if_follow,
			);	
			
				
			$post_units=array();
				
			foreach ($posts as $key => $value)
			{
				$post_id=intval($value['index']);
				$sender_id=$value['user_id'];
				$add_time=intval($value['post_time']);
				$location_x=$value['location_x'];
				$location_y=$value['location_y'];
				$location=array(
						'location_x'=>$location_x,
						'location_y'=>$location_y,
				);
			
				$content=$value['content'];
				$picture=PHOTO_URL.$value['photo_id'];
			
				$pet_id=$value['pet_id'];
				$aPet=$this->pet->getPet($pet_id);
			
				if($aPet)
				{
					$pet=array(
							'pet_id'=>intval($aPet['id']),
							'user_id'=>intval($aPet['user_id']),
							'pet_name'=>$aPet['name'],
							'sex'=>intval($aPet['sex']),
							'info'=>$aPet['info'],
					);
				}
					
				$comment_num=$this->comment->getCommentNum($post_id);
			
				$likes_db=$this->like->getLikes($post_id,0);
				$like_num=$this->like->getLikeNum($post_id);
				$like_units=array();
			
				foreach ($likes_db as $key_like => $value_like)
				{
					$like_id=intval($value_like['id']);
					$lover_id=intval($value_like['lover_id']);
					$lover=$this->user->getUserById($lover_id);
						
					$if_follow_lover=$this->follow->ifFollow($lover_id,$aUser['index']);
						
					$aLike=array(
							'user_id'=>intval($lover['index']),
							'user_name'=>$lover['user_name'],
							'user_location'=>$lover['user_location'],
							'sex'=>intval($lover['sex']),
							'avatar'=>AVATAR_URL.$lover['avatar'],
							'intro'=>$lover['intro'],
							'if_follow'=>$if_follow_lover,
					);
						
					array_push($like_units, $aLike);
				}
			
				$this->load->model('like_model','like');
				$if_like=$this->like->ifLike($aUser['index'],$post_id);
			
				$aPost=array(
						'post_id'=>$post_id,
						'sender'=>$sender_array,
						'pet'=>$pet,
						'picture'=>$picture,
						'content'=>$content,
						'location'=>$location,
						'add_time'=>$add_time,
						'if_like'=>$if_like,
						'like_num'=>$like_num,
						'likes'=>$like_units,
						'comment_num'=>$comment_num,
				);
				array_push($post_units, $aPost);
			}
			$this->my_tools->output(0,$post_units);
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function getPhotos()
	{
		$this->load->model('Post_model','post');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
				
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function follow()
	{
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$post_data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$user_id=$post_data['user_id'];
			$this->load->model('Follow_model','follow');
			$this->follow->follow($user_id,$aUser['index']);
			$this->my_tools->output(0,'Follow successfully.');
			
		
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function unfollow()
	{
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$post_data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$user_id=$post_data['user_id'];
			$this->load->model('Follow_model','follow');
			$this->follow->unfollow($user_id,$aUser['index']);
			$this->my_tools->output(0,'Unfollow successfully.');
				
		
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	
}