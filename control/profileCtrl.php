<?php 
include '../model/profile.class.php';
class ProfileCtrl extends Profile{
	public function givedata($userid){
		$res = $this->giveDetails($userid);
		return $res;
	}

	public function changePwd($pwd,$userid){
		$pass = sha1($pwd);
		$this->updatePass($userid,$pass);
	}
}



 ?>