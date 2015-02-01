<?php
class Pet_model extends CI_Model{
	/*
	 * Pet_model对应my_pets表
	 */

	function __construct(){

		parent::__construct();
	}
	
	function addPet($user_id,$name,$avatar,$sex,$hobby,$age,$skill,$info,$imei){
		$data=array(
				'id'=>'',
				'user_id'=>$user_id,
				'name'=>$name,
				'avatar'=>$avatar,
				'sex'=>$sex,
				'hobby'=>$hobby,
				'age'=>$age,
				'skill'=>$skill,
				'info'=>$info,
				'imei'=>$imei,
		);
		$this->db->insert('my_pets',$data);
		return $this->db->insert_id();
	}
	
	function getPet($pet_id){
		$query=$this->db->select('*')
		->from('my_pets')
		->where('id',$pet_id);
		return $query->get()->row_array();
	}
	
	function getPetByUserid($user_id){
		$query=$this->db->select('*')
		->from('my_pets')
		->where('user_id',$user_id);
		return $query->get()->result_array();
	}
	
	function updatePet($pet_id,$user_id,$name,$avatar,$sex,$hobby,$age,$skill,$info,$imei)
	{
		if($avatar)
		{
			$data=array(
					'user_id'=>$user_id,
					'name'=>$name,
					'avatar'=>$avatar,
					'sex'=>$sex,
					'hobby'=>$hobby,
					'age'=>$age,
					'skill'=>$skill,
					'info'=>$info,
					'imei'=>$imei,
			);
		}else{
			$data=array(
					'user_id'=>$user_id,
					'name'=>$name,
					'sex'=>$sex,
					'hobby'=>$hobby,
					'age'=>$age,
					'skill'=>$skill,
					'info'=>$info,
					'imei'=>$imei,
			);
		}
		
		$this->db->where('id',$pet_id);
		$this->db->update('my_pets',$data);
	}
	
	function changeImei($pet_id,$new_imei)
	{
		$data=array(
				'imei'=>$new_imei,
		);
		$this->db->where('id', $pet_id);
		$this->db->update('my_pets',$data);
	}
	
	function deletePet(){
		
	}
	
	
}