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
<h1 align = center>Comment Accept</h1><hr>
<?php
    $num = $_POST['boardNo'];
    echo "<form action=\"Board_Read.php?num=$num\" method=\"POST\">";
    $link = mysql_connect("localhost", "chungmj1767", "mschungmj1767M") or die ("DB Connection Failed");
    mysql_select_db("chungmj1767", $link) or die("DB Selection Failed");

    date_default_timezone_set('Asia/Seoul');
    $date = Date("Y/n/j, H:i:s D");

    $content = $_POST['content'];
    $writer = $_POST['writer'];
    $password = $_POST['password'];

    $query = "select no from Comment";
    $res = mysql_query($query, $link);
    while($row = mysql_fetch_array($res)) {
        $CommentNo = $row[0];
    }
    $CommentNo += 1;

    if(($writer != '') && ($content != '') && ($password != '')) {
        $query = "INSERT INTO Comment(no, id, writer, password, content, date) VALUES('$CommentNo', '$num', '$writer', '$password', '$content', '$date');";
        $res = mysql_query($query, $link) or die("Insert Failed");
    }
    echo "<p><b>댓글이 작성되었습니다.</b></p><br>";
    echo "<a href='Board_Read.php?num=$num'><button>확인</button></a>";
    echo "</form>";
?>

</body>
</html>