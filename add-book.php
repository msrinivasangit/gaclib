<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$title=addslashes($_POST['title']);
$author1=addslashes($_POST['author1']);
$acc_number=addslashes($_POST['acc_number']);
$publication=addslashes($_POST['publication']);
$place_of_publication=addslashes($_POST['place_of_publication']);
$year_of_publication=$_POST['year_of_publication'];
$department = $_POST['department'];
$cost=$_POST['cost'];
$isbn='0';

$sql="INSERT Ignore tb_books (book_id, title, subtitle, author1, publication, isbn, edition, place_of_publication, year_of_publication, number_of_pages, cost, acc_number, call_number, category, department, subject, dept_transfer_status, photo, author2, author3, created_at, modified_at, status, book_available_status) VALUES (NULL, '".$title."', '', '".$author1."', '".$publication."', '', '', '".$place_of_publication."', '".$year_of_publication."', '', '".$cost."', '".$acc_number."', '', '', '".$department."', '', '0', '', '', '', now(), CURRENT_TIMESTAMP, '1', '1')";

$query = $dbh->prepare($sql);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
// print $lastInsertId;
// print_r($query);
// exit;
if($lastInsertId)
{
$_SESSION['msg']="Book Listed successfully";
header('location:add-book.php?msg='.$_SESSION['msg']);
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:add-book.php?msg='.$_SESSION['error']);
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
    <title>Online Library Management System | Add Book</title>
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
                <h4 class="header-line">Add Book</h4>
                
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
Book Info
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Title<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Author<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="author1" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Acc Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="acc_number" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Publication<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="publication" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Place of publication<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="place_of_publication" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Year of publication<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="year_of_publication" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Price<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="cost" autocomplete="off"  required />
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

<button type="submit" name="add" class="btn btn-info">Add </button>

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
