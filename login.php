<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- <link rel="stylesheet"  href="c1.css" type="text/css"> -->

<style>

h1{
    padding-top:30px;
    color:azure
}

body{

    background-image: url('https://www.bhmpics.com/thumbs/the_taj_mahal-t2.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
     background-size: cover;

}

label{
    color:azure;
}


</style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="login.php">&nbsp;&nbsp;TradiKrafts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-th-list mr-2"></i>Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fas fa-th-list mr-2"></i>Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item"
                            class="badge badge-danger"></span></a>
                </li>
            </ul>
        </div>
    </nav>

  <div class="container">
  


  <?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sel=$_POST['sell'];


        $server_name="localhost";
        $user="root";
        $password="";
        $database="handicraft";
        
        $conn=mysqli_connect($server_name,$user,$password,$database);
        //$sql="select * from customer2 where Email='$email'and Password='$pass'";

        if($sel=="customer"){
         $sql="call connt('$email','$pass')";
        $res=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($res);
        
        if($num>0)
        {
          header("Location:http://localhost/phptut/login/temp.php");
        }
        else{
          header("Location:http://localhost/phptut/login/signup.php");
        }
          
        }
        else{

          $sql="select * from seller2 where Email='$email'and Password='$pass'";
          $res=mysqli_query($conn,$sql);
          $num=mysqli_num_rows($res);
          
          if($num>0)
        {
          header("Location:http://localhost/phptut/login/seller.php");
        }
        else{

          header("Location:http://localhost/phptut/login/signup.php");

        }
      }

    
}


?>


<h1 class="text-center"> Login and dive into our culture </h1>

  <form   method="post" >
  <div class="mb-3">
    <label for="username" class="form-label">Email address</label>
    <input type="email" class="form-control" id="username" aria-describedby="emailHelp" name="email" >
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>


  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <label class="form-check-label" for="clientele" >Choose Your Role</label>
  <select name="sell" class="form-control  mb-2  my-1"  id="clientele">
              <option value="" selected disabled>-Roles</option>
              <option value="customer">Customer</option>
              <option value="seller">Seller</option>
            </select>

  <button type="submit" class="btn btn-primary btn-group-lg">Login</button>
  
</form>
  
  </div>

 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>