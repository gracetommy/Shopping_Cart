<?php
	
	#title
	$page_title="Register";


	#include head.php
	include 'config/head.php';

	#include db conn file
	include 'config/db.php';

	if (array_key_exists('register', $_POST)){

	#cache errors
	$errors = [];

	#validate firstname
	if(empty($_POST['fname'])){
		$errors['fname'] = "Please enter a first name </br>";
	}

	if(empty($_POST['lname'])){
		$errors['lname'] = "Please enter a Last name </br>";
	}

	if(empty($_POST['email'])){
		$errors['email'] = "Please enter email </br>";
	}

	if(empty($_POST['password'])){
		$errors['password'] = "Please enter password </br>";
	}
	

	if(($_POST['pword']) != ($_POST['password'])){
		$errors['pword'] = "password does not match, enter the correct password";
	}

	if(empty($errors )){
		//do db stuff

	#eliminate unwanted spaces from values in the $_POST array
		$clean = array_map('trim', $_POST);

	#hash the password
		$hash = password_hash($clean['password'], PASSWORD_BCRYPT);

	#insert data
		$stmt = $conn->prepare("INSERT INTO admin(first_name, last_name, email, hash) VALUES(:fn, :ln, :e, :h)");

	#bind params...
	$data = [
		':fn' =>$clean['fname'],
		':ln' =>$clean['lname'],
		':e' =>$clean['email'],
		':h' =>$hash
		];

	$stmt ->execute($data);
	
	}

}

?>
	<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>	
				<?php
					if(isset($errors['fname'])){ echo '<span class="err">'.$errors['fname']. '</span>';}
					?>	
						
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
				
			</div>
			<div>
			<?php
				if(isset($errors['lname'])){ echo '<span class="err">'.$errors['lname']. '</span>';}
				?>

				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
			<?php
				if(isset($errors['email'])){ echo '<span class="err">'.$errors['email']. '</span>';}
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
				
			</div>
			<div>
			<?php
					if(isset($errors['hash'])){ echo '<span class="err">'.$errors['password']. '</span>';}
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
				
			</div>
 
			<div>
			<?php
					if(isset($errors['pword'])){ echo '<span class="err">'.$errors['pword']. '</span>';}
				?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
				
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>
