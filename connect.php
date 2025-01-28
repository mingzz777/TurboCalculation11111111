<?php
	$email = $_POST['อีเมลล์'];
	$name = $_POST['ชื่อ'];
	$password = $_POST['รหัสผ่าน'];

	// Database connection
	$conn = new mysqli('localhost','root','','TurboCalculation00');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(อีเมลล์, ชื่อ, รหัสผ่าน) values(?, ?, ?)");
		$stmt->bind_param("sss", $email, $name, $gender, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
