<?php

	class Post_model extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		
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
		
		function deletePost($post_id)
		{
			$this->db->delete('my_posts', array('index' => $post_id));
		}
		
		function getPostById($id)
		{
			$query=$this->db->select('*')
			->from('my_posts')
			->where('index',$id);
			return $query->get()->row_array();
		}
		
		function getPostsByUserid($userid,$limit=10,$offset=0)
		{
			$query=$this->db->select('*')
			->where('user_id',$userid)
			->from('my_posts')
			->limit($limit,$offset)
			->order_by('index','desc');
			
			return $query->get()->result();
		}
	}