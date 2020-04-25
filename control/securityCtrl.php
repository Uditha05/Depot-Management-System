
<?php 
include "../model/security.class.php";

class SecurityCtrl extends Security{
	//function to display Id from table
	public function displayIdOption(){
		$opt = '';
		$out = $this->giveNameId();

		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['id']}\">{$row['id']}</option>";
						
		}	
		return $opt;	
	}

	//function to display Name from table
	public function displayNameOption(){
		$opt = '';
		$out = $this->giveNameId();

		while($row = $out->fetch() ){
				$opt.= "<option value=\"{$row['first_name']}\">{$row['first_name']}</option>";		
		}	
		return $opt;	
	}

	// function to mark attendence
	public function markAttend($id,$firstName){
		if ($this->validate($id,$firstName)) {
				#pass data to data base and 
				#check alredy have-- this should implement
			$this->sendData($id,$firstName);
		}
	}

	//function to check choosen propery not empty
	public function validate($id,$firstName){
		if($id != '0' and $firstName != '0'){
			if ($this->matchIdName($id,$firstName)) {
				return true;	
			}else{
				header('location:../view/securityView.php?errors=notmatching');
			}			
		}else{			
			header('location:../view/securityView.php?errors=emptyValue');
		}
	}

	//function to maching Name & ID of employee
	public function matchIdName($id,$firstName){
		$emp1 = $this->getEmp($id,$firstName);
		if (!empty($emp1)) {
			return true;
		}
		else{
			return false;
		}		
	}

	// function to Insert attendence in table
	public function sendData($id,$firstName){
		if ($this->markAtt($id,$firstName)) {
			header('location:../view/securityView.php?errors=no');
		}else{
			header('location:../view/securityView.php?errors=notmark');
		}
	}

	// function to mark Offtime
	public function markOff($id,$firstName){
		if ($this->validate($id,$firstName)) {
			if ($this->checkAttend($id,$firstName)) {
				if ($this->offEMP($id,$firstName)) {
					header('location:../view/securityView.php?errors=offsuccess');
				}
				
			}else{
				header('location:../view/securityView.php?errors=notAttend');
			}	
		}
	}



} // end class


 ?>

