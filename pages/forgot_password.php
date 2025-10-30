<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password - Digital Marketing Assistant</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">

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
        <a href="login.php" class="relative text-gray-800 font-semibold underline">Login</a>
      </nav>
    </div>
  </header>

  <!-- Forgot Password Section -->
  <section class="flex items-center justify-center min-h-screen bg-gradient-to-r from-pink-500 to-indigo-600">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
      <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Forgot Password</h2>
      <p class="text-sm text-gray-600 text-center mb-6">
        Enter your registered email address and we’ll send you instructions to reset your password.
      </p>

      <form action="forgot_password_process.php" method="POST" class="space-y-5">
        
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-500 focus:outline-none">
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="w-full bg-teal-600 text-white py-3 rounded-lg font-semibold hover:bg-teal-700 transition">
          Send Reset Link
        </button>

        <!-- Back to Login -->
        <p class="text-center text-sm text-gray-600 mt-4">
          Remembered your password? 
          <a href="login.php" class="text-teal-600 hover:underline">Back to Login</a>
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
