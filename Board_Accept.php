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
    <h1>Write</h1>
    <hr>
    <?php
     
                echo "<form action = 'Board.php' method = 'POST'>";

                $link = mysql_connect("localhost", "chungmj1767", "mschungmj1767M") or die("DB Connection Failed!");
                mysql_select_db("chungmj1767", $link);

                date_default_timezone_set('Asia/Seoul');
                $date = Date("Y/n/j, H:i:s D");
                $ip = $_SERVER["REMOTE_ADDR"];

                $query = "select id from board order by id asc";
                $res = mysql_query($query, $link);

                while($row = mysql_fetch_row($res)) {
                    $id = $row[0];
                }

                $id = $id + 1;
            
                $writer = $_POST['writer'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $password = $_POST['password'];
                $file = $_POST['userfile'];
    
                if(isset($_POST['lock'])) {
                    $isLock = '1';
                } else {
                    $isLock = '0';
                }
            
                if(($writer != '') && ($title != '') && ($content != '') && ($password != '') && ($isLock == '1')) {
                $query = "insert into board(id, writer, password, title, content, ip, date, search, file) values('$id', '$writer', '$password', '$title', '$content', '$ip', '$date', '0', '$file') on duplicate key update id = id + 1;";
                $res = mysql_query($query, $link) or die("Insert Fail!");
                
                $query = "insert into checkLock(id, password) values('$id', '$password');";
                $res = mysql_query($query, $link) or die("Insert Check Fail!");
                    
            } else (($writer != '') && ($title != '') && ($content != '') && ($password != '') && ($isLock == '0')) {
                $query = "insert into board(id, writer, password, title, content, ip, date, search, file) values('$id', '$writer', '$password', '$title', '$content', '$ip', '$date', '0', '$file') on duplicate key update id = id + 1;";
                $res = mysql_query($query, $link) or die("Insert Fail!");
            }
    
                echo "<b>글의 작성이 완료되었습니다.</b><br><br>";
                echo "<p align = center><a href = 'Board.php'><button>확인</button></a></p>";
    
                echo "</form>";
        ?>
</body>

</html>