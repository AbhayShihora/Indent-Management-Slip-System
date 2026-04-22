<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Indent</title>

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

/* CARD */
.container{
    max-width:600px;
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
}

.input-group input,
.input-group select{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

/* BUTTON */
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

.btn-update{ background:#0d6efd; }
.btn-reset{ background:#6c757d; }

.btn:hover{ opacity:0.85; }

</style>
</head>

<body>

<div class="header1">
    <h1>Update Indent</h1>
</div>

<div class="container">

<?php
$con=mysqli_connect('localhost','root','','project');
$id = $_GET['selectid'];

/* GET SINGLE RECORD */
$result=mysqli_query($con,"SELECT * FROM item1 WHERE id=$id");
$row=mysqli_fetch_assoc($result);
?>

<div class="card">
<form method="POST">

<div class="input-group">
    <label>Employee No</label>
    <input type="number" value="<?php echo $row['empno']; ?>" disabled>
</div>

<div class="input-group">
    <label>Department</label>
    <input type="text" value="<?php echo $row['dname']; ?>" disabled>
</div>

<div class="input-group">
    <label>Item Name</label>
    <input type="text" name="iname" value="<?php echo $row['iname']; ?>" required>
</div>

<div class="input-group">
    <label>Quantity</label>
    <input type="number" name="qnt" value="<?php echo $row['quentity']; ?>" required>
</div>

<div class="input-group">
    <label>UOM</label>
    <select name="uom">
        <option <?php if($row['uom']=="Unit") echo "selected"; ?>>Unit</option>
        <option <?php if($row['uom']=="Dozen") echo "selected"; ?>>Dozen</option>
        <option <?php if($row['uom']=="Kg") echo "selected"; ?>>Kg</option>
        <option <?php if($row['uom']=="Liter") echo "selected"; ?>>Liter</option>
    </select>
</div>

<div class="input-group">
    <label>Rate</label>
    <input type="number" name="rate" value="<?php echo $row['rate']; ?>" required>
</div>

<div class="input-group">
    <label>Required Date</label>
    <input type="date" name="rdt" value="<?php echo $row['rdate']; ?>" required>
</div>

<div class="input-group">
    <label>Supplier</label>
    <input type="text" name="pursup" value="<?php echo $row['pursupplier']; ?>">
</div>

<div class="input-group">
    <label>Purpose</label>
    <input type="text" name="pur" value="<?php echo $row['purpose']; ?>">
</div>

<div class="btn-group">
    <button type="submit" name="Submit" class="btn btn-update">Update</button>
    <button type="reset" class="btn btn-reset">Reset</button>
</div>

</form>
</div>

</div>

<?php
if(isset($_POST['Submit']))
{
    $iname=$_POST['iname'];
    $qnt=$_POST['qnt'];
    $uom=$_POST['uom'];
    $rate=$_POST['rate'];
    $rdt=$_POST['rdt'];
    $pursup=$_POST['pursup'];
    $pur=$_POST['pur'];

    /* SIMPLE VALIDATION */
    if(preg_match("/^[A-Za-z ]+$/",$iname))
    {
        $sql="UPDATE item1 SET 
        iname='$iname',
        quentity='$qnt',
        uom='$uom',
        rate='$rate',
        rdate='$rdt',
        pursupplier='$pursup',
        purpose='$pur'
        WHERE id=$id";

        if(mysqli_query($con,$sql)){
            header("Location: Status1.php");
        } else {
            echo "Update Failed";
        }
    }
    else{
        echo "<script>alert('Only alphabets allowed in item name');</script>";
    }
}
?>

</body>
</html>
