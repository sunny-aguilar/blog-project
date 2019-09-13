<?php
    $debug = 1;
    $show_form = true;

    // script required modules
    require_once('/functions.php');
    require_once('db.php');
    $dbc = mysqli_connect(HOST, USER, PASSWORD, NAME)
      or die('Error connecting to MySQL server.');

    if (isset($_POST['submit'])) {

        debug($debug, $dbc);  

    }

    $fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
    $lname = mysqli_real_escape_string($dbc, trim($_POST['lname']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    // message variables
    $duplicate_user = '';

    if (!empty($fname) 
        && !empty($lname) 
        && !empty($email) 
        && !empty($username) 
        && !empty($password1) 
        && !empty($password2)
        && ($password1 == $password2)) {
      $query = "SELECT * FROM user_info WHERE username = '$username'";
      $data = mysqli_query($dbc, $query) 
        or die('Error querying database.');

      if (mysqli_num_rows($data) == 0) {
          $query = "INSERT INTO `user_info`(`fname`, `lname`, `email`, `username`, `password`) " . 
                   "VALUES ('$fname', '$lname', '$email', '$username', sha1('$password1'))";

          mysqli_query($dbc, $query) 
            or die('Error querying database2.');

          $show_form = false;

          mysqli_close($dbc);
      }
      else {
          // An account already exists for this username, so display an error message
          $duplicate_user = 'An account already exists for this username. Please choose a different username.';
      }
  }
  else {
      $missing_info = '<p class="error">You must enter all of the sign-up data, including the desired password</p>';
  }



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
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/-debug.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/grids.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">

  <!-- Favicon & Icons
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <!-- header -->
    <?php require_once('header.php'); ?>

    <main>
<?php
  if ($show_form) {
?>      
      <h1>CREATE AN ACCOUNT</h1>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus commodi, aperiam ratione labore, libero nesciunt molestias repudiandae nam reiciendis excepturi dolores ex alias voluptatum veniam consectetur quibusdam possimus iusto laudantium!</p>
      <div class="signup-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <label for="fname">First Name:</label>
          <input type="text" id="fname" name="fname">
          <label for="lname">Last Name:</label>
          <input type="text" id="lname" name="lname">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username">
          <label for="password1">Password:</label>
          <input type="text" id="password1" name="password1">
          <label for="password2">Confirm Password:</label>
          <input type="text" id="password2" name="password2">
          <input type="submit" id="submit" name="submit" value="submit">
        </form>
        <div class="center duplicate-user-error">
          <h4 class="duplicate-user-error"><?= $duplicate_user; ?></h4>
        </div>
        <div class="center">
          <p>Already have an account? <a href="signin.php">Log in</a></p>
        </div>
      </div>
<?php
  }
  else {
?>
      <div class="success-card">
        <div class="center create-account-success">
          <h3><i class="far fa-check-circle fa-10x"></i></h3>
        </div>
        <div class="center text">
          <p>Account successfully created. Proceed to <a href="signin.php">log in</a></p>
        </div>
      </div>
<?php
  }
?>  
    </main>

    <!-- footer -->
    <?php require('footer.php'); ?>
 
<!-- JS Scripts & libraries
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="scripts/jquery.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  </body>
</html>
