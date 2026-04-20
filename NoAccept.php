<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Indent Status</title>
    <style>*{
            padding: 0;
            margin: 0;
        }
        body{
            background-color: papayawhip;
            min-height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center;
            color: #ffffff;
        }
         .heading{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .heading a{
            text-decoration: none;
            color: green;
        }
        .heading a:hover{
            color: blue;
        }
        .hade h1{
            font-size: 3em;
            letter-spacing: 5px;
            font-weight: bold;
            color: papayawhip;
            align-items: center;
            text-align: center;
            -webkit-box-reflect: below 1px linear-gradient(transparent,#0004);
            animation: animate 5s linear infinite;
            line-height: 0.7em;
        }
        .th{
            margin-top:1rem;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-bottom: 1rem;
            background-color: #191c24;
            height: auto;
            font-size:1.5rem;
            width:60%;
            margin-left:20%;
        }
        .th div{
            width: 170px;
            height: auto;
        }
        .contain{
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-bottom: 1rem;
            background-color: lightgray;
            color: #000;
            width:60%;
            height:auto;
            transition: ease .5s;
            margin-left:20%;
        }
        .contain:hover{
            background-color: powderblue;
        }
        .contain div{
            width: 170px;
            height: auto;
            font-size: 1.5rem;
        }.header1 h1{
            background-color:  #83041e;/*powderblue;*/ 
            height:55px; 
            width=100%; 
            padding-top:20px; 
            text-align: center;
            color:red;
        }
        div button{
            font-size:1.3rem;
            margin-top:7px;
            border-radius:7px;
            border: radius 2px;
        }
        div button:hover{
            background-color:papayawhip;
            transition: ease .5s;
        }
        a{
            text-decoration: none;
        }
        .b1{
            border-radius:10px;
            border:none;
            padding:5px;
            margin-bottom:7px;
        }
        
    </style> 
</head>
<body><div class="header1">
        <H1><b><i>Not Accepted</i></b></H1>
    </div>
    <form action="Status1.php" method="POST">
    
    <div class="container">
                    <div class="th">
                        <div>Employee Number</div>
                        <div>Item Name</div>
                        <div>Required on Date</div>
                        <div>Your status</div>
                        <div>Action</div>
                    </div>
                
        <?php                                                                                          
            session_start();
            //$un=$_SESSION['mo'];
            $con=mysqli_connect('localhost','root','',"project");

            $select="select * from item1 where status='Not Accept' order by id desc"; 
            // where mo='$un'";
            $result = mysqli_query($con, $select);
            if ($result) {
                while ($row = mysqli_fetch_array($result)){
                    $id=$row['id'];
                    ?> 
                <div class="contain">
                        <div><?php echo $row['1']; ?></div>
                        <div><?php echo $row['6']; ?></div>
                        <div><?php echo $row['10']; ?></div>
                        <div><?php echo $row['13']; ?></div>
                        <div>
                            <form action="Status1.php" method="get">
                                <button class="b1" name="submit" type="submit"><a href="NoAccept_full.php? selectid=<?php echo $id;?>">see more</a></button>
                            </form>
                        </div>
                </div>
        
                            <?php
                }
            }
            
            ?>
    </div>
    </form>
</body>
</html>