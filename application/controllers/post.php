<?php

class Post extends CI_Controller {
	
	public function index()
	{
		$this->load->model('Post_model','post');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$user_id=$aUser['index'];
			$config['upload_path'] = UPLOAD;
			$config['allowed_types'] = '*';
			$config['max_size'] = '1000';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$this->load->library('upload', $config);
			$this->upload->do_upload('photo');
			$data=$this->upload->data('photo');
			$photo_id=$data['file_name'];
			$content=$this->input->post('content');
			$post_id=$this->post->insertPost($user_id,$photo_id,$content);
			$body=array(
					'post_id'=>$post_id,
			);
			$this->my_tools->output(0,$body);
		}else{					
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function delete()
	{
		$this->input->post();
		//delete a post.
	}
	
	//获取全局最新20条消息
	public function getPosts()
	{
		//检查cookie是否过期
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
						
			$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$post_id=$data['post_id'];
			if(intval($post_id)==0)
			{
				$posts=$this->post->getNewPosts(20);
			}
			else
			{
				$posts=$this->post->getOldPosts($post_id,20);
			}
			
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
				
				
				
				$sender=$this->user->getUserById($sender_id);
				$if_follow=$this->follow->ifFollow($sender_id,$aUser['index']);
// 				$if_follow=$this->follow->ifFollow(17,$aUser['index']);
// 				var_dump($aUser);
// 				var_dump($sender_id);
// 				var_dump($if_follow);
// 				die();
				
				$sender_array=array(
						'user_id'=>intval($sender['index']),
						'user_name'=>$sender['user_name'],
						'user_location'=>$sender['user_location'],
						'sex'=>intval($sender['sex']),
						'avatar'=>AVATAR_URL.$sender['avatar'],
						'intro'=>$sender['intro'],
						'if_follow'=>$if_follow,
				);
				

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
	

	
}