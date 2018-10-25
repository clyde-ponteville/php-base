<?php 
//Inclusion du fichier de config
    require_once (__DIR__.'/../config/config.php');
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title><?php echo isset($title) ? $title : 'PizzaStore' ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="assets/style/sticky-footer-navbar.css" rel="stylesheet">
    <link href="assets/style/main.css" rel="stylesheet">

</head>

<body>
    
    <header>
    <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#"><?= $siteName ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= ($currentPageUrl === 'index') ? 'active': ''; ?>">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item <?= ($currentPageUrl === 'pizza_list') ? 'active': ''; ?>">
                        <a class="nav-link" href="pizza_list.php">Liste des pizzas</a>
                    </li>                    
                    <li class="nav-item <?= ($currentPageUrl === 'addpizza') ? 'active': ''; ?>">
                        <a class="nav-link" href="addpizza.php">Ajout pizza</a>
                    </li>
                    <li class="nav-item <?= ($currentPageUrl === 'contact') ? 'active': ''; ?>">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>