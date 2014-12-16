<?php

	class Post_model extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		
		function insertPost()
		{
			
		}
		
		function deletePost()
		{
			
		}
		
		function getPostById($id)
		{
			$query=$this->db->select('*')->from('my_posts')->where('index',$id);
			return $query->get()->row_array();
		}
		
		function getPostsByUserid($userid)
		{
			$query=$this->db->select('*')->from('my_posts')->where('user_id',$userid);
			return $query->get()->result();
		}
	}