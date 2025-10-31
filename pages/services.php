<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']); // get current page name
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services - Digital Marketing Assistant</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Custom Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-[#FDF8F3] text-[#6B7280] font-[Poppins]">

  <!-- Navbar -->
  <header class="bg-[#1E1E3F] text-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
      <h1 class="text-2xl font-bold text-[#f4b87bff] mb-2 md:mb-0">DigitalMarketerPro</h1>

      <nav class="space-x-6 text-center relative">
        <a href="../index.php" class="nav-link text-white hover:text-[#FF6B00] transition">Home</a>
        <a href="aboutus.php" class="nav-link text-white hover:text-[#FF6B00] transition">About Us</a>
        <a href="services.php" class="nav-link text-white hover:text-[#FF6B00] transition">Services</a>
        <a href="contact.php" class="nav-link text-white hover:text-[#FF6B00] transition">Contact</a>

         <?php if (isset($_SESSION['user'])): ?>
        <!-- Profile dropdown -->
        <div class="inline-block relative">
          <?php
            $profilePic = !empty($_SESSION['user']['profile_pic']) 
                ? '../' . htmlspecialchars($_SESSION['user']['profile_pic']) 
                : '../assets/uploads/default1.jpg';
          ?>
          <img src="<?php echo $profilePic; ?>" 
              alt="Profile" id="profileBtn"
              class="w-10 h-10 rounded-full inline-block cursor-pointer border border-gray-300 object-cover">

          <!-- Dropdown -->
          <div id="profileMenu"
                        class="hidden absolute right-0 mt-2 w-44 bg-white shadow-lg rounded text-left border border-gray-200">
                        <a href="edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit
                            Profile</a>
                            <a href="user_dashboard.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Dashboard</a>
                        <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                    </div>
        </div>
      <?php else: ?>
        <a href="login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" 
          class="nav-link text-white hover:text-[#FF6B00] transition">
          Login
        </a>
      <?php endif; ?>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-[#f4b87bff] text-white py-20 text-center">
    <div class="max-w-4xl mx-auto px-6">
      <h2 class="text-5xl font-bold mb-4">Our Services</h2>
      <p class="text-lg text-white/90">Comprehensive digital solutions to help your business grow and thrive online.</p>
    </div>
  </section>

  <!-- Services Grid -->
  <section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid md:grid-cols-3 gap-10 text-center">
        
        <!-- Service 1 -->
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#f4b87bff]">
          <div class="text-[#f4b87bff] text-4xl mb-4">📈</div>
          <h3 class="text-xl font-bold mb-2 text-[#1E1E3F]">SEO Optimization</h3>
          <p class="text-gray-600">Boost search rankings with keyword research, audits, and performance tracking.</p>
        </div>

        <!-- Service 2 -->
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#1E1E3F]">
          <div class="text-[#1E1E3F] text-4xl mb-4">✉️</div>
          <h3 class="text-xl font-bold mb-2 text-[#1E1E3F]">Email Marketing</h3>
          <p class="text-gray-600">Reach your audience with tailored email campaigns and measurable results.</p>
        </div>

        <!-- Service 3 -->
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#f4b87bff]">
          <div class="text-[#f4b87bff] text-4xl mb-4">📱</div>
          <h3 class="text-xl font-bold mb-2 text-[#1E1E3F]">Social Media Management</h3>
          <p class="text-gray-600">Plan, schedule, and analyze posts across multiple platforms with ease.</p>
        </div>

        <!-- Service 4 -->
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#1E1E3F]">
          <div class="text-[#1E1E3F] text-4xl mb-4">🖥️</div>
          <h3 class="text-xl font-bold mb-2 text-[#1E1E3F]">Content Marketing</h3>
          <p class="text-gray-600">Engage your audience with blogs, visuals, and videos tailored to your brand.</p>
        </div>

        <!-- Service 5 -->
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#f4b87bff]">
          <div class="text-[#f4b87bff] text-4xl mb-4">📊</div>
          <h3 class="text-xl font-bold mb-2 text-[#1E1E3F]">Analytics & Reporting</h3>
          <p class="text-gray-600">Measure ROI with real-time dashboards and detailed performance insights.</p>
        </div>

        <!-- Service 6 -->
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#1E1E3F]">
          <div class="text-[#1E1E3F] text-4xl mb-4">⚡</div>
          <h3 class="text-xl font-bold mb-2 text-[#1E1E3F]">Ad Campaigns</h3>
          <p class="text-gray-600">Launch effective ad campaigns on Google, Facebook, and Instagram.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-16 bg-[#1E1E3F] text-center text-white">
    <h3 class="text-3xl font-bold mb-4">Ready to grow your business?</h3>
    <p class="mb-6">Get started with DigitalMarketerPro today and take your marketing to the next level.</p>
    <a href="contact.php" class="inline-block px-6 py-3 bg-[#f4b87bff] text-white rounded-lg shadow hover:opacity-90 transition">
      Contact Us
    </a>
  </section>

  <!-- Footer -->
  <footer class="bg-[#1E1E3F] text-white py-8">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
      <p class="text-sm">&copy; <?= date("Y") ?> DigitalMarketerPro. All rights reserved.</p>
      <div class="space-x-4 mt-4 md:mt-0 text-sm">
        <a href="#" class="hover:text-[#f4b87bff]">Privacy</a>
        <a href="#" class="hover:text-[#f4b87bff]">Terms</a>
        <a href="mailto:contact@digitalmarketerpro.com" class="hover:text-[#f4b87bff]">Email Us</a>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const profileBtn = document.getElementById("profileBtn");
      const profileMenu = document.getElementById("profileMenu");

      if (profileBtn) {
        profileBtn.addEventListener("click", function (e) {
          e.stopPropagation();
          profileMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", function (e) {
          if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
            profileMenu.classList.add("hidden");
          }
        });
      }
    });
  </script> 
</body>
</html>
