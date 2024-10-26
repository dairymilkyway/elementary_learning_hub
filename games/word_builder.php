<?php include '../style/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Builder Adventure</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { background-color: #a8e6cf; }
        .letter { display: inline-block; margin: 5px; padding: 10px; border: 1px solid #333; border-radius: 5px; cursor: pointer; }
        .word-container { margin-top: 20px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Word Builder Adventure</h2>
    <div class="word-container" id="wordContainer"></div>
    <div class="letter-container" id="letterContainer"></div>
</div>

<script>
    const words = <?php
        $conn = new mysqli('localhost', 'root', '', 'LearningDB');
        $result = $conn->query("SELECT word, letter_options FROM WordBuilder");
        $wordList = [];
        while ($row = $result->fetch_assoc()) {
            $wordList[] = $row;
        }
        echo json_encode($wordList);
    ?>;

    const wordContainer = document.getElementById('wordContainer');
    const letterContainer = document.getElementById('letterContainer');
    let currentWord = '';
    
    function buildWord() {
        const randomIndex = Math.floor(Math.random() * words.length);
        currentWord = words[randomIndex].word;
        wordContainer.innerHTML = '_ '.repeat(currentWord.length);
        letterContainer.innerHTML = '';

        const letters = words[randomIndex].letter_options.split(',');
        letters.forEach(letter => {
            const letterDiv = document.createElement('div');
            letterDiv.className = 'letter';
            letterDiv.innerText = letter.trim();
            letterDiv.onclick = () => checkLetter(letter.trim());
            letterContainer.appendChild(letterDiv);
        });
    }

    function checkLetter(letter) {
        const updatedWord = [...wordContainer.innerText.trim().split(' ')];
        currentWord.split('').forEach((char, index) => {
            if (char === letter) {
                updatedWord[index] = char;
            }
        });
        wordContainer.innerHTML = updatedWord.join(' ');
    }

    buildWord();
</script>

</body>
</html>
