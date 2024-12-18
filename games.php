<?php include 'style/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
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
            object-fit: cover;
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
    <h1 class="display-4">Games to Learn and Play!</h1>
</div>

<div class="container my-5">
    <div class="game-container">
        <a href="arithmetics.php" class="feature-card">
            <img src="style/images/arithmetic_icon.png" alt="Arithmetic Adventure" class="feature-icon">
            <h4>Arithmetic Adventure</h4>
            <p>Learn addition, subtraction, multiplication, and division with animals.</p>
        </a>
        <a href="animal_sounds.php" class="feature-card">
            <img src="style/images/animal_sounds_icon.png" alt="Animal Sounds Match" class="feature-icon">
            <h4>Animal Sounds</h4>
            <p>Find Out What sound are the Animals in this fun learning game!</p>
        </a>
        <a href="memory_match.php" class="feature-card">
            <img src="style/images/memory_match_icon.png" alt="Memory Match Adventure" class="feature-icon">
            <h4>Memory Match Adventure</h4>
            <p>Flip cards to find matching pairs and improve your memory!</p>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
