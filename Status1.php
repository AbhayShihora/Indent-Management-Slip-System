<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Status</title>

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

/* HEADER (light yellow theme) */
.header1 h1{
    background:#fff3cd;
    color:#856404;
    padding:15px;
    text-align:center;
    border-radius:8px;
    border:1px solid #ffeeba;
}

/* TABLE HEADER */
.th{
    display:flex;
    width:80%;
    margin:20px auto 10px;
    padding:12px;
    background:#343a40;
    color:white;
    border-radius:8px;
    font-weight:bold;
}

/* DATA ROW */
.contain{
    display:flex;
    width:80%;
    margin:10px auto;
    padding:12px;
    background:white;
    border-radius:8px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    transition:0.3s;
}

.contain:hover{
    background:#eef4ff;
}

/* COLUMNS */
.th div,
.contain div{
    flex:1;
    text-align:center;
}

/* BUTTON */
.b1{
    display:inline-block;
    background:#0d6efd;
    color:white;
    padding:6px 14px;
    border-radius:6px;
    text-decoration:none;
    transition:0.3s;
}

.b1:hover{
    background:#084298;
}
</style>
</head>

<body>

<div class="header1">
    <h1>View Your Status</h1>
</div>

<div class="container">

<!-- HEADER -->
<div class="th">
    <div>Employee No</div>
    <div>Item Name</div>
    <div>Required Date</div>
    <div>Status</div>
    <div>Action</div>
</div>

<?php
session_start();
$con = mysqli_connect('localhost','root','','project');

$select = "SELECT * FROM item1 ORDER BY id DESC";
$result = mysqli_query($con, $select);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
?>

<!-- DATA ROW -->
<div class="contain">
    <div><?php echo $row['empno']; ?></div>
    <div><?php echo $row['iname']; ?></div>
    <div><?php echo $row['rdate']; ?></div>
    <div><?php echo $row['status']; ?></div>

    <div>
        <a href="Status.php?selectid=<?php echo $id;?>" class="b1">
            View
        </a>
    </div>
</div>

<?php
    }
}
?>

</div>

</body>
</html>