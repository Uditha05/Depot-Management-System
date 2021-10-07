<?php



class TimetableControl
{
	public $day;
	public $querryDAO;
	public $timetableDAO;
	public $timeslottableDAO;

	public function __construct(){
		$this->day = date("l");
        $this->querryDAO = new QuerryDAO();
        $this->timetableDAO = new TimetableDAO();
		 $this->timeslottableDAO = new TimeslottableDAO();
    }

	public $Cmd1;
	public $Cmd2;


	public function addCmd($cmd1,$cmd2){
	  $this->Cmd1 = $cmd1;
		$this->Cmd2 = $cmd2;

	}

	public function execute($type){
		$temp;
		if($type == "Now"){
			$temp = $this->Cmd1->executefunction();

		}
		if($type == "All"){
			$temp = $this->Cmd2->executefunction();

		}
		return $temp;
	}

}




 ?>
