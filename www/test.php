<?php
#test.php sandbox

/*define('DBNAME', 'testing');
define('DBUSER', 'root');
define('DBPASS', 'tommy');

try{#prepare  pdo instance
$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

#set verbose error modes
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

}catch(PDOException $e){
	echo $e->getMessage();
}*/

#max file size...
define("MAX_FILE_SIZE","2097152");

#allow extensions...
$ext = ["image/jpg", "image/jpeg", "image/png"];

if (array_key_exists('save',$_POST)){
	if(empty($_FILES['pic']['name'])){
		$errors['pic'] = "please choose a file";
	}
	#check file size...
	if($_FILES['pic']['size'] > MAX_FILE_SIZE){
		$error = [];
		$errors['pic'] = "fiel sizeexceeds maximum. maximum: ". MAX_FILE_SIZE;
	}
	if(empty($errors)){

		echo "done";
	}else{

		foreach ($errors as $err){
			echo $err. '</br>';
		}
	}
}

?>

<form id="register" method="POST" enctype="multipart/form-data">
<p>Please Upload a file</p>
<input type="file" name="pic">
<input type="submit" name="save">
</form>

