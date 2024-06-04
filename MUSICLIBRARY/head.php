<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff; 
            color: red;
            font-weight: bold;
            overflow: hidden; 
            position: relative; 
        }
        .navbar {
            background-color: red; 
            z-index: 1000; 
        }
        .navbar a {
            color: white !important;
        }
        .btn-custom {
            background-color: red;
            color: white;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: darkred;
        }
        .text-center {
            text-align: center;
        }
        .playlist-container {
            max-height: 500px; 
            overflow-y: auto; 
            padding: 15px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }
        @keyframes linija {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .linija {
            position: fixed;
            width: 100%;
            height: 1px;
            background-color: black;
            animation: linija 10s linear infinite; 
            z-index: -1; 
        }

        .linija:nth-child(1) {
            top: 10%;
            animation-delay: 0s;
        }

        .linija:nth-child(2) {
            top: 30%;
            animation-delay: 2s;
        }

        .linija:nth-child(3) {
            top: 50%;
            animation-delay: 4s;
        }

        .linija:nth-child(4) {
            top: 70%;
            animation-delay: 6s;
        }

        .linija:nth-child(5) {
            top: 90%;
            animation-delay: 8s;
        }
    </style>
</head>
<body>
<div class="linija"></div>
<div class="linija"></div>
<div class="linija"></div>
<div class="linija"></div>
<div class="linija"></div>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.php">Music Library</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item"><a class="nav-link" href="add_song.php">Dodaj pjesmu</a></li>
                <li class="nav-item"><a class="nav-link" href="playlist.php">Playlist</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Odjava</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Prijava</a></li>
                <li class="nav-item"><a class="nav-link" href="signup.php">Registracija</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container mt-5">
