<?php include 'style/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Match Adventure</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { 
            background-image: url('bg.jpg'); /* Update with your background image path */
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 columns */
            gap: 10px; /* Space between boxes */
            max-width: 600px; /* Adjust based on your layout */
            margin: auto; /* Center the container */
            padding: 20px; /* Padding around the grid */
        }
        .card { 
            width: 100%; /* Take full width of the grid cell */
            height: 100px; /* Fixed height for the cards */
            border-radius: 10px; 
            overflow: hidden; /* Ensure images fit within */
            position: relative; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            perspective: 1000px; /* Enable 3D perspective */
        }
        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s; /* Transition for the flip effect */
            transform-style: preserve-3d; /* Enable 3D space for children */
        }
        .card.flipped .card-inner {
            transform: rotateY(180deg); /* Flip the card */
        }
        .card-front, .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 10px; 
            backface-visibility: hidden; /* Hide back face during flip */
        }
        .card-front {
            display: flex; /* Center the front image */
            justify-content: center; 
            align-items: center; 
        }
        .card-back {
            transform: rotateY(180deg); /* Rotate back face */
            display: flex; /* Enable flexbox to center items */
            justify-content: center; /* Center items horizontally */
            align-items: center; /* Center items vertically */
            flex-direction: column; /* Stack items vertically */
            background-color: white; /* Set white background for the flipped side */
        }
        .card img { 
            width: 100%; 
            height: 100%; 
            border-radius: 10px; 
        }
        .word { 
            font-size: 24px; 
            color: black; /* Set text color to black */
            text-align: center; /* Center align text */
        }
        .checkmark {
            display: none; /* Initially hidden */
            font-size: 40px; /* Increase size of checkmark */
            color: green; /* Green color for checkmark */
        }
        h1.text-center {
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Change to a playful font */
            font-size: 30px; /* Increase the font size */
            color: #388e3c; /* Optional: Change color to match the theme */
            margin-top: 40px; /* Add some space above the title */
            margin-bottom: 20px; /* Add some space below the title */
        }
        .how-to-play {
            font-size: 18px;
            margin-bottom: 20px; /* Space below the section */
            text-align: center; /* Center align text */
        }
        .how-to-play-card {
            background-color: #fff; /* White background for the card */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect */
            padding: 20px; /* Padding inside the card */
            margin: 20px auto; /* Center the card */
            max-width: 500px; /* Maximum width of the card */
            text-align: center; /* Center text */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Memory Match Adventure</h1>
    
    <!-- How to Play Card -->
    <div class="how-to-play-card">
        <h2>How to Play</h2>
        <p>Click on two cards to flip them over. If they match, they will stay face up. If not, they will flip back over. Try to find all matching pairs!</p>
    </div>

    <div class="grid-container" id="memoryContainer"></div>
</div>

<!-- Modal for game completion -->
<div class="modal fade" id="completionModal" tabindex="-1" role="dialog" aria-labelledby="completionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="completionModalLabel">Congratulations!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalCloseButton">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You completed the game! Congrats!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalCloseBtn">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const cards = <?php
        $conn = new mysqli('localhost', 'root', '', 'LearningDB');
        $result = $conn->query("SELECT image_url, word FROM MemoryMatch");
        $memoryCards = [];
        while ($row = $result->fetch_assoc()) {
            $memoryCards[] = $row;
        }
        echo json_encode($memoryCards);
    ?>;
    
    let selectedCards = [];
    let matchedPairs = 0; // Track matched pairs
    const container = document.getElementById('memoryContainer');
    const totalPairs = cards.length; // Total number of pairs

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    function createCards() {
        const cardData = [...cards, ...cards]; // Duplicate for matching
        shuffle(cardData);

        cardData.forEach(card => {
            const cardElement = document.createElement('div');
            cardElement.className = 'card';
            cardElement.innerHTML = `
                <div class="card-inner">
                    <div class="card-front">
                        <img src="${card.image_url}" alt="Card">
                    </div>
                    <div class="card-back">
                        <div class="word">${card.word}</div> <!-- Display the word -->
                        <span class="checkmark">&#10004;</span> <!-- Green checkmark -->
                    </div>
                </div>
            `;
            cardElement.onclick = () => flipCard(cardElement, card.word);
            container.appendChild(cardElement);
        });
    }

    function flipCard(card, word) {
        card.classList.toggle('flipped');
        selectedCards.push({ card, word });
        if (selectedCards.length === 2) {
            setTimeout(checkMatch, 1000);
        }
    }

    function checkMatch() {
        const [first, second] = selectedCards;
        const firstCheckmark = first.card.querySelector('.checkmark');
        const secondCheckmark = second.card.querySelector('.checkmark');
        
        if (first.word === second.word) {
            // Cards match
            firstCheckmark.style.display = 'block'; // Show checkmark
            secondCheckmark.style.display = 'block'; // Show checkmark
            first.card.querySelector('.word').style.display = 'none'; // Hide word on match
            second.card.querySelector('.word').style.display = 'none'; // Hide word on match
            first.card.style.pointerEvents = 'none'; // Prevent interaction
            second.card.style.pointerEvents = 'none'; // Prevent interaction
            
            matchedPairs++; // Increment matched pairs
            
            // Check if all pairs are matched
            if (matchedPairs === totalPairs) {
                $('#completionModal').modal('show'); // Show completion modal
            }
        } else {
            // Cards do not match
            first.card.classList.remove('flipped'); // Flip the first card back
            second.card.classList.remove('flipped'); // Flip the second card back
        }
        selectedCards = [];
    }

    // Redirect to the games page when modal is closed
    document.getElementById('modalCloseBtn').onclick = function() {
        window.location.href = 'games.php';
    };

    createCards();
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
