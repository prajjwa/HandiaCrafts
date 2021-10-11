<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="c1.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>
  <?php require "partials/_nav.php"  ?>

  <div class="container">
  



  <?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $name=$_POST['name'];
    $cpass=$_POST['cpassword'];
    $sel=$_POST['sell'];




     if($sel=="seller")
     {
        

      
    if($pass==$cpass){


      $server_name="localhost";
      $user="root";
      $password="";
      $database="handicraft";
      
      $conn=mysqli_connect($server_name,$user,$password,$database);
      $sql="insert into seller2(Name,Email,Password) values('$name','$email','$pass')";
      mysqli_query($conn,$sql);

      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Welcome Aboard</strong> <br>Sign Up successfull
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    header("Location:http://localhost/phptut/login/seller.php");


  }
  else{
      echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </svg>
      <div>
        Confirmed password does not match entered password!
      </div>
    </div>';
  }





     }
     else{




    if($pass==$cpass){


        $server_name="localhost";
        $user="root";
        $password="";
        $database="handicraft";
        
        $conn=mysqli_connect($server_name,$user,$password,$database);
        $sql="insert into customer2(Name,Email,Password) values('$name','$email','$pass')";
        mysqli_query($conn,$sql);

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Welcome Aboard</strong> <br> Sign Up successfull.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

      header("Location:http://localhost/phptut/login/temp.php");


    }
    else{
        echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
          Confirmed password does not match entered password!
        </div>
      </div>';
    }
   
  }

    
}


?>


<h1 class="text-center"> Sign up and dive into our culture </h1>






  <form   method="post" >
  <div class="mb-3">
    <label for="username" class="form-label">Email address</label>
    <input type="email" class="form-control" id="username" aria-describedby="emailHelp" name="email"  placeholder="abc@gmail.com">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="Jhon Doe">
  </div>


  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="mb-3">
    <label for="cpassword" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
  </div>


  <label class="form-check-label" for="clientele" >Choose Your Role</label>
  <select name="sell" class="form-control  mb-2  my-1"  id="clientele">
              <option value="" selected disabled>-Roles</option>
              <option value="customer">Customer</option>
              <option value="seller">Seller</option>
            </select>

       

  
  <button type="submit" class="btn btn-primary btn-group-lg">Sign Up</button>
  
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