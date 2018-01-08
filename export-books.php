<?php
$students = file('books-lib.csv');
//print_r($students);
foreach($students as $i => $std){
	if($i==0)
		continue;

$rec =	explode(",",$std);
$acc_number = trim(str_replace('"', '', $rec[1]));
$title = strtolower(  addslashes( trim(str_replace('"', '', $rec[2]))) );
$author1 = strtolower( addslashes(trim(str_replace('"', '', $rec[3]))) );
$publication = strtolower( addslashes(trim(str_replace('"', '', $rec[4]))) );
$place_of_publication = strtolower( trim(str_replace('"', '', $rec[5])) );
$year_of_publication = trim(str_replace('"', '', $rec[6]));
$cost = trim(str_replace("\\", '',str_replace('/', '',str_replace('RS', '',str_replace('RS.', '',str_replace('-', '.',str_replace('"', '', $rec[7])))))));

$insert_student = "INSERT Ignore `tb_books` (`book_id`, `title`, `subtitle`, `author1`, `publication`, `isbn`, `edition`, `place_of_publication`, `year_of_publication`, `number_of_pages`, `cost`, `acc_number`, `call_number`, `category`, `department`, `subject`, `dept_transfer_status`, `photo`, `author2`, `author3`, `created_at`, `modified_at`, `status`, `book_available_status`) VALUES (NULL, '$title', '', '$author1', '$publication', '', '', '$place_of_publication', '$year_of_publication', '', '$cost', '$acc_number', '', '', '', '', '0', '', '', '', now(), CURRENT_TIMESTAMP, '0', '1');";
print $insert_student."\n";
//exit;
}
exit;
?>