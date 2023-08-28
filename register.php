<?php 
 
    include('DBConnection.php'); 
if(isset($_POST['register'])){
    $uname = $_POST['username'];
    $pass = $_POST['password1'];
    $secque = $_POST['secque'];
    $secans = $_POST['secans'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $sql_uname = "SELECT *FROM user where username = '$uname'";
    $result = $conn->query($sql_uname);
    if( $result->num_rows > 0 ){
        $err_uname= "Username is already registered";
    }
    else{
        $sql="INSERT INTO user (username, password, first_name, middle_name, last_name, gender, date_of_birth, email, mobile_number, security_question, security_answare) VALUES ( '$uname', '$pass', '$fname', '$mname', '$lname', '$gender', '$dob', '$email', '$phno', '$secque', '$secans')";
        if($conn->query($sql)== TRUE){
          echo "<script>alert('Now, you can book your journey');</script>";
        }
        else{
           echo "<script>alert('errrrrr');</script>";
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
    <style>
        .text-main h5, .text-main{
            font-size: 16px;
            font-weight: bold;
            color: #333;
            font-family: serif;
        }
    </style>
</head>
<body>
    <?php include('header.html') ?>
<form action="" name="regForm" onsubmit="return(validation());" method="post" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-blue mt-5 mb-4">
                    <h2>Create Your Account</h2>
                </div>
                <hr>
            </div> 
            <div class="col-12">
            <div class="col-12 alert alert-primary text-bold">Basic Details</div>
               <div class="text-dark">
                    <h7>Please enter a vaild E-Mail and mobile number for the registration</h7>
               </div>
                <hr>     
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Username<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="uname" name="username">
                </div>
                <div class="text-red">
                    <span id="er_uname"><?php if(isset($err_uname)){ echo "$err_uname"; } ?></span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Password<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="password" id="pass1" name="password1">
                </div>
                <div  class="text-red">
                    <span id="er_pass1"></span>
                </div>
            </div>
            <div class="col-12"><hr></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Confirm Password<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="password" id="pass2" name="password2">
                </div>
                <div  class="text-red">
                    <span id="er_pass2"></span>
                </div>
            </div> 

            <div class="col-12"><hr></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Security Question<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 ">
                <div class="text-main input-group">
                    <select class="custom-select" id="secQue" name="secque">
                        <option class="" value="default">Select Security Question</option>
                        <option class="" value="1">first mobile no</option>
                        <option class="" value="2">your pet name</option>
                        <option class="" value="3">your nick name</option>
                        <option class="" value="4">your favourite movie name</option>
                    </select>
                </div>
                <div  class="text-red">
                    <span id="er_secque"></span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Security Answer<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="secAns" name="secans">
                </div>
                <div class="text-red">
                    <span id="er_secans"></span>
                </div>
            </div> 
            <div class="col-12"><hr></div>
            <div class="col-12 alert alert-primary text-bold">Personal Details</div>
            <div class="col-12 col-sm-3 col-md-3">
                <div class="text-main text-center">
                    <h5>Name<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="fn" name="fname" placeholder="First Name">
                </div>
                <div  class="text-red">
                    <span id="er_fname"></span>
                </div>
            </div> 

            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="mn" name="mname" placeholder="Middle Name">
                </div>
                <div  class="text-red">
                    <span id="er_mname"></span>
                </div>
            </div> 
            <div class="col-12 col-sm-3 col-md-3 ">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="ln" name="lname" placeholder="Last Name">
                </div>
                <div  class="text-red">
                    <span id="er_lname"></span>
                </div>
            </div> 
            <div class="col-12"><hr></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Gender<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-6 col-sm-2">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="M" required>
                    <span class="text-main">&nbsp;&nbsp;Male</span>
                </div>
                <div  class="text-red">
                    <span id="er_gender"></span>
                </div>
            </div>
            <div class="col-6 col-sm-2">
                <div class="text-main input-group">
                    <input class="" type="radio" name="gender" value="F" required>
                    <span class="text-main">&nbsp;&nbsp;Female</span>
                </div>
            </div>
            <div class="col-12"><hr></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Date Of Birth<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <div class="text-main input-group">
                    <input class="form-control" type="date" id="date" name="dob">
                </div>
                <div  class="text-red">
                    <span id="er_dob"></span>
                </div>
            </div>
            <div class="col-12"><hr></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Email<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="mail" name="email">
                </div>
                <div  class="text-red">
                    <span id="er_email"></span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Mobile No<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text alert-dark text-dark">+91</span>
                </div>
                    <input class="form-control" type="text" id="mono" maxlength="10" name="phno">
                </div>
                <div  class="text-red">
                    <span id="er_phno"></span>
                </div>
            </div>
            <div class="col-12"><hr></div>
            <div class="col-12 alert alert-primary text-bold">Residential Address</div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Area<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <textarea class="form-control" type="text" id="area" name="add_area" ></textarea>
                </div>
                <div  class="text-red">
                    <span id="er_addarea"></span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>Pincode<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <input class="form-control" type="text" id="pin" maxlength="
                    6" name="add_pin">
                </div>
                <div  class="text-red">
                    <span id="er_addpin"></span>
                </div>
            </div>
            <div class="col-12"><hr></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>City<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                    <select class="custom-select" id="city" name="add_city">
                        <option class="" value="default">Select City</option>
                        <option class="" value="">vijayawada</option>
                        <option class="" value="">hyderabad</option>
                        <option class="" value="">bhopal</option>
                        <option class="" value="">mumbai</option>
                        <option class="" value="">chennai</option>
                        <option class="" value="">patna</option>
                        <option class="" value="">delhi</option>
                        <option class="" value="">banglore</option>
                        <option class="" value="">thiruvananthapuram</option>
                    </select>
                </div>
                <div class="text-red">
                    <span  id="er_addcity"></span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main text-center">
                    <h5>State<span class="text-red text-strong">&nbsp;*&nbsp;</span>:</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="text-main input-group">
                     <select class="custom-select" id="state" name="add_state">
                        <option class="" value="default">Select State</option>
                        <option class="" value="">andhra pradesh</option>
                        <option class="" value="">telangana</option>
                        <option class="" value="">madhya pradesh</option>
                        <option class="" value="">maharastra</option>
                        <option class="" value="">tamilnadu</option>
                        <option class="" value="">bihar</option>
                        <option class="" value="">delhi</option>
                        <option class="" value="">karnataka</option>
                        <option class="" value="">kerala</option>
                    </select>
                </div>
                <div  class="text-red">
                    <span id="er_addstate"></span>
                </div>
            </div>
            <div class="col-12"><hr></div>
            <div class="col-12">
                <div class="text-main text-center">
                    <input class="btn btn-success" type="submit" name="register" value="Register">
                    <input class="btn btn-success" type="reset" name="cancel" value="Reset">
                </div>
            </div>
        </div> 
    </div> 
    <br>
    <br>
</form>	
<?php include("footer.html");?>
</body>
</html>
