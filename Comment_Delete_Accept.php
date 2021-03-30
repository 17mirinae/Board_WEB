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
    <h1 align = center>Comment Delete</h1>
    <hr>
<?php
    $num = $_GET['num'];

    $de = $_POST['de'];
    $pw = $_POST['pw'];

    $link=mysql_connect("localhost","chungmj1767","mschungmj1767M") or die("Read DB Fail!");
    mysql_select_db("chungmj1767",$link);

    if(($de != '') && ($pw != '')) {
        $query = "delete from Comment where id='$num' and writer='$de' and password='$pw'";
        $res = mysql_query($query,$link) or die ("Delete Comment Failed");
    }

    echo "<b>댓글 삭제가 완료되었습니다.<b><br><br>";

    echo "<p align = center><a href = 'Board_Read.php?num=$num'><button>확인</button></a></p>";
?>
</body>
</html>
