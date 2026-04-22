<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #141e30, #243b55);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', sans-serif;
}

.login-card {
    background: white;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 400px;
}

.login-title {
    text-align: center;
    margin-bottom: 25px;
    font-weight: bold;
    color: #333;
}

.btn-custom {
    background: #243b55;
    color: white;
    transition: 0.3s;
}

.btn-custom:hover {
    background: #141e30;
}

.show-pass {
    cursor: pointer;
    font-size: 14px;
    color: #555;
}
</style>
</head>

<body>

<div class="login-card">
    <h3 class="login-title">Admin Login</h3>

    <form method="POST">
        <!-- Username -->
        <div class="mb-3">
            <input type="text" name="uname" class="form-control" placeholder="Username" required>
        </div>

        <!-- Password -->
        <div class="mb-2">
            <input type="password" name="psw" id="password" class="form-control" placeholder="Password" required>
        </div>

        <!-- Show Password -->
        <div class="mb-3 text-end">
            <span class="show-pass" onclick="togglePassword()">Show Password</span>
        </div>

        <!-- Login -->
        <div class="d-grid mb-2">
            <button type="submit" name="login" class="btn btn-custom">Login</button>
        </div>

        <!-- Reset -->
        <div class="d-grid mb-2">
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </div>

        <!-- Employee Login Button -->
        <div class="d-grid">
            <a href="login.php" class="btn btn-outline-primary">
                👤 Employee Login
            </a>
        </div>

        <!-- Optional Text -->
        <p class="text-center mt-3">
            Not an admin? 
            <a href="login.php">Login as Employee</a>
        </p>

    </form>
</div>

<script>
function togglePassword() {
    let pass = document.getElementById("password");
    pass.type = (pass.type === "password") ? "text" : "password";
}
</script>

<?php
$con = mysqli_connect("localhost","root","","project");

if ($con && isset($_POST['login'])) {

    $uuname = $_POST['uname'];
    $upsw = $_POST['psw'];

    $query = "SELECT * FROM admin WHERE uname='$uuname'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {

        if ($upsw == $row['password']) {
            session_start();
            $_SESSION['admin'] = $uuname;

            header("Location: admin_Home.php");
            exit();
        } else {
            echo "<script>alert('Incorrect Password!!!');</script>";
        }

    } else {    
        echo "<script>alert('Incorrect Username!!!');</script>";
    }
}
?>

</body>
</html>