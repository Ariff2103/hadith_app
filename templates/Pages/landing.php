<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hadith Collection</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
        body {
            background-color: #f8f9fa; /* Light, neutral background */
        }

        .hero {
            background-image: url('/img/beige-wall.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 400px; /* Adjust height as needed */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #343a40; /* Dark, readable text color */
            text-align: center;
            border-radius: 15px; /* Slightly rounded corners */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Text shadow for depth */
        }

        .hero p {
            font-size: 1.2rem;
            font-style: italic;
            margin-bottom: 2rem;
        }

        .btn-success {
            background-color: #28a745; /* Green button */
            border-color: #28a745;
            transition: all 0.3s ease; /* Smooth hover effect */
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        /* Responsive adjustments (example) */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>

</head>

<body>
    <div class="container mt-4">
        <div class="hero">
            <h1>Sunnah Compendium</h1>
            <p>Discover the Sunnah, Discern the Right Path</p>
            <?= $this->Html->link(__('Explore Hadith <i class="fa-solid fa-arrow-right ms-1"></i>'), ['controller' => 'Hadiths', 'action' => 'index'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="row">
            <h2>How to use</h2>
            <div class="col-md-4">1</div>
            <div class="col-md-3">2</div>
            <div class="col-md-3">3</div>
        </div>
    </div>

</body>
</html>