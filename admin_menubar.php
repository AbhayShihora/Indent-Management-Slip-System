<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
}

/* SIDEBAR */
.sidebar {
    width: 100%;
    height: 100vh;
    position: fixed;
    background: linear-gradient(180deg, #1f1c2c, #928dab);
    color: white;

    display: flex;
    flex-direction: column;
}

/* HEADER */
.sidebar h3 {
    text-align: center;
    margin: 20px 0;
}

/* MENU */
.menu {
    flex: 1;
}

.menu-item {
    padding: 12px 20px;
    display: block;
    color: #ddd;
    text-decoration: none;
    transition: 0.3s;
}

.menu-item:hover {
    background: rgba(255,255,255,0.1);
    color: #fff;
    padding-left: 30px;
}

.menu-item i {
    margin-right: 10px;
}

/* 🔥 BOTTOM USER SECTION */
.sidebar-footer {
    padding: 15px;
    border-top: 1px solid rgba(255,255,255,0.2);
    text-align: center;
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
    margin-left: 100px; /* FIXED */
    padding: 20px;
}
</style>
</head>

<body>

<?php
session_start();
$admin = $_SESSION['admin'] ?? "Admin";
?>

<!-- SIDEBAR -->
<div class="sidebar">

    <h3>🏠 XYZ Admin</h3>

    <div class="menu">

        <a href="#" class="menu-item">
            <i class="fas fa-folder"></i> Indent
        </a>

        <a href="Pending.php" class="menu-item" target="item">
            <i class="fas fa-clock"></i> Pending Indent
        </a>

        <a href="Accept.php" class="menu-item" target="item">
            <i class="fas fa-check-circle"></i> Accepted Indent
        </a>

        <a href="NoAccept.php" class="menu-item" target="item">
            <i class="fas fa-times-circle"></i> Not Accepted
        </a>

    </div>

    <!-- 🔥 ADMIN NAME + LOGOUT -->
    <div class="sidebar-footer">
        <div>👤 <strong><?php echo $admin; ?></strong></div>
        <a href="admin_login.php" class="logout-btn">Logout</a>
    </div>

</div>

<!-- CONTENT -->
<div class="content">
    <h2>Welcome to Admin Dashboard</h2>
    <p>Select an option from sidebar</p>
</div>

</body>
</html>