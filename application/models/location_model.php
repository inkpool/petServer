<?php

class Location_model extends CI_Model{
	function insertLocations($locations){
		foreach ($locations as $key => $value)
		{
// 			$data=array(
// 					'id'=>'',
// 					'imei'=>$value['IMEI'],
// 					'time'=>strtotime($value['Time']),
// 					'battery'=>intval($value['Battery']),
// 					'location_type'=>intval($value['LocationType']),
// 					'latitude'=>doubleval($value['Latitude']),
// 					'longitude'=>doubleval($value['Longitude']),
// 			);
// 			$this->db->insert('my_locations',$data);

			$data=array(
					'id'=>'',
					'imei'=>$value['IMEI'],
					'time'=>$value['Time'],
					'battery'=>intval($value['Battery']),
					'location_type'=>intval($value['LocationType']),
					'latitude'=>$value['Latitude'],
					'longitude'=>$value['Longitude'],
			);
			$this->db->insert('my_locations2',$data);
			
			
		}
	}
	
	function getLatestLocation($imei){
		$query=$this->db->select('*')
				 ->where('imei',$imei)
				 ->limit(1,0)
				 ->order_by('id','desc')
				 ->from('my_locations2');
		return $query->get()->row_array();
	}
}