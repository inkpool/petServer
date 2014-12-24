<?php

	class Post_model extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		
		//插入一条post
		function insertPost($user_id,$photo_id,$content)
		{
			$time=time();
			$data=array(
					'index'=>'',
					'user_id'=>$user_id,
					'photo_id'=>$photo_id,
					'content'=>$content,
					'add_time'=>$time,
			);
			$this->db->insert('my_posts',$data);
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
		
		//获取全局大于某个时间的最新N条post
		function getNewPosts($last_time_stamp,$limit)
		{
			$query=$this->db->select('*')
			->where('add_time >',$last_timestamp)
			->from('my_posts')
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result();
		}
		
		//获取全局某个时间之前的10条旧post
		function getNewPosts($timestamp,$limit=10)
		{
			$query=$this->db->select('*')
			->where('add_time <',$last_timestamp)
			->from('my_posts')
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result();
		}
		
		//获得某个人的最新的N条
		function getNewPostsByUserid($userid,$limit)
		{
			$query=$this->db->select('*')
			->where('user_id',$userid)
			->from('my_posts')
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result();
		}
		
		//获取某个人早于某个时间的旧消息
		function getOldPostsByUserid($userid,$oldest_timestamp,$limit=10)
		{
			$query=$this->db->select('*')
			->where('user_id',$userid)
			->where('add_time <',$oldest_timestamp)
			->from('my_posts')
			->limit($limit,0)
			->order_by('index','desc');
			return $query->get()->result();
		}
	}