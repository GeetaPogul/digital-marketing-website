<?php
include("db.php");

if (isset($_POST['register'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

// Default filename
$profile_image = "default1.jpg";

// If a file was uploaded
if (!empty($_FILES['profile_image']['name'])) {
    // path from pages/ to digital/assets/uploads/
    $target_dir = __DIR__ . "/../assets/uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    // unique filename
    $filename = time() . "_" . basename($_FILES["profile_image"]["name"]);
    $target_file = $target_dir . $filename;

    // move uploaded file from tmp -> digital/assets/uploads/
    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        // IMPORTANT: store filename ONLY in DB
        $profile_image = $filename;
    }
}

    }

    // Insert into DB (store filename only)
    $sql = "INSERT INTO users (first_name, last_name, email, contact, password, profile_pic) 
            VALUES ('$fname', '$lname', '$email', '$contact', '$password', '$profile_image')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Digital Marketing Assistant</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="../assets/css/style.css">
 <script src="../assets/js/script.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
      <h1 class="text-2xl font-bold text-teal-600 mb-2 md:mb-0">DigitalMarketerPro</h1>
      <nav class="flex space-x-6 text-center">
        <a href="../index.php" class="relative text-gray-700 hover:text-teal-600">Home</a>
        <a href="services.php" class="relative text-gray-700 hover:text-teal-600">Services</a>
        <a href="about.php" class="relative text-gray-700 hover:text-teal-600">About</a>
        <a href="contact.php" class="relative text-gray-700 hover:text-teal-600">Contact</a>
        <a href="login.php" class="relative text-gray-700 hover:text-teal-600">Login</a>
     </nav>
    </div>
  </header>

  <br> <br> 
  <!-- Register Section -->
  <section class="flex items-center justify-center min-h-screen ">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-lg p-8">
      <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>
       <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <!-- First Name -->
      <div>
        <label class="block text-gray-700">First Name</label>
        <input type="text" name="first_name" required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-gray-700">Last Name</label>
        <input type="text" name="last_name" required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
      </div>

      <!-- Contact -->
      <div>
        <label class="block text-gray-700">Contact</label>
        <input type="text" name="contact" required maxlength="10" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
      </div>

      <!-- Password -->
      <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
      </div>

      <!-- Profile Picture -->
      <div>
        <label class="block text-gray-700">Profile Picture</label>
        <input type="file" name="profile_pic"
          class="w-full px-4 py-2 border rounded-lg">
      </div>

      <!-- Submit -->
      <button type="submit" name="register"
        class="w-full bg-teal-600 text-white font-semibold py-2 rounded-lg hover:bg-teal-700 transition">
        Register
      </button>

      <p class="text-sm text-gray-600 text-center mt-4">
        Already have an account? <a href="login.php" class="text-teal-600 font-medium">Login</a>
      </p>
    </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-teal-600 text-white py-8">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
      <p class="text-sm">&copy; <?= date("Y") ?> DigitalMarketerPro. All rights reserved.</p>
      <div class="space-x-4 mt-4 md:mt-0 text-sm">
        <a href="#" class="hover:text-gray-200">Privacy</a>
        <a href="#" class="hover:text-gray-200">Terms</a>
        <a href="mailto:contact@digitalmarketerpro.com" class="hover:text-gray-200">Email Us</a>
      </div>
    </div>
  </footer>

</body>
</html>
