<?php
    class MonthlystatementDTO{
        private $MSid;
        private $date;
        private $routeNo;
        private $from;
        private $through;
        private $to;
        private $distance;
        private $diselUsage;
        private $cashIncome;
        private $incomePerkm;

        public function __construct($MSid,$date,$routeNo,$from,$through,$to,$distance,$diselUsage,$cashIncome,$incomePerkm){
            $this->MSid=$MSid;
            $this->date=$date;
            $this->routeNo=$routeNo;
            $this->from=$from;
            $this->through=$through;
            $this->to=$to;
            $this->distance=$distance;
            $this->diselUsage=$diselUsage;
            $this->cashIncome=$cashIncome;
            $this->incomePerkm=$incomePerkm;
        }
        public function get_MSid(){
            return $this->MSid;
        }
        public function get_date(){
            return $this->date;
        }
        public function get_routeNo(){
            return $this->routeNo;
        }
        public function get_from(){
            return $this->from;
        }
        public function get_through(){
            return $this->through;
        }
        public function get_to(){
            return $this->to;
        }
        public function get_distance(){
            return $this->distance;
        }
        public function get_diselUsage(){
            return $this->diselUsage;
        }
        public function get_cashIncome(){
            return $this->cashIncome;
        }
        public function get_incomePerkm(){
            return $this->incomePerkm;
        }
    }
?>