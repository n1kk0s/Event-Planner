<!DOCTYPE html>
<html>
<head>
  <title>Partier</title>
  <link rel='stylesheet' type='text/css' href="styles.css">
  <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico'/>
</head>
<body>

  <?php
  include('connect.php')
  ?>

  <div class='content'>

    <h1 class='title'>Partier</h1>
    <form class='join' action='event.php' method='post'>
        <h2 class='subtitle'>Join an Event</h2>
        <label id='indexLabel' for='joinKey'>Enter the event key</label><br>
        <input class='field' type='text' name='joinKey' placeholder='Event key' required><br>
        <input class='button' type='submit' name='join' value='Join'>
    </form>

    <form class='create' action='create.php' method='post'>
        <h2 class='subtitle'>Create an Event</h2>
        <label id='indexLabel' for='createKey'>Create the event key</label><br>
        <input class='field' type='text' name='createKey' placeholder='Create event key' required><br>
        <input class='button' type='submit' name='create' value='Create'>
    </form>

  </div>

</body>
</html>
