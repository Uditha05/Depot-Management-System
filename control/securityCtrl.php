
<?php 
include "../model/security.class.php";

class SecurityCtrl extends Security{
	public function displayIdOption(){
		$opt = '';
		$out = $this->giveNameId();

		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['id']}\">{$row['id']}</option>";
						
		}	
		return $opt;	
	}

	public function displayNameOption(){
		$opt = '';
		$out = $this->giveNameId();

		while($row = $out->fetch() ){
				$opt.= "<option value=\"{$row['first_name']}\">{$row['first_name']}</option>";		
		}	
		return $opt;	
	}

} // end class


 ?>

