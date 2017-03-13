<?php
require_once "app.php";

if(isset($_GET['RegMe'])){
    header("Location: registraion.php");
}
if(isset($_GET['LogMe'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .divche{
            margin: auto;
            padding: 20px;
        }
    </style>
</head>
<body>
<h1>
    WELCOME !
</h1>

<form>
  <div class="divche">
          For register user :<input type="submit" value="Register" name="RegMe"/>
    </div class="divche">
    <div>
          For Login: <input type="submit" value="Login" name="LogMe"/>
    </div>
</form>
</body>
</html>
