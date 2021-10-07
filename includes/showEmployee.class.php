<?php
include '../includes/class-autoload.inc.php';

//show employee deatils when typing a id
if ($_GET['empid']!=""){
    $factory=new ControllerFactory();
    $ctrl = $factory->getController("SO");
    $result=$ctrl->displayEmployeeById($_GET['empid']);

    if ($result){
    echo "<div id=\"empDisplay\" >
    <H3 style=\"text-align:center\">Employee Details</H3>
           <p>Employee ID:{$result[0]['empid']}<br>
           First Name:{$result[0]['FirstName']}<br>
           Last Name:{$result[0]['LastName']}<br>
           Address:{$result[0]['Address']}<br>
           Telephone No:{$result[0]['Telephone']}<br>
           Designation:{$result[0]['Designation']}<br>
           </div>";
    }
}
?>
