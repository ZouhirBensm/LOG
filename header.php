<?php // HEADER
    session_start();

    echo <<<_INIT
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost:8888/Zz_Login/jquery.mobile-1.4.5.min.css" rel="stylesheet">
        <script src='http://localhost:8888/Zz_Login/jquery-2.2.4.min.js'></script>
        <script src='http://localhost:8888/Zz_Login/jquery.mobile-1.4.5.min.js'></script> 
        
        <!--link href="https://webdevelopercanada.website/Projects/Crypto/LOG/jquery.mobile-1.4.5.min.css" rel="stylesheet">
        <script src='https://webdevelopercanada.website/Projects/Crypto/LOG/jquery-2.2.4.min.js'></script>
        <script src='https://webdevelopercanada.website/Projects/Crypto/LOG/jquery.mobile-1.4.5.min.js'></script--> 


    _INIT;

  require_once 'functions.php';

  //$userstr = 'Welcome Guest';

  if (isset($_SESSION['email']))
  {
    $email     = $_SESSION['email'];
    $loggedin = TRUE;
    //$userstr  = "Logged in as: $user";
  }
  else $loggedin = FALSE;

echo <<<_MAIN
<title>Landing, Login, & Sign up</title>
</head>
<body>
    <div data-role='page'>
      <div data-role='header'>
        <h1>Header</h1>
      </div>
      <div data-role='content'>

_MAIN;

  if ($loggedin)
  {
echo <<<_LOGGEDIN
        <div class='center'>
            <p>Congrats you are logged in!</p>
            <a data-role="button" href="logout.php">Logout</a>
        </div>
        
_LOGGEDIN;
  }
  else
  {
echo <<<_GUEST
        <div class='center'>
            <a data-role="button" href="login.php">Login inputs</a>
            <a data-role="button" href="signup.php">Sign up</a>

        </div>
        <p class='info'>(header.php part done here. &ltdiv data-role="content"&gt;. You should log in)</p>
_GUEST;
  }
?>
