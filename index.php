<?php
  session_start();
  /*include 'includes/class-autoload.inc.php';*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Cashier workplace.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="includes/styles.css">
    <title>Cashier section</title>
  </head>
  <body>
    <header>

    </header>
    <main class="wrapper">
      <div class="indexinner">
        <ul>
          <div>
            <button class="menuebutton"><a href="view\tbinitiate.view.php">Initiate Ticket Book</a></button>
            <button class="menuebutton"><a href="view\tbclose.view.php">Close Ticket Book</a></button>
          </div>
          <div>
            <button class="menuebutton"><a href="view\createcomplain.view.php">Create Complin</a></button>
            <button class="menuebutton"><a href="view\createpaysheet.view.php">Create paysheet</a></button>
          </div>
        </ul>
      </div>
    </main>
  </body>
</html>
