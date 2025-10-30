<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Correct field names (match your form)
  $first_name = mysqli_real_escape_string($conn, $_POST['username']);
  $last_name = mysqli_real_escape_string($conn, $_POST['fullname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Keep old image as default
  $profile_pic = $user['profile_pic'];

  // Handle image upload
  if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
    $target_dir = "../assets/uploads/";
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0777, true);
    }

    $file_name = time() . "_" . basename($_FILES["profile_pic"]["name"]);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
      $profile_pic = $file_name; // only store filename
    }
  }

  // Update query
  $query = "UPDATE users SET 
              first_name='$first_name', 
              last_name='$last_name', 
              email='$email', 
              contact='$contact', 
              profile_pic='$profile_pic'";

  if (!empty($password)) {
    $query .= ", password='$password'";
  }

  $query .= " WHERE id=" . $user['id'];

  if (mysqli_query($conn, $query)) {
    // Update session data
    $_SESSION['user']['first_name'] = $first_name;
    $_SESSION['user']['last_name'] = $last_name;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['contact'] = $contact;
    $_SESSION['user']['profile_pic'] = $profile_pic;
    if (!empty($password)) {
      $_SESSION['user']['password'] = $password;
    }

    $success = "Profile updated successfully!";
  } else {
    $error = "Error updating profile: " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-[#FDF8F3] text-gray-800 font-[Poppins]">

  <section class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-lg p-8">
      <h2 class="text-3xl font-bold text-center text-[#1E1E3F] mb-6">Edit Profile</h2>

      <?php if (isset($success)): ?>
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-center"><?php echo $success; ?></div>
      <?php elseif (isset($error)): ?>
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center"><?php echo $error; ?></div>
      <?php endif; ?>

      <form method="POST" enctype="multipart/form-data" class="space-y-5">

        <!-- First Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">First Name</label>
          <input type="text" name="username" value="<?php echo htmlspecialchars($user['first_name']); ?>" required
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#f4b87b] focus:outline-none">
        </div>

        <!-- Last Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Last Name</label>
          <input type="text" name="fullname" value="<?php echo htmlspecialchars($user['last_name']); ?>" required
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#f4b87b] focus:outline-none">
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#f4b87b] focus:outline-none">
        </div>

        <!-- Contact -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Contact</label>
          <input type="text" name="contact" value="<?php echo htmlspecialchars($user['contact']); ?>" required
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#f4b87b] focus:outline-none">
        </div>

        <!-- Profile Picture -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
          <div class="flex items-center space-x-4">
            <img src="../assets/uploads/<?php echo htmlspecialchars($user['profile_pic'] ?: 'default.png'); ?>" alt="Profile"
                 class="w-16 h-16 rounded-full border border-gray-300">
            <input type="file" name="profile_pic" class="text-sm text-gray-600">
          </div>
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Change Password (Optional)</label>
          <input type="password" name="password" placeholder="Enter new password"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#f4b87b] focus:outline-none">
        </div>

        <!-- Save Button -->
        <button type="submit"
          class="w-full bg-[#FF6B00] text-[#1E1E3F] py-3 rounded-lg font-semibold hover:bg-[#eaa86a] transition">
          Save Changes
        </button>

        <div class="mt-6 text-center">
          <button type="button" onclick="window.history.back()"
            class="shadow-md hover:shadow-lg border-2 text-purple-800 border-purple-600 hover:text-white hover:bg-purple-500 py-2 px-4 rounded-lg">
            ← Back
          </button>
        </div>
      </form>
    </div>
  </section>

</body>
</html>
