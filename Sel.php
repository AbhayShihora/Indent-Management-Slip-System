<?php
   $con=mysqli_connect('localhost','root','',"project");
   session_start();
   $_SESSION['submit'] =false;

   $id =$_GET['selectid'];
   $sql="select * from item1 WHERE id=$id";
   $result=mysqli_query($con,$sql);

   if($result)
   {
        $_SESSION['submit'] =true;
        $_SESSION['id']=$row['id'];
        header("location:Status.php");
   }
?>