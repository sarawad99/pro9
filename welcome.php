<?php
session_start();

// إذا ما فيه اسم مستخدم مخزن، يرجع لتسجيل الدخول
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<body>
<center>
    <br><br><br><br><br><br><br><br><br><br><br><br>

    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Your Username is: <?php echo htmlspecialchars($username); ?></p>
    <br>
    <a href="Home.php">Start</a>
    <br><br>
    <a href="logout.php">Logout</a>

</center>
</body>
</html>