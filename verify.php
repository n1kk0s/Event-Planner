<?php

  include('connect.php');

  if(isset($_GET['create'])) {
    $key = $_GET['eventKey'];
    $name = $_GET['name'];
    $host = $_GET['host'];
    $date = $_GET['date'];
    $location = $_GET['location'];
    $description = $_GET['description'];

    $addkey = mysqli_real_escape_string($conn, $key);
    $addname = mysqli_real_escape_string($conn, $name);
    $addhost = mysqli_real_escape_string($conn, $host);
    $adddate = mysqli_real_escape_string($conn, $date);
    $addlocation = mysqli_real_escape_string($conn, $location);
    $adddescription = mysqli_real_escape_string($conn, $description);


    $sql = "INSERT INTO event (eventKey, name, host, date, location, description) VALUES ('{$addkey}', '{$addname}', '{$addhost}', '{$adddate}', '{$addlocation}', '{$adddescription}')";
    $result = mysqli_query($conn, $sql);

    if($result) {
      echo "<html>";
      echo "<head>";
        echo "<title>Success!</title>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>Congrats!</h1>";
        echo "<h2 class='subtitle'>We were able to create your event!<br><br>Want to check it out?</h2>";
        echo "<form action='event.php'><input class='button' type='submit' name='join' value='View Event'></form>";
        echo "<form action='index.php'><input class='button' type='submit' value='Home'></form>";
      echo "</body>";
      echo "</html>";
    } else {
      echo "<html>";
      echo "<head>";
        echo "<title>Uh Oh...</title>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>Whoops...</h1>";
        echo "<h2 class='subtitle'>We weren't able to create your event for some reason.<br><br>Maybe you should try a different key?</h2>";
        echo "<a class=button href='index.php'>Home</a>";
      echo "</body>";
      echo "</html>";
    }

  }

?>
