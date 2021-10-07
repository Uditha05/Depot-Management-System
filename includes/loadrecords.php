<?php
  include 'class-autoload.inc.php';
    echo
    "<thead>
      <tr>
        <th>NumberPlate</th>
        <th>Driver</th>
        <th>Conductor</th>
      </tr>
     </thead>";
    if ($_GET['name'] != "") {
      $factory = new ControllerFactory();
      $cashierObj = $factory->getController("CASHIER");
      $results = $cashierObj->showSelectedDutyRecords($_GET['name'],$_GET['state']);
      $did = 0;
      foreach ($results as $row){
        if ($did == $row['dutyid']) {
          $did = $row['dutyid'];
          continue;
        }
        echo "<tr onclick=\"displySelectedRec( {$row['dutyid']} )\">
                <td class=\"Numplate\">{$row['busid']}</td>
                <td>{$row['driverid']}</td>
                <td>{$row['conductorid']}</td>
              </tr>";
        $did = $row['dutyid'];
      }

    }else {
      $factory = new ControllerFactory();
      $cashierObj = $factory->getController("CASHIER");
      $results = $cashierObj->showDutyRecords($_GET['state']);
      $did = 0;
      foreach ($results as $row){
        if ($did == $row['dutyid']) {
          $did = $row['dutyid'];
          continue;
        }
        echo "<tr onclick=\"displySelectedRec( {$row['dutyid']} )\">
                <td class=\"Numplate\">{$row['busid']}</td>
                <td>{$row['driverid']}</td>
                <td>{$row['conductorid']}</td>
              </tr>";
        $did = $row['dutyid'];
      }
    }


?>
