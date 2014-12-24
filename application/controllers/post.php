<?php

class Post extends CI_Controller {
	
	public function index()
	{
		//insert a post.
	}
	
	public function delete()
	{
		//delete a post.
	}
	
	public function getNewPosts()
	{
		//获取所有人的最新消息
		/*
		 * act=1,获取大于某个时间的条数(全局)
		 * act=2,获取大于某个时间的N条(全局)
		 * act=3,获取10条早于某个时间的旧消息(全局)
		 * 返回的内容：消息内容、赞的人数、赞的头像、评论5条
		 */
		array(
				'act'=>1,
				'time_stamp'=>xxx,
		);
		array(
				'act'=>2,
				'time_stamp'=>xxx,
				'limit'=>xxx,
		);
		array(
				'act'=>3,
				'time_stamp'=>xxx,
		);
	}
	
}