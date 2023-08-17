
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
      <a href="index.php">Sign out</a>
      
    </div>

    <div id="container">
      <h2>Welcome!</h2>

<p>
  With this amazing tool you can write and publish your own posts. It'll
  allow you to write public and private posts. Public posts can be read by
  anyone that signs up. Private posts can only be read by you. See it as your
  own diary. We'll make sure that your private posts are safe with us.
</p>

<h2>Post timeline</h2>

  <div class="post">
    <form method="post" action="index.php?page=create.php">
      <textarea name="body" style="width: 100%; height: 25px;" placeholder="What's on your mind?" class="inline" required></textarea>
      <br /><br />
      <input type="checkbox" name="private" />For my own eyes only
      <input type="hidden" name="return" value="home" />
      <input type="hidden" name="user_id" value="4" />
      <input type="submit" value="Create post" style="float: right;" />
    </form>
  </div>

  <div class="post"><a href="index.php?page=view.php&id=3">Hello everyone!</a><br />This is my first post as a user on Postbook!<br /><span style="color: #666">Author: user</span></div><div class="post"><a href="index.php?page=view.php&id=1">Hello world</a><br />This is the first post!<br /><span style="color: #666">Author: admin</span></div>    </div>
  </body>
</html>
