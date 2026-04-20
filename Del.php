<?php
   $con=mysqli_connect('localhost','root','',"project");
   session_start();
   $_SESSION['submit'] =false;

   $id =$_GET['selectid'];
   echo "$id";
   $sql="delete from item1 where id = $id";
   $result=mysqli_query($con,$sql);

   if($result)
   {
        $_SESSION['submit'] =true;
        //$_SESSION['id']=$row['id'];
        echo "Sucessfully deleted";
        header("location:Status1.php");
   }
?>