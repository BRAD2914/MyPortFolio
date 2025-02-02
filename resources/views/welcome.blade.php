<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function toggleMenu() {
            document.getElementById("nav-links").classList.toggle("hidden");
        }

        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.getElementById("theme-icon");
            body.classList.toggle("light-mode");
            body.classList.toggle("dark-mode");

            if (body.classList.contains("light-mode")) {
                themeIcon.classList.remove("fa-sun");
                themeIcon.classList.add("fa-moon");
            } else {
                themeIcon.classList.remove("fa-moon");
                themeIcon.classList.add("fa-sun");
            }

            localStorage.setItem("theme", body.classList.contains("light-mode") ? "light" : "dark");
        }

        function openModal(experience) {
            const modal = document.getElementById("modal");
            const modalContent = document.querySelector('.modal-content');
            const title = document.getElementById("modal-title");
            const content = document.getElementById("modal-content");
            const role = document.getElementById("modal-role");

            if (experience === 'accessVA') {
    title.textContent = 'Access VA 247 (2023 - 2024)';
    title.classList.add('dark-text'); // Add dark-text class to title
    role.textContent = 'Role: Virtual Assistant'; // Set role for Access VA
    content.textContent = 'Played a crucial role in supporting clients with a wide range of tasks, including real estate tax overage assistance, administrative support, email management, scheduling and customer service in real estate world.';
} else if (experience === 'panoptyc') {
    title.textContent = 'Panoptyc (2024 - 2025)';
    title.classList.add('dark-text'); // Add dark-text class to title
    role.textContent = 'Role: Theft Investigator'; // Set role for Panoptyc
    content.textContent = 'Empower the marketing team to decrease theft with vastly improved efficiency. Panoptyc uses artificial intelligence to detect theft and alert Micro Market operators, reducing theft shrinkage by 1-10%, resulting in significant annual losses. ';
}

            modal.classList.remove("hidden");
            setTimeout(() => {
                modalContent.classList.remove("opacity-0", "translate-y-4");
                modalContent.classList.add("opacity-100", "translate-y-0");
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById("modal");
            const modalContent = document.querySelector('.modal-content');

            modalContent.classList.add("opacity-0", "translate-y-4");
            setTimeout(() => {
                modal.classList.add("hidden");
            }, 300); // Delay added for smooth closing
        }

        document.addEventListener("DOMContentLoaded", () => {
            const savedTheme = localStorage.getItem("theme") || "dark"; 
            const themeIcon = document.getElementById("theme-icon");
            if (savedTheme === "light") {
                document.body.classList.add("light-mode");
                themeIcon.classList.remove("fa-sun");
                themeIcon.classList.add("fa-moon");
            } else {
                document.body.classList.add("dark-mode");
                themeIcon.classList.remove("fa-moon");
                themeIcon.classList.add("fa-sun");
            }
        }); document.addEventListener("DOMContentLoaded", () => {
            const savedTheme = localStorage.getItem("theme") || "dark"; 
            const themeIcon = document.getElementById("theme-icon");
            if (savedTheme === "light") {
                document.body.classList.add("light-mode");
                themeIcon.classList.remove("fa-sun");
                themeIcon.classList.add("fa-moon");
            } else {
                document.body.classList.add("dark-mode");
                themeIcon.classList.remove("fa-moon");
                themeIcon.classList.add("fa-sun");
            }

            // Initialize the charts
            initCharts();
        });

        function initCharts() {
    // Skill Data
    const skills = {
        'HTML': 90,
        'CSS': 90,
        'JavaScript': 70,
        'Laravel': 95,
        'React': 30,
        'Node.js': 65,
        'SQL': 90,
        'Kotlin': 40,
        'Artificial Intelligence': 100,
        'Java': 85
    };

    // Calculate the total skill level
    const totalSkillLevel = Object.values(skills).reduce((acc, value) => acc + value, 0);

    // Calculate percentages for Pie Chart
    const pieData = Object.values(skills).map(value => ((value / totalSkillLevel) * 100).toFixed(2));

    // Galactic Color Palette
    const galacticColors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(100, 255, 132, 0.6)',
        'rgba(200, 100, 132, 0.6)',
        'rgba(75, 75, 255, 0.6)',
        'rgba(255, 99, 255, 0.6)'
    ];

    // Bar Chart Data
    const barCtx = document.getElementById('skillsBarChart').getContext('2d');
    const skillsBarChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: Object.keys(skills),
            datasets: [{
                label: 'Skill Level (%)',
                data: Object.values(skills), // Original skill levels for bar chart
                backgroundColor: galacticColors, // Galactic colors for bar chart
                borderColor: 'rgba(255, 255, 255, 1)', // Optional: Change border color to white
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        font: {
                            size: 16, // Adjust size for y-axis labels
                            weight: 'bold',
                            style: 'italic'
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 16, // Adjust size for x-axis labels
                            weight: 'bold',
                            style: 'italic'
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 18, // Adjust size for legend labels
                            weight: 'bold',
                            style: 'italic'
                        }
                    },
                    display: false
                }
            }
        }
    });

    // Pie Chart Data
    const pieCtx = document.getElementById('skillsPieChart').getContext('2d');
    const skillsPieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: Object.keys(skills),
            datasets: [{
                label: 'Skills Distribution',
                data: pieData, // Updated data for pie chart based on percentages
                backgroundColor: galacticColors, // Use the same galactic colors for pie chart
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 18, // Adjust size for legend labels
                            weight: 'bold',
                            style: 'italic'
                        }
                    },
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                        }
                    }
                }
            }
        }
    });
}
// Call the function to initialize the charts
initCharts();
    </script>
    <style>
       html, body {
    margin: 0;
    padding: 0;
    height: 100%; /* Make sure body occupies full height */
}
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            scroll-behavior: smooth;
            transition: background 0.3s, color 0.3s;
            display:flex;
            flex-direction: column;
        }
        main {
    flex: 1; /* Allow the main to take available space */
}
        body.dark-mode {
            background: #1a202c; /* Dark background color */
            background-image: url('https://www.transparenttextures.com/patterns/stardust.png');
            color: #e2e8f0; /* Light gray text color for better readability */
        }
        /* Transition styles for light and dark mode */
        
        body.light-mode {
            background: #f7fafc; /* Light background color */
            background-image: url('https://www.transparenttextures.com/patterns/stardust.png'); /* Add texture image here */
            color: #1a202c; /* Dark text color */
        }
        h1, h2, h3 {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
        }
        h1 {
            font-size: 2rem;
            line-height: 1.5;
        }
        h2 {
            font-size: 1.75rem;
            line-height: 1.4;
        }
        p, li {
            font-size: 1rem;
            line-height: 1.6;
        }
        section {
            margin: 50px 0;
            padding: 20px;
            transition: transform 0.3s, background-color 0.3s;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            color: inherit; /* Ensure section text inherits color */
        }
        /* section:hover {
            transform: scale(1.05);
            background-color: rgba(31, 41, 55, 0.8);
        } */
        .btn {
    padding: 0.5rem 1rem; /* Adjust the padding as needed */
    background-color: transparent; /* Transparent background */
    color: white; /* Text color */
    border: none; /* Remove border */
    border-radius: 4px; /* Rounded corners */
    transition: background-color 0.2s; /* Smooth background color transition */
    text-decoration: none; /* Remove underline */
}

.btn:hover {
    background-color: rgba(255, 255, 255, 0.2); /* Add a slight background on hover */
}
.btn:focus {
    outline: none; /* Remove the default focus outline */
}
        #about {
            background: rgba(75, 85, 99, 0.7);
        }
        #projects {
            background: rgba(115, 115, 255, 0.7);
        }
        #contact {
            background: rgba(96, 109, 182, 0.7);
        }

        #modal {
    background: rgba(0, 0, 0, 0.4); /* Dark overlay */
    backdrop-filter: blur(8px); /* Blurred background effect */
    -webkit-backdrop-filter: blur(8px); /* Ensure compatibility */
}

.modal-content {
    background: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, opacity 0.3s ease;
}

        /* Transition classes */
        .transition-transform {
            transition: transform 0.3s ease;
        }
        .dark-text {
    color: #333; /* Darker shade of gray */
}
    </style>
</head>
<body>
<header class="bg-gray-900 text-white p-4 fixed w-full top-0 shadow-md z-10">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">My Portfolio</h1>
        <span id="theme-text" class="text-white"></span>
        <div>
            <button class="text-white mr-4" onclick="toggleTheme()">
                <i id="theme-icon" class="fas fa-sun"></i>
            </button>
            <button class="lg:hidden text-white" onclick="toggleMenu()">&#9776;</button>
        </div>
        <nav id="nav-links" class="hidden lg:flex space-x-4">
            <div class="flex space-x-4">
                <a href="{{ route('about') }}" class="btn">About</a>
                <a href="{{ route('images') }}" class="btn">Hobby</a>
                <a href="#contact" class="btn">Contact</a>
            </div>
        </nav>
    </div>
</header>

<main class="container mx-auto pt-20">
    <!-- Add a section for skills charts -->
    <section id="skills">
        <h2 class="text-2xl font-bold mb-4">Skills Acquired</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <canvas id="skillsBarChart" width="400" height="400"></canvas>
            </div>
            <div>
                <canvas id="skillsPieChart" width="400" height="400"></canvas>
            </div>
        </div>
 <!-- Skills Description Section -->
 <div class="mt-6">
    <h3 class="text-2xl font-bold mb-4">Description</h3>
    <p class="text-gray-700">
        The skills I acquired enables me to tackle various challenges effectively.
        My college experience has helped me develop these strengths, including:
    </p>
    <ul class="list-disc list-inside text-gray-700 mt-2">
        <li>Proficiency in web development using HTML, CSS, and JavaScript.</li>
        <li>Experience with back-end frameworks such as Laravel.</li>
        <li>Strong understanding of database management and SQL.</li>
        <li>Familiarity with version control systems like Git.</li>
        <li>Ability to collaborate effectively in team settings.</li>
        <li>Foundational knowledge in Artificial Intelligence.</li>
    </ul>
</div>


    </section>
</main>

<footer class="flex flex-col md:flex-row p-4 bg-gray-800 text-white">
    <div class="w-full md:w-3/4 mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
        <!-- About Me -->
        <div class="text-center md:text-left">
            <h2 class="text-lg font-bold">About Me</h2>
            <p class="text-gray-400 text-sm">
                Hello, my name is Brad Keant Espalabra, and I am currently a student pursuing a degree in Information Technology. I am passionate about technology and its applications in solving real-world challenges.
            </p>
        </div>

        <!-- Work Experiences -->
        <div class="text-center md:text-left">
            <h2 class="text-lg font-bold">Work Experiences</h2>
            <ul class="text-gray-400 text-sm space-y-1">
                <li class="hover:text-gray-300 transition cursor-pointer" onclick="openModal('accessVA')">
                    <strong>Access VA 247</strong> (2023 - 2024)
                </li>
                <li class="hover:text-gray-300 transition cursor-pointer" onclick="openModal('panoptyc')">
                    <strong>Panoptyc</strong> (2024 - 2025)
                </li>
            </ul>
        </div>

        <!-- Education -->
        <div class="text-center md:text-left">
            <h2 class="text-lg font-bold">Education</h2>
            <ul class="text-gray-400 text-sm space-y-1">
                <li>High School Diploma</li>
                <li>Senior High School Diploma (Accountancy, Business and Management)</li>
                <li>Bachelor's Degree in IT (in progress)</li>
            </ul>
        </div>
    </div>

    <div class="text-center mt-4 md:mt-0"> <!-- Centered contact section -->
        <h2 class="text-lg font-bold">Contact Me</h2>
        <p class="text-gray-400 text-sm">Feel free to reach out via email: 
            <a href="mailto:brad@example.com" class="text-blue-400 hover:text-blue-300">espbrodkint@gmail.com</a>
        </p>
        <p class="text-gray-400 text-sm">Phone: 
            <a href="tel:+1234567890" class="text-blue-400 hover:text-blue-300">+63 (929) 269-8955</a>
        </p>
        <p class="text-gray-400 text-sm">Connect with me on social media:</p>
        <div class="flex justify-center space-x-4">
            <a href="https://www.facebook.com/brodkint.espalabra/" class="text-blue-400 hover:text-blue-300" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.linkedin.com/in/brad-keant-espalabra-39541b34a/" class="text-blue-400 hover:text-blue-300" target="_blank" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://github.com/BRAD2914?tab=overview&from=2025-01-01&to=2025-01-31" class="text-blue-400 hover:text-blue-300" target="_blank" aria-label="GitHub">
                <i class="fab fa-github"></i>
            </a>
            <a href="https://www.instagram.com/brokeant_/" class="text-blue-400 hover:text-blue-300" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>

    <div class="flex justify-center mt-4">
        <img src="/storage/Bradkeant.jpg" alt="Profile Picture" class="w-24 h-24 rounded-full border-2 border-gray-700 shadow-lg transition-transform transform hover:scale-105 cursor-pointer">
    </div>
</footer>

<!-- Modal -->

<div id="modal" class="fixed inset-0 flex items-center justify-center z-20 hidden bg-black bg-opacity-50">
    <div class="modal-content bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full text-lg transition">
            &times;
        </button>
        <h2 id="modal-title" class="text-xl font-bold mb-2 dark:text-white"></h2>
        <h3 id="modal-role" class="text-lg text-gray-700 dark:text-gray-300 mb-4"></h3>
        <p id="modal-content" class="text-gray-600 dark:text-gray-400"></p>
        <!-- <button onclick="closeModal()" class="mt-4 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg transition">
            Close
        </button> -->
    </div>
</div>

</body>
</html>