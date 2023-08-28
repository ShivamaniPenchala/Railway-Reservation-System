<?php 
    session_start();
    include('DBConnection.php');
    if(isset($_POST['logbtn'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $sql="select *from user where username = '$uname' AND password = '$pass'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $_SESSION["uname"] = $uname;
           header("location: home.php?success=1");
        }
        else{
            $er_invalid = "invalid username & password";
        }
    }
 ?>

<!doctype html>
<html lang="en">
<head>
    <title>RRS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="icon/png" href="asset/img/logo/rail_icon.png">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <link rel="stylesheet" href="asset/css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">
    <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/validation.js"></script>  
   <style>
        .pnr{
            background-color: white;
            color: black;
            padding-top: 10px;
            box-shadow: 2px 2px 18px 10px #222;
            border-radius: 2px;         
        }    
        .fs{
            font-family: sans-serif bold;
            font-weight: 700;
            font-size: 30px;
            color: #2f4676;
        }
    </style>
</head>
<body class="bg-img">
    <?php include('navbar1.html') ?>
    <div>
        <div class="col-12 col-sm-12 col-md-4 offset-3">
            <div class="row pnr m-5 text-center">
                    <div class="col-12 mt-4">
                        <span class="fs">USER LOGIN</span>
                    </div>
                    <div class="col-12 mt-4">
                        <form allign="center"; action="<?php echo $_SERVER["PHP_SELF"];?>" name="logForm" onsubmit="return(logvalidation());" method="post">
                            <div  class="text-red">
                                <span ><?php if (isset($er_invalid)){ echo "$er_invalid"; }?></span>
                            </div>
                            <div class="input-group">   
                                <input type="text" name="username" class="text form-control" placeholder="Enter Username" id="uname">  
                            </div>
                            <div  class="text-red">
                                <span id="er_username"></span>
                            </div><br>
                            <div class="input-group">
                                <input type="password" name="password" class="text form-control" placeholder="Enter Password" id="pass">
                            </div>  
                            <div  class="text-red">
                                <span id="er_password"></span>
                            </div><br>
                            <div class="input-group">
                                <input type="submit" name="logbtn" class="btn text-light bg-blue btn-block" value="Login">
                            </div>
                            <div class="text-dark">
                                <a  class="text-center form control">or</a>
                            </div>
                            <div >
                                <a class="btn text-light bg-blue btn-block" href="register.php">Register Here</a>
                            <div class="text-dark">
                                <a  class="text-center form control">or</a>
                            </div>
                            <div >
                                <a class="btn text-light bg-blue btn-block" href="Adminlogin.php">Admin Login</a>
                            </div><br> 
                        </form>
                    </div>
            </div>                    
        </div>
    </div> 
    <?php include("footer.html");?>
</body>
</html>