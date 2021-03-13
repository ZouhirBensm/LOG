<?php // Example 27-7: login.php
  require_once 'header.php';
  $error = $email = $pass = "";

  if (isset($_POST['email']))
  {
    $email = sanitizeString($_POST['email']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($email == "" || $pass == "")
      $error = 'Not all fields were entered';
    else
    {
      $result = queryMySQL("SELECT email,pass FROM users
        WHERE email='$email' AND pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "Invalid login attempt";
      }
      else
      {
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
        // GET request with view=$user as query string
        die("<script>document.location.href='index.php'</script>"); //Redirect to index directly.");
      }
    }
  }
  if (!$loggedin)
  {
echo <<<_END
      <form method='post' action='login.php'>
        
          <span class='error'>$error</span>
          <label>Email<input type='text' maxlength='16' name='email' value='$email'></label>
          <label>Password<input type='password' maxlength='16' name='pass' value='$pass'></label>
          <input data-transition='slide' type='submit' value='Login'>

      </form>
    </div>
  </body>
</html>
_END;
  }
?>
