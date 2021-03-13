<?php // INDEX
  session_start();
  require_once 'header.php';

  echo "<div>(index.php starts here)</div>";

  if ($loggedin) echo " $email, you are logged in";
  else           echo ' Please sign up or log in';

  echo <<<_END
        </div>
        <div data-role="footer">
          <h1>Footer</h1>
        </div>
      </body>
    </html>
_END;
?>
