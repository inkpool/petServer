<?php

class Follow_model extends CI_Model{
	
	function follow($user_id,$follower_id)
	{
		$data = array(
				'id' => '',
				'user_id' => $user_id ,
				'follower_id' => $follower_id ,
		);
		$this->db->insert('my_follows', $data);
	}
	
	function unfollow($user_id,$follower_id)
	{
		$this->db->delete('my_follows', array('user_id' => $user_id,'follower_id'=>$follower_id));
	}
	
	function ifFollow($user_id,$follower_id)
	{
		$query=$this->db->select('*')
		->where('user_id',$user_id)
		->where('follower_id',$follower_id)
		->from('my_follows');
		if($query->count_all_results())
			return true;	
		return false;
	}
	
	function getFollowNum($user_id){
		$query=$this->db->select('*')
						->where('follower_id',$user_id)
						->from('my_follows');
		return $query->count_all_results();
	}
	
	function getFollowerNum($user_id){
		$query=$this->db->select('*')
		->where('user_id',$user_id)
		->from('my_follows');
		return $query->count_all_results();
	}
}