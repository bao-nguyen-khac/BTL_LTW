<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML>
<html>

<head>
  <style>
    .error {
      color: #FFF0000;
    }
  </style>
</head>

<body>
  <?php

  $servername = "192.168.81.37";
  $my_db      = "bn21v7x042_database";
  $username   = "bn21v7x042";
  $password   = "Cloud_2023";

  $conn = mysqli_connect($servername, $user, $pass, $database);
  if (!$conn) {
    echo "Error : Unable to open database\n";
  } else {
    echo "Opened database successfully\n";
  }

  $sql = "select * from account";
  print "<BR>$sql<BR>";
  $ret = mysqli_query($conn, $sql);
  if (!$ret) {
    echo mysqli_connect_error($conn);
    exit();
  }
  ?>

  <table border="1" cellspacing="2" cellpadding="2">
    <tr>
      <td>Username</td>
      <td>Password</td>
    </tr>

    <?php
    while ($myrow = mysqli_fetch_assoc($ret)) {
      printf("<tr><td>%s</td><td>%s</td></tr>", $myrow['username'], $myrow['password']);
    }
    mysqli_close($conn);
    ?>
  </table>
  <BR><a href="index.php">HOME</a>

</BODY>

</HTML>