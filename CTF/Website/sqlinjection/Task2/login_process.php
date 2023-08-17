<?php

session_start();
require_once "db.php";

if (isset($_POST['login'])) {
    $conn = mysqli_connect("127.0.0.1","root","","ctf_db");
    $username = $_POST['username'];
    $password = $_POST['password'];
// SQL query vulnerable to SQL injection
$query = "SELECT * FROM Task2 WHERE username = '$username' AND password = '$password'";

// Execute the query
$result = $conn->query($query);

// Fetch and display the results ' OR 1=1; -- 

while ($row = $result->fetch_assoc()) {
   if($result !=0 )
   {
    header("location: flag.php");
   }
    
}
}
?>



<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    html, body{
        background: #EBF2F8;
    }
    h2{
        text-align: center;
        font: optional;
        text-shadow: 2px 2px 5px grey;
    }
      .container {
        text-align: justify;
        font: optional;
        padding: 25px 50px 75px 100px;
        background: white;
        border: 2px;
        border-radius: 10px;
        border-style: outset;
        width: 280px;
        margin: auto;
        padding: 15px 15px 15px 15px;
      }
      label{
        
        border-radius: 5px;
      }

      input{
        border-radius: 5px;
      }

</style>
<title>Login Page</title>
</head>
<body>
    <h2>LOGIN</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="container">

        <label for="username">USERNAME:</label>
        <input type="text" id="username" name="username">
        <br>
        <br>
        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password">
        <br>
        <br>
        <input type="submit" name="login" value="submit">
</div>
</form>
</body>
</html>

