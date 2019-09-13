<?php
    require_once('../functions.php');
    check_session();
    require_once('../cookies.php');
?>

<?php
    // prints session variables available
    print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Create Account - Capstone Project</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/-debug.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/grids.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">

  <!-- Favicon & Icons
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="../images/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <!-- header -->
    <?php require_once('../header.php'); ?>

    <main>
        <div class="center">
            <h2>Welcome, <?= $_SESSION['fname'] ?></h2>
            <p class="text"><a href="/logout.php">Log Out</a></p>
        </div>
    </main>

    <!-- footer -->
    <?php require('../footer.php'); ?>

  <!-- JS Scripts & libraries
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../scripts/jquery.js"></script>

<!-- End Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>