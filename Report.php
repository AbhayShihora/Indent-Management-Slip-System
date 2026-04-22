<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Analytics Dashboard</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

/* CONTAINER */
.container{
    width:90%;
    margin:30px auto;
}

/* CARDS */
.cards{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    gap:20px;
    margin-bottom:30px;
}

.card{
    padding:20px;
    border-radius:12px;
    color:white;
}

.card h2{
    font-size:28px;
}

.card p{
    font-size:14px;
}

.total{ background:#6c757d; }
.accept{ background:#198754; }
.reject{ background:#dc3545; }
.pending{ background:#ffc107; color:black; }

/* CHART */
.chart-box {
    max-width: 400px;   /* reduce width */
    margin: 0 auto;     /* center */
}

canvas {
    width: 100% !important;
    height: 300px !important;  /* reduce height */
}
/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#343a40;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f5ff;
}
</style>
</head>

<body>

<div class="header">📊 Indent Analytics Dashboard</div>

<div class="container">

<?php
$con=mysqli_connect('localhost','root','','project');

/* COUNTS */
$total = mysqli_num_rows(mysqli_query($con,"SELECT * FROM item1"));
$accept = mysqli_num_rows(mysqli_query($con,"SELECT * FROM item1 WHERE status='Accept'"));
$reject = mysqli_num_rows(mysqli_query($con,"SELECT * FROM item1 WHERE status='Not Accept'"));
$pending = mysqli_num_rows(mysqli_query($con,"SELECT * FROM item1 WHERE status='Pending'"));
?>

<!-- CARDS -->
<div class="cards">
    <div class="card total">
        <h2><?php echo $total; ?></h2>
        <p>Total Requests</p>
    </div>

    <div class="card accept">
        <h2><?php echo $accept; ?></h2>
        <p>Accepted</p>
    </div>

    <div class="card reject">
        <h2><?php echo $reject; ?></h2>
        <p>Rejected</p>
    </div>

    <div class="card pending">
        <h2><?php echo $pending; ?></h2>
        <p>Pending</p>
    </div>
</div>

<!-- CHART -->
<div class="chart-box">
    <canvas id="myChart"></canvas>
</div>

<!-- TABLE -->
<table>
<tr>
    <th>Emp No</th>
    <th>Name</th>
    <th>Item</th>
    <th>Status</th>
</tr>

<?php
$result=mysqli_query($con,"SELECT * FROM item1 ORDER BY id DESC LIMIT 5");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['empno']; ?></td>
    <td><?php echo $row['ename']; ?></td>
    <td><?php echo $row['iname']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>

</table>

</div>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Accepted', 'Rejected', 'Pending'],
        datasets: [{
            data: [<?php echo $accept; ?>, <?php echo $reject; ?>, <?php echo $pending; ?>],
            backgroundColor: ['#198754', '#dc3545', '#ffc107']
        }]
    }
});
</script>

</body>
</html>
