<?php include '../style/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color and Shape Explorer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { background-color: #a8e6cf; }
        .shape-card { width: 100px; height: 100px; margin: 10px; display: flex; align-items: center; justify-content: center; border-radius: 10px; }
        .shape-name { margin-top: 5px; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Color and Shape Explorer</h2>
    <div class="d-flex flex-wrap justify-content-center" id="shapeContainer"></div>
</div>

<script>
    const shapes = <?php
        $conn = new mysqli('localhost', 'root', '', 'LearningDB');
        $result = $conn->query("SELECT shape_name, color_name, image_url FROM ColorShape");
        $shapeData = [];
        while ($row = $result->fetch_assoc()) {
            $shapeData[] = $row;
        }
        echo json_encode($shapeData);
    ?>;

    const container = document.getElementById('shapeContainer');
    shapes.forEach(shape => {
        const shapeCard = document.createElement('div');
        shapeCard.className = 'shape-card';
        shapeCard.style.backgroundColor = shape.color_name.toLowerCase();
        shapeCard.innerHTML = `
            <img src="${shape.image_url}" alt="${shape.shape_name}">
            <div class="shape-name">${shape.shape_name}</div>
        `;
        shapeCard.onclick = () => alert('This is a ' + shape.shape_name);
        container.appendChild(shapeCard);
    });
</script>

</body>
</html>
