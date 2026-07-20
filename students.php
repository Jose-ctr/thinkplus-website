<?php 
include 'config.php';
if(!isset($_SESSION['school_id'])) { header("Location: login.php"); exit(); }

$school_id = $_SESSION['school_id'];
$school_name = $_SESSION['school_name'];

// GET ONLY THIS SCHOOL'S STUDENTS
$stmt = $conn->prepare("SELECT * FROM students WHERE school_id = ? ORDER BY id DESC");
$stmt->bind_param("i", $school_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><title>Students - ThinkPlus</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="flex bg-gray-100">
  <aside class="w-64 bg-gray-900 text-white h-screen p-4">
    <h2 class="text-2xl font-bold">ThinkPlus</h2>
    <p class="text-xs text-gray-400"><?php echo $school_name; ?></p>
    <ul class="space-y-2 mt-6">
      <li><a href="dashboard.php" class="block p-2 hover:bg-gray-800 rounded">📊 Dashboard</a></li>
      <li><a href="students.php" class="block p-2 bg-gray-800 rounded">👨‍🎓 Students</a></li>
      <li><a href="fees.php" class="block p-2 hover:bg-gray-800 rounded">💰 Fees</a></li>
      <li><a href="logout.php" class="block p-2 hover:bg-gray-800 rounded">🚪 Logout</a></li>
    </ul>
  </aside>
  <main class="flex-1 p-8">
    <h1 class="text-3xl font-bold">Students - <?php echo $school_name; ?></h1>
    <a href="add_student.php" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block">+ Add Student</a>
    <div class="mt-4 bg-white p-4 rounded shadow">
      <table class="w-full">
        <tr class="bg-gray-200"><th class="p-2 text-left">Name</th><th>Adm No</th><th>Class</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="border-b"><td class="p-2"><?php echo $row['name']; ?></td><td><?php echo $row['adm_no']; ?></td><td><?php echo $row['class']; ?></td></tr>
        <?php endwhile; ?>
      </table>
    </div>
  </main>
</body>
</html>
