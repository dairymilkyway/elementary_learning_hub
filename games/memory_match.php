<?php include '../style/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Match Adventure</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { background-color: #a8e6cf; }
        .card { width: 100px; height: 100px; margin: 10px; position: relative; }
        .card img { width: 100%; height: 100%; border-radius: 10px; }
        .card.flipped img { display: none; }
        .card.flipped .word { display: block; }
        .word { display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Memory Match Adventure</h2>
    <div class="d-flex flex-wrap justify-content-center" id="memoryContainer"></div>
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
    const container = document.getElementById('memoryContainer');

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
                <img src="${card.image_url}" alt="Card">
                <div class="word">${card.word}</div>
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
        if (first.word === second.word) {
            first.card.style.visibility = 'hidden';
            second.card.style.visibility = 'hidden';
        } else {
            first.card.classList.remove('flipped');
            second.card.classList.remove('flipped');
        }
        selectedCards = [];
    }

    createCards();
</script>

</body
