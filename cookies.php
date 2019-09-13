<?php
    $cookie_name = "user";
    $cookie_value = $_SESSION['fname'];
    setcookie($cookie_name, $cookie_value, time() + (90000), "/"); // 86400 = 1 day, "/" entire site path
    //setcookie("user", "", time() - 3600);

    // ouputs cookies set and their values
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } 
    else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }

    // tells you whether cookies are enabled
    if (count($_COOKIE) > 0) {
        echo "<br>Cookies are enabled.<br>";
    } 
    else {
        echo "Cookies are disabled.";
    }
?>