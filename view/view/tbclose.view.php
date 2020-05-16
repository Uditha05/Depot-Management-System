<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="closing ticket book for a duty record.">
    <meta name="viewport" content="width-device-width, initial-scaled=1">
    <link rel="stylesheet" href="css/styles.css">
    <title>Close Ticket Book</title>
  </head>
  <body>
    <header>

    </header>

    <main>
      <?php
      $cashierObj = new CashierView();
      $results = $cashierObj->getRoutes();
      echo "$results[1]['routeid']";
      ?>
    </main>
  </body>
</html>
