<?php
// Include navbar for consistency
include 'style/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('bg.jpg'); /* Update with your background image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .card {
            cursor: pointer;
            margin: 10px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .modal-content {
            color: black;
            width: 900px; /* Increased width for the modal */
            max-width: 90%;
        }
        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }
        .list-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px; /* Increased margin for better spacing */
        }
        .list-item img {
            width: 100px; /* Increased width for list images */
            height: 100px; /* Increased height for list images */
            margin-right: 15px; /* Adjusted margin for spacing */
        }
        /* Additional style for the large images in modals */
        .modal-image {
            width: 100%; /* Full width */
            height: auto; /* Maintain aspect ratio */
            max-width: 600px; /* Maximum width */
            margin: 0 auto; /* Center the image */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="main-title">Learn with Animals</h1>
        
        <div class="row justify-content-center">
            <!-- Main card for learning the alphabet -->
            <div class="col-md-3">
                <div class="card text-white bg-info" data-toggle="modal" data-target="#alphabetModal">
                    <img src="images/alphabet.png" class="card-img-top" alt="Learn Alphabet">
                    <div class="card-body">
                        <h5 class="card-title">Learn Alphabet</h5>
                        <p class="card-text">Click to explore the alphabet with animals!</p>
                    </div>
                </div>
            </div>

            <!-- Additional cards -->
            <div class="col-md-3">
                <div class="card text-white bg-success" data-toggle="modal" data-target="#habitatModal">
                    <img src="images/habitats.png" class="card-img-top" alt="Animal Habitats">
                    <div class="card-body">
                        <h5 class="card-title">Animal Habitats</h5>
                        <p class="card-text">Learn where animals live!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning" data-toggle="modal" data-target="#dietModal">
                    <img src="images/diets.png" class="card-img-top" alt="Animal Diets">
                    <div class="card-body">
                        <h5 class="card-title">Animal Diets</h5>
                        <p class="card-text">Discover what animals eat!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger" data-toggle="modal" data-target="#endangermentModal">
                    <img src="images/endangered.png" class="card-img-top" alt="Endangered Species">
                    <div class="card-body">
                        <h5 class="card-title">Endangered Species</h5>
                        <p class="card-text">Find out about endangered animals!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-secondary" data-toggle="modal" data-target="#funFactsModal">
                    <img src="images/fun_facts.png" class="card-img-top" alt="Fun Animal Facts">
                    <div class="card-body">
                        <h5 class="card-title">Fun Animal Facts</h5>
                        <p class="card-text">Learn interesting facts about animals!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for each section -->
    <!-- Alphabet Modal -->
    <div class="modal fade" id="alphabetModal" tabindex="-1" role="dialog" aria-labelledby="alphabetLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alphabetLabel">Learn Alphabet with Animals</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <ul>
                        <li class="list-item">
                            <img src="images/a.png" alt="Alligator">
                            A - Alligator
                        </li>
                        <li class="list-item">
                            <img src="images/b.png" alt="Bear">
                            B - Bear
                        </li>
                        <li class="list-item">
                            <img src="images/c.png" alt="Cat">
                            C - Cat
                        </li>
                        <li class="list-item">
                            <img src="images/d.png" alt="Dolphin">
                            D - Dolphin
                        </li>
                        <li class="list-item">
                            <img src="images/e.png" alt="Elephant">
                            E - Elephant
                        </li>
                        <li class="list-item">
                            <img src="images/f.png" alt="Frog">
                            F - Frog
                        </li>
                        <li class="list-item">
                            <img src="images/g.png" alt="Giraffe">
                            G - Giraffe
                        </li>
                        <li class="list-item">
                            <img src="images/h.png" alt="Horse">
                            H - Horse
                        </li>
                        <li class="list-item">
                            <img src="images/i.png" alt="Iguana">
                            I - Iguana
                        </li>
                        <li class="list-item">
                            <img src="images/j.png" alt="Jaguar">
                            J - Jaguar
                        </li>
                        <li class="list-item">
                            <img src="images/k.png" alt="Kangaroo">
                            K - Kangaroo
                        </li>
                        <li class="list-item">
                            <img src="images/l.png" alt="Lion">
                            L - Lion
                        </li>
                        <li class="list-item">
                            <img src="images/m.png" alt="Monkey">
                            M - Monkey
                        </li>
                        <li class="list-item">
                            <img src="images/n.png" alt="Narwhal">
                            N - Narwhal
                        </li>
                        <li class="list-item">
                            <img src="images/o.png" alt="Owl">
                            O - Owl
                        </li>
                        <li class="list-item">
                            <img src="images/p.png" alt="Penguin">
                            P - Penguin
                        </li>
                        <li class="list-item">
                            <img src="images/q.png" alt="Quokka">
                            Q - Quokka
                        </li>
                        <li class="list-item">
                            <img src="images/r.png" alt="Rabbit">
                            R - Rabbit
                        </li>
                        <li class="list-item">
                            <img src="images/s.png" alt="Snake">
                            S - Snake
                        </li>
                        <li class="list-item">
                            <img src="images/t.png" alt="Tiger">
                            T - Tiger
                        </li>
                        <li class="list-item">
                            <img src="images/u.png" alt="Urchin">
                            U - Urchin
                        </li>
                        <li class="list-item">
                            <img src="images/v.png" alt="Vulture">
                            V - Vulture
                        </li>
                        <li class="list-item">
                            <img src="images/w.png" alt="Walrus">
                            W - Walrus
                        </li>
                        <li class="list-item">
                            <img src="images/x.png" alt="Xerus">
                            X - Xerus
                        </li>
                        <li class="list-item">
                            <img src="images/y.png" alt="Yak">
                            Y - Yak
                        </li>
                        <li class="list-item">
                            <img src="images/z.png" alt="Zebra">
                            Z - Zebra
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Habitat Modal -->
    <div class="modal fade" id="habitatModal" tabindex="-1" role="dialog" aria-labelledby="habitatLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="habitatLabel">Animal Habitats</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <ul>
                        <li class="list-item">
                            <img src="images/forest.png" alt="Forest">
                            Forest
                        </li>
                        <li class="list-item">
                            <img src="images/desert.png" alt="Desert">
                            Desert
                        </li>
                        <li class="list-item">
                            <img src="images/ocean.png" alt="Ocean">
                            Ocean
                        </li>
                        <li class="list-item">
                            <img src="images/savanna.png" alt="Savanna">
                            Savanna
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Diet Modal -->
    <div class="modal fade" id="dietModal" tabindex="-1" role="dialog" aria-labelledby="dietLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dietLabel">Animal Diets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <ul>
                    <li class="list-item">
                        <img src="images/carnivore.png" alt="Carnivore">
                        <strong>Carnivores:</strong><br>
                        <p><strong>Example:</strong> Lion, Tiger, Shark</p>
                    </li>
                    <li class="list-item">
                        <img src="images/herbivore.png" alt="Herbivore">
                        <strong>Herbivores:</strong><br>
                        <p><strong>Example:</strong> Elephant, Giraffe, Rabbit</p>
                    </li>
                    <li class="list-item">
                        <img src="images/omnivore.png" alt="Omnivore">
                        <strong>Omnivores:</strong><br>
                        <p><strong>Example:</strong> Bear, Human, Pig</p>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- Endangerment Modal -->
    <div class="modal fade" id="endangermentModal" tabindex="-1" role="dialog" aria-labelledby="endangermentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="endangermentLabel">Endangered Species</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <ul>
                        <li class="list-item">
                            <img src="images/t.png" alt="Tiger">
                            Tiger
                        </li>
                        <li class="list-item">
                            <img src="images/e.png" alt="Elephant">
                            Elephant
                        </li>
                        <li class="list-item">
                            <img src="images/panda.png" alt="Panda">
                            Panda
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fun Facts Modal -->
    <div class="modal fade" id="funFactsModal" tabindex="-1" role="dialog" aria-labelledby="funFactsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="funFactsLabel">Fun Animal Facts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <ul>
                        <li class="list-item">
                            <img src="images/fact1.png" alt="Fact 1">
                            Did you know that elephants can communicate through vibrations?
                        </li>
                        <li class="list-item">
                            <img src="images/fact2.jfif" alt="Fact 2">
                            A group of flamingos is called a "flamboyance."
                        </li>
                        <li class="list-item">
                            <img src="images/fact3.jpg" alt="Fact 3">
                            Octopuses have three hearts!
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
