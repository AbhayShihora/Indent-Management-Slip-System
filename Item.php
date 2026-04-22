<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Indent</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
    }

    .header {
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 26px;
        font-weight: bold;
    }

    .card-form {
        max-width: 900px;
        margin: 40px auto;
        padding: 30px;
        border-radius: 15px;
        background: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .btn-custom {
        border-radius: 25px;
        padding: 8px 25px;
    }
</style>
</head>

<body>

<div class="header">Create Indent</div>

<?php
$con=mysqli_connect('localhost','root','','project');
$select="SELECT * FROM emp";
$s_qry=mysqli_query($con,$select);

while($row=mysqli_fetch_assoc($s_qry)){
    $ename=$row['ename']; 
    $empno=$row['empno'];
    $deptno=$row['deptno']; 
    $mo=$row['mo'];      

    if($deptno==10) $dname="Accounting";
    else if($deptno==20) $dname="Sales";
    else if($deptno==30) $dname="Marketing";
    else if($deptno==40) $dname="Research";
}
?>

<div class="card-form">
<h5 class="mb-4">User: <b><?php echo $ename; ?></b></h5>

<form method="post">

<div class="row g-3">

<div class="col-md-4">
<label class="form-label">Employee No</label>
<input type="number" class="form-control" value="<?php echo $empno;?>" disabled>
</div>

<div class="col-md-4">
<label class="form-label">Department No</label>
<input type="number" class="form-control" value="<?php echo $deptno;?>" disabled>
</div>

<div class="col-md-4">
<label class="form-label">Department Name</label>
<input type="text" class="form-control" value="<?php echo $dname;?>" disabled>
</div>

<div class="col-md-6">
<label class="form-label">Item Name</label>
<input type="text" name="iname" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Quantity</label>
<input type="number" name="qnt" class="form-control" required>
</div>

<div class="col-md-4">
<label class="form-label">UOM</label>
<select name="uom" class="form-select">
    <option>Unit</option>
    <option>Dozen</option>
    <option>Gm</option>
    <option>Kg</option>
    <option>ml</option>
    <option>Liter</option>
    <option>Feet</option>
    <option>Miter</option>
</select>
</div>

<div class="col-md-4">
<label class="form-label">Rate</label>
<input type="number" name="rate" class="form-control" required>
</div>

<div class="col-md-4">
<label class="form-label">Required Date</label>
<input type="date" name="rdt" class="form-control" required>
</div>

<div class="col-md-6">
<label class="form-label">Preferred Supplier</label>
<input type="text" name="pursup" class="form-control">
</div>

<div class="col-md-6">
<label class="form-label">Purpose</label>
<input type="text" name="pur" class="form-control">
</div>

</div>

<div class="text-center mt-4">
<button type="submit" name="Submit" class="btn btn-success btn-custom">Submit</button>
<button type="reset" class="btn btn-outline-secondary btn-custom">Reset</button>
</div>

</form>
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
    $status="pending";

    $u=strtoupper($iname);
    if(preg_match("/^[A-Z ]+$/",$u))
    {
        $insert="INSERT INTO item1 (empno,ename,deptno,dname,mo,iname,que   ntity,uom,rate,rdate,pursupplier,purpose,status)
        VALUES('$empno','$ename','$deptno','$dname','$mo','$iname','$qnt','$uom','$rate','$rdt','$pursup','$pur','$status')";
        
        mysqli_query($con,$insert);
        header('Location: Status1.php');
    }
    else
    {
        echo "<script>alert('Only alphabets allowed in Item Name');</script>";
    }
}
?>

</body>
</html>
