<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

$member_id=0;
if(isset($_GET['member_id'])){
    $member_id=$_GET['member_id'];
}

if(isset($_POST['create']))
{
$member_id=$_POST['member_id'];
$student_reg_no=$_POST['student_reg_no'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$department = $_POST['department'];
$course = $_POST['student_course'];

$sql="update tb_members set name='".$name."',department='".$department."',student_course='".$course."',email='".$email."',mobile='".$mobile."',student_reg_no='".$student_reg_no."' where member_id=".$member_id;
$query = $dbh->prepare($sql);
$query->execute();


$_SESSION['msg']="Student Updated Successfully";
header('location:manage-student.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Edit Student</title>
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
                <h4 class="header-line">Edit Student</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Staff Info
</div>
<div class="panel-body">
<?php $sql = "SELECT * from  tb_members WHERE is_staff=0 and member_id=".$member_id;
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{ 
foreach($results as $result)
{ 
?>
<form role="form" method="post">
<input type="hidden" name="member_id" value="<?php echo $member_id; ?>"/>

<div class="form-group">
<label>Reg No</label>
<input class="form-control" type="text" name="student_reg_no" value="<?php echo $result->student_reg_no; ?>"  autocomplete="off"  required />
</div>

<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name="name" value="<?php echo $result->name; ?>"  autocomplete="off"  required />
</div>

<div class="form-group">
<label>Mobile</label>
<input class="form-control" type="text" name="mobile" value="<?php echo $result->mobile; ?>" autocomplete="off"   />
</div>

<div class="form-group">
<label>Email</label>
<input class="form-control" type="text" name="email" value="<?php echo $result->email; ?>" autocomplete="off"   />
</div>

<div class="form-group">
<label>Department</label>
<?php $sql = "SELECT * from tb_departments";
$query = $dbh -> prepare($sql);
$query->execute();
$dresults=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{ ?>
<select name="department">
<option value="">--Select--</option>
<?php
foreach($dresults as $dresult)
{      ?>
<option value="<?php echo $dresult->name; ?>" <?php if($dresult->name == $result->department) { ?>selected <?php } ?> ><?php echo $dresult->name; ?></option>
<?php } ?>
</select>
<?php } ?>
</div>

<div class="form-group">
<label>Course</label>
<?php $sql = "SELECT * from tb_courses";
$query = $dbh -> prepare($sql);
$query->execute();
$cresults=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{ ?>
<select name="student_course">
<option value="">--Select--</option>
<?php
foreach($cresults as $cresult)
{      ?>
<option value="<?php echo $cresult->name; ?>" <?php if($cresult->name == $result->student_course) { ?>selected <?php } ?> ><?php echo $cresult->name; ?></option>
<?php } ?>
</select>
<?php } ?>
</div>

<button type="submit" name="create" class="btn btn-info">Add </button>
</form>
<?php
}
}    
?>

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
