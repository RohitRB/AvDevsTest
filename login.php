<?php
session_start();
include 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$stmt->bindParam(':username', $username);
	$stmt->execute();

	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($user && password_verify($password, $user['password'])) {
		$_SESSION['user_id'] = $user['id'];
		header('Location: home.php');
	} else {
		$msg = '<span style="color:red;">Invalid credentials.</span>';;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
			<div class="col-md-12 text-center"><?php echo $msg;?></div>
			<h1 class="text-center">Welcome to the Login Page</h1>
                <p class="lead text-center mt-4">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
				<form method="POST" class="text-center">
					<input type="text" name="username" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required>
					<button type="submit">Login</button>
				</form>
				<a href="index.php" class="btn btn-secondary" style="margin-top: 40px;">Back</a>
			</div>
		</div>
	</div>
</body>

</html>