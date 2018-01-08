<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{

$student_id=$_POST['student_reg_no'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$department = $_POST['department'];
$student_course = $_POST['student_course'];

$sql = "SELECT member_id from  tb_members WHERE employee_id='$student_id' or student_reg_no='$student_id'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
    $_SESSION['error']="Student / Staff (".$student_id.") already exists in system";
    header('location:add-student.php');
    exit;
}

$sql="INSERT INTO `tb_members` (`member_id`, `name`, `department`, `photo`, `is_staff`, `is_super_admin`, `student_reg_no`, `student_course`, `course_from_year`, `course_to_year`, `employee_id`, `designation`, `dob`, `valid_till_year`, `mobile`, `address`, `email`, `status`, `password`, `created_at`, `modified_at`) VALUES (NULL, '$name', '', '', '0', '0', '$student_id', '', '', '', '', '', '', '', '$mobile', '', '$email', '1', MD5('$student_id'), now(), CURRENT_TIMESTAMP)";
$query = $dbh->prepare($sql);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Student Listed successfully";
header('location:manage-student.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:add-student.php');
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
    <title>Online Library Management System | Add Student</title>
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
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Student</h4>
                
                            </div>

</div>

<div class="row">
    <?php 
    if(isset($_GET['msg'])){
        $_SESSION['msg']=$_GET['msg'];
    }
    if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>


   <?php 
   if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Student Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Reg No</label>
<input class="form-control" type="text" name="student_reg_no" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name="name" autocomplete="off"  required />
</div>
<div class="form-group">
<label>Mobile</label>
<input class="form-control" type="text" name="mobile" autocomplete="off"   />
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control" type="text" name="email" autocomplete="off"   />
</div>


<button type="submit" name="create" class="btn btn-info">Add </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
