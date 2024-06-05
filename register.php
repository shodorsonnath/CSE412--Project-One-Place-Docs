<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];

    if ($password == $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (fullname, username, email, phone, password, gender) VALUES ('$fullname', '$username', '$email', '$phone', '$hashed_password', '$gender')";

        if ($conn->query($sql) === TRUE) {
          header("Location: modalr.php?status=success");
          exit();
        } else {
          header("Location: modalre.php?status=success");
          exit();
        }
    } else {
      header("Location: modalrep.php?status=success");
      exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>One-Place doc</title>
    <link rel="stylesheet" href="register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container">
      <div class="title">Registration</div>
      <div class="content">
        <form action="register.php" method="POST">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" name="fullname" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
              <span class="details">Username</span>
              <input type="text" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" name="phone" placeholder="Enter your number" required>
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" name="confirm_password" placeholder="Confirm your password" required>
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="Male">
            <input type="radio" name="gender" id="dot-2" value="Female">
            <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Prefer not to say</span>
              </label>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Register">
            <p class="signintext">Already have an account? <a href="login.php">Sign in</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
