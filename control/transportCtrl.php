<?php 
include "../model/transporter.class.php";

class TransportCtrl extends Transporter{


	//function to get bus list details
	public function getBusNo($disP){
		$opt = '';
		$result = $this->getBusList($disP);

		while($row = $result->fetch()){
			$opt.= "<option value=\"{$row['busid']}\">{$row['numplate']}</option>";					
		}	
		return $opt;
	}

	//function to mark dispatch
	public function markDispatch($busno,$diesel){
		if ($this->checkFilling($busno,$diesel)) {
			$this->markDis($busno,$diesel);
			//$this->updateTimeTable($busno,"Dispatched");			
			header('location:../view/transporterView.php?mark=ok');
		}else{
			header('location:../view/transporterView.php?mark=not');
		}
	}

	//function to mark arrival
	public function markArrive($busno){
		$temp = "11";
		if ($this->checkFilling($busno,$temp)) {
			$this->markArr($busno);
			//$this->updateTimeTable($busno,"Arrived");
			header('location:../view/transporterView.php?mark=ok');
		}else
		{
			header('location:../view/transporterView.php?mark=not');
		}		
	}

	private function updateTimeTable($busno,$status){
		$this->updateTime($busno,$status);
	}

	//function to check filling
	private function checkFilling($text1,$text2){
		if (empty($text1)) {
			return false;
		}else if (empty($text2)) {
			return false;
		}else{
			return true;
		}
	}

}

