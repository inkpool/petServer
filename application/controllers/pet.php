<?php
class Pet extends CI_Controller {
	public function index(){
		$this->load->model('Pet_model','pet');
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$post_data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$pet_id=$post_data['pet_id'];
			$aPet=$this->pet->getPet($pet_id);
			$user_id=$aPet['user_id'];
			$master=$this->user->getUserById($user_id);
			
			$this->load->model('follow_model','follow');
			$if_follow_int=$this->follow->ifFollow($user_id,$aUser['index']);
			if($if_follow_int)
				$if_follow=true;
			$if_follow=false;
			$user_unit=array(
					'user_id'=>intval($master['index']),
					'user_name'=>$master['user_name'],
					'user_location'=>$master['user_location'],
					'sex'=>intval($master['sex']),
					'avatar'=>AVATAR_URL.$master['avatar'],
					'intro'=>$master['intro'],
					'if_follow'=>$if_follow,
			);		
			$pet_unit=array(
					'pet_id'=>intval($aPet['id']),
					'user_id'=>$aPet['user_id'],
					'pet_user'=>$user_unit,
					'pet_name'=>$aPet['name'],
					'pet_avatar'=>PET_AVATAR_URL.$aPet['avatar'],
					'sex'=>$aPet['sex'],
					'pet_hobby'=>$aPet['hobby'],
					'pet_age'=>$aPet['age'],
					'pet_skill'=>$aPet['skill'],
					'info'=>$aPet['info'],
					'imei'=>$aPet['imei'],
			);
			
			$this->load->model('post_model','post');
			$photo_list=array();
			$photos=$this->post->getNewPhotoByPet($pet_id);
			foreach ($photos as $key => $value)
			{
				array_push($photo_list, PHOTO_URL.$value['photo_id']);
			}
			
			$body=array(
					'pet'=>$pet_unit,
					'photo_list'=>$photo_list,
			);
			
			$this->my_tools->output(0,$body);
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function add(){
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$config['upload_path'] = PET_AVATAR;
			$config['allowed_types'] = '*';
			$config['max_size'] = '1000';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$this->load->library('upload', $config);
			$this->upload->do_upload('pet_avatar');
			$data=$this->upload->data('pet_avatar');
			$pet_avatar=$data['file_name'];
			
			$pet_profile=json_decode($this->input->post('pet_info'),true);
				
			$user_id=intval($aUser['index']);
			$pet_name=$pet_profile['pet_name'];
			$pet_sex=$pet_profile['sex'];
			$pet_hobby=$pet_profile['pet_hobby'];
			$pet_age=$pet_profile['pet_age'];
			$pet_skill=$pet_profile['pet_skill'];
			$pet_info=$pet_profile['info'];
			if(isset($pet_profile['imei']))
			{
				$imei=$pet_profile['imei'];
			}else {
				$imei=null;
			}
			
			
			$this->load->model('Pet_model','pet');
			$pet_id=$this->pet->addPet($user_id,$pet_name,$pet_avatar,$pet_sex,$pet_hobby,$pet_age,$pet_skill,$pet_info,$imei);
			
			$aPet=array(
					'pet_id'=>intval($pet_id),
					'pet_name'=>$pet_name,
					'pet_avatar'=>PET_AVATAR_URL.$pet_avatar,
					'sex'=>$pet_sex,
					'pet_hobby'=>$pet_hobby,
					'pet_age'=>$pet_age,
					'pet_skill'=>$pet_skill,
					'info'=>$pet_info,
					'imei'=>$imei,
			);
			$this->my_tools->output(0,$aPet);
		}
		else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function update(){
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$pet_avatar=null;
			if(sizeof($_FILES))
			{
				$config['upload_path'] = PET_AVATAR;
				$config['allowed_types'] = '*';
				$config['max_size'] = '1000';
				$config['max_width'] = '0';
				$config['max_height'] = '0';
				$this->load->library('upload', $config);
				$this->upload->do_upload('pet_avatar');
				$data=$this->upload->data('pet_avatar');
				$pet_avatar=$data['file_name'];
			}
				
			$pet_profile=json_decode($this->input->post('pet_info'),true);
			
			$pet_id=$pet_profile['pet_id'];
			$user_id=intval($aUser['index']);
			$pet_name=$pet_profile['pet_name'];
			$pet_sex=$pet_profile['sex'];
			$pet_hobby=$pet_profile['pet_hobby'];
			$pet_age=$pet_profile['pet_age'];
			$pet_skill=$pet_profile['pet_skill'];
			$pet_info=$pet_profile['info'];
			if(isset($pet_profile['imei']))
			{
				$imei=$pet_profile['imei'];
			}else {
				$imei=null;
			}
			
			$this->load->model('Pet_model','pet');
			$this->pet->updatePet($pet_id,$user_id,$pet_name,$pet_avatar,$pet_sex,$pet_hobby,$pet_age,$pet_skill,$pet_info,$imei);
			$new_pet=$this->pet->getPet($pet_id);
			
			$aPet=array(
					'pet_id'=>intval($pet_id),
					'pet_name'=>$pet_name,
					'pet_avatar'=>PET_AVATAR_URL.$new_pet['avatar'],
					'sex'=>$pet_sex,
					'pet_hobby'=>$pet_hobby,
					'pet_age'=>$pet_age,
					'pet_skill'=>$pet_skill,
					'info'=>$pet_info,
					'imei'=>$imei,
			);
			$this->my_tools->output(0,$aPet);
			
		}
		else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function bind(){
		$auth_info=$this->input->cookie('auth_cookie');
		$aUser=$this->auth_tools->checkCookie($auth_info);
		if($aUser)
		{
			$post_data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
			$pet_id=$post_data['pet_id'];
			$imei=$post_data['imei'];
			$this->load->model('Pet_model','pet');
			$this->pet->changeImei($pet_id,$imei);
			$new_pet=$this->pet->getPet($pet_id);
			
			$aPet=array(
					'pet_id'=>intval($pet_id),
					'pet_name'=>$new_pet['name'],
					'pet_avatar'=>PET_AVATAR_URL.$new_pet['avatar'],
					'sex'=>intval($new_pet['sex']),
					'pet_hobby'=>$new_pet['hobby'],
					'pet_age'=>$new_pet['age'],
					'pet_skill'=>$new_pet['skill'],
					'info'=>$new_pet['info'],
					'imei'=>$new_pet['imei'],
			);
			$this->my_tools->output(0,$aPet);
			
		}else{
			$this->my_tools->output(-1,'Cookie expired.');
		}
	}
	
	public function getPhotos(){
		
	}
	
}