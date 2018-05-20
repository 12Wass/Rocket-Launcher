<?php session_start();
if (empty($_SESSION['flag']) || !isset($_SESSION['flag'])) {
  echo 'Vous ne pouvez pas accéder aux messages';
}?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>sendMessage</title>
  </head>
  <body>
    <form action="">
      <input type="text" id="content"></input>
      <button onclick="sendMessage()"></button>
    </form>
      <script src="functions.js"></script>
  </body>
</html>
