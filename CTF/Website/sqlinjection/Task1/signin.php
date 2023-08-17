<?php
session_start();
require_once "db.php";


if (isset($_POST['sign_on'])) {
    $conn = mysqli_connect("127.0.0.1","root","","ctf_db");
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM sign_in WHERE username = '" . $username. "' and password = '" . $password. "'");
    

    if ($row = mysqli_fetch_array($result)) {
        
            echo '<script>alert("this '  . $row .    '")</script>';
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            if($username == "user")
            {
              header("Location: flag.php");
            }
            else {
              header("Location: home.php");
            }
        } 
    }else {
        $error_message = "Incorrect Username or Password!!!";
    }
?>
<html>
  <head>
    <title>Postbook</title>
    <style type="text/css">
      a {
        color: blue;
      }

      html, body {
        margin: 0;
        padding: 0;
        background: #edf0f5;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 15pt;
      }

      input, textarea {
        font-family: Helvetica, Arial, sans-serif;
        font-size: 15pt;
      }

      div#top {
        background-color: #3b5998;
        padding: 10px;
        color: white;
      }

      div#top a {
        color: white;
      }

      div#container {
        padding: 10px;
      }

      div.post {
        background-color: white;
        width: 500px;
        padding: 20px;
        margin-bottom: 10px;
        border: 1px solid #eee;
        border-radius: 5px;
      }

      textarea.inline {
        border: 0;
      }
    </style>
  </head>
  <body>
    <div id="top">
      <h1>Postbook</h1>

      <a href="index.php">Home</a>
              <a href="signin.php">Sign in</a>
        <a href="sign_up.php">Sign up</a>
      
    </div>

    <div id="container">
      <h2>Sign in</h2>
<div class="row">
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type ="text" placeholder="Username" name="username" />
      <br />
      <input type="password" placeholder="Password" name="password" />
      <br />
      <input type="submit" class="btn btn-primary" name="sign_on" value="submit">
    </form>
  </div>
    </div>
  </body>
</html>
