<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (user_email, user_password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php?msggg=Registration successful");
        exit;
    } else {
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-3">Registration</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="login.php" class="btn btn-primary">Login</a>
                </form>
                <br>
            </div>
        </div>
    </div>
</body>
</html>
