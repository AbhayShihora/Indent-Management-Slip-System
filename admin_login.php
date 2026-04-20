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
    #rbtn{
        margin-left:20px;
    }
    .hoverbtn{
        zoom:170%;
        color:green;
        font:20px; 
    }
</style>
</head>
<body align=center>
    <p>
        <h1><font color=powderblue>Admin Login</font></h1>
    </p>
    <div class="container">
    <form method="POST" name="form">
    <br><div id="empno">
            <input type="text" name="uname" placeholder="User Name" required=required class="hover">
        </div><br>
        <div>
            <input type="password" name="psw" placeholder="Password" class="hover">
        </div><br>
        <div>
            <input type="Submit" name="login" value="Login" class="hoverbtn">
            <input type=reset name=reset value=Reset id=rbtn class="hoverbtn">
        </div><br>
    </form>
    </div>


<?php
    $con=mysqli_connect("localhost","root","","project");
    
    if($con)
    {
        if(isset($_POST['login']))
        {
            $uuname=$_POST['uname'];
            $upsw=$_POST['psw'];

            $select="select * from admin";
            $s_qry=mysqli_query($con,$select);
                    
                    if($s_qry)
                    {
                        $cntno=0; 
                        while($row=mysqli_fetch_array($s_qry))
                        {
                            $uname=$row['uname'];
                            $psw=$row['password'];
                            if($uuname==$uname)
                            {
                                $cntno=1;
                                if($upsw==$psw)
                                {                   
                                    ?>
                                        <script>
                                            alert("Login Successfully Completed 👍")
                                        </script>
                                    <?php
                                    header('location:admin_Home.php');
                                } 
                            }     
                        }
                        if($cntno==0)
                        {
                            ?>
                            <script>
                                alert("Incorrect Username!!!");
                            </script>
                            <?php
                        }
                        if($cntno==1)
                        {
                            ?>
                            <script>
                                alert("Incorrect Password!!!");
                            </script>
                            <?php
                        }
                    }
                    else{
                        echo "Select Query is Not Execute!!!!";
                    }
        }
      
    }
    
?>
</body>
</html>