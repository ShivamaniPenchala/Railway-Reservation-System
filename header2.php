
<?php 
    include('DBConnection.php');
    $uname = $_SESSION['uname'];
    $sql = "select * from user where username = '$uname'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $name = $row["first_name"]." ".$row["last_name"];
        }
    }
    else{
        echo $conn->error;
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
    <script type="text/javascript">
        function dateTime(){
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
        return dateTime;
    }
    </script>
</head>

<body>
<div>
    <nav class="navbar bg-info navbar-info navbar-expand-sm mb-1 sticky-top">
        <button class="navbar-toggler" data-target="#myNav" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand ml-auto"><a href="home.php" class="text-light" style="text-decoration: none;">RAILWAY RESERVATION SYSTEM</a></div>
        <div class="navbar-collapse collapse" id="myNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="" class="nav-link text-dark">welcome, <?php echo $name ?></a></li>
                <li class="nav-item"><a href="logout.php?logout=1" class="nav-link text-light ">Logout</a></li>
            </ul>
        </div>
    </nav>

    <nav class="navbar bg-blue navbar-blue navbar-expand-sm">              
        <div class="navbar-collapse collapse" id="myNav">
            <ul class="navbar-nav ml-5">
                <li class="nav-item"><a href="home.php" class="nav-link text-light"><i class="fa fa-home"></i></a></li>
                </li><li class="nav-item"><a href="home.php" class="nav-link text-light">Book Ticket</a></li>
                </li><li class="nav-item"><a href="trainschedule.php" class="nav-link text-light">Train Schedule</a></li>
                </li><li class="nav-item"><a href="pnrstatus.php" class="nav-link text-light">PNR Status / Cancel Ticket</a></li>    
            </ul>
        </div>
        <div class="navbar-collapse collapse" id="myNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="" class="nav-link" >
                    <script  type="text/javascript">
                        var today = new Date();
                        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                        var time = " [ " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()+ " ]";
                        var dateTime = date+' '+time;
                        document.write(dateTime);
                    </script></a></li>
            </ul>
        </div>
    </nav>
</div>
</body>
</html>