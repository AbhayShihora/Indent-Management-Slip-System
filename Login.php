<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', sans-serif;
}

.login-card {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 400px;
}

.login-title {
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
}

.btn-custom {
    background: #4facfe;
    color: white;
}

.btn-custom:hover {
    background: #00c6ff;
}

/* Admin Button Custom Style */
.btn-admin {
    background: linear-gradient(135deg, #343a40, #000);
    color: white;
    border-radius: 20px;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    transition: 0.3s;
}

.btn-admin:hover {
    opacity: 0.85;
}
</style>
</head>

<body>

<div class="login-card">
    <h2 class="login-title">Employee Login</h2>

    <form method="POST" onsubmit="return validateForm()">

        <!-- Employee No -->
        <div class="mb-3">
            <input type="number" name="empno" id="empno" class="form-control" placeholder="Employee Number" required>
        </div>

        <!-- Password + Show Toggle -->
        <div class="mb-3 input-group">
            <input type="password" name="psw" id="password" class="form-control" placeholder="Password" required>
            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁️</button>
        </div>

        <!-- Login -->
        <div class="d-grid mb-2">
            <button type="submit" name="login" class="btn btn-custom">Login</button>
        </div>

        <!-- Reset -->
        <div class="d-grid mb-2">
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </div>

        <!-- Register Button -->
        <div class="d-grid mb-2">
            <a href="Registration.php" class="btn btn-outline-primary">
                Create New Account
            </a>
        </div>

        <!-- Admin Login Button -->
        <div class="d-grid">
            <a href="admin_login.php" class="btn-admin">
                🔐 Admin Login
            </a>
        </div>

        <!-- Small text -->
        <p class="text-center mt-3">
            Don't have an account? 
            <a href="Registration.php">Register here</a>
        </p>

    </form>
</div>

<script>
function togglePassword() {
    let pass = document.getElementById("password");
    pass.type = (pass.type === "password") ? "text" : "password";
}

function validateForm() {
    let empno = document.getElementById("empno").value;
    let password = document.getElementById("password").value;

    if(empno.length < 3) {
        alert("Employee number must be valid");
        return false;
    }

    if(password.length < 4) {
        alert("Password too short");
        return false;
    }

    return true;
}
</script>

<?php
$con = mysqli_connect("localhost","root","","project");

if($con && isset($_POST['login']))
{
    $uempno = $_POST['empno'];
    $upsw = $_POST['psw'];

    $select = "SELECT * FROM emp WHERE empno='$uempno'";
    $result = mysqli_query($con, $select);

    if($row = mysqli_fetch_assoc($result))
    {
        if($upsw == $row['psw'])
        {
            session_start();
            $_SESSION['empno'] = $uempno;

            header('Location: Home.php');
            exit;
        }
        else
        {
            echo "<script>alert('Incorrect Password');</script>";
        }
    }
    else
    {
        echo "<script>alert('Employee Not Found');</script>";
    }
}
?>

</body>
</html>
