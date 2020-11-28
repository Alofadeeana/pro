<?php

/*
 * logout
 */
session_destroy();
header('Location:loginControler.php'); 
?>