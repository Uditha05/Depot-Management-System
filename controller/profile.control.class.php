<?php

class ProfileControl{

	public $querryDAO;


	public function __construct(){
        $this->querryDAO = new QuerryDAO();

    }

	public function givedata($userid){
		$res = $this->querryDAO->giveDetails($userid);
		return $res;
	}

	public function changePwd($pwd,$userid){

		$pass = sha1($pwd);

		$this->querryDAO->updatePass($userid,$pass);
	}
}



 ?>
