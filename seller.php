<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet"  href="c1.css" type="text/css"> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 


  <style>


   h1{
     color:black;
   }

   label{
    color:white;

   }

   /* https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSG1h_2eHJj_-uqVxs-6FvDA5jI9nzRxZVjNg&usqp=CAU  */
   body{
  
/* background-image: url('https://www.internationalhandicraft.com/images/media/2020/10/6h6Np13412.jpg'); */
background-image:url('https://i.pinimg.com/736x/e1/27/ee/e127eed4ce99e2de434c40bd1b3b4eb0.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
 background-size: cover;
 background-position:center;

}



.prodtitle
{
    /* background-image: url("1.jpg"); */
    margin-top:5%;
    font-weight: 800;
    color:#ebd1e2;
    text-align:left;


}
.pt{
    background-color: #c20d89;
    display: inline;
    border-radius: 10px;
    border: 7px solid #ec97cf;
}
<h1 class="text-center prodtitle">
            <div class="pt">Add Product Here</div>
        </h1>
   


  </style>
    <title>Add Product</title>
  </head>
  <body>
  <?php require "partials/_nav.php"  ?>

  <div class="container">
  





  <?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $img=$_POST['ImgFile'];
    $quant=$_POST['quant'];
    $name=$_POST['ProductName'];
    $code=$_POST['pcode'];
  $price=$_POST['price'];

   


        $server_name="localhost";
        $user="root";
        $password="";
        $database="handicraft";
        
        $conn=mysqli_connect($server_name,$user,$password,$database);
        $sql="insert into product2 (productname,quantity,productcode,productimage,productprice) values('$name','$quant','$code','$img','$price')";
        mysqli_query($conn,$sql);

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Product Added</strong> <br>Awesome!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    
}


?>


<h1 class="text-center prodtitle">
            <div class="pt">Add Product Here</div>
        </h1>



  <form   method="post" >
  <div class="mb-3">
    <label for="productname" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" name="ProductName" >
   
  </div>

  <div class="mb-3">
    <label for="quant" class="form-label">Quantity</label>
    <input type="text" class="form-control col-6" id="quant" aria-describedby="emailHelp" name="quant">
  </div>


  <div class="mb-3">
    <label for="Desc" class="form-label">ProductCode</label>
    <input type="text" class="form-control" id="Desc" name="pcode">
  </div>

  <div class="mb-3">
    <label for="File" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>

  <div class="mb-3">
    <label for="File" class="form-label">ImageFile</label>
    <input type="text" class="form-control" id="File" name="ImgFile">
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