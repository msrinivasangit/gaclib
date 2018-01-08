<?php
$students = file('staff.csv');
//print_r($students);
foreach($students as $i => $std){
	if($i==0)
		continue;

$rec =	explode(",",$std);
$student_id = trim(str_replace('"', '', $rec[1]));
$name = trim(str_replace('"', '', $rec[2]));

if(isset($rec[3]))
$design = trim(str_replace('"', '', $rec[3]));
else
$design ='';

if(isset($rec[4]))
$depart = trim(str_replace('"', '', $rec[4]));
else
$depart='';

$insert_student = "INSERT INTO `tb_members` (`member_id`, `name`, `department`, `photo`, `is_staff`, `is_super_admin`, `student_reg_no`, `student_course`, `course_from_year`, `course_to_year`, `employee_id`, `designation`, `dob`, `valid_till_year`, `mobile`, `address`, `email`, `status`, `password`, `created_at`, `modified_at`) VALUES (NULL, '$name', '$depart', '', '1', '0', '', '', '', '', '$student_id', '$design', '', '', '', '', '', '1', MD5('$student_id'), now(), CURRENT_TIMESTAMP)";
print $insert_student.";\n";

}
exit;
?>