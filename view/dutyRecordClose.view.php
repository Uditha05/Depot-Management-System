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
    <meta name="description" content="closing ticket book for a duty record.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>
      Close Duty Record
    </title>

  </head>
  <body style="background: #d3e5e5;">
    <header>
      <?php
        include "../includes/headerpart.php";
      ?>
    </header>

    <main class="wrapper" style="margin: 26px 0px;font-family: 'Montserrat-Regular'!important;">

        <div class="inner">
            <form id="submitForm">

                <div>
                    <h1>Duty Record close form</h1>
                </div>


                <div id="enternamediv">
                  <label for="searchbox">Enter name:</label>
                  <input type="text" id="searchbox" onkeyup="showDutyRec(this.value)" placeholder="Conductor or Driver">
                </div>
                <script>
                  function showDutyRec(name) {
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("dutyrecordtable").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "../includes/loadRecords.php?name="+name+"&state=returned", true);
                    xhttp.send();
                  }
                </script>


                <div id=datacontent>
                  <table id = "dutyrecordtable">
                    <thead>
                        <tr>
                          <th>NumberPlate</th>
                          <th>Driver</th>
                          <th>Conductor</th>
                        </tr>
                    </thead>
                    <?php
                      $factory = new ControllerFactory();
                      $cashierObj = $factory->getController("CASHIER");
                      $results = $cashierObj->showDutyRecords("returned");
                      foreach ($results as $row){
                        echo "<tr onclick=\"displySelectedRec( {$row['dutyid']} )\">
                                <td class=\"Numplate\">{$row['busid']}</td>
                                <td>{$row['driverid']}</td>
                                <td>{$row['conductorid']}</td>
                              </tr>";
                      }
                    ?>
                  </table>
                  <div id="showSelected" >
                    <div id="recordDiv" value="notset">
                      <p>Select a Duty record from table</p>
                    </div>
                    <div>
                      <div id="tktbknumdiv">
                        <label for="tktbknuminput">Ticket Book number:</label>
                        <div id="tktbktxt">
                          <input type="text" class="tktbkinput" id="tktbknuminput" name="tktbknuminput" disabled value="">
                        </div>
                      </div>
                      <div id="tktnumdiv">
                        <label id="tktnumlbl" for="tktnum" >Ticket number:</label>
                        <div id="tktnumtxt">
                          <input type="text" class="tktbkinput" id="tktnum" name="tktnum" disabled value="">
                        </div>
                      </div>
                      <div id="cashamountdiv">
                        <label id="cashamountlbl" for="amountinput" >Cash amount(Rs):</label>
                        <div id="amountinputdiv">
                          <input type="text" class="amountinput" id="amount" name="amountinput" disabled value="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="busStateDiv">
                      <label id="busStatuslbl">Bus Status :</label>
                      <input type="radio" class="busStateRadioBtn" id="park" name="state" value="parked" checked>
                      <label for="park">Park</label><br>
                      <input type="radio" class="busStateRadioBtn" id="unavailable" name="state" value="unavailable">
                      <label for="unavailable">Unavailable</label><br>
                  </div>
                </div>
                <script>
                  function displySelectedRec(dutyid){
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("showSelected").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "../includes/showRecord.php?dutyId="+dutyid+"&page=dRecClose", true);
                    xhttp.send();
                  }
                </script>


                <div>
                  <div>
                    <button class="pageButton" id="submit-button" type="button" name="close-dutyRecord" onclick="closeDutyRecordForm()">Submit</button>
                  </div>
                  <div id="err">

                  </div>
                </div>
                <script>
                  function closeDutyRecordForm() {
                    var did = document.getElementById("recordDiv").getAttribute('value');
                    var bookid = document.getElementById("tktbknuminput").value;
                    var tktnum = document.getElementById("tktnum").value;
                    var amount = document.getElementById("amount").value;
                    var status = document.querySelector('input[name="state"]:checked').value;

                    if ((did=="notset") && (tktnum=="") && (amount=="")) {
                      document.getElementById("err").innerHTML = "<p>Select a record and enter ticket number and enter cash amount</p>";
                    }else if ((did!="notset") && (tktnum=="") && (amount=="")) {
                      document.getElementById("err").innerHTML = "<p>Enter ticket number and enter cash amount</p>";
                    }else if ((did!="notset") && (tktnum!="") && (amount=="")) {
                      document.getElementById("err").innerHTML = "<p>Enter cash amount</p>";
                    }else if ((did!="notset") && (tktnum=="") && (amount!="")) {
                      document.getElementById("err").innerHTML = "<p>Enter ticket number</p>";
                    }else{
                      document.getElementById("err").innerHTML = "";
                      xhttp = new XMLHttpRequest();
                      /*xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("showSelected").innerHTML = this.responseText;
                        }
                      };*/
                      xhttp.open("GET", "../includes/submitForm.php?dutyId="+did+"&bookId="+bookid+"&tktnum="+tktnum+"&amount="+amount+"&busStatus="+status+"&page=dRecClose", true);
                      xhttp.send();
                      window.location.reload();
                    }
                  }
                </script>

            </form>
        </div>
    </main>
    <?php
    include "../includes/footerpart.php";
    ?>
  </body>
</html>
