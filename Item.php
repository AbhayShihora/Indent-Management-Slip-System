<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Indent</title>

    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .header1 h1{
            background-color: #83041e; 
                    height:55px; 
                    width=100%; 
                    padding-top:20px; 
                    text-align: center;
                    color:powderblue;
        }
        .container{
            margin-left: 25%;
            font-size: 1.5rem;
            border: 3px solid #000;
            width: 40%;
            height:495px;
            padding: 30px 30px 30px 30px;
            margin-top: 4%;
            border-radius:15px;
            box-shadow: 20px 10px 10px 10px lightgray;
        }
        .set1{
            padding-top:13px;
        }
        .set2{
            padding-top:10px;
        }
        .set2 input,select{
            font-size: 1.5rem;
            padding-left: 10px;
        }
        #indent1{
            width:220px;
            display: inline-block;
        }
        #indent2{
            width:220px;
            display: inline-block;
        }
        #indentm{
            margin-left:3.6%;
            margin-top:20px;
        }
        h3{
            margin-left:9%;
            margin-bottom: 20px;
        }
        .hoverbtn{
            margin-left:20%;
            padding-right:10px;
            border-radius: 8px;
            box-shadow: 4px 3px 3px 3px lightgray;
        }
        /* .hoverbtn:hover{
            margin-left:69px;
            padding-right:2px;
            border-radius: 10px;
            box-shadow: 6px 5px 5px 5px #888888;
            zoom:108%;
        } */
    </style>
</head>
<body bgcolor=papayawhip>

<?php
    $con=mysqli_connect('localhost','root','','project');
    $select="select * from emp";
	$s_qry=mysqli_query($con,$select);
            
			if($s_qry)
			{
				while($row=mysqli_fetch_array($s_qry))
				{
                        $ename=$row['ename']; 
                        $empno=$row['empno'];
                        $deptno=$row['deptno']; 
                        $mo=$row['mo'];      
                        if($deptno==10)
                            $dname="Accounting";
                        else if($deptno==20)
                            $dname="Sales";
                        else if($deptno==30)
                            $dname="Marketing";
                        else if($deptno==40)
                            $dname="Research";
				}
			}
?>
    <div class="header1">
        <H1><b><i>Create Indent</i></b></H1>
    </div>

    

    <div class="container">
    <h3>User : <?php echo $ename; ?></h3>
    <form method="post" name="form">
      <div id=indent1>
        <div class=set1>
            Employe No: 
        </div>
        <div class=set1>
            Department No: 
        </div>
        <div class=set1>
            Department Name: 
        </div>
        <div class=set1>
            Item Name: 
        </div>
        <div class=set1>
            Item Quentity: 
        </div>
        <div class=set1>
             U.O.M: 
        </div>
        <div class=set1>
            Approx Rate: 
        </div>
        <div class=set1>
            R.O.Date: 
        </div>
        <div class=set1>
            Preffered Supplier: 
        </div>
        <div class=set1>
             Purpose: 
        </div>
      </div>

      <div id=indent2>
        <div class=set2>
            <input type="Number" name="empno" value='<?php echo $empno;?>' disabled="disabled" class="hover">
        </div>
        <div class=set2>
            <input type="Number" name="deptno" value='<?php echo $deptno;?>' disabled="disabled" class="hover">
        </div>
        <div class=set2>
            <input type="text" name="dname" value='<?php echo $dname;?>' disabled="disabled" class="hover">
        </div>
        <div class=set2>
            <input type="Text" name="iname" placeholder="Item Name" required class="hover">
        </div>
        <div class=set2>
            <input type="Number" name="qnt"  required placeholder="Enter Quentity" required class="hover">
        </div>
        <div class=set2>
            <select name="uom">
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
        <div class=set2>
            <input type="number" name="rate" placeholder="Approximate Rate" required class="hover"> 
        </div>
        <div class=set2>
            <input type="date" name="rdt" placeholder="Required on Date"  required id=jdt class="hover">
        </div class=set2>
        <div class=set2>
            <input type="Text" name="pursup" placeholder="Preffered Supplier" class="hover">
        </div>
        <div class=set2>
            <input type="Text" name="pur" placeholder="Purpose" class="hover">
        </div>
      </div>
      <div id=indentm class="set2">
            <input type="Submit" name="Submit" value="Submit" class="hoverbtn">
            <input type=reset name=reset value=Reset id=rbtn class="hoverbtn">
        </div>
    </form>
    </div>

    <?php
    if(isset($_POST['Submit']))
    {
        $empno;
        $deptno;
        $iname=$_POST['iname'];
        $qnt=$_POST['qnt'];
        $uom=$_POST['uom'];
        $rate=$_POST['rate'];
        $rdt=$_POST['rdt'];
        $pursup=$_POST['pursup'];
        $pur=$_POST['pur'];
        $status="pending";

        $con=mysqli_connect("localhost","root","","project");
        if($con)
        {
            $cnt=0;$cnts=0;
            $u=strtoupper($iname);
            $n1=strlen($iname);

            for($i=0;$i<=$n1;$i++)
            {
                $b=substr($u,$i,1);
                if($b>='A' && $b<='Z')
                    $cnt++;
                if($b==" ")
                    $cnts=1;
            }
            if(($u!="") && ($n1==$cnt+$cnts))
            {
                $insert="insert into item1 (empno,ename,deptno,dname,mo,iname,quantity,uom,rate,rdate,pursupplier,purpose,status)values('$empno','$ename','$deptno','$dname','$mo','$iname','$qnt','$uom','$rate','$rdt','$pursup','$pur','$status')";
                $resi=mysqli_query($con,$insert);

                header('location:Status1.php');
            }
            else
            {
                ?>
                <script>
                    alert("incorrect Item name ==>  Only Allow Alphabat");
                </script>
                <?php
            }        
        }
    }
?>
</body>
</html>