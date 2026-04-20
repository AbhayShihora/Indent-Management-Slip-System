<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            
            /* color:white; */
            font-size:20px;
            width:100%;
            height:100%;
        }
        #comp{
            background-color: #83041e; /*powderblue*/
            height:55px; 
            padding-top: 20px;
            padding-left: 20px;   
        }
        #heading{
            padding-left:30px;
        }
        #logoa{
            padding-left:20px;
            padding-top: 5px;
            padding-right: 12px;
            width:15px;
            height:15px;
        }
        #pages{
            padding-top: 2%;
            height:30px;
        }
        a{
            color:#D3D3D3;
            text-decoration:none;
        }
        span{
            color:white;
            text-decoration:none;
        }
        #sub1{
            padding-top: 2%;
            height:30px;
            padding-left: 15%;
        }
        #sub1:hover{
            background-color: #000000;
            color:powderblue;
            text-decoration:none;
        }
        
    </style>
</head>
<body bgcolor=#ab1b1b> <!--#11112f-->
    <div class="container">
        <div id="comp">
            <span id=heading><a href="#"><font color=white>🏠 XYZ</font></a></span>
        </div><br>
        <div id=pages>
            <span><a href="#">📁 Indent</a> </span>
        </div>
        <div id=sub1>
            <a href="Pending.php" target=item>📂  Pending Indent</a>
        </div>
        <div id=sub1>
            <a href="Accept.php" target=item>📂 Accepted Indent</a>
        </div>
        <div id=sub1>
            <a href="NoAccept.php" target=item>📂 Not Accepted Indent</a>
        </div>
    </div>
</body>
</html>