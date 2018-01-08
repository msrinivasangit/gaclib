<?php 
require_once("includes/config.php");
if(!empty($_POST["bookid"])) {
  $bookid=$_POST["bookid"];
 
  $sql ="SELECT book_id, title, author1, acc_number, publication, place_of_publication, cost, year_of_publication, isbn FROM tb_books WHERE ((isbn=:bookid) or (title=:bookid) or (acc_number=:bookid)) and book_available_status='1'";
$query= $dbh -> prepare($sql);
$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
  foreach ($results as $result) {?>
<option value="<?php echo htmlentities($result->book_id);?>"><?php echo ucwords(htmlentities('Title: '.$result->title." | ".
	'Acc Number: '.$result->acc_number." | ".
	'Author: '.$result->author1." | ".
	'Publication: '.$result->publication));?></option>
<b>Book Name :</b> 
<?php  
echo htmlentities($result->title);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
 else{?>
  
<option class="others"> Invalid ISBN or Acc Number or book not available </option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
