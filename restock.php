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

    background-image: url('https://images.unsplash.com/photo-1519802772250-a52a9af0eacb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8aW5kaWF8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');
    background-repeat: no-repeat;
    background-attachment: fixed;
     background-size: cover;
     background-position:top;
     

}

label{
    color:azure;
}


</style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Restock</title>
  </head>
  <body>
  <?php require "partials/_nav.php"  ?>

  <div class="container">
  


  <?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $code=$_POST['productcode'];
    $q=$_POST['quant'];

        $server_name="localhost";
        $user="root";
        $password="";
        $database="handicraft";
        
        $conn=mysqli_connect($server_name,$user,$password,$database);
        $sql="select * from product2 where productcode='$code'";
      
        $res=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($res);

     if($num>0)
     {
     

       $st=$conn->prepare("update product2 set quantity=quantity+'$q' where product2.productcode='$code'");
       // $st=$conn->prepare("call restock('$code','$q')");
        $st->execute();

      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Updated successfully!</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

     }
     else
     {

      header("Location:http://localhost/phptut/login/seller.php");

    }

    
   


    
}


?>


<h1 class="text-center"> Restock </h1>






  <form   method="post" >
  <div class="mb-3">
    <label for="username" class="form-label">Product Code</label>
    <input class="form-control" id="username" aria-describedby="emailHelp" name="productcode" >
  </div>



  <div class="mb-3">
    <label for="password" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="password" name="quant" min="0">
  </div>


  <button type="submit" class="btn btn-primary btn-group-lg">Submit</button>
  
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