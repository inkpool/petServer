<?php

class Login extends CI_Controller {
	
	//login默认方法，用来登陆
	public function index()
	{
		$this->load->model('User_model','user');
		$postData=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);	
		if(empty($postData['userinfo']['phone_number'])||empty($postData['userinfo']['password']))
		{
			$this->my_tools->output(2, 'Infomation not complete.');
		}
		else {
			$phone_number=$postData['userinfo']['phone_number'];
			$passwd=$postData['userinfo']['password'];
			if($this->user->ifExist($phone_number)==0)
			{
				$this->my_tools->output(4002, 'Username not exists.');
			}else{
				if($this->user->checkPassword($phone_number,$passwd))
				{
					$this->auth_tools->generateCookie($phone_number,$passwd);
					//登陆成功，返回一个用户对象。
					$aUser=$this->user->getUserByPhone($phone_number);
					
					$user_ret=array(
							'user_id'=>intval($aUser['index']),
							'user_name'=>$aUser['user_name'],
							'user_location'=>$aUser['user_location'],
							'sex'=>intval($aUser['sex']),
							'avatar'=>AVATAR_URL.$aUser['avatar'],
							'intro'=>$aUser['intro'],
							'if_follow'=>true,
					);
					
					$this->load->model('Pet_model','pet');
					$pets=$this->pet->getPetByUserid($aUser['index']);
					$pet_units=array();
					foreach ($pets as $key=>$value)
					{
						$aPet=array(
								'pet_id'=>intval($value['id']),
								'user_id'=>intval($value['user_id']),
								'pet_user'=>null,
								'pet_name'=>$value['name'],
								'pet_avatar'=>PET_AVATAR_URL.$value['avatar'],
								'sex'=>intval($value['sex']),
								
								'pet_hobby'=>$value['hobby'],
								'pet_age'=>$value['age'],
								'pet_skill'=>$value['skill'],
								'info'=>$value['info'],
								'imei'=>$value['imei'],
						);
						array_push($pet_units, $aPet);
					}
					
					$body=array(
							'user'=>$user_ret,
							'pets'=>$pet_units,
					);
					
					if(intval($aUser['if_old'])==0)
					{
						$this->my_tools->output(4001,$user_ret);
						die();
					}
					$this->my_tools->output(0,$body);
				}
				else{
					$this->my_tools->output(4003, 'Password wrong.');
				}
			}
		}
	}

// 	public function register()
// 	{
// 		$this->load->model('User_model','user');
// 		$postData=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);	
// 		if(empty($postData['userinfo']['phone_number'])||empty($postData['userinfo']['password']))
// 		{
// 			$this->my_tools->output(2, 'Infomation not complete.');
// 		}
// 		else
// 		{
// 			$phone_number=$postData['userinfo']['phone_number'];
// 			$passwd=$postData['userinfo']['password'];
// 			if($this->user->ifExist($phone_number))
// 			{
// 				$this->my_tools->output(4, 'This number already existed.');
// 			}
// 			else
// 			{
// 				$this->user->addUser($phone_number,$passwd);
// 				$this->my_tools->output(0, 'Register successfully.');
// 			}
// 		}
// 	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->cookie->delete_cookie('auth_cookie');
		$this->my_tools->output(0, 'Logout successfully.');
	}
	
	public function verify()
	{
		$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
		$phone_number=$data['phone_number'];
		$verify_sms=intval($data['verify_sms']);
	
		if($verify_sms==0)
		{
			$sms=rand(100000,999999);
			$data_insert=array(
					'id'=>'',
					'phone_number'=>$phone_number,
					'verify_sms'=>$sms,
					'verified'=>0,
			);
			$this->db->insert('my_sms',$data_insert);
			//发短信
			//panding...
			$this->my_tools->output(0,"SMS sent.");
			
		}else 
		{
			$my_varify=$this->db->select('*')->from('my_sms')
							->where('phone_number',$phone_number)
							->limit(1,0)->order_by('id','desc')
							->get()->row_array();
			
			if($verify_sms==$my_varify['verify_sms'])
			{
				$this->load->model('User_model','user');
				$password=$data['password'];
				if($this->user->ifExist($phone_number))
				{
					$this->my_tools->output(4, 'This number already existed.');
				}
				else
				{
					$this->user->addUser($phone_number,$password);
					$this->my_tools->output(0, 'Register successfully.');
				}
			}else 
			{
				$this->my_tools->output(1,'Verify failed.');
			}
			
		}
	}
	
}