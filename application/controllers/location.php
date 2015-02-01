<?php
class Location extends CI_Controller {
	
	public function index(){
		$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
		if(isset($data[0]['AlertType']))
		{
			echo "OK";
			die();
		}
		$this->load->model('location_model','location');
		
		$baidu_xy=$this->gpsToBaidu($data['longitude'],$data['latitude']);
		if(isset($baidu_xy['x']))
		{
			$data['longitude']=$baidu_xy['x'];
			$data['latitude']=$baidu_xy['y'];
			$this->location->insertLocations($data);
		}
		echo "OK";
		
	}
	
	public function getLatestLocation(){
// 		$data=json_decode($GLOBALS['HTTP_RAW_POST_DATA'],TRUE);
// 		$imei=$data['imei'];
		$imei=$this->input->post('imei');
		
		$this->load->model('location_model','location');
		$body=$this->location->getLatestLocation($imei);
// 		$baidu_xy=$this->gpsToBaidu($body['longitude'],$body['latitude']);

//  		$body['latitude']=(string)$baidu_xy['y'];
//  		$body['longitude']=(string)$baidu_xy['x'];

		
		$this->my_tools->output(0,$body);
	}
	
	private function gpsToBaidu($location_x,$location_y)
	{
		$url="http://api.map.baidu.com/geoconv/v1/?coords=$location_x,$location_y&from=1&to=5&ak=DdmLmcuV08AfQNKHzIlRLEnG";
		$raw=$this->http_get($url);
		$result=json_decode($raw,true);
		return $result['result'][0];
	}
	
	function http_get($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		//curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
		//curl_setopt($ch, CURLOPT_REFERER, _REFERER_);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$r = curl_exec($ch);
		curl_close($ch);
		return $r;
	}

}