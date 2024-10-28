<?php
// Include navbar for consistency
include 'style/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> <!-- Include Poppins font -->
    <style>
        body {
            background-image: url('bg.jpg'); /* Update with your background image path */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent background image from repeating */
            color: #ffffff; /* Default text color */
            font-family: 'Poppins', sans-serif; /* Apply the Poppins font */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }
        .overlay {
            padding: 50px; /* Space inside the overlay */
            border-radius: 10px; /* Rounded corners for overlay */
            text-align: center; /* Center text within overlay */
            margin: 20px; /* Margin to separate from edges */
            /* Removed background color to keep it transparent */
        }
        .main-title {
            font-size: 4rem; /* Title font size */
            font-weight: bold; /* Title font weight */
            color: #ff6f61; /* Color for the title */
            margin-top: 50px; /* Space above title */
        }
        .btn-custom {
            font-size: 20px; /* Button text size */
            padding: 15px 30px; /* Button padding */
            margin: 10px; /* Space around buttons */
            border-radius: 8px; /* Rounded button corners */
        }
        .content-section {
            margin-top: 30px; /* Space above content section */
            padding: 20px; /* Space inside content section */
            border-radius: 10px; /* Rounded corners */
            color: #333; /* Dark text color */
            text-align: center; /* Center text */
            background-color: rgba(255, 255, 255, 0.8); /* Light background for contrast */
        }
        .content-section h2 {
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Change to a playful font */
            font-size: 36px; /* Increase the font size */
            color: #d32f2f; /* Change color to make it stand out */
            margin-bottom: 20px; /* Add some space below the title */
        }
        .content-section h3 {
            font-size: 2rem; /* Reduced font size for subheadings */
            font-weight: 600; /* Semi-bold for subheadings */
        }
        .content-section p {
            font-size: 1rem; /* Adjusted font size for paragraphs */
        }
        .logo {
            margin-top: 30px; /* Space above the logo */
            width: 300px; /* Adjust logo size as needed */
        }
    </style>
</head>
<body>

    <div class="overlay">
    <center> <img src="images/logo.png" alt="Animal Fun Logo" class="logo"> </center>
        <h1 class="main-title">About the Site</h1>
        <div class="content-section container">
            <h2>Animal Fun</h2>
            <p>Animal Fun is an interactive educational website designed for elementary kids to learn about various animals and their habitats in a fun and engaging way. Through games and informative sections, children can explore different animal diets, sounds, and characteristics while developing their knowledge about the animal kingdom.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
