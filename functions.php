<?php
    // check whether logged in_array
    function check_session() {
        session_start();
        if (!isset($_SESSION['fname']) && !isset($_SESSION['username'])) {
            header('Location: /index.php');
        }
    }

    // debug tool 
    function debug($debug, $dbc) {
        if ($debug) {
            echo "<pre>";
            if ($dbc) { echo "Database Found<br>";}
            print_r($_POST);
            echo "</pre>";
            // echo "<pre>$query</pre>";
            // print_r($_SESSION); // prints session variables available
        }
    }
?>
    