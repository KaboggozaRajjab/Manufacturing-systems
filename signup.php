<?php
      session_start();
      include("config.php");
      if(isset($_POST['register'])){
        $cus_id=$_POST['cus_id'];
        $FirstName=$_POST['FirstName'];
        $LastName=$_POST['LastName'];
        $contact=$_POST['Contact'];
        $location=$_POST['Location'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        

        $sql = "INSERT INTO customer details(`cus_id`, `FirstName`,`LastName`,`Contact`,`location`,`username`,'password') VALUES ('$cus_id', '$FirstName','$LastName','$Contact', '$location','username' '$password')";
        if (mysqli_query($db, $sql)) {
          echo "New account has been created successfully";
          echo "<script>window.location.href='aftersign.html';</script>";
          //header('Location:managerhome.php');
          //exit();
        } 
        else {
          echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
        }

        mysqli_close($conn);
          
        //}
        

      }
      

      ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Products</b>System</a>
  </div>
  <!-- /.login-logo -->
  <form action="" method="post">
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Create account</p>
      
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="FirstName" placeholder="Firstname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="LastName" placeholder="Lastname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="Contact" placeholder="Contact" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="Location" placeholder="Location" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <!-- <input type="text" class="form-control" name="category" placeholder="Category"> -->
          <select name="category" id="cars" class="form-control" required>
            <option value="supplier">Supplier</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" id="rppassword" name="rppassword" onkeyup="chkpwd();" placeholder="Repeat Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span id="mesg"></span>
        </div>
        <div class="row">
          
          <!-- /.col -->
        </div>

      <div class="social-auth-links text-center mb-3">
        <p>- -</p>
        <button class="btn btn-block btn-primary" type="submit" name="register">
          <i class="fa fa-unlock"></i> Register
        </button>
      
      </div> <br>
      <p class="text-center">Already have an account! <a href="../index.php">Login</a></p>

    </div>
          </form>

    <!-- /.login-card-body -->
  </div>
</div>

    
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  var chkpwd = function(){
    if (document.getElementById('password').value == document.getElementById('rppassword').value){
      document.getElementById('msg').innerHTML='Passwords are Matching';
      document.getElementById('msg').style.color='Green';
    }
    else{
      document.getElementById('msg').innerHTML='Passwords are not Matching';
      document.getElementById('msg').style.color='red';

    }
  }
</script>

</body>
</html>
