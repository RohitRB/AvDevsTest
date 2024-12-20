<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Welcome to the Home Page</h1>
                <p class="lead text-center mt-4">
                    This is a dummy paragraph to demonstrate how you can use Bootstrap CSS to style your content. Enjoy using this lightweight and responsive framework for building your applications!
                </p>
                <div class="text-center mt-3">
                    <a href="upload.php" class="btn btn-primary">Upload a File</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
		</div>
	</div>
</body>

</html>
