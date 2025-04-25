<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <center>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <h1>Home</h1>

        <?php
        // إنشاء الارتباط
        $Conn = new mysqli("localhost", "root", "", "users");

        // التحقق من الاتصال
        if ($Conn->connect_error) {
            die("فشل الاتصال: " . $Conn->connect_error);
        }

        // إنشاء الاستعلام
        $sql = "SELECT * FROM user";
        $Result = $Conn->query($sql);

        if ($Result->num_rows > 0) {
            echo "<table border='2'>";
            while ($row = $Result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['User_id']}</td>
                        <td>{$row['User_name']}</td>
                        <td>{$row['User_add']}</td>
                        <td>{$row['User_no']}</td>
                        <td>{$row['User_pass']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Sorry, There Is No Data.";
        }

        $Conn->close();

        echo "<br><br>
        <a href='ADD.php'>(ADD NEW)</a> &nbsp;&nbsp;
        <a href='DEL.php'>(DELETE)</a> &nbsp;&nbsp;
        <a href='EDI.php'>(UPDATE)</a> &nbsp;&nbsp;
        <a href='SEA.php'>(Search)</a>";
        ?>
    </center>
</body>
</html>

