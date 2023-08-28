<?php 
    session_start();
    include('DBConnection.php');
    if(isset($_SESSION["admin_uname"])){
            header("location: ./Adminlogin.php?logout=1");
    }
    include("adminheader2.html");
    $sql1 = "select count(username) as users from user";
    $users = queryexe($sql1,1,$conn);
    $sql2 = "select count(train_no) as trains from train";
    $trains = queryexe($sql2,2,$conn);
    $sql2 = "select count(ticket_no) as booked from ticket where status = 'booked'";
    $booked = queryexe($sql2,3,$conn);
    $sql2 = "select count(ticket_no) as cancelled from ticket where status = 'cancelled'";
    $cancelled = queryexe($sql2,4,$conn);
    $sql2 = "select count(id) as cancelled from contact";
    $contact = queryexe($sql2,4,$conn);
    function queryexe($sql,$num,$conn){
	    $result = $conn->query($sql);
	    if($result->num_rows > 0){
	    	while($data = $result->fetch_assoc()){
	    		
	    		if($num == 1){
	    			$users = $data['users'];
            	return $users;
	    		}
	    		else if($num == 2){
	    			$trains = $data['trains'];
	    			return $trains;
	    		}
	    		else if($num == 3){
	    			$booked = $data['booked'];
	    			return $booked;
	    		}
	    		else if($num == 4){
	    			$cancelled = $data['cancelled'];
	    			return $cancelled;
	    		}
	    	}
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
	<style type="text/css">
			.col1{
				background-color: orange;
				height: 100px;
				width: 0px;
				margin-left: 0px;
				border-radius: 5px;
			}
			.cust-font{
				font-size: 32px;
				text-align: center;
				font-family: sans-serif bold;
			}
			.cust-font2{
				margin-top: 0px;
				font-size: 20px;
				font-family: sans-serif bold;
				font-weight: bold;
			}		
	</style>
	
</head>
<body class="bg-img">
<?php include("adminmenu.html"); ?>
						<div class="col-12 col1 p-3 m-2">
							<div class="row ">
								<div class="col-6">
									<img src="asset/img/logo/register.png" width="70">
								</div>
								<div class="col-">
										<h2><span class="cust-font">&nbsp;	<?php  echo $users;  ?></span>
										<p class="cust-font2"> Registered Users</p>
									</h2>
								</div>
							</div>
						</div>
						<div class="col-12 col1 m-2 p-3">
							<div class="row ">
								<div class="col-6">
									<img src="asset/img/logo/train3.png" width="70">
								</div>
								<div class="col-6">
										<h2><span class="cust-font">&nbsp;	<?php  echo $trains;  ?></span>
										<p class="cust-font2">Available Trains</p>
									</h2>
								</div>
							</div>
						</div>
						<div class="col-12 col1 m-2 p-3">
							<div class="row ">
								<div class="col-6">
									<img src="asset/img/logo/ticket.png" width="70">
								</div>
								<div class="col-6">
										<h2><span class="cust-font">&nbsp;	<?php  echo $booked;  ?> </span>
										<p class="cust-font2">Booked Tickets</p>
									</h2>
								</div>
							</div>
						</div>
						<div class="col-12 col1 m-2 p-3">
							<div class="row">
								<div class="col-6">
									<img src="asset/img/logo/ticket2.png" width="70">
								</div>
								<div class="col-6">
										<h2><span class="cust-font">&nbsp;	<?php  echo $cancelled;  ?></span>
										<p class="cust-font2">Cancelled Tickets</p>
									</h2>
								</div>
							</div>
						</div>
</body>
</html>