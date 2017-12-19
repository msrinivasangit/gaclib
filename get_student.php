<?php 
require_once("includes/config.php");
if(!empty($_POST["studentid"])) {
  $studentid= strtoupper($_POST["studentid"]);
 
    $sql ="SELECT name,status,department, is_staff FROM tb_members WHERE (student_reg_no=:studentid or employee_id=:studentid)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':studentid', $studentid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->status==0)
{
echo "<span style='color:red'> Student / Staff ID Blocked </span>"."<br />";
echo "<b>Student / Staff Name-</b>" .ucwords($result->name)." is " .($result->is_staff == 0 ? 'Student':'Staff' )." of Department ".$result->department;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo ucwords(htmlentities($result->name." is " .($result->is_staff == 0 ? 'Student':'Staff' ).", ".$result->department." Department"));
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
