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
    <meta name="description" content="Initiating ticket book for a duty record.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>
      Initiate Ticket Book
    </title>

  </head>
  <body style="background: #d3e5e5;">
    <header>
      <?php
        include "../includes/headerpart.php";
      ?>
    </header>

    <main style="margin: 26px 0px;font-family: 'Montserrat-Regular'!important;">
      <div class="wrapper">
        <div class="inner">
            <form id="submitForm">

                <div>
                    <h1>Ticket book issue form</h1>
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
                    xhttp.open("GET", "../includes/loadRecords.php?name="+name+"&state=waiting", true);
                    xhttp.send();
                  }
                </script>


                <div>
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
                      $results = $cashierObj->showDutyRecords("waiting");
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
                    xhttp.open("GET", "../includes/showRecord.php?dutyId="+dutyid+"&page=tbInitiate", true);
                    xhttp.send();
                  }
                </script>


                <div>
                  <div id="tktbknumdiv">
                    <label for="tktbknum">Ticket Book number:</label>
                    <div class="tktnumslctdiv">
                        <select id="tktbknum" name="tktbknum" onchange="showNumOfTickets(this.value)">
                          <option value="default">Select a Ticket book</option>
                          <?php
                            $factory = new ControllerFactory();
                            $cashierObj = $factory->getController("CASHIER");
                            $results = $cashierObj->showTktBooks("ready");
                            foreach ($results as $row){
                              echo "<option value=\"{$row['ticketbookid']}\">{$row['ticketbookid']}</option>";
                            }
                          ?>
                        </select>
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


                  <div id="tktnumdiv">
                    <label id="tktnumlbl" for="tktnum" >Ticket number:</label>
                    <div id="tktnumtxt">
                      <input type="text" class="tktbkinput" id="tktnum" name="tktnum" disabled value="">
                    </div>
                    <button class="pageButton"  id="chngbtn" type="button" name="changeTktNum">Change</button>
                    <script>
                      document.getElementById("chngbtn").addEventListener('click', function(){
                        document.querySelector('.Popup-login').style.display='flex';
                      });
                    </script>
                  </div>
                </div>


                <div>
                  <div>
                    <button class="pageButton" id="submit-button" type="button" name="issue-book" onclick="submitBkIssueForm()">Submit</button>
                  </div>
                  <div id="err">

                  </div>
                </div>
                <script>
                  function submitBkIssueForm() {
                    var did = document.getElementById("recordDiv").getAttribute('value');
                    var bookid = document.getElementById("tktbknum").value;
                    var tktnum = document.getElementById("tktnum").value;
                    if ((did=="notset") && (bookid=="default")) {
                      document.getElementById("err").innerHTML = "<p>Select a record and ticket book</p>";
                    }else if ((did!="notset") && (bookid=="default")) {
                      document.getElementById("err").innerHTML = "<p>Select a ticket book</p>";
                    }else if ((did=="notset") && (bookid!="default")) {
                      document.getElementById("err").innerHTML = "<p>Select a record</p>";
                    }else{
                      document.getElementById("err").innerHTML = "";
                      xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          tktnum = document.getElementById("tktnum").value;
                          document.getElementById("tktnum").disabled = false;
                        }
                      };
                      xhttp.open("GET", "../includes/submitForm.php?dutyId="+did+"&bookId="+bookid+"&page=tbInitiate"+bookid+"&tktnum="+tktnum, true);
                      xhttp.send();
                      window.location.reload();
                    }
                  }
                </script>

            </form>
        </div>
      </div>
    <div class="Popup-login">
      <div class="Popup-login-content">
        <div class="close">+</div>
        <script>
          document.querySelector('.close').addEventListener('click', function(){
            document.querySelector('.Popup-login').style.display='none';
          });
        </script>
        <img src="img/login picture - 1.jpg" alt="" style="height: 46%;">

        <form action="">
          <input id="loginusername" class="login-input" type="email" placeholder="name">
          <input id="loginpwd" class="login-input" type="password" placeholder="E-mail">
          <div id="err1">
            <p style="color: blue;"></p>
          </div>
          <button  id="login-submit" type="button" name="login-submit" onclick="givePermission()">Submit</button>
        </form>
        <script>
          function givePermission(){
            var username = document.getElementById("loginusername").value;
            var pwd = document.getElementById("loginpwd").value;
            console.log(username);
            console.log(pwd);
            if ((username=="") || (pwd=="")) {
              document.getElementById("err1").innerHTML = "<p style=\"color: blue;\">Check for empty feilds</p>";
            }else{

              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var out = this.responseText;
                  if (out=="true") {
                    console.log(out);
                    document.querySelector('.Popup-login').style.display='none';
                    document.getElementById("tktnum").disabled = false;
                    document.getElementById("err1").innerHTML = "<p style=\"color: blue;\"></p>";
                  }else{
                    document.getElementById("err1").innerHTML = "<p style=\"color: blue;\">Insert correct details</p>";
                  }

                }
              };
              xhttp.open("GET", "../includes/submitForm.php?username="+username+"&pwd="+pwd+"&page=givePermission", true);
              xhttp.send();

            }

          }
        </script>

      </div>
    </div>


    </main>
    <?php
    include "../includes/footerpart.php";
    ?>
  </body>
</html>
