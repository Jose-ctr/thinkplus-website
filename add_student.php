<?php 
include 'config.php';
if(!isset($_SESSION['school_id'])) { header("Location: login.php"); exit(); }

$school_id = $_SESSION['school_id'];
$school_name = $_SESSION['school_name'];
$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $adm_no = $_POST['adm_no'];
    $class = $_POST['class'];
    $parent_phone = $_POST['parent_phone'];

    $stmt = $conn->prepare("INSERT INTO students (school_id, name, adm_no, class, parent_phone) VALUES (?, ?, ?)");
    $stmt->bind_param("issss", $school_id, $name, $adm_no, $class, $parent_phone);
    
    if($stmt->execute()){
        $success = "Student added successfully!";
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Student - ThinkPlus</title><script src="https://cdn.tailwindcss.com"></script></head>
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
    <h1 class="text-3xl font-bold">Add New Student</h1>
    <?php if($success) echo "<p class='bg-green-200 p-2 rounded mt-2'>$success</p>"; ?>
    <?php if($error) echo "<p class='bg-red-200 p-2 rounded mt-2'>$error</p>"; ?>
    
    <form method="POST" class="mt-6 bg-white p-6 rounded shadow max-w-lg">
      <div class="mb-4">
        <label class="block">Student Name</label>
        <input type="text" name="name" required class="w-full border p-2 rounded">
      </div>
      <div class="mb-4">
        <label class="block">Admission No</label>
        <input type="text" name="adm_no" required class="w-full border p-2 rounded">
      </div>
      <div class="mb-4">
        <label class="block">Class</label>
        <input type="text" name="class" required class="w-full border p-2 rounded">
      </div>
      <div class="mb-4">
        <label class="block">Parent Phone</label>
        <input type="text" name="parent_phone" class="w-full border p-2 rounded">
      </div>
      <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Save Student</button>
    </form>
  </main>
</body>
</html>
