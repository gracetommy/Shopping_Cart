<?php
#test.php sandbox

define('DBNAME', 'bookstore');
define('DBUSER', 'root');
define('DBPASS', 'romantic');

try{

	#prepare  pdo instance
$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

#set verbose error modes
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

}catch(PDOException $e){
	echo $e->getMessage();
}



?>
