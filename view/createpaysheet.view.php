<?php
  include '../includes/class-autoload.inc.php';
  session_start();

  if(!isset($_SESSION['userId'])){
    header("location:index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="description" content="Creating paysheet for employees.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>
      Create paysheet
    </title>

  </head>
  <body   style="background: #d3e5e5;">
    <header>
      <?php
        include "../includes/headerpart.php";
      ?>
    </header>

    <main  style="margin: 26px 0px;font-family: 'Montserrat-Regular'!important;">
      <div class="wrapper">
        <div class="inner">
            <form id="submitForm">

                <div>
                    <h1>Create Paysheet</h1>
                </div>

                <div id=datacontent>
                  <div class="contentrow">
                    <label for="year">Year:</label>
                    <input id="yearinput" list="year" name="year" onchange="changeMonthInputState(this.value)"/></label>
                    <datalist id="year" >
                      <?php
                        $curruntYear = date("Y");

                        for ($i=2015; $i <= $curruntYear; $i++) {
                          echo "<option value=\"{$i}\">";
                        }
                      ?>
                    </datalist>
                    <label for="month">Month:</label>
                    <input id="monthinput" list="month" name="month" disabled onchange="changeDesignationInputState(this.value)"/></label>
                    <datalist id="month" >
                      <?php
                      $months = array(
                                      'January',
                                      'February',
                                      'March',
                                      'April',
                                      'May',
                                      'June',
                                      'July ',
                                      'August',
                                      'September',
                                      'October',
                                      'November',
                                      'December',
                                    );
                      foreach ($months as $month){
                        echo "<option value=\"{$month}\">";
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="contentrow">
                    <label for="employeedesignations">Designation:</label>
                    <input id="designationsinput" list="designations" name="employeedesignations" disabled onchange="changeEmployeeInputState()"/></label>
                    <datalist id="designations" >
                      <?php
                        $factory = new ControllerFactory();
                        $cashierObj = $factory->getController("CASHIER");
                        $results = $cashierObj->showDesignations();
                        foreach ($results as $row){
                          echo "<option id=\"{$row['sid']}\" value=\"{$row['Designation']}\">";
                        }
                      ?>
                    </datalist>
                  </div>
                  <div class="contentrow">
                    <label for="employeeNames">Name:</label>
                    <input id="Namesinput" list="Names" name="employeeNames" onchange="changeEmployee()" disabled/></label>
                    <datalist id="Names"  >

                    </datalist>
                  </div>
                  <script>
                  function clearfields(){
                    document.getElementById('workingdays').value = "";
                    document.getElementById('basicsalary').value = "";
                    document.getElementById('othours').value = "";
                    document.getElementById('ottotal').value = "";
                    document.getElementById('totalsalary').value = "";
                    document.getElementById('totalsalary').value = addedTot;
                    document.getElementById("err").innerHTML="";
                  }
                  function changeMonthInputState(year){
                    if (year!="") {
                      document.getElementById("monthinput").disabled = false;
                      changeDesignationInputState(document.getElementById('monthinput').value);
                      if(document.getElementById('Namesinput').value!=""){
                        document.getElementById("designationsinput").disabled = false;
                        document.getElementById("Namesinput").disabled = false;
                        changeEmployee();
                      }else{
                        clearfields();
                        if(document.getElementById('designationsinput').value!=""){
                          document.getElementById("designationsinput").disabled = false;
                          changeEmployeeInputState();
                        }else{
                          changeDesignationInputState(document.getElementById('monthinput').value);
                          document.getElementById('dailyamount').value = "";
                          document.getElementById('hourlyotamount').value = "";
                        }
                      }
                      document.getElementById("err").innerHTML="";
                    }else{
                      document.getElementById("monthinput").disabled = true;
                      document.getElementById("designationsinput").disabled = true;
                      document.getElementById("Namesinput").disabled = true;
                      clearfields();
                    }
                  }

                    function changeDesignationInputState(month){
                      if (month!="") {
                        document.getElementById("designationsinput").disabled = false;
                        if(document.getElementById('designationsinput').value!=""){
                          document.getElementById("Namesinput").disabled = false;
                          if(document.getElementById('Namesinput').value!=""){
                            changeEmployee();
                          }
                        }
                        document.getElementById("err").innerHTML="";
                      }else {
                        clearfields();
                        document.getElementById("Namesinput").value = "";
                        document.getElementById("designationsinput").disabled = true;
                        document.getElementById("Namesinput").disabled = true;
                      }


                    }
                    function changeEmployeeInputState(){
                      var designation = document.getElementById("designationsinput").value;
                      if (designation!="") {
                        document.getElementById("Namesinput").disabled = false;
                        if (document.getElementById("Namesinput").value!="") {
                          document.getElementById("Namesinput").value = "";
                          clearfields();
                        }
                        var xhttp1;
                        xhttp1 = new XMLHttpRequest();
                        xhttp1.onreadystatechange = function() {

                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("Names").innerHTML = this.responseText;
                          }
                        };
                        xhttp1.open("GET", "../includes/loadPaysheetData.php?key="+designation+"&task=loadOptions", true);
                        xhttp1.send();

                        var id = "";
                        var x = document.getElementById("designations");
                        for (var i = 0; i < x.options.length ; i++) {
                          var y = document.getElementById('designationsinput').value;
                          var z = x.options[i].value;
                          if (y==z) {
                            id = document.getElementById('designations').options[i].id;
                            break;
                          }
                        }
                        var xhttp2;
                        xhttp2 = new XMLHttpRequest();
                        xhttp2.onreadystatechange = function() {
                          if (this.readyState == 4 && this.status == 200) {
                            var text = this.responseText.split(",");
                            document.getElementById('dailyamount').value = text[0];
                            document.getElementById('hourlyotamount').value = text[1];
                          }
                        };
                        xhttp2.open("GET", "../includes/loadPaysheetData.php?key="+id+"&task=loadSalaryDetails", true);
                        xhttp2.send();
                        document.getElementById("err").innerHTML="";
                      }else{
                        document.getElementById("Namesinput").disabled = true;
                        clearfields();
                        document.getElementById("Namesinput").value = "";
                        document.getElementById('dailyamount').value = "";
                        document.getElementById('hourlyotamount').value = "";
                      }
                    }
                    function getEmployeeId(){
                      var id = "";
                      var x = document.getElementById("Names");
                      for (var i = 0; i < x.options.length ; i++) {
                        var y = document.getElementById('Namesinput').value;
                        var z = x.options[i].value;
                        if (y==z) {
                          id = document.getElementById('Names').options[i].id;
                          break;
                        }

                      }
                      return id;
                    }
                    var addedTot=0;
                    function changeEmployee(){
                      if(document.getElementById('Namesinput').value==""){
                        if(document.getElementById('designationsinput').value!=""){
                          document.getElementById("Namesinput").disabled = false;
                          clearfields();
                          return;
                        }
                      }

                      var id = getEmployeeId();

                      var xhttp2;
                      xhttp2 = new XMLHttpRequest();
                      var year = document.getElementById('yearinput').value;
                      var month = document.getElementById('monthinput').value;
                      var dailyamount = document.getElementById('dailyamount').value;
                      var hourlyotamount = document.getElementById('hourlyotamount').value;
                      xhttp2.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          var text = this.responseText.split(",");

                          document.getElementById('workingdays').value = text[0];
                          document.getElementById('basicsalary').value = text[1];
                          document.getElementById('othours').value = text[2];
                          document.getElementById('ottotal').value = text[3];

                          document.getElementById('totalsalary').value = addedTot + parseFloat(text[4]);
                          document.getElementById("err").innerHTML="";
                        }
                      };
                      xhttp2.open("GET", "../includes/loadPaysheetData.php?key="+id+"&task=loadEmployeeDetails&year="+year+"&month="+month+"&dailyamount="+dailyamount+"&hourlyotamount="+hourlyotamount, true);
                      xhttp2.send();
                    }
                  </script>
                  <div class="contentrow">
                    <label for="workingdays" >Working days:</label>
                    <div class="rowinputdiv">
                      <input type="text" class="rowinput" id="workingdays" name="workingdays" disabled value="">
                    </div>
                  </div>
                  <div class="contentrow">
                    <label for="dailyamount" >Daily salary amount:</label>
                    <div class="rowinputdiv">
                      <input type="text" class="rowinput" id="dailyamount" name="dailyamount" disabled value="">
                    </div>
                  </div>
                  <div class="contentrow">
                    <label for="basicsalary" >Basic Salary Total:</label>
                    <div class="rowinputdiv">
                      <input type="text" class="rowinput" id="basicsalary" name="basicsalary" disabled value="">
                    </div>
                  </div>
                  <div class="contentrow">
                    <label for="othours" >OT Hours:</label>
                    <div class="rowinputdiv">
                      <input type="text" class="rowinput" id="othours" name="othours" disabled value="">
                    </div>
                  </div>
                  <div class="contentrow">
                    <label for="hourlyotamount" >Hourly OT amount:</label>
                    <div class="rowinputdiv">
                      <input type="text" class="rowinput" id="hourlyotamount" name="hourlyotamount" disabled value="">
                    </div>
                  </div>
                  <div class="contentrow">
                    <label for="ottotal" >Total OT amount:</label>
                    <div class="rowinputdiv">
                      <input type="text" class="rowinput" id="ottotal" name="ottotal" disabled value="">
                    </div>
                  </div>
                  <div>
                    <div>
                      <button class="pageButton" id="addnewitem-button" type="button" name="addnewitem">Add new Item<p style="font-size: 27px;padding-left: 17px;font-weight: bolder;">+</p></button>
                    </div>
                  </div>
                  <div id="bonusdivision">
                    <table id = "dutyrecordtable" style="min-width: 600px;">
                      <thead>
                          <tr style="text-align: center;">
                            <th>Bonus type</th>
                            <th>Amount</th>
                            <th>   </th>
                          </tr>
                      </thead>
                      <tbody id="bonusdivisiontbody">

                      </tbody>
                    </table>
                  </div>
                  <script>
                  var added = new Array();
                    $(document).ready(function(){
                      var i =1;
                      //var j = i.toString(10);
                      $('#addnewitem-button').click(function(){
                        $('#bonusdivisiontbody').append('<tr id="bonustablerow'+i+'"><td><input type="text" class="rowinput" id="rowlabel'+i+'" value="" style="width: fit-content;"></td><td><input type="text" class="rowinput" id="rowinput'+i+'" value="" style="width: fit-content;"></td><td><button type="button" class="pageButton" id="trclosebutton" value="'+i+'" onclick="deleteRow(this.value)"> X </button></td></tr>');
                        i++;
                      });
                    });
                    function deleteRow(i){
                      var id = "#bonustablerow" + i;
                      var tot = document.getElementById('totalsalary').value;
                      if (tot=="") {
                        tot=0;
                      }
                      var total = parseFloat(tot);
                      var inputName = document.getElementById("rowinput"+i).value;
                      if (inputName=="") {
                        inputName=0;
                      }
                      total = total - parseFloat(inputName);
                      addedTot = addedTot - parseFloat(inputName);
                      added = arrayRemove(added,"rowinput"+i);
                      $(id).remove();
                      document.getElementById('totalsalary').value = total;
                    }
                    function arrayRemove(arr, value) {
                       return arr.filter(function(ele){
                          return ele != value;
                      });
                    }
                  </script>
                  <div>
                    <div>
                      <button class="pageButton" id="add-button" type="button" onclick="addBonusItems()" name="addbonus">ADD</button>
                    </div>
                    <div id="err">

                    </div>
                  </div>
                  <script>

                  function addBonusItems(){
                    var i =1;
                    //var j = i.toString(10);

                    var totalRowCount = $("#dutyrecordtable tr").length - 1;
                    var tot = document.getElementById('totalsalary').value;
                    if (tot=="") {
                      tot=0;
                    }
                    var total = parseFloat(tot);
                    for (var i = 1; i <= totalRowCount; i++) {
                      var x = document.getElementById("dutyrecordtable").rows[i].id;
                      var labelid = "rowlabel" + x.charAt(x.length-1);
                      var inputid = "rowinput" + x.charAt(x.length-1);
                      var labelName = document.getElementById(labelid).value;
                      var inputName = document.getElementById(inputid).value;
                      if (labelName=="" || inputName=="") {
                        document.getElementById("err").innerHTML = "<p>Check for empty fields in bonus item table</p>";
                        return;
                      } else {
                        if (!added.includes(inputid)) {
                          total = total + parseFloat(inputName);
                          addedTot = addedTot + parseFloat(inputName);
                          added.push(inputid);
                          document.getElementById(labelid).disabled = true;
                          document.getElementById(inputid).disabled = true;
                        }

                      }
                    }
                    document.getElementById('totalsalary').value = total;
                    document.getElementById("err").innerHTML = "";
                  }

                    // $(document).ready(function(){
                    //   var i =1;
                    //   //var j = i.toString(10);
                    //   $('#add-button').click(function(){
                    //
                    //
                    //   });
                    // });

                  </script>

                  <div class="contentrow">
                    <label for="totalsalary" >Total Salary:</label>
                    <div class="rowinputdiv">
                      <input type="text" class="rowinput" id="totalsalary" name="totalsalary" disabled value="">
                    </div>
                  </div>

                  <script>
                    function showNumOfTickets(tktBookId) {
                      var xhttp;
                      xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("tktnumtxt").innerHTML = this.responseText;
                        }
                      };
                      xhttp.open("GET", "../includes/loadTktNumbers.php?tktBookId="+tktBookId, true);
                      xhttp.send();
                    }
                  </script>
                </div>


                <div>
                  <div>
                    <button class="pageButton" id="submit-button" type="button" name="save-paysheet" onclick="savePaysheet()">Submit</button>
                  </div>
                </div>
                <script>
                  function savePaysheet() {
                    //var did = document.getElementById("recordDiv").getAttribute('value');
                    addBonusItems();
                    var year = document.getElementById('yearinput').value;
                    var month = document.getElementById('monthinput').value;
                    var designation = document.getElementById("designationsinput").value;
                    var employee = document.getElementById("Namesinput").value;
                    var empid = getEmployeeId();
                    var workingdays = document.getElementById("workingdays").value;
                    var dailyamount = document.getElementById("dailyamount").value;
                    var basicsalary = document.getElementById("basicsalary").value;
                    var othours = document.getElementById("othours").value;
                    var hourlyotamount = document.getElementById("hourlyotamount").value;
                    var ottotal = document.getElementById("ottotal").value;
                    var totalsalary = document.getElementById("totalsalary").value;
                    var totalRowCount = $("#dutyrecordtable tr").length - 1;
                    var bonusNames = new Array();
                    var bonusValues = new Array();
                    console.log(year);
                    console.log(month);
                    console.log(designation);
                    console.log(employee);
                    console.log(empid);
                    console.log(workingdays);
                    console.log(dailyamount);
                    console.log(basicsalary);
                    console.log(othours);
                    console.log(hourlyotamount);
                    console.log(ottotal);
                    console.log(totalsalary);
                    console.log("rows"+totalRowCount);
                    for (var i = 1; i <= totalRowCount; i++) {
                      var x = document.getElementById("dutyrecordtable").rows[i].id;
                      var labelid = "rowlabel" + x.charAt(x.length-1);
                      var inputid = "rowinput" + x.charAt(x.length-1);
                      var labelName = document.getElementById(labelid).value;
                      bonusNames.push(labelName);
                      var inputName = document.getElementById(inputid).value;
                      bonusValues.push(inputName);
                    }
                    bonusNames = bonusNames.toString();
                    console.log(bonusNames);
                    bonusValues = bonusValues.toString();
                    console.log(bonusValues);

                    if(document.getElementById("err").innerHTML != ""){

                    }else if (year=="" || month=="" || designation=="" || employee=="" || workingdays=="" || dailyamount=="" || basicsalary=="" || othours=="" || hourlyotamount=="" || ottotal==""  || totalsalary=="") {
                      document.getElementById("err").innerHTML = "<p>Check for empty fields</p>";
                    }else {
                      xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("err").innerHTML = "<p>"+this.responseText+"</p>";
                        }
                      };
                      xhttp.open("GET", "../includes/submitForm.php?&page=createPaysheet&year="+year+"&month="+month+"&designation="+designation+"&employee="+employee+"&empid="+empid+"&workingdays="+workingdays+"&dailyamount="+dailyamount+"&basicsalary="+basicsalary+"&othours="+othours+"&hourlyotamount="+hourlyotamount+"&ottotal="+ottotal+"&totalsalary="+totalsalary+"&bonusNames="+bonusNames+"&bonusValues="+bonusValues, true);
                      xhttp.send();
                      //window.location.reload();
                    }
                  }
                </script>

            </form>
        </div>
      </div>

    </main>
    <?php
    include "../includes/footerpart.php";
    ?>
  </body>
</html>
