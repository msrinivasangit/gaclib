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
$employee_id=$_POST['employee_id'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$department = $_POST['department'];
$designation = $_POST['designation'];
$gender= $_POST['gender'];
$dob= $_POST['dob'];
$address= $_POST['address'];

$sql="update tb_members set name='".$name."',department='".$department."',designation='".$designation."',email='".$email."',mobile='".$mobile."',employee_id='".$employee_id."',gender='".$gender."',dob='".$dob."',address='".$address."' where member_id=".$member_id;
$query = $dbh->prepare($sql);
$query->execute();
$msg="Updated successfully";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Edit Staff</title>
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
<div class="row">
    <?php if($msg!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($msg);?>
<?php echo htmlentities($msg="");?>
</div>
</div>
<?php } ?>
</div>

      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->    
    <div class="content-wrapper">
        <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Profile</h4>
            </div>
        </div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Staff Info
</div>
<div class="panel-body">
<?php $sql = "SELECT * from  tb_members WHERE is_staff=1 and member_id=".$member_id;
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
    <label>Emp No</label>
    <input class="form-control" type="text" name="employee_id" value="<?php echo $result->employee_id; ?>"  autocomplete="off"  readonly />
    </div>
    <div class="form-group">
    <label>Name</label>
    <input class="form-control" type="text" name="name" value="<?php echo $result->name; ?>"  autocomplete="off"  required />
    </div>
    <div class="form-group">
    <label>Gender</label>
    <select name="gender">
    <option value="" >--Select--</option>
    <option value="m" <?php if($result->gender=='m') { ?>selected <?php } ?>>Male</option>
    <option value="f" <?php if($result->gender=='f') { ?>selected <?php } ?>>Female</option>
    </select>
    </div>
    <div class="form-group">
    <label>Mobile</label>
    <input class="form-control" type="text" name="mobile" value="<?php echo $result->mobile; ?>" autocomplete="off"   />
    </div>
    <div class="form-group">
    <label>DOB (yyyy-mm-dd)</label>
    <input class="form-control" type="text" name="dob" value="<?php echo $result->dob; ?>" autocomplete="off"   />
    </div>
    <div class="form-group">
    <label>Email</label>
    <input class="form-control" type="text" name="email" value="<?php echo $result->email; ?>" autocomplete="off"   />
    </div>
    <div class="form-group">
    <label>Address</label>
    <input class="form-control" type="text" name="address" value="<?php echo $result->address; ?>" autocomplete="off"   />
    </div>
    <div class="form-group">
    <label>Designation</label>
    <input class="form-control" type="text" name="designation" value="<?php echo $result->designation; ?>" autocomplete="off"   />
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
    <button type="submit" name="create" class="btn btn-info">Save </button>
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
