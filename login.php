<?php
  require_once 'db.php';
  $email = '';
  $password = '';
  $email_err = '';
  $password_err = '';


  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if(empty($email)){
      $email_err = 'Please enter email';
    }

    if(empty($password)){
      $password_err = 'Please enter password';
    }


    if(empty($email_err) && empty($password_err)){
        $sql = 'SELECT name, email, password from users where email = :email';

        if($stmt = $pdo->prepare($sql)){
          $stmt->bindParam(':email', $email,PDO::PARAM_STR);

          if( $stmt->execute()){
            if($stmt->rowCount() == 1){
              if($row = $stmt->fetch()){
                $hashed_password = $row['password'];
                if(password_verify($password, $hashed_password)){
                  session_start();
                  $_SESSION['email'] = $email;
                  $_SESSION['name'] = $row['name'];
                  header('location: index.php');
                } else {
                  $password_err = 'The password you entered is not valid';
                }
              }
            } else {
              $email_err = 'No Account found for that email';
            }
          } else {
            die('Something went wrong');
          }
        }
        unset($stmt);
    } // 
    unset($pdo);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Account Login</title>
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
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: pink;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: pink;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 5px solid black;
    margin-bottom: 35px;
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
    color: blue;
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
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
      <h2>Login</h2>
      <p>Please fill in your credentials to login.</p>
      <form action="" method="post">
          <div class="form-group">
              <label>Email:<sup>*</sup></label>
              <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : '';?>" 
              value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
          </div>    
          <div class="form-group">
              <label>Password:<sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : '';?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="Login">
            </div>
            <div class="col">
              <a href="register.php" class="btn btn-light btn-block">No account? Register</a>
            </div>
        </div>
      </form>
        </div>
      </div>
    </div>
</div>    


<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
