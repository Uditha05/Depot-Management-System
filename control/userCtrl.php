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
				$result=$this->getResult();
				print_r($result);
				$_SESSION['userId'] = $result['id'];
				$_SESSION['first_name'] = $result['first_name'];
				$_SESSION['designation'] = $result['designation'];
				
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


	public function can_login(){
		$user1 = $this->getUser($this->email,$this->pwd);
		if (!empty($user1)) {
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

	public function getResult(){
		$user2 = $this->getUser($this->email,$this->pwd);
		return $user2;
	}




}//end class