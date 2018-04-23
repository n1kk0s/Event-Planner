<?php
  include('connect.php');

  $key = $_GET['createKey'];

  if(isset($_GET['create'])){ // When the form is submitted, gather the event ID to see if it exists
    $sql = "SELECT * FROM event WHERE eventKey='{$key}'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){ //If there's an eventKey, let the user know they can't use the key
      echo "Result found";


      echo "<!DOCTYPE html>";
      echo "<html>";
      echo "<head>";
        echo "<title>Uh Oh...</title>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>Unavailable!</h1>";
        echo "<h2 class='subtitle'>Sorry, it looks like that key's already being used.<br><br>Why don't we head back?</h2>";
        echo "<form action='index.php'><input class='button' type='submit' value='Home'></form>";
      echo "</body>";
      echo "</html>";


    } else { // If the eventKey doesn't exist in the database, allow user to create event
      echo "<!DOCTYPE html>";
      echo "<html>";
      echo "<head>";
        echo "<title>Create Event</title>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
      echo "</head>";
      echo "<body>";
        echo "<h1 class='title'>Create Your Event</h1>";
        echo "<div class='createForm'>";
          echo "<form class='createForm' action='verify.php'>";
            echo "<label for='eventKey'>Event Key:</label>";
                echo "<input class='field' type='text' name='eventKey' value='{$key}' readonly>";
              echo "<label for='name'>Event Name:</label>";
                echo "<input class='field' type='text' name='name' placeholder='Name' required>";
              echo "<label for='host'>Host:</label>";
                echo "<input class='field' type='text' name='host' placeholder='Your Name' required>";
              echo "<label for='date'>Date & Time:</label>";
                echo "<input class='field' type='datetime-local' name='date' required>";
              echo "<label for='location'>Location (full address):</label>";
                echo "<input class='field' type='text' name='location' placeholder='123 Street Rd, City, State' required>";
              echo "<label for='description'>Description:</label>";
                echo "<textarea class='field' rows='6' cols='50' name='description' placeholder='Enter a description for your event.'></textarea>";
            echo "<input class='button' type='submit' name='create' value='Create'>";
          echo "</form>";
          echo "<form action='index.php'><input class='button' type='submit' name='cancel' value='Cancel'></form>";
          echo "</div>";

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
