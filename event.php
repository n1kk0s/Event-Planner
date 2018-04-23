
<?php
  include('connect.php');

  if(isset($_POST['join'])) {
    $key = $_POST['joinKey'];
  } else {
    $key = $_POST['createKey'];
  }

  if(isset($_POST['join']) || isset($_POST['create'])){ // When the form is submitted, query the database for the entered eventKey

    $sql = "SELECT * FROM event WHERE eventKey='{$key}'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){ //If there's an eventKey, show the page with details
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
        echo "<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico'/>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>$name</h1>";
        echo "<h2 class='subtitle'>Hosted by: $host</h2>";
        echo "<h2 class='info'>$date</h2>";
        echo "<h2 class='info'>$location</h2>";
        echo "<p class='description'>$description</p>";
        echo "<form action='index.php' method='post'><input class='button' type='submit' value='Home'></form>";
      echo "</body>";
      echo "</html>";


    } else { // If the eventKey doesn't exist in the database, show this
      echo "<!DOCTYPE html>";
      echo "<html>";
      echo "<head>";
        echo "<title>Uh Oh...</title>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
        echo "<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico'/>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>You've been duped...</h1>";
        echo "<p class='bodyText'>Sorry friend, it looks like someone gave you the wrong code...</p>";
      echo "</body>";
      echo "</html>";

    }

    function getKey() {
      if(isset($_POST['join'])) {
        return $_POST['joinKey'];
      } else {
        return $_POST['createKey'];
      }
    }
  }
  ?>
