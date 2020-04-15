<?php 
include 'model/user.class.php';

class UserCtrl extends User{
	public $email;
	public $pwd;
	public $field;
	public $error = array();

	public function __construct($email,$password){
		$this->email = $email;
		$this->pwd = $password;
		$this->field = array(
			'email' => $this->email,
			'password' => $this->pwd
		);
	}

	public function run_user(){
		if ($this->require_validity()) {

			if ($this->can_login()) {
				header("location:view/pages/dashboard.php");
			}
			else{
				$err = " Invalid User ";
				return $err;
			}
		}
		else{
			$err =" Plz fill all fields";
			return $err;
		}
	}


	public function can_login(){
		$user1 = $this->getUser($this->email,$this->pwd);
		if (!empty($user)) {
			return true;
		}
		else{
			return $user1;
		}
	}


	public function require_validity(){
		$count = 0;
		foreach ($this->field as $key => $value) {
			if (empty($value)) {
				return false;
			}
		}
		if ($count == 0) {
			return true;
		
		}
	}





	// //check user name and password set
	// public function is_setMethod(){
				
	// 	if (!isset($_POST['email']) || strlen($_POST['email'])<1) {
	// 		$errors[] = "user name invalid";
	// 	}if (!isset($_POST['password']) || strlen($_POST['password'])<1) {
	// 		$errors[] = "password invalid";
	// 	}
	// }







	// public function checkValid($email,$pwd){
	// 	$user1 = $this->getUser($email,$pwd);

	// 	if ($user1 != "erro") {
	// 		$this->selectUser($user1);
	// 	}
	// 	else{
	// 		$error = "Invalid User..!";
	// 		// include 'includes/error.class.php';
	// 		// $e = new Error($error);
	// 	}
	// }

	// public function selectUser($user1){
	// 	echo "string sucsessss";
	// } 
}