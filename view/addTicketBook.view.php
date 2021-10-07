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
    <meta name="description" content="Adding a new ticket bbok.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>
      Add new Ticket Book
    </title>

  </head>
  <body   style="background: #d3e5e5;">
    <header>
      <?php
        include "../includes/headerpart.php";
      ?>
    </header>

    <main class="wrapper"  style="margin: 26px 0px;font-family: 'Montserrat-Regular'!important;">

        <div class="inner">
            <form id="submitForm">

                <div>
                    <h1>Add new Ticket Book</h1>
                </div>

                <div id=datacontent>

                    <div>
                      <div id="tktbknumdiv">
                        <label for="tktbknuminput">Ticket Book number:</label>
                        <div id="tktbktxt">
                          <input type="text" class="tktbkinput" id="tktbknuminput" name="tktbknuminput" value="">
                        </div>
                      </div>
                      <div id="tktnumdiv">
                        <label id="tktnumlbl" for="starttktnum" >Starting Ticket number:</label>
                        <div id="tktnumtxt">
                          <input type="text" class="tktbkinput" id="starttktnum" name="starttktnum" value="">
                        </div>
                      </div>
                      <div id="tktnumdiv">
                        <label id="tktnumlbl" for="endtktnum" >Ending Ticket number:</label>
                        <div id="tktnumtxt">
                          <input type="text" class="tktbkinput" id="endtktnum" name="endtktnum" value="">
                        </div>
                      </div>
                    </div>
                </div>

                <div>
                  <div>
                    <button class="pageButton"  id="submit-button" type="button" name="close-dutyRecord" onclick="submitNewTicketBook()">Submit</button>
                  </div>
                  <div id="err">

                  </div>
                </div>
                <script>
                  function submitNewTicketBook() {
                    var bookid = document.getElementById("tktbknuminput").value;
                    var strttktnum = document.getElementById("starttktnum").value;
                    var endtktnum = document.getElementById("endtktnum").value;

                    if ((bookid=="") || (strttktnum=="") || (endtktnum=="")) {
                      document.getElementById("err").innerHTML = "<p>Fill empty fields</p>";
                    }else{
                      document.getElementById("err").innerHTML = "";
                      xhttp = new XMLHttpRequest();
                      /*xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("showSelected").innerHTML = this.responseText;
                        }
                      };*/
                      xhttp.open("GET", "../includes/submitTktBook.php?bookid="+bookid+"&strttktnum="+strttktnum+"&endtktnum="+endtktnum, true);
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
