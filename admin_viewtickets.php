<?php 
    session_start();
    include('DBConnection.php');
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");
    if (isset($_GET['show'])) {
        $date ='';
        $count = 0;
        $date1 = $_GET['date1'];
        $date2 = $_GET['date2'];
        $status = $_GET['ticket'];
        if(!empty($date1) && !empty($date2)){
            if(!empty($status)){
                $sql = " select t.train_name,ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date between '$date1' and '$date2' and ti.status = '$status' ";
            }
            else{
                $sql = "select t.train_name, ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date between '$date1' and '$date2'";
            }
        } 
        else {
            if(!empty($date1)){
                $date = $date1;

            }
            else if(!empty($date2)){
                $date = $date2;
            }
            else{
                echo "<script> alert('select aat least one date'); </script>";
            }
            if(!empty($status)){
                $sql = "select t.train_name,ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date = '$date' and ti.status = '$status'";
            }
            else{
                $sql = "select t.train_name,ti.phno, ti.ticket_no, ti.status, ti.date, ti.username,t.train_no from ticket ti, train t where t.train_no = ti.train_no and ti.date = '$date'";
            }
        }
        $result = $conn->query($sql);
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
    <div>
            <div class="container">
                <form name="payForm" onsubmit="" class="m-5 p-5" action="" method="get">
                <div class="row">
                    <div class="col-12">
                        <h4 class="navbar-brand text-primary">Ticket Details:</h4>
                    </div>
                    <div class="col-12 col-sm-4">
                        <span class="text-bold">From:</span>
                        <input class="form-control" type="date" value="<?php echo $date1; ?>" name="date1" id="date1">
                        <span id="er_date1" class="text-red"></span>
                    </div>
                    <div class="col-12 col-sm-4">
                        <span class="text-bold">To:</span>
                        <input class="form-control" type="date" value="<?php echo $date2; ?>" name="date2" id="date2">
                        <span id="er_date2" class="text-red"></span>
                    </div>
                    <div class="col-12 col-sm-4">
                        <span class="text-bold">Tickets:</span>
                        <select name="ticket" class="input-group form-control">
                        <option class="form-control" value="">All Tickets</option>
                        <option class="form-control" value="booked">Booked</option>
                        <option class="form-control" value="cancelled">Cancelled</option>
                    </select>
                        <span id="er_pnr" class="text-red"></span>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 col-sm-4 offset-8">      
                        <input type="submit" class="btn btn-dark text-light" value="View Tickets" name="show">
                    </div>
                </div>
                </form>
            </div>
            <div class="container">
                <div>
                    <?php
                     function setCount($count){ 
                        echo "<span class='text-bold bg-light p-2'><b class='text-dark'>Total Tickets:</b>  ".$count."</span>"; 
                    }?>
                </div>
                <table class="table table-hover bg-light text-center">
                    <?php 
                    if (isset($_GET['show'])) {

                      if($result->num_rows > 0){ ?>
                    <tr class="table-primary">
                        <th>PRN NO.</th>
                        <th>Status</th>
                        <th>Train No.</th>
                        <th>Train Name</th>
                        <th>Date</th>
                        <th>Mobile No.</th>
                        <th>Booked by</th>
                    </tr>
                     <?php   while($data = $result->fetch_assoc()){
                        $count++;
                     ?>
                    <tr>
                        <td><?php echo $data['ticket_no']; ?></td>
                        <td class="text-danger text-bold"><?php echo $data['status']; ?></td>
                        <td><?php echo $data['train_no']; ?></td>
                        <td><?php echo $data['train_name']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['phno']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                    </tr>
                    <?php 
                    } 
                    setCount($count);
                    }
                    else{
                        echo "<script> alert('No tickets booked on this dates'); </script>";
                        echo $conn->error;
                    }
                    }
                 ?>
                </table>
            </div>
    </div>
</body>
</html>



