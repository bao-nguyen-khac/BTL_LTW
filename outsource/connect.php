<html>

<head>
    <title>PHP Test</title>
</head>

<body>
    <?php echo '<p>Hello World</p>';

    // In the variables section below, replace user and password with your own $
    $servername = "192.168.81.37";
    $my_db      = "bn21v7x042_database";
    $username   = "bn21v7x042";
    $password   = "Cloud_2023";

    // Create MySQL connection
    // $conn = mysqli_connect($servername, $username, $password);

    $conn = mysqli_connect($servername, $username, $password, $my_db);

    // Check connection - if it fails, output will include the error message
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
    echo '<p>Connected successfully</p>';
    ?>
</body>

</html>