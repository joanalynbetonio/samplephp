<?php

  //initialize session
  session_start();

  if( !isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: login.php');
    exit;
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Dashboard</title>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.container {
    padding: 50px;
    background-color: black;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 25px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: black;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: black;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: black;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: black;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: pink;
    text-align: center;
}

</style>
</head>
<body class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card card-body bg-dark mt-5">
          <h2>Dashboard <small class="text-muted">test@test.com</small></h2>
          <p>Welcome to the dashboard John Doe</p>
          <p><a href="logout.php" class="btn btn-danger">Logout</a></p>
        </div>
      </div>
    </div>
  </div>

<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>