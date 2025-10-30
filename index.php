<?php session_start(); 
$current_page = basename($_SERVER['PHP_SELF']); // get current page name ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital Marketing Assistant</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-[#FDF8F3] text-[#6B7280] font-[Poppins]">
    <!-- Header -->
    <header class="bg-[#1E1E3F] text-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-2xl font-bold text-[#f4b87bff] mb-2 md:mb-0">DigitalMarketerPro</h1>
            <nav class="space-x-6 text-center"> <a href="index.php"
                    class="nav-link text-white hover:text-[#FF6B00] transition">Home</a> <a href="pages/aboutus.php"
                    class="nav-link text-white hover:text-[#FF6B00] transition">About Us</a> <a
                    href="pages/services.php" class="nav-link text-white hover:text-[#FF6B00] transition">Services</a>
                <a href="pages/contact.php" class="nav-link text-white hover:text-[#FF6B00] transition">Contact</a>
                <?php if(isset($_SESSION['user'])): ?>
                <!-- Profile dropdown -->
                <div class="inline-block relative"> 
                  <img src="assets/uploads/<?php echo htmlspecialchars($_SESSION['user']['profile_pic'] ?? 'default1.jpg'); ?>" 
     alt="Profile" id="profileBtn"
     class="w-10 h-10 rounded-full inline-block cursor-pointer border border-gray-300 object-cover">

                    <!-- Dropdown -->
                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-44 bg-white shadow-lg rounded text-left border border-gray-200">
  <a href="pages/edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit Profile</a>
  <a href="pages/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
</div>
                </div> <?php else: ?> <a
                    href="pages/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>"
                    class="nav-link text-white hover:text-[#FF6B00] transition"> Login </a> <?php endif; ?>
            </nav>
        </div>
    </header> <!-- Hero Section -->
    <section class="bg-[#f4b87bff] text-white py-[120px]">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-bold mb-4">Smarter Marketing. Simpler Tools.</h2>
            <p class="text-lg mb-6 max-w-2xl mx-auto">Track campaigns, automate tasks, and boost your digital presence
                with your all-in-one marketing assistant.</p> <a href="pages/user_dashboard.php"
                class="inline-block px-8 py-3 bg-[#1E1E3F] text-white font-semibold rounded shadow hover:bg-[#111122] transition">
                Get Started </a>
        </div>
    </section> <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center text-[#1E1E3F] mb-12">Our Key Features</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div class=" bg-[#FDF8F3] p-6 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#FF6B00]">
                    <h4 class="text-xl font-semibold mb-2 text-[#1E1E3F]">Automated Campaigns</h4>
                    <p>Schedule and launch email and social media campaigns with AI-powered tools.</p>
                </div>
                <div class="bg-[#FDF8F3] p-6 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#1E1E3F]">
                    <h4 class="text-xl font-semibold mb-2 text-[#1E1E3F]">Live Performance Tracking</h4>
                    <p>Measure engagement and ROI with real-time dashboards and analytics.</p>
                </div>
                <div class="bg-[#FDF8F3] p-6 rounded-xl shadow hover:shadow-lg transition border-t-4 border-[#FF6B00]">
                    <h4 class="text-xl font-semibold mb-2 text-[#1E1E3F]">Content Management</h4>
                    <p>Organize, schedule, and distribute your content from a central platform.</p>
                </div>
            </div>
        </div>
    </section> <!-- Services Section -->
    <section class="py-20 bg-[#FDF8F3]">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-10 text-[#1E1E3F]">What We Offer</h3>
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-md border-t-4 border-[#FF6B00]">
                    <h4 class="font-bold text-xl mb-2 text-[#1E1E3F]">SEO Optimization</h4>
                    <p>Boost your search visibility with automated keyword tracking and audits.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-md border-t-4 border-[#1E1E3F]">
                    <h4 class="font-bold text-xl mb-2 text-[#1E1E3F]">Email Campaigns</h4>
                    <p>Send personalized and effective emails using ready-made templates and metrics.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-md border-t-4 border-[#FF6B00]">
                    <h4 class="font-bold text-xl mb-2 text-[#1E1E3F]">Social Media Manager</h4>
                    <p>Plan and schedule posts across platforms like Instagram, Facebook, and LinkedIn.</p>
                </div>
            </div>
        </div>
    </section> <!-- Footer -->
    <footer class="bg-[#1E1E3F] text-white py-8">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm">&copy; <?= date("Y") ?> DigitalMarketerPro. All rights reserved.</p>
            <div class="space-x-4 mt-4 md:mt-0 text-sm"> <a href="#" class="hover:text-[#FF6B00]">Privacy</a> <a
                    href="#" class="hover:text-[#FF6B00]">Terms</a> <a href="mailto:contact@digitalmarketerpro.com"
                    class="hover:text-[#FF6B00]">Email Us</a> </div>
        </div>
    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const profileBtn = document.getElementById("profileBtn");
        const profileMenu = document.getElementById("profileMenu");
        if (profileBtn) {
            profileBtn.addEventListener("click", function(e) {
                e.stopPropagation();
                profileMenu.classList.toggle("hidden");
            });
            document.addEventListener("click", function(e) {
                if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
                    profileMenu.classList.add("hidden");
                }
            });
        }
    });
    </script>
</body>

</html>