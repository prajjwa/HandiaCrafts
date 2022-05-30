<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Cart System</title>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="temp.css">
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="login.php">&nbsp;&nbsp;TradiKrafts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-th-list mr-2"></i>Home</a>
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
    <!-- Navbar end -->

    <!-- Displaying Products Start -->
    <div class="container">
        <div id="message"></div>
        <div class="row mt-2 pb-3">
            <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM product2 where quantity >0');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card-deck my-2 mb-2">
                    <div class="card p-2 border-secondary mb-2">
                        <img src="<?= $row['productimage'] ?>" class="card-img-top" height="250">
                        <div class="card-body p-1">
                            <h4 class="card-title text-center text-info">
                                <?= $row['productname'] ?>
                            </h4>
                            <h5 id="rup" class="card-text text-center text-danger"><i
                                    class="fas fa-rupee-sign"></i>&nbsp;&nbsp;
                                <?= number_format($row['productprice'],2) ?>/-
                            </h5>

                        </div>
                        <div class="card-footer p-1">
                            <form action="" class="form-submit">
                                <div class="row p-2">
                                    <div id="quantity" class="col-md-6">
                                        <label for="quant">Quantity</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="quant" type="number" class="form-control pqty" min="1"
                                           max ="<?= $row['quantity'] ?>" 
                                            value="1"> 
                                    </div>
                                </div>
                                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                <input type="hidden" class="pname" value="<?= $row['productname'] ?>">
                                <input type="hidden" class="pprice" value="<?= $row['productprice'] ?>">
                                <input type="hidden" class="pimage" value="<?= $row['productimage'] ?>">
                                <input type="hidden" class="pcode" value="<?= $row['productcode'] ?>">
                                <button class="btn btn-info btn-block addItemBtn"><i
                                        class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                                    cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- Displaying Products End -->


    <?php

if($_SERVER['REQUEST_METHOD']=='PUT')
{
    $feed=$_POST['feedback'];
  
        
     //   $conn=mysqli_connect($server_name,$user,$password,$database);
  
     $stmt = $conn->prepare("insert into feedback(feedback) values('$feed')");
     $stmt->execute();

     $server_name="localhost";
     $user="root";
     $password="";
     $database="handicraft";
     
     $conn=mysqli_connect($server_name,$user,$password,$database);
     //$sql="select * from customer2 where Email='$email'and Password='$pass'";

     $res=mysqli_query($conn,$stmt);
     $num=mysqli_num_rows($res);
      
    
}


?>

    <!-- feedback -->
    <!-- <br><br>
    <div id="bottom"> 

                      <label id="feed" for="feedback">Any special Requests?</label><br> -->
                     <!-- <form  method="put"> -->
                    <!-- <textarea name="feedback" id="feedback" cols="60" rows="3" -->
                        <!-- placeholder="Type your Feedback here!"></textarea> -->
                    <!-- <br>  -->
                     <!-- <button class="btn" id="btnsec">Submit</button> -->
                     <!-- </form>  -->
<!-- </div> -->
    <!-- <br>  -->

    

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <script type="text/javascript">
        $(document).ready(function () {

            // Send product details in the server
            $(".addItemBtn").click(function (e) {
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();
                var pcode = $form.find(".pcode").val();

                var pqty = $form.find(".pqty").val();

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {
                        pid: pid,
                        pname: pname,
                        pprice: pprice,
                        pqty: pqty,
                        pimage: pimage,
                        pcode: pcode
                    },
                    success: function (response) {
                        $("#message").html(response);
                        window.scrollTo(0, 0);
                        load_cart_item_number();
                    }
                });
            });

            // Load total no.of items added in the cart and display in the navbar
            load_cart_item_number();

            function load_cart_item_number() {
                $.ajax({
                    url: 'action.php',
                    method: 'get',
                    data: {
                        cartItem: "cart_item"
                    },
                    success: function (response) {
                        $("#cart-item").html(response);
                    }
                });
            }
        });
    </script>
</body>

</html>