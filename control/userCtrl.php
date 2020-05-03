<?php 

<<<<<<< HEAD
include '../model/user.class.php';

=======
include 'model/user.class.php';
>>>>>>> 11517a8d77e3db796e976fbc02308f4aae5b6d7f


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
	
	//save user sesson and switch related view page
	public function run_user(){
		if ($this->require_validity()) {

			if ($this->can_login()) {
				$result=$this->getResult();
				$_SESSION['userId'] = $result['id'];
				$_SESSION['first_name'] = $result['first_name'];
				$_SESSION['designation'] = $result['designation'];
<<<<<<< HEAD
	
				switch ($_SESSION['designation']) {
					case 'transporter':
						header("location:../view/transporterView.php");
						break;
					case 'security':
						header("location:../view/securityView.php");
						break;
					case 'addmin':
						header("location:../view/addminView.php");
						break;
					case 'chashier':
						header("location:../view/cashierView.php");
						break;
					case 'clerk':
						header("location:../view/clerkView.php");
						break;
					default:
						// header("location:../index.php?sessionError=yes");						
=======
				
				switch ($_SESSION['designation']) {
					case 'transporter':
						header("location:view/transporterView.php");
						break;
					case 'security':
						header("location:view/securityView.php");
						break;
					case 'addmin':
						header("location:view/addminView.php");
						break;
					case 'chashier':
						header("location:view/cashierView.php");
						break;
					case 'clerk':
						header("location:view/clerkView.php");
						break;
					default:
						header("location:index.php?sessionError=yes");						
>>>>>>> 11517a8d77e3db796e976fbc02308f4aae5b6d7f
						break;
				}
				

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

	// function for validate user
	public function can_login(){
		$user1 = $this->getUser($this->email,$this->pwd);
		if (!empty($user1)) {
			return true;
		}
		else{
			return $user1;
		}
	}

	// function for check empty fields
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

	// get user from data base
	public function getResult(){
		$user2 = $this->getUser($this->email,$this->pwd);
		return $user2;
	}




}//end class