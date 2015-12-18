<?php
  require_once 'functions.php';
echo ("<script>alert('Logged Out');</script>");
    header('Refresh:1; url=home.html');
  if (isset($_SESSION['email']))
  {
    destroySession();
    echo ("<script>alert('Logged Out');</script>");
    header('Refresh:1; url=home.html');
  }
?>