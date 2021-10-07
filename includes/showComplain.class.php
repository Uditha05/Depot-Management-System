<?php
include '../includes/class-autoload.inc.php';

//show the selected record from the complain table
if (($_GET['compid']!="")&($_GET['task']=="selectRecord")){
    $factory=new ControllerFactory();
    $ctrl = $factory->getController("ENGINEER");
    $result=$ctrl->displayComplainById($_GET['compid']);

    echo "<div id=\"outForm\">
        <form>
           <input type=\"text\" id=\"selected complain\" value=\"{$result[0]['compid']}\">
           </form>
           <p>complain ID:{$result[0]['compid']}<br>
           duty ID:{$result[0]['dutyid']}<br>
           description:{$result[0]['description']}<br>
           date:{$result[0]['date']}<br>
           state:{$result[0]['state']}<br>
           </div>";
}

//adding a worker to the complain
if (($_GET['compid']!="")&($_GET['workerid']!="")&($_GET['task']=="submitWorker")){
    //echo $_GET['compid'];
    //echo $_GET['workerid'];
    $factory=new ControllerFactory();
    $ctrl = $factory->getController("ENGINEER");
    $result=$ctrl->addworkers($_GET['compid'],$_GET['workerid']);
}

//finishing a complain
if (($_GET['compid']!="")&($_GET['task']=="finishComplain")){
    //echo $_GET['compid'];
    //echo $_GET['workerid'];
    $factory=new ControllerFactory();
    $ctrl = $factory->getController("ENGINEER");
    $result=$ctrl->closeComplain($_GET['compid']);
}

?>