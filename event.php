
<?php
  include('connect.php');

  $key = $_GET['joinKey'];

  if(isset($_GET['join'])){ // When the form is submitted, query the database for the entered eventKey
    $sql = "SELECT * FROM event WHERE eventKey='{$key}'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){ //If there's an eventKey, show the page with details
      echo "Result accessed";
      $row = $result -> fetch_assoc();
      $name = $row['name'];
      $host = $row['host'];
      $date = $row['date'];
      $location = $row['location'];
      $description = $row['description'];


      echo "<!DOCTYPE html>";
      echo "<html>";
      echo "<head>";
        echo "<title>$name</title>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>$name</h1>";
        echo "<h"
      echo "</body>";
      echo "</html>";


    } else { // If the eventKey doesn't exist in the database, show this

      echo "<!DOCTYPE html>";
      echo "<html>";
      echo "<head>";
        echo "<title>Uh Oh...</title>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>You've been duped...</h1>";
        echo "<p class='bodyText'>Sorry friend, it looks like someone gave you the wrong code...</p>";
      echo "</body>";
      echo "</html>";

    }

    function eventExists($key) {
      include('connect.php');
      echo "Checking key";
      $sql = "SELECT * FROM event WHERE eventKey='{$key}'";
      $result = mysqli_query($conn, $sql);

      if($result) {
        header("Location:eventPage.php");
      } else {
        return false;
      }
    }
  }
  ?>
