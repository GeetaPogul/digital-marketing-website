<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Digital Marketing Assistant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-[#FDF8F3] text-[#6B7280] font-[Poppins]">
    <!-- Header -->
    <header class="bg-[#1E1E3F] text-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-2xl font-bold text-[#f4b87bff] mb-2 md:mb-0">DigitalMarketerPro</h1>
            <nav class="space-x-6 text-center">
                <a href="index.php" class="nav-link text-white hover:text-[#FF6B00] transition">Home</a>
                <a href="pages/aboutus.php" class="nav-link text-white hover:text-[#FF6B00] transition">About Us</a>
                <a href="pages/services.php" class="nav-link text-white hover:text-[#FF6B00] transition">Services</a>
                <a href="pages/contact.php" class="nav-link text-white hover:text-[#FF6B00] transition">Contact</a>
                <?php if(isset($_SESSION['user'])): ?>
                <!-- Profile dropdown -->
                <div class="inline-block relative">
                    <img src="assets/uploads/<?php echo htmlspecialchars($_SESSION['user']['profile_pic'] ?? 'default1.jpg'); ?>" 
                         alt="Profile" id="profileBtn" class="w-10 h-10 rounded-full inline-block cursor-pointer border border-gray-300 object-cover">

                    <!-- Dropdown -->
                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-44 bg-white shadow-lg rounded text-left border border-gray-200">
                        <a href="pages/edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit Profile</a>
                        <a href="pages/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                    </div>
                </div> 
                <?php else: ?> 
                <a href="pages/login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="nav-link text-white hover:text-[#FF6B00] transition">Login</a> 
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Dashboard Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-[#1E1E3F]">
                    Welcome, 
                    <?php 
                    // Check if session variable is set
                    if (isset($_SESSION['user']['first_name'])) {
                        echo htmlspecialchars($_SESSION['user']['first_name']); 
                    } else {
                        echo 'Guest'; // Fallback message if the session variable is not set
                    }
                    ?>!
                </h2>
            </div>
            
            <!-- Tabs -->
            <div class="mt-6 flex space-x-8 border-b-2 border-[#FF6B00]">
                <button class="tab-link text-[#1E1E3F] py-2 px-6 hover:bg-[#FF6B00] hover:text-white rounded" id="tab1" onclick="showTab(1)">Overview</button>
                <button class="tab-link text-[#1E1E3F] py-2 px-6 hover:bg-[#FF6B00] hover:text-white rounded" id="tab2" onclick="showTab(2)">Campaigns</button>
                <button class="tab-link text-[#1E1E3F] py-2 px-6 hover:bg-[#FF6B00] hover:text-white rounded" id="tab3" onclick="showTab(3)">Analytics</button>
            </div>

            <!-- Tab Content -->
            <div id="content1" class="tab-content mt-8">
                <!-- Overview Content -->
                <h3 class="text-2xl font-semibold text-[#1E1E3F]">Campaign Overview</h3>
                <p class="mt-4">Your current campaign performance is displayed here...</p>
            </div>

            <div id="content2" class="tab-content mt-8 hidden">
                <!-- Campaigns Content -->
                <h3 class="text-2xl font-semibold text-[#1E1E3F]">Your Campaigns</h3>
                <p class="mt-4">Manage and create your campaigns below...</p>
            </div>

            <div id="content3" class="tab-content mt-8 hidden">
                <!-- Analytics Content -->
                <h3 class="text-2xl font-semibold text-[#1E1E3F]">Performance Analytics</h3>
                <p class="mt-4">View detailed analytics for your campaigns...</p>
            </div>
        </div>
    </section>

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
        // Show tab content
        function showTab(tabNumber) {
            // Hide all content
            const allTabs = document.querySelectorAll('.tab-content');
            allTabs.forEach(tab => tab.classList.add('hidden'));

            // Show the selected tab content
            document.getElementById('content' + tabNumber).classList.remove('hidden');

            // Add active class to the clicked tab
            const allLinks = document.querySelectorAll('.tab-link');
            allLinks.forEach(link => link.classList.remove('bg-[#FF6B00]', 'text-white'));
            document.getElementById('tab' + tabNumber).classList.add('bg-[#FF6B00]', 'text-white');
        }
    </script>
</body>

</html>
