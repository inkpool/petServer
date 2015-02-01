<?php

class Comment_model extends CI_Model{
	
	function insertComment($post_id,$user_id,$to_user_id,$content)
	{
		$add_time=time();
		$aComment=array(
				'id'=>'',
				'post_id'=>$post_id,
				'user_id'=>$user_id,
				'to_user_id'=>$to_user_id,
				'content'=>$content,
				'add_time'=>$add_time,
		);
		$this->db->insert('my_comments', $aComment);
		$comment_id = $this->db->insert_id();
		return $comment_id;
	}
	
	function deleteComment($comment_id)
	{
		$this->db->delete('my_comments', array('id' => $comment_id));
	}
	
	function ifMyComment($user_id,$comment_id)
	{
		$query=$this->db->select('*')
		->where('id',$comment_id)
		->where('user_id',$user_id)
		->from('my_comments');
		if($query->count_all_results())
			return true;
		return false;
	}
	
	//获取某个post的10条评论，index为起始评论
	function getComment($post_id,$comment_id)
	{
		//如果$cooment_id为0，获取最新的comment
		//如果$comment_id不为0,获取早于这个comment的10条
		if($comment_id == 0)
		{
			$query=$this->db->select('*')
			->where('post_id',$post_id)
			->limit(10,0)
			->from('my_comments')
			->order_by('id','desc');
			return $query->get()->result_array();
		}else{
			$query=$this->db->select('*')
			->where('post_id',$post_id)
			->where('id <',$comment_id)
			->limit(10,0)
			->from('my_comments')
			->order_by('id','desc');
			return $query->get()->result_array();
		}
		
	}
	
	function getCommentNum($post_id)
	{
		$query=$this->db->select('*')
					->where('post_id',$post_id)
					->from('my_comments');
		return $query->count_all_results();
	}
	
}