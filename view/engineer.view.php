<?php
include '../includes/class-autoload.inc.php';
session_start();

if(!isset($_SESSION['userId'])){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir = "ltr">
<head>
<meta charset = "utf-8">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
<title>Engineer</title>

</head>

<body>
<header>
<?php
include "../includes/headerpart.php";
?>
</header>


<h3>Complains to be Assign Workers</h3>
<table>
<tr>
<th>Complain ID</th>
<th>Bus Number</th>
<th>Complain</th>
</tr>
<?php
//display newly created complains
$factory=new ControllerFactory();
$ctrl = $factory->getController("ENGINEER");
$ctrl->displayCreatedComplains();
?>
</table>




<script>
    function displaySelectedRecord(compid){
        var task="selectRecord"
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("outForm").innerHTML = this.responseText;
            } 
        };
        
        xhttp.open("GET", "../includes/showComplain.class.php?compid="+compid+"&workerid="+""+"&task="+task, true);
        xhttp.send();
    }
</script>
<script>
    function submit_added_worker(){
        var compid=document.getElementById("selected complain").value;
        var workerid=document.getElementById("add_worker").value;
        if ((compid=="select a complain") && (workerid=="empty")){
            document.getElementById("displayresult").innerHTML = "<p>Select a complain and a worker</p>";
        }else if ((compid!="select a complain") && (workerid=="empty")){
            document.getElementById("displayresult").innerHTML = "<p>Select a worker</p>";
        }else if ((compid =="select a complain") && (workerid!="empty")){
            document.getElementById("displayresult").innerHTML = "<p>Select a complain</p>";
        }else{
            document.getElementById("displayresult").innerHTML = "<p>done</p>";

            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("outForm").innerHTML = this.responseText;
                window.location.reload();
            } 
            };
        
            xhttp.open("GET", "../includes/showComplain.class.php?compid="+compid+"&workerid="+workerid+"&task=submitWorker", true);
            xhttp.send();
            
        }
    }
        function finish_complain(){
            var compid=document.getElementById("selected complain").value;
            if (compid=="select a complain"){
                document.getElementById("displayresult").innerHTML = "<p>Select a complain to finish</p>";
            }
            else{
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("outForm").innerHTML = this.responseText;
                   window.location.reload();
                } 
                };
        
                xhttp.open("GET", "../includes/showComplain.class.php?compid="+compid+"&workerid="+""+"&task=finishComplain", true);
                xhttp.send();
                
                
            }
        }
    
</script>

<div id="displayresult">
</div>

<h3>Workers Assigned Complains</h3>
<table>
<tr>
<th>Complain ID</th>
<th>Bus Number</th>
<th>Complain</th>
<th>Assigned Workers</th>
</tr>

<?php
//display wokers added complains
$ctrl->displayWorkerAddedComplian();
?>
</table>


<div id="outForm">
<form>
    <input type="text" id="selected complain" value="select a complain">
</form>
</div>
<div id="worker adding">
<form>
<select id="add_worker">
<option id="add_worker" value="empty">select a worker</option>
<?php
//get free workers from the employee list
$names=$ctrl->displayFreeWorkers();
foreach($names as $name){
    echo "<option id=\"add_worker\" value=\"{$name['empid']}\">{$name['FirstName']}</option>";
}
?>
</select>

<button type="button" onclick="submit_added_worker()">add worker</submit>
<button type="button" onclick="finish_complain()">finish the complain</submit>
</form>
</div>

<?php
include "../includes/footerpart.php";
?>
</body>
</html>