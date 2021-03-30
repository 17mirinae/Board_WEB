<!DOCTYPE html>
<head>
    <style>
        * {
            text-align: center;
        }
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <h1>Comment Edit</h1><hr>
    <?php $num = $_POST['postNum'];
     echo "<form action='Board_Read.php?num=$num' method = POST>"; ?>
    
    <?php
        $no = $_GET['no'];

        $link = mysql_connect("localhost", "chungmj1767", "mschungmj1767M") or die("DB Connection Failed!");
        mysql_select_db("chungmj1767", $link);
        
        $writer = $_POST['writer'];
        $content = $_POST['content'];
        $password = $_POST['password'];

        if(($writer != '') && ($content != '') && ($password != '')) {
            $query = "UPDATE Comment SET writer = '$writer', content = '$content', password = '$password' WHERE no = '$no'";
            $res = mysql_query($query, $link) or die("Update Failed");
        }
       
        echo "<b>댓글의 수정이 완료되었습니다.</b><br><br>";
        echo "<p align = center><a href = 'Board_Read.php?num=$num'><button>확인</button></a></p>";
        echo "</form>";
    ?>
</body>
</html>