<?php
    session_start(); // start a session

    $debug = 1;

    // script required modules
    require_once('/functions.php');
    require_once('db.php');
    $dbc = mysqli_connect(HOST, USER, PASSWORD, NAME)
        or die('Error connecting to MySQL server.');
    

    if (isset($_POST['submit'])) {
        debug($debug, $dbc); 

        $user_name = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $pwd = mysqli_real_escape_string($dbc, trim($_POST['password']));
        
        if (!empty($user_name) && !empty($pwd)) {
            $dbc = mysqli_connect(HOST, USER, PASSWORD, NAME)
                or die('Error connecting to MySQL server.');
            $query = "SELECT fname, username FROM user_info WHERE username = '$user_name' AND password = sha1('$pwd')";
            $data = mysqli_query($dbc, $query)
                or die('Error querying database.');

                if (mysqli_num_rows($data) == 1) {
                    $row = mysqli_fetch_array($data);
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['username'] = $row['username'];
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/blogs/myblog.php';
                    header('Location: ' . $home_url);
                }
                else {
                    // The username/password are incorrect so set an error message
                    $error_msg = 'Incorrect login credentials!';
                }
        }
        else {
                // The username/password weren't entered so set an error message
                $error_msg = 'You must enter a username and password!';
                
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Sign Up</title>
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
        <h1>CREATE AN ACCOUNT</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus commodi, aperiam ratione labore, libero nesciunt molestias repudiandae nam reiciendis excepturi dolores ex alias voluptatum veniam consectetur quibusdam possimus iusto laudantium!</p>
        <div class="signin-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <h2>Welcome back!</h2>
                <label for="username"></label>
                <input type="text" name="username" id="username" placeholder="Username">
                <label for="password"></label>
                <input type="text" name="password" id="password" placeholder="Password">
                <input type="submit" name="submit" value="Log in">
            </form>
        </div>
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