<!DOCTYPE html>
<html>
<head>
  <title>App Name</title>
  <link rel='stylesheet' type='text/css' href="styles.css">
</head>
<body>

  <?php
  include('connect.php')
  ?>

  <div class='content'>

    <h1 class='title'>Application Name</h1>
    <form class='join' action='event.php' method='get'>
        <h2 class='subtitle'>Join an Event</h2>
        <label for='joinKey'>Enter the event key</label><br>
        <input class='field' type='text' name='joinKey' placeholder='Event key' required><br>
        <input class='button' type='submit' name='join' value='Join'>
    </form>

    <form class='create' action='create.php'>
        <h2 class='subtitle'>Create an Event</h2>
        <label for='createKey'>Create the event key</label><br>
        <input class='field' type='text' name='createKey' placeholder='Create event key' required><br>
        <input class='button' type='submit' name='create' value='Create'>
    </form>

  </div>

</body>
</html>