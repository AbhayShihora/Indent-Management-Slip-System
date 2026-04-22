<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Panel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6f9;
}

/* SIDEBAR */
.sidebar {
    width: 230px;
    height: 100vh;
    position: fixed;
    background: #fff;
    border-right: 1px solid #ddd;

    display: flex;
    flex-direction: column;
}

/* LOGO */
.logo {
    text-align: center;
    font-weight: bold;
    font-size: 20px;
    padding: 15px 0;
}

/* MENU */
.menu {
    flex: 1;
}

.menu a {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: #555;
    text-decoration: none;
    border-radius: 8px;
    margin: 5px 10px;
    transition: 0.3s;
}

.menu a:hover {
    background: #e9f2ff;
    color: #0d6efd;
}

.menu a.active {
    background: #0d6efd;
    color: white;
}

.menu i {
    margin-right: 10px;
}

/* 🔥 BOTTOM USER SECTION */
.sidebar-footer {
    padding: 15px;
    border-top: 1px solid #ddd;
    text-align: center;
    background: #f8f9fa;
}

.logout-btn {
    display: inline-block;
    margin-top: 8px;
    padding: 6px 12px;
    background: #dc3545;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
}

.logout-btn:hover {
    background: #bb2d3b;
}

/* CONTENT */
.content {
    margin-left: 230px;
    padding: 20px;
}
</style>
</head>

<body>

<?php
session_start();
$con = mysqli_connect("localhost","root","","project");

$empno = $_SESSION['empno'];  // correct session value

$query = "SELECT ename FROM emp WHERE empno='$empno'";
$result = mysqli_query($con, $query);

if($row = mysqli_fetch_assoc($result)) {
    $username = $row['ename'];   // ✅ actual name
} else {
    $username = "User";
}
?>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">🏠 XYZ</div>

    <div class="menu">
        <a href="#" class="active">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="Item.php"  target="item">
            <i class="fas fa-plus-circle"></i> Create Indent
        </a>

        <a href="Status1.php"  target="item">
            <i class="fas fa-info-circle"></i> Indent Status
        </a>

        <a href="Report.php"  target="item">
            <i class="fas fa-chart-bar"></i> Report
        </a>
    </div>

    <!-- 🔥 USER + LOGOUT AT BOTTOM -->
    <div class="sidebar-footer">
        <div>👤 <strong><?php echo $username; ?></strong></div>
        <a href="login.php" class="logout-btn">Logout</a>
    </div>

</div>

<!-- CONTENT -->
<div class="content">
    <h2>Welcome 👋</h2>
    <p>Select an option from sidebar</p>
</div>

</body>
</html>