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
    if ($_GET['q'] != "") {
      $cashierObj = new CashierContrl();
      $results = $cashierObj->showSelectedDutyRecords($_GET['q']);
      $did = 0;
      foreach ($results as $row){
        if ($did == $row['dutyid']) {
          $did = $did + 1;
          continue;
        }
        echo "<tr onclick=\"displyselectrec( {$row['dutyid']} )\">
                <td class=\"numplate\">{$row['busid']}</td>
                <td>{$row['driverid']}</td>
                <td>{$row['conductorid']}</td>
              </tr>";
        $did = $did + 1;
      }

    }else {
      $cashierObj = new CashierContrl();
      $results = $cashierObj->showDutyRecords();
      $did = 0;
      foreach ($results as $row){
        if ($did == $row['dutyid']) {
          $did = $did + 1;
          continue;
        }
        echo "<tr onclick=\"displyselectrec( {$row['dutyid']} )\">
                <td class=\"numplate\">{$row['busid']}</td>
                <td>{$row['driverid']}</td>
                <td>{$row['conductorid']}</td>
              </tr>";
        $did = $did + 1;
      }
    }


?>
