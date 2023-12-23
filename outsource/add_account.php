<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML>
<html>
<head>
<style>
</style>
</head>
<body>
<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

 UserName: <input type="text" name="username"><BR>
 Password: <input type="text" name="password"><BR>
 <input type="submit" name="submit" value="Submit">
</form>

<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_DEPRECATED);
 $username=$_POST['username'];
 $password=$_POST['password'];

 $servername = "192.168.81.37";
 $my_db      = "bn21v7x042_database";
 $username   = "bn21v7x042";
 $password   = "Cloud_2023";

 $conn = mysqli_connect($servername, $username, $password, $my_db);
$sql="INSERT INTO account (username, password) VALUES ('$username','$password')";
 if(!$conn){
    echo "Error : Unable to open database\n";
   } else {
    echo "Opened database successfully\n";
   }

    print "<BR>$sql<BR>";
 $ret = mysqli_query($conn, $sql);
 if(!$ret){
  echo mysqli_error($conn);
 } else {
  echo "Insert successfully\n";
 }
 mysqli_close($conn);
?>
<BR> <a href="index.php">Home</a>

</BODY>
</HTML>
