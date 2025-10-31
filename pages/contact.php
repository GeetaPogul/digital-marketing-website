<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']); // get current page name
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>

<body class="bg-[#FDF8F3] text-gray-900 font-[Poppins]">

    <!-- Navbar -->
    <header class="bg-[#1E1E3F] shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-2xl font-bold text-[#f4b87bff] mb-2 md:mb-0">DigitalMarketerPro</h1>

            <nav class="space-x-6 text-center relative">
                <a href="../index.php"
                    class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='index.php')?'active':''; ?>">Home</a>
                <a href="aboutus.php"
                    class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='aboutus.php')?'active':''; ?>">About
                    Us</a>
                <a href="services.php"
                    class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='services.php')?'active':''; ?>">Services</a>
                <a href="contact.php"
                    class="nav-link text-white hover:text-[#FF6B00] <?php echo ($current_page=='contact.php')?'active':''; ?>">Contact</a>

                <?php if (isset($_SESSION['user'])): ?>
                <!-- Profile dropdown -->
                <div class="inline-block relative">
                    <?php
            $profilePic = !empty($_SESSION['user']['profile_pic']) 
                ? '../' . htmlspecialchars($_SESSION['user']['profile_pic']) 
                : '../assets/uploads/default1.jpg';
          ?>
                    <img src="<?php echo $profilePic; ?>" alt="Profile" id="profileBtn"
                        class="w-10 h-10 rounded-full inline-block cursor-pointer border border-gray-300 object-cover">

                    <!-- Dropdown -->
                    <div id="profileMenu"
                        class="hidden absolute right-0 mt-2 w-44 bg-white shadow-lg rounded text-left border border-gray-200">
                        <a href="edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Edit
                            Profile</a>
                        <a href="user_dashboard.php"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Dashboard</a>
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


    <!-- Contact Section -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-[#FF6B00] mb-4">Get in Touch</h2>
                <p class="text-gray-700 mb-6">
                    Have questions about our services or need assistance?
                    Fill out the form or reach us directly using the details below.
                </p>

                <div class="space-y-4 text-gray-800">
                    <p><strong>📍 Address:</strong> 123 Digital Street, Tech City</p>
                    <p><strong>📧 Email:</strong> support@digitalmarketerpro.com</p>
                    <p><strong>📞 Phone:</strong> +91 98765 43210</p>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-[#f4b87bff]/50">
                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-800">Full Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f4b87bff]">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f4b87bff]">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-800">Subject</label>
                        <input type="text" id="subject" name="subject" required
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f4b87bff]">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-800">Message</label>
                        <textarea id="message" name="message" rows="4" required
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f4b87bff]"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#FF6B00] text-white py-2 px-4 rounded-lg hover:bg-[#FF6B00] transition">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1E1E3F] text-white py-8 mt-12">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm">&copy; <?= date("Y") ?> DigitalMarketerPro. All rights reserved.</p>
            <div class="space-x-4 mt-4 md:mt-0 text-sm">
                <a href="#" class="hover:text-[#f4b87bff]">Privacy</a>
                <a href="#" class="hover:text-[#f4b87bff]">Terms</a>
                <a href="mailto:contact@digitalmarketerpro.com" class="hover:text-[#f4b87bff]">Email Us</a>
            </div>
        </div>
    </footer>
</body>

</html>