<?php
class userlistDTO{
    private $id;
    //private $frist_name;
    private $designation;
    private $email;
    private $password;
    private $is_deleted;

    public function __construct($id,$routeid,$status,$sloid){
        $this->id=$id;
        //$this->frist_name=$frist_name;
        $this->designation=$designation;
        $this->email=$email;
        $this->password=$password;
        $this->is_deleted=$is_deleted;

    }
    public function giveid(){
        return $this->id;
    }
    /*public function givefname(){
        return $this->frist_name;
    }*/
    public function givedesig(){
        return $this->designation;
    }
    public function giveema(){
        return $this->email;
    }
    public function givepass(){
        return $this->password;
    }
    public function giveisdel(){
        return $this->is_deleted;
    }



}
?>
