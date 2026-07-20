<?php 
include 'config.php';

// If already logged in, go to dashboard
if(isset($_SESSION['school_id'])) {
  header("Location: dashboard.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ThinkPlus - Welcome</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center h-screen">
  <div class="bg-white p-10 rounded-lg shadow-lg text-center">
    <h1 class="text-4xl font-bold mb-2">ThinkPlus</h1>
    <p class="text-gray-600 mb-6">School Management System</p>
    <div class="space-x-4">
      <a href="login.php" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">Login</a>
      <a href="register.php" class="bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600">Register School</a>
    </div>
  </div>
</body>
</html>
