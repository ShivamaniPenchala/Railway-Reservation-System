<?php 
    session_start();
    include('DBConnection.php');
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");
    if(isset($_POST['add'])){
        $train_no = $_POST['trainno'];
        $train_name  = ucwords($_POST['trainname']);
        $seat  = $_POST['seat'];
        $class  = $_POST['class'];
        $src  = ucwords($_POST['src']);
        $dest  = ucwords($_POST['dest']);
        $depart  = $_POST['depart'];
        $arr  = $_POST['arr'];
        $fare  = $_POST['fare'];
        $duration = round(abs(strtotime($depart) - strtotime($arr)) / 3600,1);
        function insertQuery($conn,$sql){
            if($conn->query($sql) == true){
                echo "<script>alert('New Train Added');</script>";
            }
            else{
                echo $conn->error;
            }
        }
        $sql1 = "insert into train values('$train_no','$train_name','$seat','$class')";
        insertQuery($conn,$sql1);
        $sql2 = "select * from station s,train t where s.train_no = t.train_no and s.source = '$src' and s.destination = '$dest' and duration = '$duration'";

        $result = $conn->query($sql2);
        if($result->num_rows > 0){
                echo "<script>alert('Train Already Added');</script>";
        }
        else{
            $sql3 = "insert into station values('','$src','$dest','$fare','$arr','$depart','$duration','$train_no')";
            unset($_POST['add']);
            insertQuery($conn,$sql3);
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
       .text-main h5, .text-main{
            font-size: 16px;
            font-weight: bold;
            color: #333;
            font-family: serif;
        }
    </style>
</head>

<body class="bg-img">
<?php include("adminmenu.html"); ?>
    <div class="row">
        <div class="container">
            <form action="" method="post" name="train" onsubmit="return(validtrain())">
                <div class="row m-3 p-4 ">
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Train No<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input class="form-control" type="text" id="trainnoid" name="trainno" maxlength="5">
                        </div>
                        <div  class="text-red">
                            <span id="er_trainno"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Train Name<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input name="trainname" type="text" id="trainnameid" class="form-control" >
                        </div>
                        <div  class="text-red">
                            <span id="er_trainname"></span>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Seat Availability<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input type="text" id="seatid" name="seat" class="form-control" >
                        </div>
                        <div  class="text-red">
                            <span id="er_seat"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Class <span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <select class="custom-select hvr-shadow" name="class">
                                    <option class="" value="ALL">All Classes</option>
                                    <option class="" value="AC">AC</option>
                                    <option class="" value="SL">Sleeper(SL)</option>
                            </select>
                        </div>
                        <div  class="text-red">
                            <span id="er_class"></span>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                     <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Source <span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input class="form-control" type="text" id="srcid" name="src">
                        </div>
                        <div  class="text-red">
                            <span id="er_src"></span>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Destination<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input class="form-control" type="text" id="destid" name="dest">
                        </div>
                        <div  class="text-red">
                            <span id="er_dest"></span>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                     <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Departure Time<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input class="form-control" type="text" id="departid" name="depart">
                        </div>
                        <div  class="text-red">
                            <span id="er_depart"></span>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Arrival Time<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input class="form-control" type="text" id="arrid" name="arr">
                        </div>
                        <div  class="text-red">
                            <span id="er_arr"></span>
                        </div>
                    </div>

                    <div class="col-12"><hr></div>

                     <div class="col-sm-6 col-md-3">
                        <div class="text-primary ">
                            <h5>Fare<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="text-primary input-group">
                            <input class="form-control" type="text" id="fareid" name="fare">
                        </div>
                        <div  class="text-red">
                            <span id="er_fare"></span>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 offset-1">
                        <div class="text-primary input-group">
                            <input class="btn btn-success" type="submit" value="Add Details" name="add">
                        </div>
                    </div>
                </div>       
            </form>
        </div>
    </div>
</body>
</html>

