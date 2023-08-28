<?php 
    session_start();
    include('DBConnection.php');
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");
    $sql1 = "select train_no,train_name from train";
    $result1 = $conn->query($sql1);
    if (isset($_GET['show'])) {
        $train_no = $_GET['train_no'];
        $sql = "delete from train where train_no = '$train_no'";

        if($conn->query($sql)){
            echo "<script> alert('$train_no is deleted from database');</script>";
        }
        else{
            echo $conn->error;
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
        .logo{
            border-radius: 1000px;
        }
        div.shadow-cust{
            width: 230px;
            background-color: #DCEEFF;
       }
       .shadow-cust{
            box-shadow: 3px 3px 5px 0px #333;
       }
       i.fa-circle{
            box-shadow:inset 0px 0px 3px 0px #222;
            border-radius: 10px;  
       }
    </style>
</head>

<body class="bg-img">
<?php include("adminmenu.html"); ?>
    <div class="row">
        <div class="container">
            <form name="payForm" onsubmit="return(pnrvalid());" class="m-5 p-5" action="" method="get">
            <div class="row">
                <div class="col-12">
                    <h4 class="navbar-brand text-primary">Train Number:</h4>
                </div>
                <div class="col-8">
                   <select name="train_no" class="input-group form-control" value="trains">
                        <option class="form-control" value="all">All train</option>
                    <?php if($result1->num_rows > 0){
                        while($data1 = $result1->fetch_assoc()){
                     ?>
                        <option class="form-control" value="<?php echo $data1['train_no']; ?>"><?php echo "( ".$data1['train_no']." ) ".$data1['train_name'] ?></option>
                    <?php 
                        } }
                     ?>
                    </select>
                </div>
                <div class="col-4">      
                    <input type="submit" class="btn btn-dark text-light" value="Delete Train" name="show">
                </div>
                <div class="col-12">
                    <div class="text-danger text-bold ">
                    <hr>     
                        <h6 class="font-weight-bold">
                            Note: Delete with Caution,<br>
                            if you delete the train then all records related to this train will be deleted. <br>
                            if any PNR number connected with this train no. then user will not get the PNR status
                        </h6>
                    <hr>     
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
</body>
</html>



