<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']); // get current page name


include 'db.php'; // adjust path
// $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '../index.php';
// header("Location: " . $redirect);
// exit();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user;

        // Redirect back to page user came from
        $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : '../index.php';
        header("Location: $redirect");
        exit();
    } else {
        echo "<p class='text-center text-red-600 mt-4'>Invalid login!</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Custom Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-[#FDF8F3] text-gray-800 font-[Poppins]">

  <!-- Navbar -->
  <header class="bg-[#1E1E3F] shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
      <h1 class="text-2xl font-bold text-[#f4b87bff] mb-2 md:mb-0">DigitalMarketerPro</h1>

      <nav class="space-x-6 text-center relative">
        <a href="../index.php" class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='index.php')?'active':''; ?>">Home</a>
        <a href="aboutus.php" class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='aboutus.php')?'active':''; ?>">About Us</a>
        <a href="services.php" class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='services.php')?'active':''; ?>">Services</a>
        <a href="contact.php" class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='contact.php')?'active':''; ?>">Contact</a>

        <?php if(isset($_SESSION['user'])): ?>  
          <!-- Profile dropdown -->
          <div class="inline-block relative">
            <img src="assets/uploads/<?php echo $_SESSION['user']['profile_pic']; ?>" 
                 alt="Profile" id="profileBtn"
                 class="w-10 h-10 rounded-full inline-block cursor-pointer border border-gray-400">

            <!-- Dropdown -->
          <div id="profileMenu" class="hidden absolute right-0 mt-2 w-44 bg-white shadow-lg rounded text-left">
            <a href="edit_profile.php" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a>
            <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
          </div>
        </div>
        <?php else: ?>
          <a href="login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" 
             class="nav-link text-white hover:text-[#FF6B00] transition">Login</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>


  <!-- Login Section -->
  <section class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
      <h2 class="text-3xl font-bold text-center text-[#1E1E3F] mb-6">Login</h2>
      <form action="login.php" method="POST" class="space-y-5">
        <input type="hidden" name="redirect" 
         value="<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : '../index.php'; ?>">

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#f4b87b] focus:outline-none">
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#f4b87b] focus:outline-none">
        </div>

        <!-- Remember Me + Forgot Password -->
        <div class="flex items-center justify-between">
          <label class="flex items-center text-sm text-gray-600">
            <input type="checkbox" class="mr-2"> Remember Me
          </label>
          <a href="forgot_password.php" class="text-sm text-[#FF6B00] hover:underline">Forgot Password?</a>
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="w-full bg-[#FF6B00] text-[#1E1E3F] py-3 rounded-lg font-semibold hover:bg-[#eaa86a] transition">
          Login
        </button>

        <!-- Register Redirect -->
        <p class="text-center text-sm text-gray-600 mt-4">
          Don’t have an account? 
          <a href="register.php" class="text-[#FF6B00] hover:underline">Register</a>
        </p>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-[#1E1E3F] text-white py-8">
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
