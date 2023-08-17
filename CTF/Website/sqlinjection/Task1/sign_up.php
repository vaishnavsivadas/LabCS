<?php
  require_once "db.php";

  if(isset($_SESSION['user_id'])!="") {
    header("Location: home.php");
  }

    if (isset($_POST['signup'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(mysqli_query($conn, "INSERT INTO sign_in(username, password) VALUES('" . $username . "',  '" . $password . "')")) {
            header("Location: 01.php");
            exit();
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Sign up</h2>
    <p>
      Please <strong>only</strong> use fake and temporary credentials. All
      of the information stored is this system is considered to be open to
      everyone.
    </p>

    <p>
      <strong>Usernames should be lowercase characters only.</strong>
    </p>

    <script>
      function validate() {
        var username = document.getElementById('username');
        var submit = document.getElementById('submit');

        if(/^[a-z]+$/.test(username.value)) {
          submit.disabled = false;
        } else {
          submit.disabled = true;
        }
      }
    </script>

    <input type="text" id="username" placeholder="Username" onkeyup="validate()" name="username" />
    <br />
    <input type="password" placeholder="Password" onkeyup="validate()" name="password" />
    <br />
    <input type="submit" id="submit" disabled="disabled" name="signup" />
  </form>
      </div>
  </body>
</html>
