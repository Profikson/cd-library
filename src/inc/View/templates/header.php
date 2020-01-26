<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/26/20
 * Time: 10:53 AM
 */
?>

<!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="./src/css/bootstrap.min.css">
            <link rel="stylesheet" href="./src/css/main.css">
            <link rel="stylesheet" href="./src/css/fonts/style.css">

            <title><?php if (isset($title)) echo htmlspecialchars($title); ?></title>

</head>


<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between my-3">
        <div class="navbar-brand"><a href="/">CD Library</a></div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add-new-cd">Add CD</a>
                </li>
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>

    </nav>
</div>