<?php
require './config/connection.php';
require './config/functions.php';

session_start();

if (!isset($_SESSION['admin_name']) && !isset($_SESSION['user_name'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('Location: 401.html');
    exit;
}

$user_id = $_SESSION['user_id'];

$user_info = query("SELECT * FROM users WHERE id = $user_id");

$categories = query("SELECT * FROM `genres` WHERE id <> '00N';");
$features = query("SELECT * FROM `films` WHERE `status` = 'air' ORDER BY release_year DESC, release_date DESC LIMIT 18;");

$banners = query("SELECT * FROM `films` WHERE `status` = 'air' ORDER BY release_year DESC, release_date DESC LIMIT 3;");

$comingsoons = query("SELECT * FROM `films` WHERE `status` = 'comingsoon' ");

$animes = query("SELECT films.* FROM films JOIN film_genres ON films.film_id = film_genres.film_id JOIN genres ON film_genres.genre_id = genres.id WHERE genres.name = 'Anime';");

$tvseries = query("SELECT * FROM films WHERE `type` = 'TV-Series'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Moai Reviews</title>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />


  <link rel="stylesheet" href="./style/style.css" />
  <!-- <link rel="stylesheet" href="style.css" /> -->

  <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- <header>
    <div class="navbar">
      <div class="navbar-logo" onclick="openPage('./index.php')">
        <img src="./image/logo.svg" alt="Moaireviews logo" />
      </div>
      <div class="navbar-right">
        <div class="navbar-list">
          <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./categories.php">Categories</a></li>
            <li><a href="./signup.php">Sign up</a></li>
            <li class="signin"><a href="./login.php">Sign in</a></li>
          </ul>
        </div>
        <div class="menu">
          <label for="chk1">
            <i class="fa fa-bars"></i>
          </label>
        </div>
        <div class="search-box">
          <form>
            <input type="text" name="search" id="srch" placeholder="Search" />
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
    </div>
  </header> -->
  <header>
    <nav class="navbar section-margin">
      <!-- <div class="navbar-logo" onclick="openPage('./index.php')"> -->
      <div class="navbar-logo" onclick="openPage('./index.php')">
        <img src="./image/logo.svg" alt="Moaireviews logo" />
      </div>
      <div class="navbar-right">
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="./home_user.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="./categories.php" class="nav-link">Categories</a>
          </li>
          <li class="nav-item">
            <a href="./dashboard_user.php" class="nav-link"><?php echo $user_info[0]['fullname']; ?></a>
          </li>
          <li class="nav-item">
            <!-- <img height="40px" style="border-radius: 50%;" src="./image/user-picture/<?php echo $user_info[0]['photo']; ?>" alt="> -->
          </li>
        </ul>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <div class="search-box">
          <form>
            <input type="text" name="search" id="srch" placeholder="Search" />
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
    </nav>
  </header>