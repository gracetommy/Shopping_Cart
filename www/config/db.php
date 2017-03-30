
<?php
#test.php sandbox

define('DBNAME', 'book_store');
define('DBUSER', 'root');
define('DBPASS', 'tommy');

try{

	#prepare  pdo instance
$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

#set verbose error modes
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

}catch(PDOException $e){
	echo $e->getMessage();
}

?>
