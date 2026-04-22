<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Signup</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f4f6f9;
    font-family:'Segoe UI', sans-serif;
}

/* HEADER */
.header{
    background:#0d6efd;
    color:white;
    padding:15px;
    text-align:center;
    font-size:22px;
}

/* FORM CARD */
.container{
    max-width:500px;
    margin:40px auto;
}

.card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
}

/* INPUT */
.input-group{
    margin-bottom:15px;
}

.input-group label{
    display:block;
    margin-bottom:5px;
    color:#555;
    font-weight:500;
}

.input-group input,
.input-group select{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

/* BUTTONS */
.btn-group{
    display:flex;
    gap:10px;
    margin-top:20px;
}

.btn{
    flex:1;
    padding:10px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    color:white;
}

.btn-submit{ background:#198754; }
.btn-reset{ background:#6c757d; }

.btn:hover{ opacity:0.85; }

/* EXTRA BUTTON */
.btn-login{
    display:block;
    text-align:center;
    margin-top:15px;
    padding:10px;
    border-radius:20px;
    border:1px solid #0d6efd;
    color:#0d6efd;
    text-decoration:none;
    transition:0.3s;
}

.btn-login:hover{
    background:#0d6efd;
    color:white;
}
</style>
</head>

<body>

<div class="header">Employee Signup</div>

<div class="container">
<div class="card">

<form method="POST">

<div class="input-group">
    <label>Employee Number</label>
    <input type="number" name="empno" required>
</div>

<div class="input-group">
    <label>Employee Name</label>
    <input type="text" name="ename" required>
</div>

<div class="input-group">
    <label>Mobile Number</label>
    <input type="number" name="mno" required>
</div>

<div class="input-group">
    <label>Email</label>
    <input type="email" name="email" required>
</div>

<div class="input-group">
    <label>Department</label>
    <select name="deptno">
        <option value="10">Accounting</option>
        <option value="20">Sales</option>
        <option value="30">Marketing</option>
        <option value="40">Research</option>
    </select>
</div>

<!-- Password + Show Toggle -->
<div class="input-group">
    <label>Password</label>
    <div style="display:flex;">
        <input type="password" name="psw" id="password" required style="flex:1;">
        <button type="button" onclick="togglePassword()" style="margin-left:5px;">👁️</button>
    </div>
</div>

<div class="btn-group">
    <button type="submit" name="Signup" class="btn btn-submit">Sign Up</button>
    <button type="reset" class="btn btn-reset">Reset</button>
</div>

<!-- LOGIN BUTTON -->
<a href="login.php" class="btn-login">
    Already have an account? Login
</a>

</form>

</div>
</div>

<script>
function togglePassword(){
    let p = document.getElementById("password");
    p.type = (p.type === "password") ? "text" : "password";
}
</script>

<?php
$con=mysqli_connect("localhost","root","","project");

if($con && isset($_POST['Signup']))
{
    $empno=$_POST['empno'];
    $ename=$_POST['ename'];
    $mo=$_POST['mno'];
    $email=$_POST['email'];
    $deptno=$_POST['deptno'];
    $psw=$_POST['psw'];

    if(strlen($mo)==10 && strlen($empno)==4)
    {
        if(preg_match("/^[A-Za-z ]+$/",$ename))
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(strlen($psw)>=8 && strlen($psw)<=16)
                {
                    $insert="INSERT INTO emp (empno,ename,mo,email,deptno,psw)
                             VALUES('$empno','$ename','$mo','$email','$deptno','$psw')";
                    mysqli_query($con,$insert);

                    echo "<script>alert('Registration Successful 👍');</script>";
                    header('Location: login.php');
                }
                else{
                    echo "<script>alert('Password must be 8-16 characters');</script>";
                }
            }
            else{
                echo "<script>alert('Invalid Email');</script>";
            }
        }
        else{
            echo "<script>alert('Name should contain only alphabets');</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Employee No or Mobile No');</script>";
    }
}
?>

</body>
</html>
