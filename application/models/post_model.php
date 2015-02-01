<?php

	class Post_model extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		
		//插入一条post
		function insertPost($user_id,$photo_id,$content)
		{
			$content_array=json_decode($content,true);
			$location=$content_array['location'];
			$time=time();
			$data=array(
					'index'=>'',
					'user_id'=>$user_id,
					'photo_id'=>$photo_id,
					'content'=>$content_array['content'],
					'pet_id'=>$content_array['pet_id'],
					'location_x'=>$location['location_x'],
					'location_y'=>$location['location_y'],
					'post_time'=>$time,
			);
			$this->db->insert('my_posts',$data);
			return $this->db->insert_id();
		}
		
		//删除一条post
		function deletePost($post_id)
		{
			$this->db->delete('my_posts', array('index' => $post_id));
		}
		
		//根据post_id来获得这条post
		function getPostById($id)
		{
			$query=$this->db->select('*')
			->from('my_posts')
			->where('index',$id);
			return $query->get()->row_array();
		}
		
		//获取某个时间后有多少条最新的消息
		function getNewPostsNumber($last_timestamp)
		{
			$query=$this->db->select('*')
			->where('add_time >',$last_timestamp)
			->from('my_posts')
			->order_by('index','desc');
			return $query->count_all_results();
		}
		
		//获取全局最新N条post
		function getNewPosts($limit)
		{
			$query=$this->db->select('*')
			->from('my_posts')
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result_array();
		}
		
		//获取全局早于某个id的N条
		function getOldPosts($post_id,$limit)
		{
			$query=$this->db->select('*')
			->from('my_posts')
			->where('index <',$post_id)
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result_array();
		}
				
		//获得某个人的最新的N条
		function getNewPostsByUserid($userid,$limit)
		{
			$query=$this->db->select('*')
			->where('user_id',$userid)
			->from('my_posts')
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result_array();
		}
		
		//获得某个人早于某个id的N条
		function getOldPostsByUserid($userid,$post_id,$limit)
		{
			$query=$this->db->select('*')
			->where('user_id',$userid)
			->from('my_posts')
			->where('index <',$post_id)
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result_array();
		}
		
		function getPostNumByUserid($user_id){
			$query=$this->db->select('*')
						->where('user_id',$user_id)
						->from('my_posts');
			return $query->count_all_results();
		}
		
		function getNewPhotoByPet($pet_id){
			$query=$this->db->select('photo_id')
						->where('pet_id',$pet_id)
						->from('my_posts')
						->limit(20,0)
						->order_by('index','desc');
			return $query->get()->result_array();

		}
		
		function getOldPhotoByPet($pet_id,$post_id){
			$query=$this->db->select('photo')
			->where('pet_id',$pet_id)
			->where('index <',$post_id)
			->from('my_posts')
			->limit(20,0)
			->order_by('index','desc');
			return $query->get->result_array();
		}
		
		
		
		
		
		
		
		
		
		
		
		
	}