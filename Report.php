<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indent Report</title>

    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .dmain{
            margin-left: 15%;
            margin-top:5%;
            font-size : 20px;
        }
        .header1 h1{
            background-color: #83041e; 
            height:55px; 
            width=100%; 
            padding-top:20px; 
            text-align: center;
            color:powderblue;
        }
        .sub{
            padding:10px;
            display: inline-block;
        }
        .sub tr{
            line-height: 3rem;
        }
        .sub td{
            width:40%;
            border-radius: 15px;
        }
        .sub p{
            text-align:left;
        }
        table{
            border: 2px solid #000;
            border-radius: 15px;
            box-shadow: 20px 15px 15px 10px lightgray;
        }
        .status p{
            background-color: yellow;
            color:black;
            text-align:center;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="header1">
        <H1><b><i>Indent Report</i></b></H1>
    </div>

    <?php
        $con=mysqli_connect('localhost','root','','project');
        $select="select * from item1 where status='Accept' order by id desc";
        $s_qry=mysqli_query($con,$select);
                
                if($s_qry)
                {
                    $rowcount=mysqli_num_rows($s_qry);
                    ?>
                    <div class="dmain">
                        
                        <?php
                        $qry1="select * from emp";
                        $select1=mysqli_query($con,$qry1);
                        while($row=mysqli_fetch_array($select1))
                        {
                                $empnoe=$row['empno'];
                                $moe=$row['mo'];
                        }
                            while($row=mysqli_fetch_array($s_qry))
                            {
                                    $empno=$row['empno'];
                                    $mo=$row['mo'];
                                    if($empnoe==$empno)
                                    {
                                        ?>
                                        <div class="sub">
                                            <table cellspacing=10px>
                                                <tr>
                                                    <td><p>Employee Number :
                                                        <?php $empno=$row['empno']; echo "$empno"; ?></p></td>
                                                    <td><p>Employee Name :
                                                        <?php $ename=$row['ename']; echo "$ename"; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p>Department Number : 
                                                        <?php $deptno=$row['deptno']; echo " $deptno"; ?></p></td>
                                                    <td><p>Department Name : 
                                                        <?php $dname=$row['dname']; echo "$dname"; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p>item1 Name :
                                                        <?php $iname=$row['iname']; echo "$iname"; ?></p></td>
                                                    <td><p>Rate :
                                                        <?php $rate=$row['rate']; echo "$rate"; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p>Quentity :
                                                        <?php $qnt=$row['quakntity']; echo "$qnt"; ?></p></td>
                                                    <td><p>Unit of Measurement :
                                                        <?php $uom=$row['uom']; echo "$uom"; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p>Purpose :
                                                        <?php $purpose=$row['purpose']; echo "$purpose"; ?></p></td>
                                                    <td><p>Purpose Supplier :
                                                        <?php $pursup=$row['pursupplier']; echo "$pursup"; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td colspan=2 align=center class="status"> <?php $status=$row['status'];
                                                        if($status=='Accept'){
                                                            ?><p>Status :<b><font color=green> <?php echo "$status"; ?> </font></b></p>
                                                        <?php }  if($status=='declain'){
                                                            ?><p>Status :<b><font color=Red> <?php echo "$status"; ?> </font></b></p>
                                                        <?php } if($status=='pending'){
                                                            ?><p>Status :<b> <?php echo "$status"; ?></b></p>
                                                        <?php } ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php
                                    }
                            }       
                            ?>           
                    </div>
                    <?php
                }
                else{
                    echo "Select Query Not Executed!!";
                }
    ?>
</body>
</html>