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
            background-color: #83041e;
            color:white;
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
            color:white;
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
            background-color: #83041e;
            color:white;
            text-decoration:none;
        }
        
    </style>
</head>
<body bgcolor=#ab1b1b>
    <div class="container">
        <div id="comp">
            <span id=heading><a href="#">🏠 XYZ</a></span>
        </div><br>
        <div id=pages>
            <span><a href="#">📁 Indent</a> </span>
        </div>
        <div id=sub1>
            <a href="Item.php" target=item>📂  Create Indent</a>
        </div>
        <div id=sub1>
            <a href="Status1.php" target=item>📂 Indent Status</a>
        </div>
        <div id=sub1>
            <a href="Report.php" target=item>📂 Indent Report</a>
        </div>
    </div>
</body>
</html>