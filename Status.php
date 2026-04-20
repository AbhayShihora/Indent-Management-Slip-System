<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Indent Status</title>
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
            padding-left:27%;
            padding-top:7%;
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
        .bu{
            width:90px;
            height:30px;
            margin-left:28%;
            border:0;
            border-radius: 8px;
            background-color:powderblue;
        }
        .bd{
            width:90px;
            height:30px;
            margin-left:8%;
            border:0;
            border-radius: 8px;
            background-color:powderblue;
        }
    </style>
</head>
<body>
        <div class=header1>
        <H1><b><i>View Your Status</i></b></H1>
        </div>

            <?php
            //$un=$_SESSION['mo'];
            $con=mysqli_connect('localhost','root','',"project");
            session_start();
            
            $id =$_GET['selectid'];
            $select="select * from item1 where id=$id"; 
            // where mo='$un'";
            $result = mysqli_query($con, $select);
            if ($result) {
                while ($row = mysqli_fetch_array($result)){
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
                                                        <td><p>Mobile Number :
                                                            <?php $purpose=$row['mo']; echo "$purpose"; ?></p></td>
                                                        <td><p>Rquire on Date  :
                                                            <?php $pursup=$row['rdate']; echo "$pursup"; ?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Item Name :
                                                            <?php $iname=$row['iname']; echo "$iname"; ?></p></td>
                                                        <td><p>Rate :
                                                            <?php $rate=$row['rate']; echo "$rate"; ?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Quentity :
                                                            <?php $qnt=$row['quantity']; echo "$qnt"; ?></p></td>
                                                        <td><p>Unit of Measurement :
                                                            <?php $uom=$row['uom']; echo "$uom"; ?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Purpose :
                                                            <?php $purpose=$row['purpose']; echo "$purpose"; ?></p></td>
                                                        <td><p>prefferd Supplier :
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
                                                    <tr>
                                                        <td colspan=2>
                                                            <a href="Upd_Item.php?selectid=<?php echo $id;?>"><button name="update" class=bu>Update</button></a>
                                                            <a href="Del.php?selectid=<?php echo $id;?>"><button name="delete" class=bd>Delete</button></a>
                                                        </td>
                                                    </tr>
                                                </table>       
                            </div>
                    <?php
                }
            }
            ?>
</body>
</html>