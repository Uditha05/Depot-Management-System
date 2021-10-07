<?php
    include_once "IController.inf.php";

    class SystemControl implements IController{
        private $SystemDAO_obj;
        private $QuerryDAO_obj;
        private $RouteDAO_obj;

        public function __construct(){
            $this->SystemDAO_obj=new SystemDAO();
            $this->QuerryDAO_obj=new QuerryDAO();
            $this->RouteDAO_obj=new RouteDAO();
        }
        public function get_monthlystatement($date){

            $out =$this->QuerryDAO_obj->get_monthlystatement($date);
            $tableRow = '';
            while($row = $out->fetch()){
                $tableRow.= "<tr>";
                $tableRow.= "<td>{$row['routeNo']}</td>";
                $tableRow.= "<td>{$row['from']}</td>";
                $tableRow.= "<td>{$row['through']}</td>";
                $tableRow.= "<td>{$row['to']}</td>";
                $tableRow.= "<td>{$row['diselUsage']}</td>";
                $tableRow.= "<td>{$row['cashIncome']}</td>";
                $tableRow.= "<td>{$row['incomePerkm']}</td>";
                $tableRow.= "</tr>";
            }

            return $tableRow;
        }
        public function create_monthlystatement($day){
            $new=$this->RouteDAO_obj->getAll();
            foreach ($new as $row){

                $MSid=null;
                $today=date("d");
                $date="{$day}{$today}";
                $realDate=date($date);
                $routeNo=$row['routeid'];
                $discription=$row['Description'];
                $array=explode("-",$discription);
                $from=$array[0];
                if (sizeof($array)==3){
                    $through=$array[1];
                    $to=$array[2];
                }
                else{
                    $through=null;
                    $to=$array[1];
                }


                $distance=$row['Distance'];

                $diselUsage=0;
                $cashIncome=0;
                $lastDutyrecord=$this->QuerryDAO_obj->get_lastDutyrecord($day,$routeNo);
                foreach($lastDutyrecord as $record){
                    $diselUsage=$diselUsage+$record['dieselusage'];
                    $cashIncome=$cashIncome+$record['CashAmount'];
                }
                $incomePerkm=$cashIncome/$distance;
                $savable=new MonthlystatementDTO($MSid,$realDate,$routeNo,$from,$through,$to,$distance,$diselUsage,$cashIncome,$incomePerkm);
                $this->SystemDAO_obj->save($savable);



            }

        }
        public function check(){

            $lastMonth=date("m")-1;
            $Year=date("Y");
            if ($lastMonth<10){
                $lastMonth="0"."{$lastMonth}";
            }
            $date="{$Year}-{$lastMonth}-";
            $result=$this->QuerryDAO_obj->search_monthlystatement($date);
            if ($result){
            }
            else{
                $this->create_monthlystatement($date);
            }
        }

    }



?>
