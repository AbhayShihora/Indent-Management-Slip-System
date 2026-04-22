<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6f9;
}

/* CONTENT AREA */
.content {
    margin-left: 30px;
    padding: 20px;
}

/* HEADER */
.header1 h1 {
    background-color: #dc3545;
    padding: 15px;
    text-align: center;
    color: white;
    border-radius: 10px;
}

/* CARD */
.card-box {
    max-width: 800px;
    margin: 30px auto;
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

/* ROW FIX (IMPORTANT) */
.row {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
}

/* COLUMN FIX */
.col-md-6 {
    flex: 1;
}

/* LABEL + VALUE */
.label {
    font-weight: 600;
    color: #555;
    margin-bottom: 3px;
}

.value {
    color: #222;
    background: #f8f9fa;
    padding: 8px 10px;
    border-radius: 6px;
}

/* STATUS */
.status-badge {
    background: #dc3545;
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    display: inline-block;
}

/* BUTTON */
.btn-custom {
    border-radius: 20px;
    padding: 8px 20px;
}
.btn-group-custom {
    display: flex;
    justify-content: center;
    gap: 15px;   /* space between buttons */
    margin-top: 20px;
}

</style>

<div class="content">

<div class="header1">
    <h1>Not Accepted</h1>
</div>

<?php
$con=mysqli_connect('localhost','root','','project');
session_start();

$id = $_GET['selectid'];
$select="SELECT * FROM item1 WHERE id=$id"; 
$result = mysqli_query($con, $select);

if ($row = mysqli_fetch_assoc($result)) {
?>

<div class="card-box">

<div class="row mb-3">
    <div class="col-md-6">
        <div class="label">Employee No</div>
        <div class="value"><?php echo $row['empno']; ?></div>
    </div>
    <div class="col-md-6">
        <div class="label">Employee Name</div>
        <div class="value"><?php echo $row['ename']; ?></div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="label">Department No</div>
        <div class="value"><?php echo $row['deptno']; ?></div>
    </div>
    <div class="col-md-6">
        <div class="label">Department Name</div>
        <div class="value"><?php echo $row['dname']; ?></div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="label">Item</div>
        <div class="value"><?php echo $row['iname']; ?></div>
    </div>
    <div class="col-md-6">
        <div class="label">Rate</div>
        <div class="value">₹ <?php echo $row['rate']; ?></div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="label">Quantity</div>
        <div class="value"><?php echo $row['quentity']; ?></div>
    </div>
    <div class="col-md-6">
        <div class="label">UOM</div>
        <div class="value"><?php echo $row['uom']; ?></div>
    </div>
</div>

<div class="mb-3">
    <div class="label">Purpose</div>
    <div class="value"><?php echo $row['purpose']; ?></div>
</div>

<div class="text-center mt-4">
    <span class="status-badge">Not Accepted</span>
</div>

<div class="btn-group-custom">
    <a href="Accept_Code.php?selectid=<?php echo $id;?>">
        <button class="btn btn-success btn-custom">Accept</button>
    </a>

    <a href="Status1.php">
        <button class="btn btn-secondary btn-custom">Back</button>
    </a>
</div>

</div>

<?php } ?>

</div>
