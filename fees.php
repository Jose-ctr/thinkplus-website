<?php 
include 'config.php';
if(!isset($_SESSION['school_id'])) {
  header("Location: login.php"); exit();
}
$school_id = $_SESSION['school_id'];
$school_name = $_SESSION['school_name'];
?>
<!DOCTYPE html>
<html>
<head><title>Fees - ThinkPlus</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="flex">
  <aside class="w-64 bg-gray-900 text-white h-screen p-4">
    <h2 class="text-2xl font-bold">ThinkPlus</h2>
    <p class="text-xs text-gray-400"><?php echo $school_name; ?></p>
    <ul class="space-y-2 mt-6">
      <li><a href="dashboard.php" class="block p-2 hover:bg-gray-800 rounded">📊 Dashboard</a></li>
      <li><a href="students.php" class="block p-2 hover:bg-gray-800 rounded">👨‍🎓 Students</a></li>
      <li><a href="fees.php" class="block p-2 bg-gray-800 rounded">💰 Fees</a></li>
      <li><a href="logout.php" class="block p-2 hover:bg-gray-800 rounded">🚪 Logout</a></li>
    </ul>
  </aside>
  <main class="flex-1 p-8"><h1 class="text-3xl font-bold">Fees Management</h1></main>
</body>
</html>
