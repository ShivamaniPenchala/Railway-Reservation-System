<?php 
    session_start();
    include('Details.php');
    include('DBConnection.php'); 
    if(isset($_SESSION['update'])){
         unset($_SESSION['update']);
    }
    if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<script> alert('you are logged in'); </script>";
    }
    else if (isset($_GET['logout']) && $_GET['logout'] == 1) {
            echo "<script> alert('please login'); </script>";
    }
    if(isset($_SESSION["uname"])){
        $uname = $_SESSION["uname"];
            include("header2.php");
    }
    else{
            include("header.html");
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
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            font-size: 18px;
            background-color: black;
            color: orange;
            text-align: center;
        }
        body, html {
            height: 100%;
        }
        .bg-img{
            background-image: url('asset/img/104.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
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
    <div>
        <div class="col-12 col-sm-12 col-md-5 offset-3">
            <div class="row pnr m-5 text-center">
                    <div class="col-12 mt-3">
                        <span class="fs" >BOOK TICKET</span>
                    </div>
                    <div class="col-12 mt-4">
                        <form allign="center" action="./train_list.php" method="post">
                            <div class="input-group">   
                                <input type="text" name="src" class="form-control hvr-shadow" placeholder="From*" required> 
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" name="dest" class="form-control hvr-shadow" placeholder="To*" required>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="date" name="date" class="form-control hvr-shadow" placeholder="" required>
                                <div class="input-group-append">
                                    <span class="input-group-text text-dark ">
                                           <img src="asset/img/logo/cal.png" width="20" height="20">
                                    </span>
                                </div>
                            </div> 
                            <br>
                            <div class="input-group">
                                <select name="class" class="custom-select hvr-shadow">
                                    <option class="" value="ALL">All Classes</option>
                                    <option class="" value="AC">AC</option>
                                    <option class="" value="SL">Sleeper(SL)</option>
                                </select>
                            </div> 
                            <br>
                            <div class="input-group">
                                <input class="btn text-light bg-blue btn-block hvr-shadow" type="submit" value="Find Trains" >
                            </div><br>  
                        </form>
                    </div>
            </div>                    
        </div>
    </div> 
    <?php include("footer.html");?>
</body>
</html>