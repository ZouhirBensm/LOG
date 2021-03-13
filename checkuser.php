<?php // Example 27-6: checkuser.php
  require_once 'functions.php';


  if (isset($_POST['email'])) {
    $email   = sanitizeString($_POST['email']);
    $fail = validate_email($email);

    if ($fail == "") {
      $result = queryMysql("SELECT * FROM users WHERE email='$email'");
      
      if ($result->num_rows) {
        echo  "<span class='taken'>&nbsp;&#x2718; " .
        "The email '$email' is taken</span>";
      } else {
        echo "<span class='available'>&nbsp;&#x2714; " .
        "The email '$email' is available</span>";
      }
    } else {
      echo  "<span>&nbsp;&#x2718; " .
      "This is not a valid email format</span>";
    }
  }
?>