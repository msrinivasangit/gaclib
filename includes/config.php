<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','admin');
define('DB_NAME','digital_library');

// define('DB_HOST','localhost');
// define('DB_USER','findmntr_gac');
// define('DB_PASS','gaclib');
// define('DB_NAME','findmntr_gaclib');
// define('DB_NAME','findmntr_gacs7');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>