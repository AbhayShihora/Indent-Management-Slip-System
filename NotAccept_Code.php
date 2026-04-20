<?php
   $con=mysqli_connect('localhost','root','',"project");
   session_start();
   $_SESSION['submit'] =false;

   $id =$_GET['selectid'];
   echo "$id";
   $sql="Update item1 set status='Not Accept' where id = $id";
   $result=mysqli_query($con,$sql);

   if($result)
   {
        $_SESSION['submit'] =true;
        //$_SESSION['id']=$row['id'];
        echo "Sucessfully Updated";
        header("location:NoAccept.php");
   }
?>