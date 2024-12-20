<?php
include 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = htmlspecialchars($_POST['username']);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':password', $password);

	try {
		$stmt->execute();
		$msg = '<span style="color:green;">Registration successful! <a href="login.php">Login here</a>';
	} catch (PDOException $e) {
		$msg =  '<span style="color:red;">Error: '. $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Page</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12 text-center"><?php echo $msg; ?></div>
				<h1 class="text-center">Welcome to the Login Page</h1>
				<p class="lead text-center mt-4">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry.
				</p>
				<form method="POST" class="text-center">
					<input type="text" name="username" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required>
					<button type="submit">Register</button>
				</form>
				<a href="index.php" class="btn btn-secondary" style="margin-top: 40px;">Back</a>
			</div>
		</div>
	</div>
</body>

</html>
