<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, user_email, user_password FROM users WHERE user_email='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($password == $row['user_password']) {

            $_SESSION['id'] = $row['id'];
            header("Location: ./index1.php");

        } else {
            $login_error = "Invalid username or password";
        }
    } else {
        $login_error = "Invalid username or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-3">Login</h2>
                <p style="color:green;">
                <?php
                if (isset($_GET['msggg'])) {
echo $_GET['msggg'];  
              }
              if (isset($login_error)) {
                echo $login_error;
            }
                
                ?></p>
                <form  method="post">
                    <?php if(isset($login_error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $login_error; ?>
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="register.php" class="btn btn-primary">Register</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
