
<?php
include_once "facademaker.inf.php";


class TranspoterControl implements Facademaker{

	public $querryDAO;


	public function __construct(){
        $this->querryDAO = new QuerryDAO();

    }


	//function to get bus list details
	public function getBusNo($disP){
		$opt = '';
		$result = $this->querryDAO->getBusList($disP);

		while($row = $result->fetch()){
			$opt.= "<option value=\"{$row['busid']}\">{$row['Numplate']}</option>";
		}
		return $opt;
	}

	//function to mark dispatch
	public function markDispatch($busno,$diesel){
		if ($this->checkFilling($busno,$diesel)) {
			$this->querryDAO->markDis($busno,$diesel);
			//$this->updateTimeTable($busno,"Dispatched");
			header('location:../view/transporter.view.php?mark=ok');
		}
		else{
			header('location:../view/transporter.view.php?mark=not');
		}
	}

	//function to mark arrival
	public function markArrive($busno){
		$temp = "11";
		if ($this->checkFilling($busno,$temp)) {
			$this->querryDAO->markArr($busno);
			//$this->updateTimeTable($busno,"Arrived");
			header('location:../view/transporter.view.php?mark=ok');
		}else
		{
			header('location:../view/transporter.view.php?mark=not');
		}
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




//give to admin facade
	public function giveToAdmin()
	{


		$out = $this->querryDAO->giveByTranspoter();


		foreach ($out as $row) {
			# code...
			echo  "<tr><td>{$row['numplate']}</td><td>{$row['DispatchTime']}</td><td>{$row['time']}</td><td>{$row['dieselusage']}</td></tr>";

		}


	}



}
