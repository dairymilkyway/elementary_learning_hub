<?php
// Include navbar for consistency
include 'style/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Fun</title>
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
    </style>
</head>
<body>

    <div class="overlay">
        <h1 class="main-title">Animal Fun</h1>
        <div class="text-center mt-5">
            <a href="games.php" class="btn btn-primary btn-custom">Games</a>
            <a href="learn.php" class="btn btn-success btn-custom">Learn</a>
            <a href="about.php" class="btn btn-warning btn-custom">About</a>
        </div>
    </div>

    <div class="content-section">
        <h2>Welcome to Animal Fun!</h2>
        <p>Explore the wonderful world of animals through interactive games and educational content designed for kids. <br>Learn fun facts, play exciting games, and discover the amazing diversity of wildlife.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
