<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>E-Life|SignUp</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<?php

//$con = mysqli_connect("localhost","root","","record");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone)) {
    $host = "localhost";
    $dbusername = "root";
    $dbPassword = "";
    $dbname = "e-life";

    $conn = new mysqli($host, $dbusername, $dbPassword, $dbname);

    if(mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else{

        $SELECT = "SELECT email From signup Where email = ? Limit 1";
        $INSERT = "INSERT Into signup (firstname, lastname, email, phone) values(?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssi", $firstname, $lastname, $email, $phone);
            $stmt->execute();
            echo "new record inserted";
        } 
        else{
            echo" already register";
        }
        $stmt->close();
        $conn->close();
    }
}
else
{

?>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">


    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/bgsignup.jpg);"></div>
                <div class="container">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content font-cursive">
                                <h2>Sign Up Form!</h2>
                                <div class="row mt-30">
                                    <div class="col-md-8 col-sm-12">
                                        <form action="" name="SignUp" method="post">
                                            <div class="form-group">
                                                <label for="fname"><div class="font-clr">First Name:</div></label>
                                                <input type="text" name="firstname" class="form-control" id="" placeholder="Enter name" name="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="lname"><div class="font-clr">Last Name:</div></label>
                                                <input type="text" name="lastname" class="form-control" id="" placeholder="Enter name" name="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email"><div class="font-clr">Email:</div></label>
                                                <input type="email" name="email" class="form-control" id="" placeholder="Enter Email" name="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phnumber"><div class="font-clr">Phone Number:</div></label>
                                                <input type="phone"  name="phone" class="form-control" id="" placeholder="Enter phone number" name="" required>
                                            </div>
                                            <br>
                                            <button type="submit" value="signup"  name="signup" class="btn btn-default">Create Account</button>
                                        </form>
                                        <br>
                                        <h5 class="font-clr">Already have an account!<a href="login.php"><h5 class="font-clr">Log In!</h5></a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
<?php } ?>
</body>

</html>