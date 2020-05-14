<?php 
session_start();
include '../model/user.class.php';


class UserCtrl extends User{
	public $email;
	public $pwd;
	public $field;
	public $error = array();

	public function __construct($email,$password){
		$this->email = $email;
		$this->pwd = $password;
	}
	
	//save user sesson and switch related view page
	public function run_user(){
		if ($this->require_validity()) {

			if ($this->can_login()) {

				$result=$this->getResult();
				print_r($result);
				$_SESSION['userId'] = $result['id'];
				$_SESSION['first_name'] = $result['first_name'];
				$_SESSION['designation'] = $result['designation'];
				
				switch ($_SESSION['designation']) {
					case 'transporter':
						header("location: transporterView.php");
						break;
					case 'security':
						header("location: securityView.php");
						break;
					case 'addmin':
						header("location: addminView.php");
						break;
					case 'chashier':
						header("location: cashierView.php");
						break;
					case 'clerk':
						header('location: clerkView.php');
						break;
					default:
						// header("location:../index.php?sessionError=yes");						
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
		if (empty($this->email)) {
			return false;
		}
		else if(empty($this->pwd)){
			return false;
		}
		else{
			return true;
		}		
	}


	// get user from data base
	public function getResult(){
		$user2 = $this->getUser($this->email,$this->pwd);
		return $user2;
	}




}//end class