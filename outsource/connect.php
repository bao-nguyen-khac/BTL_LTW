<html>
<head>
    <title>PHP Test</title>
</head>
    <body>
    <?php echo '<p>Hello World</p>';

    // In the variables section below, replace user and password with your own $
    $servername = "192.168.81.194";
    $my_db      = "b1706_database";
    $username   = "remote_et01";
    $password   = "Cloud@2023";

    // Create MySQL connection
    $conn = mysqli_connect($servername, $username, $password);

   # $conn = mysqli_connect('192.168.81.194', $username, $password, $my_db);
  
    // Check connection - if it fails, output will include the error message
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
    echo '<p>Connected successfully</p>';
    ?>
</body>
</html>
