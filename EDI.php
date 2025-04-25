<!DOCTYPE html>
<html>
<body>
<center>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <h1>USER UPDATE</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username: <input type="text" name="Uname" required><br><br>
        NEW Password: <input type="password" name="Upassword" required><br><br>
        <input type="submit" value="UPDATE">
    </form>

    <br>
    <a href="Home.php"> (Home) </a>
    <br><br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Euname = $_POST['Uname'];
    $Eupass = $_POST['Upassword'];

    $Conn = new mysqli("localhost", "root", "root", "users");

    if ($Conn->connect_error) {
        die("فشل الاتصال: " . $Conn->connect_error);
    }

    $sql = "UPDATE user SET User_pass = '$Eupass' WHERE User_name = '$Euname'";
    $Result = $Conn->query($sql);

    if ($Conn->affected_rows > 0) {
        echo "<p style='color: green;'>تم تحديث كلمة المرور بنجاح.</p>";
    } else {
        echo "<p style='color: red;'>لم يتم العثور على المستخدم أو لم يتم تعديل شيء.</p>";
    }

    // عرض كل المستخدمين
    $sql2 = "SELECT * FROM user";
    $Result2 = $Conn->query($sql2);

    if ($Result2->num_rows > 0) {
        echo "<table border='3'>";
        while ($row = $Result2->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row['User_id']) .
                "</td><td>" . htmlspecialchars($row['User_name']) .
                "</td><td>" . htmlspecialchars($row['User_add']) .
                "</td><td>" . htmlspecialchars($row['User_no']) .
                "</td><td>" . htmlspecialchars($row['User_pass']) .
                "</td></tr>";
        }
        echo "</table>";
    }

    $Conn->close();
}
?>
</center>
</body>
</html>