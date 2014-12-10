<?php


class testcl extends CI_Controller {

	public function index()
	{
		$userid=$this->input->get('userid');
		echo "User id is ".$userid;
	}
}