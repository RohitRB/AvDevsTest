<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileName = basename($_FILES['file']['name']);
    $targetDir = 'uploads/';
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
        $stmt = $pdo->prepare("UPDATE users SET uploaded_file = :file WHERE id = :id");
        $stmt->bindParam(':file', $fileName);
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();

        $msg =  '<span style="color:green;">File uploaded successfully.</span';
    } else {
        $msg = '<span style="color:red;">File upload failed.';
    }
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
            <div class="col-md-12 text-center">
				<div><?php echo $msg;?></div>
				<form method="POST" enctype="multipart/form-data">
					<input type="file" name="file" required style="margin-top: 10px;">
					<button type="submit">Upload</button>
				</form>
				<a href="home.php" class="btn btn-secondary" style="margin-top: 40px;">Back</a>
			</div>
		</div>
	</div>
	</div>
</body>
</html>

