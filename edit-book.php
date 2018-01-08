<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{

$title=addslashes($_POST['title']);
$author1=addslashes($_POST['author1']);
$acc_number=addslashes($_POST['acc_number']);
$publication=addslashes($_POST['publication']);
$place_of_publication=addslashes($_POST['place_of_publication']);
$year_of_publication=$_POST['year_of_publication'];
$department = $_POST['department'];
$cost=$_POST['cost'];

$department = $_POST['department'];
$book_id=intval($_GET['book_id']);
$sql="UPDATE tb_books SET 
title = '".$title."' ,
author1 = '".$author1."' ,
publication = '".$publication."' ,
place_of_publication = '".$place_of_publication."' ,
year_of_publication = '".$year_of_publication."' ,
cost = '".$cost."' ,
acc_number = '".$acc_number."' ,
department = '".$department."' 
WHERE book_id = ".$book_id;

$query = $dbh->prepare($sql);

$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':author1',$author1,PDO::PARAM_STR);
$query->bindParam(':acc_number',$acc_number,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':cost',$cost,PDO::PARAM_STR);
$query->bindParam(':publication',$publication,PDO::PARAM_STR);
$query->bindParam(':place_of_publication',$place_of_publication,PDO::PARAM_STR);
$query->bindParam(':year_of_publication',$year_of_publication,PDO::PARAM_STR);
$query->bindParam(':book_id',$book_id,PDO::PARAM_STR);
$query->execute();
$_SESSION['msg']="Book info updated successfully";
header('location:manage-books.php');
exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Edit Book</title>
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
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post">
<?php 
$book_id=intval($_GET['book_id']);
$sql = "SELECT title, author1, acc_number, publication, place_of_publication, cost, year_of_publication, isbn, department from tb_books where book_id =:book_id";
$query = $dbh -> prepare($sql);
$query->bindParam(':book_id',$book_id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="form-group">
<label>Title<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" value="<?php echo htmlentities($result->title);?>" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Author<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="author1" value="<?php echo htmlentities($result->author1);?>"  autocomplete="off"  required />
</div>

<div class="form-group">
<label>Acc Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="acc_number" value="<?php echo htmlentities($result->acc_number);?>" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Publication<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="publication" value="<?php echo htmlentities($result->publication);?>"
 autocomplete="off"  required />
</div>

<div class="form-group">
<label>Place of publication<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="place_of_publication" value="<?php echo htmlentities($result->place_of_publication);?>" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Year of publication<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="year_of_publication" value="<?php echo htmlentities($result->year_of_publication);?>" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Price<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="cost" value="<?php echo htmlentities($result->cost);?>" autocomplete="off"  required />
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


 <?php }} ?>
<button type="submit" name="update" class="btn btn-info">Update </button>

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
