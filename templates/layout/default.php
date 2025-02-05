<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- cdn font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <?= $this->Html->css('custom') ?>

    <style>

        /* custom.css or inline styles */
        .navbar-custom {
            background-color:#F5E7DE;
            backdrop-filter: blur(50px); /* Optional blur effect */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #343a40; /* Darker text for contrast */
        }

        .navbar-custom .navbar-brand:hover,
        .navbar-custom .nav-link:hover {
            color:rgb(39, 224, 144); /* Bootstrap primary color on hover */
        }

        .footer {
            background-color: #F5E7DE; /* Light background for footer */
        }

        .main {
            min-height: calc(100vh - 120px); /* Ensure main content takes up available space */
            padding-bottom: 60px; /* Adjust padding as needed */
        }

        /*logo nav */
        .hadith-hub-text {
            font-family: "YourChosenFont"; /* Or a font stack: font-family: "YourChosenFont", sans-serif; */
            color: #333;  /* Example color */
            font-weight: bold;
            font-size: 1.2rem; /* Example size */
            /* Add any other styles you want (e.g., text-shadow, letter-spacing) */
        }

        /*Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap'); /* Import the font */

        .hadith-hub-text {
            font-family: 'Roboto', sans-serif; /* Use the imported font */
            font-weight: 700; /* Example font-weight */
            color: rgb(114, 211, 169); /* Example color */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <?= $this->Html->link(__('HadithHub'), ['controller' => 'Pages', 'action' => 'landing'], ['class' => 'navbar-brand hadith-hub-text']) ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?= $this->Html->link(__('Home'), ['controller' => 'Pages', 'action' => 'landing'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('About'), ['controller' => 'Pages', 'action' => 'about'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item dropdown">
                    <?= $this->Html->link(
                        'Menu', // Text to display for the link/button
                        '#',        // URL (use '#' for a dropdown trigger)
                        [
                            'class' => 'nav-link dropdown-toggle', // Add the necessary classes
                            'role' => 'button',
                            'data-bs-toggle' => 'dropdown',
                            'aria-expanded' => 'false'
                        ]
                    ) ?>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link(__('Hadith'), ['controller' => 'Hadiths', 'action' => 'index'], ['class' => 'dropdown-item']) ?></li>
                        <li><?= $this->Html->link(__('Category'), ['controller' => 'Categories', 'action' => 'index'], ['class' => 'dropdown-item']) ?></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
    <main class="main mb-4 mt-5 pt-3">
        <div class="container">
        <?= $this->Breadcrumbs->render(['class' => 'breadcrumb']) ?>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">&copy; <?= date('Y') ?> HadithHub. All rights reserved.</span>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-2Pmvv0Y+xFENJ/w2y+xQE/X9xE/6mPzuulmSUZxCE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <?= $this->fetch('script') ?>
</body>
</html>