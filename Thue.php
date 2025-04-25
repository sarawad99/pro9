<?php
session_start(); // <-- ضروري جداً

$Conn = new mysqli("localhost", "root", "", "users");
if ($Conn->connect_error) {
    die("فشل الاتصال: " . $Conn->connect_error);
}

$uname = $_POST['Uname'];
$upass = $_POST['Upassword'];

$sql = "SELECT * FROM user WHERE User_name='$uname' AND User_pass='$upass'";
$result = $Conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $uname; // <-- نحفظ الاسم
    header("Location: welcome.php"); // <-- نحوله لصفحة الترحيب
    exit();
} else {
    echo "اسم المستخدم أو كلمة المرور غير صحيحة.<br>";
    echo "<a href='login.php'>رجوع</a>";
}

$Conn->close();
?>