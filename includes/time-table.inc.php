<?php 

include "control/timeTableCtrl.php";

$today = date("l");
$timetableCtrl = new TimeTableCtrl($today);
$showTable =  $timetableCtrl->getTodaySchedule();

 ?>

 <div class="container" style="margin-top: 10px;">
		  <h2>Time Table Of Bus From Horana</h2>
		  <h3>Today Is <?php echo $today; ?></h3>
		  <p>All information according to daily routine.someday this will not corect</p>
		  <p>Today time table is below (status := pending/not Dispatch/ Dispatched / Arived / not working)</p>            
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Destination</th>
		        <th>Start time</th>
		        <th>Current State</th>
		        <th>Route</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php echo $showTable; ?>

		    </tbody>
		  </table>
</div>	