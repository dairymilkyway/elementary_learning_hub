<?php include '../style/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Sounds Match</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #a8e6cf; 
        }
        .game-container { 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            margin-top: 50px; 
        }
        .animal-list {
            display: grid; 
            grid-template-columns: repeat(5, 1fr); /* 5 columns */
            gap: 40px; /* Increased space between animal items */
            margin: 20px; 
        }
        .animal-card { 
            background-color: #ffccbc; /* Animal card color */
            border: 2px solid #388e3c; /* Border color */
            border-radius: 10px; 
            padding: 20px; /* Increased padding for larger cards */
            cursor: pointer; 
            transition: background-color 0.2s; 
            color: #388e3c; 
            font-weight: bold; 
            font-size: 24px; /* Increased font size */
            text-align: center; /* Center the text */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
            height: 150px; /* Set a height for the cards */
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; /* Center the content vertically */
        }
        .animal-card:hover { 
            background-color: #e8f5e9; /* Hover effect */
        }
        .animal-image {
            width: 120px; /* Increased image width */
            height: 120px; /* Increased image height */
            object-fit: cover; /* Ensure image fits well */
            margin-bottom: 10px; /* Space between image and name */
        }
        .feedback { 
            margin-top: 20px; 
            font-size: 18px; 
            text-align: center; 
        }
        .learn-about {
            margin-top: 30px; 
            padding: 20px; 
            background-color: #ffccbc; 
            border: 2px solid #388e3c; 
            border-radius: 10px; 
            text-align: center; 
            font-size: 18px; 
            color: #388e3c; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
        }
        .learn-about h3 {
            margin-bottom: 15px;
        }
        .animal-fact-list {
            display: grid; 
            grid-template-columns: repeat(2, 1fr); /* 2 columns for facts */
            gap: 40px; /* Space between animal fact cards */
            margin: 20px; 
        }
        .fact-card {
            background-color: #ffccbc; /* Fact card color */
            border: 2px solid #388e3c; /* Border color */
            border-radius: 10px; 
            padding: 20px; 
            text-align: center; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
        }
        .fact-image {
            width: 100px; /* Set width for the image */
            height: 100px; /* Set height for the image */
            object-fit: cover; /* Ensure image fits well */
            margin: 0 auto 10px; /* Center the image and add margin below */
        }
        /* For the title of the game */
h2.text-center {
    font-family: 'Comic Sans MS', cursive, sans-serif; /* Change to a playful font */
    font-size: 36px; /* Increase the font size */
    color: #d32f2f; /* Optional: Change color to make it stand out */
    margin-bottom: 20px; /* Add some space below the title */
}

/* For the Did You Know? section */
h1.text-center {
    font-family: 'Comic Sans MS', cursive, sans-serif; /* Change to a playful font */
    font-size: 30px; /* Increase the font size */
    color: #388e3c; /* Optional: Change color to match the theme */
    margin-top: 40px; /* Add some space above the title */
    margin-bottom: 20px; /* Add some space below the title */
}

    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Animal Sounds Match</h2>
    <div class="game-container">
        <div class="animal-list" id="animalList"></div>
        <div class="feedback" id="feedback"></div>
        <!-- Learn About Section -->
        <div class="learn-about">
            <h3>Learn About Animals</h3>
            <p>In this game, you will learn about different animals and the sounds they make. Click on each animal to hear its sound and familiarize yourself with its name.</p>
            <p>Can you match the sound to the correct animal? Have fun while learning!</p>
        </div>
        <h1 class="text-center">Did You Know?</h1>
        <div class="animal-fact-list" id="animalFacts"></div> <!-- Container for animal fact cards -->
    </div>
</div>

<script>
    const animals = <?php
        $conn = new mysqli('localhost', 'root', '', 'LearningDB');
        $result = $conn->query("SELECT animal_name, animal_sound, image FROM AnimalSounds");
        $animals = [];
        while ($row = $result->fetch_assoc()) {
            $animals[] = $row;
        }
        echo json_encode($animals);
    ?>;

    const animalList = document.getElementById('animalList');
    const feedback = document.getElementById('feedback');
    let currentAudio = null; // Variable to hold the currently playing audio

    function displayAnimals() {
        animals.forEach(animal => {
            const animalCard = document.createElement('div');
            animalCard.className = 'animal-card';
            animalCard.innerText = animal.animal_name;

            // Create an image for the animal
            const animalImage = document.createElement('img');
            animalImage.src = 'images/' + animal.image; // Adjust the image path as needed
            animalImage.alt = animal.animal_name;
            animalImage.className = 'animal-image'; // Add class for styling

            // Append the image to the card
            animalCard.appendChild(animalImage);

            // Set click event to play sound
            animalCard.onclick = () => playSound(animal);
            animalList.appendChild(animalCard);
        });
    }

    function playSound(animal) {
        // Stop any currently playing audio
        if (currentAudio) {
            currentAudio.pause();
            currentAudio.currentTime = 0; // Reset the audio to start
        }

        // Play the new audio
        currentAudio = new Audio('sounds/' + animal.animal_sound);
        currentAudio.play();
        feedback.innerText = 'Playing sound for: ' + animal.animal_name; // Provide feedback
    }

    function displayAnimalFacts() {
        const facts = [
            {
                name: "Dog",
                image: "dog.png", // Replace with actual image filename
                description: "Dogs bark to communicate. They have a unique bark that can tell you whether they're happy, scared, or need attention!"
            },
            {
                name: "Cat",
                image: "cat.png", // Replace with actual image filename
                description: "Cats meow to get your attention. They can also purr when they are happy or relaxed."
            },
            {
                name: "Cow",
                image: "cow.png", // Replace with actual image filename
                description: "Cows moo to talk to each other. They have different sounds for different situations!"
            },
            {
                name: "Sheep",
                image: "sheep.png", // Replace with actual image filename
                description: "Sheep bleat to communicate with their flock. A mother sheep can recognize her lamb's bleat!"
            },
            {
                name: "Rooster",
                image: "rooster.png", // Replace with actual image filename
                description: "Roosters crow to mark their territory and signal the start of a new day!"
            },
            {
                name: "Duck",
                image: "duck.png", // Replace with actual image filename
                description: "Ducks quack to communicate. They also have unique sounds to express their mood!"
            },
            {
                name: "Horse",
                image: "horse.png", // Replace with actual image filename
                description: "Horses neigh and whinny to communicate. They can express their feelings through various sounds!"
            },
            {
                name: "Frog",
                image: "frog.png", // Replace with actual image filename
                description: "Frogs croak to attract mates and establish territory. Each species has a unique call!"
            },
            {
                name: "Pig",
                image: "pig.png", // Replace with actual image filename
                description: "Pigs grunt and oink to communicate. They are very social animals and have a variety of vocalizations!"
            },
            {
                name: "Lion",
                image: "lion.png", // Replace with actual image filename
                description: "Lions roar to communicate with their pride and establish their territory. Their roar can be heard from miles away!"
            }
        ];

        facts.forEach(fact => {
            const factCard = document.createElement('div');
            factCard.className = 'fact-card';
            factCard.innerHTML = `<h4>${fact.name}</h4>
                                  <img src='images/${fact.image}' alt='${fact.name}' class='fact-image' />
                                  <p>${fact.description}</p>`;
            animalFacts.appendChild(factCard);
        });
    }

    displayAnimals(); // Initial display of animals
    displayAnimalFacts(); // Display animal facts
</script>

</body>
</html>
