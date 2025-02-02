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

        let currentImageIndex = 0; // Track the current image index
let imageList = []; // Store the list of image sources

function openModal(imageSrc, description) {
    const modal = document.getElementById("modal");
    const modalImage = document.getElementById("modal-image");
    const modalDescription = document.getElementById("modal-description");

    // Set the image source and description
    modalImage.src = imageSrc; 
    modalDescription.textContent = description;

    // Store the image source in the list
    imageList = []; // Reset the image list
    const images = document.querySelectorAll('.album img'); // Get all images in the album
    images.forEach((img, index) => {
        imageList.push(img.src); // Add each image's src to the list
        if (img.src === imageSrc) {
            currentImageIndex = index; // Set the current index
        }
    });

    modal.classList.remove("hidden");
}

function closeModal() {
    const modal = document.getElementById("modal");
    modal.classList.add("hidden");
}

function changeImage(direction) {
    // Update the current index based on the direction
    currentImageIndex += direction;

    // Loop back to the start or end of the list
    if (currentImageIndex < 0) {
        currentImageIndex = imageList.length - 1; // Go to the last image
    } else if (currentImageIndex >= imageList.length) {
        currentImageIndex = 0; // Go to the first image
    }

    // Update the modal with the new image
    const modalImage = document.getElementById("modal-image");
    modalImage.src = imageList[currentImageIndex]; // Set the new image source
    const modalDescription = document.getElementById("modal-description");
    modalDescription.textContent = ``; // Optional: Update the description
}

document.addEventListener("DOMContentLoaded", function () {
        const body = document.body;
        const themeIcon = document.getElementById("theme-icon");
        const savedTheme = localStorage.getItem("theme");

        if (savedTheme === "light") {
            body.classList.add("light-mode");
            body.classList.remove("dark-mode");
            themeIcon.classList.remove("fa-sun");
            themeIcon.classList.add("fa-moon");
        } else {
            body.classList.add("dark-mode");
            body.classList.remove("light-mode");
            themeIcon.classList.remove("fa-moon");
            themeIcon.classList.add("fa-sun");
        }
    });
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
            margin: px 0;
            padding: 20px;
            transition: transform 0.3s, background-color 0.3s;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            color: inherit; /* Ensure section text inherits color */
        }
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
    display: flex; /* Use flexbox */
    flex-direction: column; /* Align items in a column */
    justify-content: center; /* Center items vertically */
    align-items: center; /* Center items horizontally */
    background: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}
        .modal-content img {
    max-width: 90%; /* Ensure the image does not exceed 90% of the modal width */
    max-height: 80vh; /* Limit the height to 80% of the viewport height */
    object-fit: contain; /* Maintain the aspect ratio while fitting the image */
}

#modal-image {
    border-radius: 8px;
}
button {
    padding: 8px 16px;
    border: none;
    background-color: transparent;
    cursor: pointer;
    transition: color 0.3s;
}
button:hover {
    color: #007BFF; /* Change color on hover */
}
        .transition-transform {
            transition: transform 0.3s ease;
        }

        /* Styles for the image album */
        .album {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); /* Smaller size for images */
            gap: 16px;
            padding: 20px;
        }
        .album img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            cursor: pointer; /* Change cursor to pointer for clickable images */
            transition: transform 0.3s;
        }
        .album img:hover {
            transform: scale(1.05); 
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


<main class="mt-24"> <!-- Add margin-top to push down the content -->
    <!-- Album Section -->
    <section id="album" class="mt-10">
        <h2 class="text-2xl font-bold mb-4">My Album</h2>
        <div class="album">
            @php
                $files = File::files(public_path('storage/BradKeant'));
                shuffle($files); // Shuffle the array to randomize the order
            @endphp
            @foreach ($files as $file)
                <img src="{{ asset('storage/BradKeant/' . basename($file)) }}" alt="Image {{ $loop->index }}" onclick="openModal('{{ asset('storage/BradKeant/' . basename($file)) }}')"> <!-- Remove description -->
            @endforeach
        </div>
        <div class="mt-6">
        <h2 class="text-2xl font-bold mb-4">Hobby</h2>
    <p class="text-gray-700">
        The hobby that helped me build up my confidence.
    </p>
    <p class="text-gray-700">
        Running has become more than just a physical activity for me. It is my other way to challenge myself and discipline to overcome obstacles.
        
    </p>
    <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 mt-2">
    <li>Setting Running Goals</li>
    <li>Mental Toughness</li>
    <li>Physical Strength Improvements</li>
    <li>Mental Clarity or Stress Relief</li>
    <li>Social Connectivity</li>
</ul>
<p class="text-gray-700 dark:text-gray-300">
    Through running, I’ve learned that confidence isn’t just about how I see myself but also about how I push through challenges and keep moving forward. Each step I take strengthens both my body and my belief in myself. 🏃‍♂️✨
</p>
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
                <li class="text-gray-400 text-sm space-y-1" onclick="">
                    <strong>Access VA 247</strong> (2023 - 2024)
                </li>
                <li class="text-gray-400 text-sm space-y-1" onclick="">
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

<div id="modal" class="fixed inset-0 flex items-center justify-center hidden z-50" onclick="closeModal()">
    <div class="modal-content relative bg-white rounded-lg p-4" onclick="event.stopPropagation();"> <!-- Prevent closing modal on content click -->
        <span class="absolute top-0 right-0 p-4 cursor-pointer text-gray-600" onclick="closeModal()">&times;</span>
        <img id="modal-image" class="w-full h-auto rounded" src="" alt="Modal Image">
        <p id="modal-description" class="mt-2 text-center"></p>
        
        <div class="flex justify-between mt-4">
    <button id="prev-btn" class="text-gray-600 mr-4" onclick="changeImage(-1)">&#9664; Previous</button>
    <button id="next-btn" class="text-gray-600" onclick="changeImage(1)">Next &#9654;</button>
</div>

    </div>
</div>

</body>
</html>
