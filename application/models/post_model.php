<?php

	class Post_model extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		
		function insertPost()
		{
			
		}
		
		function getPostById($id)
		{
			$query=$this->db->select('*')->from('my_posts')->where('index',$id);
			echo $query->get()->row_array();
		}
		
		function getPostsByUserid($userid)
		{
			$query=$this->db->select('*')->from('my_posts')->where('user_id',$userid);
			echo $query->get()->row_array();
		}
	}