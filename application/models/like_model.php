<?php

class Like_model extends CI_Model{
	/*
	 * Like_model对应my_likes表
	 */


	function __construct(){

		parent::__construct();
	}
	
	function insertLike($post_id,$user_id){
		$aLike=array(
				'id'=>'',
				'post_id'=>$post_id,
				'lover_id'=>$user_id,
		);
		$this->db->insert('my_likes', $aLike);
	}
	
	function deleteLike($post_id,$user_id){
		$this->db->delete('my_likes', array('lover_id'=>$user_id,'post_id' => $post_id));
	}
	
	function ifLike($user_id,$post_id){
		$query=$this->db->select('*')
		->where('lover_id',$user_id)
		->where('post_id',$post_id)
		->from('my_likes');
		if($query->count_all_results())
			return true;
		return false;
	}
	
	function getLikes($post_id,$like_id)
	{
		if($like_id == 0)
		{
			$query=$this->db->select('*')
							->where('post_id',$post_id)
							->limit(8,0)
							->from('my_likes')
							->order_by('id','desc');
			return $query->get()->result_array();
		}else{
			$query=$this->db->select('*')
							->where('post_id',$post_id)
							->where('id <',$like_id)
							->limit(10,0)
							->from('my_likes')
							->order_by('id','desc');
			return $query->get()->result_array();
		}
		
	}
	
	function getLikeNum($post_id)
	{
		$query=$this->db->select('*')
		->where('post_id',$post_id)
		->from('my_likes');
		return $query->count_all_results();
	}
}