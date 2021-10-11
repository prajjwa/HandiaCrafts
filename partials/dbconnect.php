<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $name=$_POST['name'];
    $cpass=$_POST['cpassword'];

    if($pass==$cpass){


        $server_name="localhost";
        $user="root";
        $password="";
        $database="handicraft";
        
        $conn=mysqli_connect($server_name,$user,$password,$database);
        $sql="insert into customer(Name,Email,Password) values('$name','$email','$pass')";
        mysqli_query($conn,$sql);
        //echo "$email";


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


?>