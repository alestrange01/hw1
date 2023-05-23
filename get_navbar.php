<?php

	require_once 'auth.php';
  $userid = checkAuth();

  if($userid) {
    $link1 = "my_decks.php";
    $text1 = "My decks";
    $img1 = "images/my_decks.svg";
    $link2 = "logout.php";
    $text2 = "Log out";
    $img2 = "images/logout.svg";
  } 
  else {
    $link1 = "login.php";
    $text1 = "Log in";
    $img1 = "images/login.svg";
    $link2 = "signup.php";
    $text2 = "Sign Up";
    $img2 = "images/signup.svg";
  }
?>