<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>

<style>
 
    #empno{
        margin-top:2%;
        color:yellow;
    }
    .hover{
        zoom:170%;
        size: 15px;
        border: 2px double rgb(63, 175, 158);
        border-radius: 2px;
        font-family:'Courier New', Courier, monospace;
    }
    /* .hover:hover{
        border-radius: 5px;
        border: 4px double ;
        zoom:180%;
        color: rgb(190, 168, 86);
    } */
    #deno{
        border: none;
        width:4.5%;
        font-size: 0.78rem;
        font-family:'Courier New', Courier, monospace;
    }
    #dno{
        background-color: white ;
        zoom:160%;
        font-size:0.95rem;
    }
    /* #dno:hover{
        zoom:174%;
        border: 4px double;
        border-radius: 5px;
        color:rgb(190, 168, 86);
        font-family:'Courier New', Courier, monospace;
    }   */
    #rbtn{
        margin-left:20px;
    }
    .hoverbtn{
        zoom:170%;
        color:green;
        font:20px; 
    }
    /* .hoverbtn:hover{
        zoom:200%;
        background-color:green;
        color:yellow;
        font:20px;
        border:2px solid;
        border-radius: 5px;
    } */
</style>
</head>
<body align=center>
    <p>
        <h1>Employee Sign up Form</h1>
    </p>
    <div class="container">
    <form method="POST" name="form">
    <br><div id="empno">
            <input type="Number" name="empno" placeholder="Employee Number" required=required class="hover">
        </div><br>
        <div>
            <input type="Text" name="ename" placeholder="Employee Name" class="hover">
        </div><br>
        <div>
            <input type="Number" name="mno" placeholder="Mobile Number" class="hover">
        </div><br>
        <div>
            <input type="Text" name="email" placeholder="Employee E-mail" class="hover">
        </div><br>
        <div>
            <span id="dno" class="hover">Department No:
            <select name="deptno" id=deno>
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
            </select></span>
        </div><br>
        <div>
            <input type="password" name="psw" placeholder="Password" class="hover">
        </div><br>
        <div>
            <input type="Submit" name="Signup" value="Sign up" class="hoverbtn">
            <input type=reset name=reset value=Reset id=rbtn class="hoverbtn">
        </div><br>
    </form>
    </div>


<?php
    $con=mysqli_connect("localhost","root","","project");
    
    if($con)
    {
        if(isset($_POST['Signup']))
        {
            $empno=$_POST['empno'];
            $ename=$_POST['ename'];
            $mo=$_POST['mno'];
            $email=$_POST['email'];
            $deptno=$_POST['deptno'];
            $psw=$_POST['psw'];

                if(strlen($mo)==10)
                {
                    if(strlen($empno)==4)
                    {
                        $cnt=0;$cnts=0;
                        $u=strtoupper($ename);
                        $n1=strlen($ename);

                        for($i=0;$i<=$n1;$i++)
                        {
                            $b=substr($u,$i,1);
                            if($b>='A' && $b<='Z')
                                $cnt++;
                            if($b==" ")
                                $cnts++;
                        }
                        if(($u!="") && ($n1==$cnt+$cnts))
                        {
                            $cnta=0;
                            $cntd=0;
                            for($i=0;$i<strlen($email);$i++)
                            {
                                $b=substr($email,$i,1);
                                if($b==".")
                                    $cntd++;
                                if($b=="@")
                                    $cnta++;
                            }
                        
                            if ($cnta==1 && $cntd==1) 
                            {
                                if(strlen($psw)>=8 && strlen($psw)<=16)
                                {                   
                                    //$_SESSION['signup'] =true;
                                    //$_SESSION['empno']=$empno;
                                    $insert="insert into emp (empno,ename,mo,email,deptno,psw) values('$empno','$ename','$mo','$email','$deptno','$psw')";
                                    $resi=mysqli_query($con,$insert);
                                    ?>
                                        <script>
                                            alert("Registration Successfully Completed 👍")
                                        </script>
                                    <?php
                                    header('location:Home.php');
                                } 
                                else 
                                {
                                    ?>
                                    <script>
                                        alert("Password length is Not Between 1 to 16");
                                    </script>
                                    <?php
                                }                            
                            }
                            else 
                            {
                                ?>
                                <script>
                                    alert("NOT a valid email address ==> Also Contain . OR @");
                                </script>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <script>
                                alert("incorrect Employe name ==>  Only Allow Alphabat");
                            </script>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <script>
                            alert("Employee Number is Invalid ==> Only Allow 4 Digit Number!!");
                        </script>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <script>
                        alert("Mobile Number is Invalid ==> Only Allow 10 Digit Number!!");
                    </script>               
                    <?php
                }
        }
      
    }
    
?>
</body>
</html>