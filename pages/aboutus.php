<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']); // get current page name
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Digital Marketing Assistant</title>
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

            <nav class="space-x-6 text-center">
                <a href="../index.php" class="nav-link text-white hover:text-[#FF6B00] transition">Home</a>
                <a href="aboutus.php" class="nav-link text-white hover:text-[#FF6B00] transition">About Us</a>
                <a href="services.php" class="nav-link text-white hover:text-[#FF6B00] transition">Services</a>
                <a href="contact.php" class="nav-link text-white hover:text-[#FF6B00] transition">Contact</a>


                <?php if(isset($_SESSION['user'])): ?>
                <!-- Profile dropdown -->
                <div class="inline-block relative"> 
                  <img src="assets/uploads/<?php echo htmlspecialchars($_SESSION['user']['profile_pic'] ?? 'default1.jpg'); ?>" 
     alt="Profile" id="profileBtn"
     alt="Profile" id="profileBtn"
     class="w-10 h-10 rounded-full inline-block cursor-pointer border border-gray-300 object-cover">

                 <!-- Dropdown -->
                    <div id="profileMenu"
                        class="hidden absolute right-0 mt-2 w-44 bg-white shadow-lg rounded text-left border border-gray-200">
                        <a href="edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit
                            Profile</a>
                        <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                    </div>
                </div> <?php else: ?> <a
                    href="login.php"
                    class="nav-link text-white hover:text-[#FF6B00] transition"> Login </a> <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-[#f4b87bff] text-white py-[120px] text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-5xl font-bold mb-4">About Us</h2>
            <p class="text-lg text-white/90">Your trusted partner in digital growth and smarter marketing solutions.</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <!-- Left: Image -->
            <div>
                <img src="https://source.unsplash.com/600x400/?digital,marketing" alt="About Us"
                    class="rounded-lg shadow-lg">
            </div>
            <!-- Right: Text -->
            <div>
                <h3 class="text-3xl font-bold text-[#1E1E3F] mb-4">Who We Are</h3>
                <p class="leading-relaxed mb-4">
                    At <strong>DigitalMarketerPro</strong>, we empower businesses with innovative digital marketing
                    solutions.
                    Our mission is to simplify marketing with smarter tools, enabling businesses to focus on growth
                    while we handle the complexity.
                </p>
                <p class="leading-relaxed">
                    From campaign automation to SEO optimization, we bring everything under one roof to help brands
                    thrive in the digital era.
                </p>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12">
            <div class="bg-[#FDF8F3] p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#FF6B00]">
                <h4 class="text-2xl font-bold text-[#1E1E3F] mb-4">Our Mission</h4>
                <p>
                    To provide businesses with simple yet powerful digital marketing tools that boost visibility,
                    increase engagement, and drive measurable results.
                </p>
            </div>
            <div class="bg-[#FDF8F3] p-8 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#1E1E3F]">
                <h4 class="text-2xl font-bold text-[#1E1E3F] mb-4">Our Vision</h4>
                <p>
                    To be the leading digital marketing assistant platform globally, helping businesses of all sizes
                    transform their digital presence and achieve sustainable growth.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1E1E3F] text-white py-8">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm">&copy; <?= date("Y") ?> DigitalMarketerPro. All rights reserved.</p>
            <div class="space-x-4 mt-4 md:mt-0 text-sm">
                <a href="#" class="hover:text-[#FF6B00]">Privacy</a>
                <a href="#" class="hover:text-[#FF6B00]">Terms</a>
                <a href="mailto:contact@digitalmarketerpro.com" class="hover:text-[#FF6B00]">Email Us</a>
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