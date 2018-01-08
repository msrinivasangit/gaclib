<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['return']))
{
$rid=intval($_GET['rid']);
$fine=$_POST['fine'];
$rstatus=1;
// $sql= "update td_bookissue set fine='".$fine."',return_status='".$rstatus."',return_date=now() where id=".$rid;
// echo $sql;
// exit;
$sql="update td_bookissue set fine=:fine,return_status=:rstatus,return_date=now() where id=:rid";
$query = $dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->bindParam(':fine',$fine,PDO::PARAM_STR);
$query->bindParam(':rstatus',$rstatus,PDO::PARAM_STR);
$query->execute();
$_SESSION['msg']="Book Returned successfully";
header('location:manage-issued-books.php');



}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Issued Book Details</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 
<style type="text/css">
  .others{
    color:red;
}

</style>


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
                <h4 class="header-line">Issued Book Details</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
<div class="panel panel-info">
<div class="panel-heading">
Issued Book Details
</div>
<div class="panel-body">
<form role="form" method="post">
<?php 
$rid=intval($_GET['rid']);
$sql = "SELECT tb_members.name,tb_books.title,tb_books.isbn,tb_books.acc_number,td_bookissue.fine,td_bookissue.return_status,td_bookissue.issue_date,td_bookissue.return_date,td_bookissue.id as rid from  td_bookissue join tb_members on tb_members.member_id=td_bookissue.member_id join tb_books on tb_books.book_id=td_bookissue.book_id where td_bookissue.id=:rid";
$query = $dbh -> prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                   



<div class="form-group">
<label>Name :</label>
<?php echo ucwords(htmlentities($result->name));?>
</div>

<div class="form-group">
<label>Book Name :</label>
<?php echo ucwords(htmlentities($result->title));?>
</div>

<!-- 
<div class="form-group">
<label>ISBN :</label>
<?php //echo htmlentities($result->isbn);?>
</div>
 -->
<div class="form-group">
<label>ACC Number :</label>
<?php echo htmlentities($result->acc_number);?>
</div>


<div class="form-group">
<label>Book Issued Date :</label>
<?php echo htmlentities($result->issue_date);?>
</div>


<div class="form-group">
<label>Book Returned Date :</label>
<?php if($result->return_date=="0000-00-00 00:00:00")
                                            {
                                                echo date("Y-m-d H:i:s");
                                            } else {


                                            echo htmlentities($result->return_date);
}
                                            ?>
</div>

<div class="form-group">
<label>Fine  :</label>
<?php 
if($result->fine=="")
{?>
<input class="form-control" type="text" name="fine" id="fine"  required />

<?php }else {
echo htmlentities($result->fine);
}
?>
</div>
 <?php if($result->return_status==0){?>

<button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>

 </div>

<?php }}} ?>
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
