<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Status Details</title>

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
.header1 h1{
    background:#fff3cd;
    color:#856404;
    padding:15px;
    text-align:center;
    border-radius:8px;
    border:1px solid #ffeeba;
}

/* CONTENT */
.content{
    max-width:900px;
    margin:30px auto;
}

/* CARD */
.card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
}

/* ROW */
.row{
    display:flex;
    gap:20px;
    margin-bottom:15px;
}

/* COLUMN */
.col{
    flex:1;
}

/* LABEL + VALUE */
.label{
    font-weight:600;
    color:#555;
    margin-bottom:4px;
}

.value{
    background:#f8f9fa;
    padding:8px;
    border-radius:6px;
}

/* STATUS */
.status{
    text-align:center;
    margin-top:20px;
}

.badge{
    padding:8px 15px;
    border-radius:20px;
    font-weight:bold;
}

.accept{ background:#198754; color:white; }
.reject{ background:#dc3545; color:white; }
.pending{ background:#ffc107; color:black; }

/* BUTTON GROUP */
.btn-group{
    display:flex;
    justify-content:center;
    gap:15px;
    margin-top:20px;
}

.btn{
    padding:8px 20px;
    border:none;
    border-radius:20px;
    text-decoration:none;
    color:white;
}

.btn-update{ background:#0d6efd; }
.btn-delete{ background:#dc3545; }

.btn:hover{
    opacity:0.85;
}
</style>
</head>

<body>

<div class="header1">
    <h1>View Your Status</h1>
</div>

<div class="content">

<?php
$con=mysqli_connect('localhost','root','','project');
session_start();

$id = $_GET['selectid'];
$select="SELECT * FROM item1 WHERE id=$id";
$result=mysqli_query($con,$select);

if($row=mysqli_fetch_assoc($result)){

$status = strtolower($row['status']);
$class = "pending";

if($status=="accept") $class="accept";
else if($status=="not accept") $class="reject";
?>

<div class="card">

<div class="row">
    <div class="col">
        <div class="label">Employee No</div>
        <div class="value"><?php echo $row['empno']; ?></div>
    </div>
    <div class="col">
        <div class="label">Employee Name</div>
        <div class="value"><?php echo $row['ename']; ?></div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="label">Department No</div>
        <div class="value"><?php echo $row['deptno']; ?></div>
    </div>
    <div class="col">
        <div class="label">Department Name</div>
        <div class="value"><?php echo $row['dname']; ?></div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="label">Item Name</div>
        <div class="value"><?php echo $row['iname']; ?></div>
    </div>
    <div class="col">
        <div class="label">Rate</div>
        <div class="value">₹ <?php echo $row['rate']; ?></div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="label">Quantity</div>
        <div class="value"><?php echo $row['quentity']; ?></div>
    </div>
    <div class="col">
        <div class="label">UOM</div>
        <div class="value"><?php echo $row['uom']; ?></div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="label">Required Date</div>
        <div class="value"><?php echo $row['rdate']; ?></div>
    </div>
    <div class="col">
        <div class="label">Supplier</div>
        <div class="value"><?php echo $row['pursupplier']; ?></div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="label">Purpose</div>
        <div class="value"><?php echo $row['purpose']; ?></div>
    </div>
</div>

<div class="status">
    <span class="badge <?php echo $class; ?>">
        <?php echo ucfirst($row['status']); ?>
    </span>
</div>

<div class="btn-group">
    <a href="Upd_Item.php?selectid=<?php echo $id;?>" class="btn btn-update">Update</a>
    <a href="Del.php?selectid=<?php echo $id;?>" class="btn btn-delete">Delete</a>
</div>

</div>

<?php } ?>

</div>

</body>
</html>