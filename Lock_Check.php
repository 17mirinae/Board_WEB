<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('./Paris_Sky.jpg');
            background-size: 100%;
            background-repeat: no-repeat;
        }
        td {
            background-color: lightblue;
        }
        .tdInput {
            background-color: honeydew;
        }
        * {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 align = center>Locked</h1><hr>
<?php
    $num = $_GET['num'];
    $pwInput = $_POST['pw'];
    
    $link = mysql_connect("localhost", "chungmj1767", "mschungmj1767M") or die("DB Connection Failed");
    mysql_select_db('chungmj1767', $link);
    
    $query = "SELECT password FROM board WHERE id = '$num'";
    $res = mysql_query($query, $link);
    
    while($row = mysql_fetch_row($res)) {
        $lockPassword = $row[0];
    }
    
    if($lockPassword == $pwInput) {
        echo "<form action='Board_Read.php?num=$num' method=post align = center>";
        echo "<b>비밀번호가 확인되었습니다.</b><br><br>";
        echo "<a href='Board_Read.php?num=$num'><button>확인</button></a>";
        echo "</form>";
    } else {
        echo "<form action='Board.php' method=post align = center>";
        echo "<b>틀린 비밀번호입니다.</b><br><br>";
        echo "<a href='Board.php'><button>확인</button></a>";
        echo "</form>";
    }
?>
</body>
</html>