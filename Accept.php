<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accepted Requests</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
    }

    .header {
        background: linear-gradient(135deg, #28a745, #218838);
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 28px;
        font-weight: bold;
    }

    .container-box {
        margin-top: 40px;
    }

    .table {
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        background: #343a40;
        color: white;
        text-align: center;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: bold;
        background: #28a745;
        color: white;
    }

    .btn-view {
        border-radius: 20px;
    }
</style>
</head>

<body>

<div class="header">Accepted Indent Requests</div>

<div class="container container-box">

<table class="table table-hover shadow">
    <thead>
        <tr>
            <th>Employee No</th>
            <th>Item Name</th>
            <th>Required Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

<?php
session_start();
$con = mysqli_connect('localhost','root','','project');

$select = "SELECT * FROM item1 WHERE status='Accept' ORDER BY id DESC";
$result = mysqli_query($con, $select);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
?>

<tr>
    <td><?php echo $row['empno']; ?></td>
    <td><?php echo $row['iname']; ?></td>
    <td><?php echo $row['rdate']; ?></td>
    <td><span class="status-badge">Accepted</span></td>
    <td>
        <a href="Accept_full.php?selectid=<?php echo $id; ?>" 
           class="btn btn-primary btn-sm btn-view">
           View
        </a>
    </td>
</tr>

<?php
    }
}
?>

    </tbody>
</table>

</div>

</body>
</html>
