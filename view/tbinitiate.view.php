<?php
  include '../includes/class-autoload.inc.php';
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="description" content="Initiating ticket book for a duty record.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="../includes/styles.css">
    <title>
      Initiate Ticket Book
    </title>

  </head>
  <body>
    <header>

    </header>

    <main class="wrapper">

        <div class="inner">
            <form id="submitForm" action="view\tbinitiate.view.php" method="post">

                <div>
                    <h1>Ticket book issue form</h1>
                </div>


                <div id="enternamediv">
                  <label for="searchbox">Enter name:</label>
                  <input type="text" id="searchbox" onkeyup="showdrec(this.value)" placeholder="Conductor or Driver">
                </div>
                <script>
                  function showdrec(str) {
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("dutyrecordtable").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "../includes/loadrecords.php?q="+str, true);
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
                      $cashierObj = new CashierContrl();
                      $results = $cashierObj->showDutyRecords();
                      foreach ($results as $row){
                        echo "<tr onclick=\"displyselectrec( {$row['dutyid']} )\">
                                <td class=\"numplate\">{$row['busid']}</td>
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
                  function displyselectrec(str){
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("showSelected").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "../includes/showrecord.php?r="+str, true);
                    xhttp.send();
                  }
                </script>


                <div>
                  <div id="enternamediv">
                    <label for="tktbknum">Ticket Book number:</label>
                    <div class="tktnumslctdiv">
                        <select id="tktbknum" name="tktbknum" onchange="shownumoftkts(this.value)">
                          <option value="default">Select a Ticket book</option>
                          <?php
                            $cashierObj = new CashierContrl();
                            $results = $cashierObj->showTktBooks();
                            foreach ($results as $row){
                              echo "<option value=\"{$row['ticketbookid']}\">{$row['ticketbookid']}</option>";
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                  <script>
                    function shownumoftkts(str) {
                      var xhttp;
                      xhttp = new XMLHttpRequest();
                      xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("tktnumtxt").innerHTML = this.responseText;
                        }
                      };
                      xhttp.open("GET", "../includes/loadtktnumbers.php?q="+str, true);
                      xhttp.send();
                    }
                  </script>


                  <div id="tktnumdiv">
                    <label id="tktbknumslt" for="tktnum" >Ticket number:</label>
                    <div id="tktnumtxt">
                      <input type="text" id="tktnum" name="tktnum" disabled value="">
                    </div>
                  </div>
                </div>


                <div>
                  <div>
                    <button id="submit-button" type="button" name="issue-book" onclick="submitBkIssueForm()">Submit</button>
                  </div>
                  <div id="err">

                  </div>
                </div>
                <script>
                  function submitBkIssueForm() {
                    var did = document.getElementById("recordDiv").getAttribute('value');
                    var bookid = document.getElementById("tktbknum").value;
                    if ((did=="notset") && (bookid=="default")) {
                      document.getElementById("err").innerHTML = "<p>Select a record and ticket book</p>";
                    }else if ((did!="notset") && (bookid=="default")) {
                      document.getElementById("err").innerHTML = "<p>Select a ticket book</p>";
                    }else if ((did=="notset") && (bookid!="default")) {
                      document.getElementById("err").innerHTML = "<p>Select a record</p>";
                    }else{
                      document.getElementById("err").innerHTML = "";
                      /*var xhttp;
                      xhttp = new XMLHttpRequest();
                      xhttp.open("GET", "../includes/loadtktnumbers.php?q="+str, true);
                      xhttp.send();*/
                    /*  <?php
                        echo "console.log(did)";

                      ?>*/
                      window.location.reload();
                    }


                    console.log(did);
                    console.log(bookid);
                  }
                </script>

            </form>
        </div>
    </main>
  </body>
</html>
