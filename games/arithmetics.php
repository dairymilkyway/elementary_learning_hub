<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "LearningDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare to fetch questions based on the selected operation
$questions = [];
if (isset($_GET['operation'])) {
    $operation = $_GET['operation'];
    $sql = "SELECT question, answer, image_1, operation_sign FROM ArithmeticQuestions WHERE operation='$operation'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions[] = [
                'question' => $row['question'],
                'answer' => $row['answer'],
                'image' => $row['image_1'], // Store only one image for the question
                'operation_sign' => $row['operation_sign'] // Fetch operation sign
            ];
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic Operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    <style>
        body {
            background-color: #a8e6cf; /* Light green background for the barn theme */
            position: relative; /* Required for absolute positioning of confetti */
            overflow: hidden; /* Prevent scrollbars from appearing */
        }

        #questionContainer {
            background-color: #ffccbc; /* Light peach color for the question box */
            border-radius: 8px; /* Rounded corners */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            position: relative; /* Needed for positioning the modal */
            z-index: 1; /* Ensure it appears above confetti */
        }

        /* Style for images to ensure they are small and the same size */
        #imageContainer {
            display: flex; /* Use flexbox to display images horizontally */
            justify-content: center; /* Center images horizontally */
            align-items: center; /* Center images vertically */
            margin: 10px 0; /* Space around the image container */
        }
        #imageContainer img {
            width: 80px; /* Set the width you want */
            height: 80px; /* Set the height to be the same */
            margin: 5px; /* Space between images */
            border-radius: 8px; /* Make the corners rounded */
            border: 2px solid #388e3c; /* Dark green border for images */
        }
        #imageContainer span {
            margin: 0 10px; /* Space around symbols */
            font-size: 32px; /* Bigger font size for symbols */
            color: #c0392b; /* Dark red color for operation signs */
            font-weight: bold; /* Bold font for operation signs */
        }
        #questionNumber {
            font-size: 24px; /* Font size for question number */
            font-weight: bold; /* Bold font for question number */
            color: #388e3c; /* Dark green color for question number */
        }
        .btn {
            font-size: 18px; /* Larger button text */
            padding: 10px 20px; /* Larger button padding */
            border-radius: 8px; /* Rounded button corners */
        }
        .btn-primary { background-color: #80deea; } /* Soft blue for primary buttons */
        .btn-success { background-color: #81c784; } /* Light green for success buttons */
        .btn-warning { background-color: #ffe082; } /* Light yellow for warning buttons */
        .btn-danger { background-color: #ff8a80; } /* Light red for danger buttons */

        /* Confetti Background */
        .confetti {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; /* Ensure clicks go through to the modal */
            overflow: hidden; /* Prevent overflow */
            z-index: 0; /* Behind the modal */
        }
    </style>
</head>
<body>
<?php include '../style/navbar.php'; ?>
    <div class="confetti" id="confettiContainer"></div>

    <div class="container mx-auto my-5">
        <h1 class="text-center text-4xl font-bold text-red-600">Learn Arithmetic Operations!</h1>
        <div class="text-center mt-5">
            <a href="?operation=addition" class="btn btn-primary m-2">Addition</a>
            <a href="?operation=subtraction" class="btn btn-success m-2">Subtraction</a>
            <a href="?operation=multiplication" class="btn btn-warning m-2">Multiplication</a>
            <a href="?operation=division" class="btn btn-danger m-2">Division</a>
        </div>

        <div id="questionContainer" class="mt-5">
            <?php if (!empty($questions)): ?>
                <div class="m-3 p-3 border rounded" id="questionBox">
                    <p id="questionNumber"></p>
                    <p id="questionText"></p>
                    <div id="imageContainer"></div>
                    <div id="answerOptions" class="d-flex justify-content-center flex-wrap"></div>
                </div>
            <?php else: ?>
                <p class="text-center">Select an operation to see questions.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal for Answer Feedback -->
    <div class="modal fade" id="answerModal" tabindex="-1" aria-labelledby="answerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Center the modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="answerModalLabel">Correct!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalMessage">
                    <!-- Feedback message will be displayed here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="nextQuestionBtn">Next Question</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvas-confetti/1.4.0/confetti.browser.min.js"></script>

    <script>
   // Function to create a realistic confetti explosion
function explodeConfetti() {
    const duration = 3 * 1000; // 3 seconds
    const animationEnd = Date.now() + duration;
    const defaults = {
        startVelocity: 30,
        spread: 360,
        ticks: 60,
        gravity: 0.5,
        colors: ['#FF5733', '#33FF57', '#3357FF', '#F1C40F', '#9B59B6', '#FFC300', '#FF5733'],
    };

    function randomInRange(min, max) {
        return Math.random() * (max - min) + min;
    }

    (function frame() {
        const timeLeft = animationEnd - Date.now();
        if (timeLeft <= 0) return; // Stop animation

        const particleCount = 200 * (timeLeft / duration); // Increase particle count for realism
        confetti(Object.assign({}, defaults, {
            particleCount: Math.floor(particleCount),
            origin: {
                x: Math.random(),
                y: Math.random() - 0.2 // Start from the top
            },
            startVelocity: randomInRange(25, 60), // Vary the starting velocity
            spread: randomInRange(90, 120), // Vary the spread angle
            gravity: randomInRange(0.3, 0.6), // Vary the gravity effect
            ticks: randomInRange(50, 70) // Vary the lifetime of particles
        }));

        requestAnimationFrame(frame); // Recursive call to create more particles
    })();
}

        const questions = <?php echo json_encode($questions); ?>;
        let currentQuestionIndex = 0;
        let score = 0;

        // Display the first question
        window.onload = function() {
            if (questions.length > 0) {
                displayQuestion();
            }
        };

        function displayQuestion() {
            const currentQuestion = questions[currentQuestionIndex];
            const questionNumber = document.getElementById('questionNumber');
            const questionText = document.getElementById('questionText');
            const imageContainer = document.getElementById('imageContainer');
            const answerOptions = document.getElementById('answerOptions');

            // Clear previous question content
            questionNumber.innerText = "Question " + (currentQuestionIndex + 1);
            questionText.innerText = currentQuestion.question;
            imageContainer.innerHTML = ''; // Clear previous images
            answerOptions.innerHTML = ''; // Clear previous options

            // Extract numbers from the question
            const numbers = extractNumbers(currentQuestion.question);
            const operationSign = currentQuestion.operation_sign; // Fetch operation sign

            // Display images based on the numbers and operation sign
            displayImages(imageContainer, numbers, operationSign, currentQuestion.image);

            // Generate answer options (1 correct + 2 incorrect)
            const correctAnswer = parseInt(currentQuestion.answer);
            const options = [correctAnswer];

            // Generate incorrect answers
            while (options.length < 3) {
                const randomWrongAnswer = Math.floor(Math.random() * 10); // Adjust range as necessary
                if (!options.includes(randomWrongAnswer)) {
                    options.push(randomWrongAnswer);
                }
            }

            // Shuffle options
            options.sort(() => Math.random() - 0.5);

            // Create buttons for each answer option
            options.forEach(option => {
                const button = document.createElement('button');
                button.innerText = option;
                button.className = 'btn btn-info m-2';
                button.onclick = () => checkAnswer(option);
                answerOptions.appendChild(button);
            });
        }

        function extractNumbers(question) {
            // Extract numbers from the question string using regex
            const matches = question.match(/\d+/g);
            return matches ? matches.map(Number) : [];
        }

        function displayImages(container, numbers, operationSign, imagePath) {
            numbers.forEach((num, index) => {
                for (let i = 0; i < num; i++) {
                    const img = document.createElement('img');
                    img.src = 'images/' + imagePath; // Use the same image from the database
                    img.alt = "Image representing part of the question";
                    container.appendChild(img);
                }

                // Add the operation symbol
                if (index < numbers.length - 1) {
                    const operationSymbol = document.createElement('span');
                    operationSymbol.innerText = operationSign; // Use the operation sign from the database
                    container.appendChild(operationSymbol);
                }
            });

            // Display equals sign
            const equalsSymbol = document.createElement('span');
            equalsSymbol.innerText = '='; // Equals sign
            equalsSymbol.style.fontSize = '36px'; // Increased font size for equals sign
            container.appendChild(equalsSymbol);
        }

        function checkAnswer(selectedAnswer) {
            const correctAnswer = parseInt(questions[currentQuestionIndex].answer);
            const modalMessage = document.getElementById('modalMessage');
            const nextQuestionBtn = document.getElementById('nextQuestionBtn');

            if (selectedAnswer === correctAnswer) {
                modalMessage.innerText = "Good Job! That's the correct answer!";
                score++;

                // Trigger confetti explosion
                explodeConfetti();
            } else {
                modalMessage.innerText = "Incorrect! The correct answer is " + correctAnswer;
            }

            // Show the modal
            $('#answerModal').modal('show');

            // Handle the next question button
            nextQuestionBtn.onclick = function() {
                currentQuestionIndex++;
                if (currentQuestionIndex < questions.length) {
                    $('#answerModal').modal('hide'); // Close the modal
                    displayQuestion(); // Display the next question
                } else {
                    alert("You've completed the quiz! Your score: " + score);
                }
            };
        }
    </script>
</body>
</html>
