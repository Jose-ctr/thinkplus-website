<?php include 'config.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - ThinkPlus</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>School Login</h2>
  <form method="POST">
    <input name="email" type="email" placeholder="Email" required><br><br>
    <input name="password" type="password" placeholder="Password" required><br><br>
    <button name="login">Login</button>
  </form>
  <p>Don't have an account? <a href="register.php">Register</a></p>
</div>

<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $res = $conn->query("SELECT * FROM schools WHERE email='$email'");
  
  if($res->num_rows == 1){
    $school = $res->fetch_assoc();
    if(password_verify($_POST['password'], $school['password'])){
      $_SESSION['school_id'] = $school['id'];
      $_SESSION['school_name'] = $school['name'];
      header("Location: dashboard.php");
      exit();
    }
  }
  echo "<p style='color:red'>Invalid Email or Password</p>";
}
?>
</body>
</html>
