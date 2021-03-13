<?php // SIGNUP
require_once 'header.php';


  $error = $email = $pass = "";

  //if (isset($_SESSION['email'])) destroySession();

  if (isset($_POST['email'])){
    $email = sanitizeString($_POST['email']);
    $pass = sanitizeString($_POST['pass']); 

    if ($email == "" || $pass == "")
      $error = 'Not all fields were entered<br><br>';
    else{
      $result = queryMysql("SELECT * FROM users WHERE email='$email'");
      if ($result->num_rows)
        $error = 'That email already exists<br><br>';
      else{
        queryMysql("INSERT INTO users VALUES('$email', '$pass')");
        die('<h4>Account created</h4>Please Log in.</div></body></html>');
      }
    }
  }
if(!$loggedin){
    echo <<<_NOTLOGGED
    
          <form method='post' action='signup.php'>$error
              <label>Email <input type='email' name='email' value='$email' onBlur='checkUser(this)'></label>
              <div id='used'>&nbsp;</div>
              <label>Password<input type='password' name='pass' value='$pass'></label>
              <input data-transition='slide' type='submit' value='Sign Up'>
          </form>
        </div>


        <script>
          function checkUser(user) {
            if (user.value == '') {
              $('#used').html('&nbsp;');
              return;
            }

            $.post('checkuser.php', { email : user.value }, function(data){
                $('#used').html(data)
            })
          }
        </script>

      </body>
    </html>
  _NOTLOGGED;}

  else {
    echo <<<_LOGGED
          </div>
          <div data-role="footer">
            <h1>Footer</h1>
          </div>
        </body>
      </html>
    _LOGGED;
  }

?>
