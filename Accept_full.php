<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Indent Status</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f5f7fa;
        font-family: 'Segoe UI', sans-serif;
    }

    .header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .card-custom {
        max-width: 800px;
        margin: 40px auto;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 25px;
        background: white;
    }

    .label {
        font-weight: 600;
        color: #555;
    }

    .value {
        color: #222;
    }

    .status-badge {
        background: #28a745;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: bold;
    }

    .btn-custom {
        border-radius: 25px;
        padding: 8px 20px;
    }
</style>
</head>

<body>

<div class="header">Indent Request Status</div>

<?php
$con=mysqli_connect('localhost','root','','project');
session_start();

$id = $_GET['selectid'];
$select = "SELECT * FROM item1 WHERE id=$id";
$result = mysqli_query($con, $select);

if ($result) {
    while ($row = mysqli_fetch_array($result)){
?>

<div class="card card-custom">
    <div class="row mb-3">
        <div class="col-md-6">
            <span class="label">Employee No:</span>
            <div class="value"><?php echo $row['empno']; ?></div>
        </div>
        <div class="col-md-6">
            <span class="label">Employee Name:</span>
            <div class="value"><?php echo $row['ename']; ?></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <span class="label">Department No:</span>
            <div class="value"><?php echo $row['deptno']; ?></div>
        </div>
        <div class="col-md-6">
            <span class="label">Department Name:</span>
            <div class="value"><?php echo $row['dname']; ?></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <span class="label">Mobile:</span>
            <div class="value"><?php echo $row['mo']; ?></div>
        </div>
        <div class="col-md-6">
            <span class="label">Required Date:</span>
            <div class="value"><?php echo $row['rdate']; ?></div>
        </div>
    </div>

    <hr>

    <div class="row mb-3">
        <div class="col-md-6">
            <span class="label">Item Name:</span>
            <div class="value"><?php echo $row['iname']; ?></div>
        </div>
        <div class="col-md-6">
            <span class="label">Rate:</span>
            <div class="value">₹ <?php echo $row['rate']; ?></div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <span class="label">Quantity:</span>
            <div class="value"><?php echo $row['quentity']; ?></div>
        </div>
        <div class="col-md-6">
            <span class="label">UOM:</span>
            <div class="value"><?php echo $row['uom']; ?></div>
        </div>
    </div>

    <div class="mb-3">
        <span class="label">Purpose:</span>
        <div class="value"><?php echo $row['purpose']; ?></div>
    </div>

    <div class="mb-3">
        <span class="label">Preferred Supplier:</span>
        <div class="value"><?php echo $row['pursupplier']; ?></div>
    </div>

    <div class="text-center mt-4">
        <span class="status-badge">Accepted</span>
    </div>

    <div class="text-center mt-4">
        <a href="NotAccept_Code.php?selectid=<?php echo $id;?>">
            <button class="btn btn-danger btn-custom">Not Accept</button>
        </a>
    </div>
</div>

<?php
    }
}
?>

</body>
</html>
