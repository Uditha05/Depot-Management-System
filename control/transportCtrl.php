<?php 
include "../model/transporter.class.php";

class TransportCtrl extends Transporter{


	//function to get bus list details
	public function getBusNo($disP){
		$opt = '';
		$result = $this->getBusList($disP);

		while($row = $result->fetch()){
			$opt.= "<option value=\"{$row['busNo']}\">{$row['busNo']}</option>";					
		}	
		return $opt;
	}
}

