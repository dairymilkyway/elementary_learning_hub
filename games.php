<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Barn - Learn with Fun!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #a8e6cf;
    }
    .hero-section {
        background-color: #ffccbc;
        padding: 50px 0;
        text-align: center;
        color: #388e3c;
    }
    .game-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }
    .feature-card {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        color: #333;
        text-align: center;
        width: 180px;
        text-decoration: none;
        color: inherit;
        transition: transform 0.2s;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .feature-card:hover {
        transform: scale(1.05);
        background-color: #e8f5e9;
    }
    .feature-icon {
        width: 80px;
        height: 80px;
        object-fit: cover; /* Ensures the image covers the defined dimensions */
        margin-bottom: 15px;
    }
    .feature-card h4 {
        font-size: 18px;
        margin-top: 10px;
    }
</style>
</head>
<body>

<div class="hero-section">
    <h1 class="display-4">Welcome to the Math Barn!</h1>
    <p class="lead">A fun place to learn math with animal friends.</p>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Games to Learn and Play!</h2>
    <div class="game-container">
        <a href="arithmetics.php" class="feature-card">
            <img src="images/arithmetic_icon.png" alt="Arithmetic" class="feature-icon">
            <h4>Arithmetic Adventure</h4>
            <p>Learn addition, subtraction, multiplication, and division with animals.</p>
        </a>
        <a href="geometry.php" class="feature-card">
            <img src="images/geometry_icon.png" alt="Geometry" class="feature-icon">
            <h4>Shape Safari</h4>
            <p>Explore shapes and angles in an exciting safari setting!</p>
        </a>
        <a href="measurement.php" class="feature-card">
            <img src="images/measurement_icon.png" alt="Measurement" class="feature-icon">
            <h4>Measurement Madness</h4>
            <p>Learn to measure lengths and weights with interactive animal guides.</p>
        </a>
        <a href="fractions.php" class="feature-card">
            <img src="images/fractions_icon.png" alt="Fractions" class="feature-icon">
            <h4>Fraction Farm</h4>
            <p>Work with animal friends on the farm to understand fractions better!</p>
        </a>
        <a href="time.php" class="feature-card">
            <img src="images/time_icon.png" alt="Time" class="feature-icon">
            <h4>Time Traveler</h4>
            <p>Travel through time with animals to learn about clocks and telling time.</p>
        </a>
        <a href="money.php" class="feature-card">
            <img src="images/money_icon.png" alt="Money" class="feature-icon">
            <h4>Money Market</h4>
            <p>Learn about money and basic finance concepts in a friendly market.</p>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
