<?php 
include 'config.php';

// SECURITY: Only logged-in schools can access
if(!isset($_SESSION['school_id'])) {
  header("Location: login.php");
  exit();
}

$school_id = $_SESSION['school_id'];
$school_name = $_SESSION['school_name'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - ThinkPlus</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h1>Welcome, <?php echo $school_name; ?></h1>
  <p>School ID: <?php echo $school_id; ?></p>
  
  <nav>
    <a href="add_student.php">Add Student</a> | 
    <a href="students.php">View Students</a> | 
    <a href="fees.php">Record Payment</a> | 
    <a href="reports.php">Reports</a> | 
    <a href="logout.php">Logout</a>
  </nav>

  <h2>Dashboard Overview</h2>
  <p>This is where your school stats will show</p>
</div>
</body>
</html>
