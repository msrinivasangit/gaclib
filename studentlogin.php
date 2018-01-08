<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
 //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {

$employee_id=$_POST['employee_id'];
$password=md5($_POST['password']);
$sql ="SELECT member_id,name,email,password,employee_id,status,is_super_admin,is_staff FROM tb_members WHERE is_staff=0 and status=1 and student_reg_no=:employee_id and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['alogin']=$result->member_id;
$_SESSION['is_super_admin']=$result->is_super_admin;
$_SESSION['is_staff']=$result->is_staff;
$_SESSION['name']=$result->name;
if($result->status==1)
{
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
}
}
}else{
echo "<script>alert('Invalid Details');</script>";
}
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">                
                <a class="navbar-brand">
                    <img src="assets/img/logo.gif" style="width:100%;height:auto;" />
                </a>                 
            </div>

            <div class="left-div">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="right-div">
                <a href="index.php" class="btn btn-danger pull-right">Home</a>
            </div>              
        </div>
        <center><div style="font-size: 28px;font-weight: bold;">GENERAL LIBRARY<br/>
        ONLINE LIBRARY MANAGEMENT SYSTEM</div> </center>
    </div>
<!-- LOGO HEADER END-->
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">STUDENT LOGIN FORM</h4>
</div>
</div>
<?php include('includes/carousel.php');?>
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Username</label>
<input class="form-control" type="text" name="employee_id" autocomplete="off" required />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required />
</div>
 <div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>  

 <button type="submit" name="login" class="btn btn-info">LOGIN </button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
           
           <div class="row">
    Government Arts College, Salem, is a general degree college located in Salem, Tamil Nadu. It was established in the year 1857. The college is affiliated with Periyar University. This college offers different courses in arts, commerce and science.
</div>
  
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</script>
</body>
</html>
