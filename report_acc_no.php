<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

$wheres  = array();
if(isset($_POST['search']))
{
    if((empty($_POST['acc_number'])) && (empty($_POST['acc_number2'])) ){
        $msg = 'Please Fill the Acc Number(s)';
    }elseif((empty($_POST['acc_number'])) && (isset($_POST['acc_number2'])) ){
        $msg = 'From Acc Number Cannot be empty';
    }elseif((isset($_POST['acc_number'])) && (empty($_POST['acc_number2'])) ){
        $wheres[]= "acc_number =".$_POST['acc_number'];
    }elseif((isset($_POST['acc_number'])) && (isset($_POST['acc_number2'])) ){
        if($_POST['acc_number'] < $_POST['acc_number2']){
            $wheres[]= "acc_number >".$_POST['acc_number']." and acc_number <".$_POST['acc_number2'];
        }else{
            $msg = 'From Acc Number Should be less than To Acc Number';
        }
    }
}
$where='where 1 limit 100';
if(count($wheres)){
    $where = "where ".implode(' and ',$wheres);
}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | OPAC</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Acc Number Report</h4>
            </div>
            <div class="row">
              <?php if($msg!="")  {?>
              <div class="col-md-6">
              <div class="alert alert-danger" >
               <strong>Error :</strong> 
               <?php echo htmlentities($msg);?>
              <?php echo htmlentities($msg="");?>
              </div>
              </div>
              <?php } ?>
            </div>
    <div class="col-md-12">
        <form role="form" method="post">
            <div class="col-md-6">
            <label>From Acc Number</label>
            <input class="form-control" type="text" name="acc_number" value="<?php echo htmlentities($_POST['acc_number']);?>"  />
            <label>To Acc Number</label>
            <input class="form-control" type="text" name="acc_number2" value="<?php echo htmlentities($_POST['acc_number2']);?>"  />
            </div>
            <div class="col-md-6">
            <label>&nbsp;</label>
            <button type="submit" name="search" class="form-control btn btn-info">Search </button>&nbsp;
            
            <label>&nbsp;</label>
            <button class="form-control btn btn-info" onclick="javascript:xport.toCSV('dataTables-example','acc-report');">Export to XLS</button>&nbsp;
            </div>
            
        </form>     
    </div>     


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Results
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Acc Number</th>
                                            <th>Author</th>
                                            <th>Publication</th>
                                            <th>Place of Publication</th>
                                            <th>Year of Publication</th>
                                            <th>Price</th>
                                            <th>Availability</th>
                                        </tr>
                                    </thead>
                                    <tbody>                               
<?php $sql = "SELECT book_id, title, author1, acc_number, publication, place_of_publication, cost, year_of_publication, isbn, book_available_status from tb_books ".$where;

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo ucwords(htmlentities($result->title));?></td>
                                            <td class="center"><?php echo htmlentities($result->acc_number);?></td>
                                            <td class="center"><?php echo ucwords(htmlentities($result->author1));?></td>
                                            <td class="center"><?php echo ucwords(htmlentities($result->publication));?></td>
                                            <td class="center"><?php echo ucwords(htmlentities($result->place_of_publication));?></td>
                                            <td class="center"><?php echo htmlentities($result->year_of_publication);?></td>
                                            <td class="center"><?php echo htmlentities($result->cost);?></td>
                                            <td class="center"><?php if($result->book_available_status) echo 'Available'; else echo 'Issued'; ?></td>
                                            
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/export-csv.js"></script>
</body>
</html>
<?php } ?>
