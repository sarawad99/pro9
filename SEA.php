<!DOCTYPE html>
<html>
<body>
<center>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <h1>USER SEARCH</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username: <input type="text" name="Uname" required><br><br>
        <input type="submit" value="Search">
    </form>

    <br>
    <a href="Home.php">(Home)</a>
    <br><br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Suname = $_POST['Uname'];

    $Conn = new mysqli("localhost", "root", "root", "users");

    if ($Conn->connect_error) {
        die("فشل الاتصال: " . $Conn->connect_error);
    }

    $sql = "SELECT * FROM user WHERE User_name = '$Suname'";
    $Result = $Conn->query($sql);

    if ($Result->num_rows > 0) {
        echo "<p style='color: green;'>تم العثور على النتيجة:</p>";
        echo "<table border='2'>";
        while ($row = $Result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row['User_id']) .
                "</td><td>" . htmlspecialchars($row['User_name']) .
                "</td><td>" . htmlspecialchars($row['User_add']) .
                "</td><td>" . htmlspecialchars($row['User_no']) .
                "</td><td>" . htmlspecialchars($row['User_pass']) .
                "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red;'>عذرًا، لا توجد بيانات لهذا الاسم.</p>";
    }

    $Conn->close();
}
?>
</center>
</body>
</html>