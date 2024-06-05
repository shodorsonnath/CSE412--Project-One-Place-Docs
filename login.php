<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: editor.php");
            exit();
        } else {
          header("Location: modalloginInvalid.php?status=success");
          exit();
        } 
    } else {
      header("Location: modaluserfound.php?status=success");
      exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>One-Place doc</title>
    <link rel="stylesheet" href="login.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="container">
      <form action="login.php" method="POST">
        <div class="title">Login</div>
        <div class="input-box underline">
          <input type="email" name="email" placeholder="Enter Your Email" required />
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Enter Your Password" required />
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" value="Continue" />
        </div>
      </form>
      <div class="option">or Connect With Social Media</div>
      <div class="twitter">
        <a href="#"><i class="fab fa-twitter"></i>Sign in With Google</a>
      </div>
      <div class="facebook">
        <a href="#"><i class="fab fa-facebook-f"></i>Sign in With Facebook</a>
      </div>
    </div>
  </body>
</html>
