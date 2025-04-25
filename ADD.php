<!DOCTYPE html>
<html>
<body>
<center>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <h1>ADD NEW USER</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username: <input type="text" name="Uname" required><br><br>
        User Address: <input type="text" name="Uadd" required><br><br>
        User Phone: <input type="text" name="Uno" required><br><br>
        Password: <input type="password" name="Upassword" required><br><br>

        <input type="submit" value="ADD"><br>
    </form>

    <br><a href="Home.php">(Home)</a><br><br>

    <?php
    // إذا تم الضغط على زر الإرسال
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // جلب البيانات
        $uname = $_POST['Uname'];
        $uadd = $_POST['Uadd'];
        $uno = $_POST['Uno'];
        $upass = $_POST['Upassword'];

        // الاتصال بقاعدة البيانات
        $Conn = new mysqli("localhost", "root", "", "users");

        // التحقق من الاتصال
        if ($Conn->connect_error) {
            die("فشل الاتصال: " . $Conn->connect_error);
        }

        // تنفيذ الاستعلام
        $sql = "INSERT INTO user (User_name, User_add, User_no, User_pass) VALUES ('$uname', '$uadd', '$uno', '$upass')";
        if ($Conn->query($sql) === TRUE) {
            echo "تمت إضافة المستخدم بنجاح!";
        } else {
            echo "خطأ أثناء الإضافة: " . $Conn->error;
        }

        $Conn->close();
    }
    ?>
</center>
</body>
</html>
