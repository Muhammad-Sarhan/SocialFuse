<?php

include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:login.php');

?>



<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->