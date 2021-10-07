<?php
  include "../includes/class-autoload.inc.php";

  session_start();

  if(!isset($_SESSION['userId'])){
    header("location:index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Cashier workplace.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Cashier section</title>
  </head>
  <body style="background: #d3e5e5;">
      <?php
        include "../includes/headerpart.php";
      ?>
    <main class="wrapper">
      <div class="indexinner">
          <button class="menuebutton"><a class="menuetitle" href="tbInitiate.view.php">Initiate Ticket Book</a></button>
          <button class="menuebutton"><a class="menuetitle" href="dutyRecordClose.view.php">Close Ticket Book</a></button>
          <button class="menuebutton"><a class="menuetitle" href="createComplain.view.php">Create Complain</a></button>
          <button class="menuebutton"><a class="menuetitle" href="createPaysheet.view.php">Create paysheet</a></button>
          <button class="menuebutton"><a class="menuetitle" href="addTicketBook.view.php">Add new Ticket Book</a></button>
      </div>
    </main>
    <?php
    include "../includes/footerpart.php";
    ?>
  </body>
</html>
