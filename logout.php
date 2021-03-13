<?php // Example 27-12: logout.php
  require_once 'header.php';
  
  if (isset($_SESSION['email'])) {
    destroySession();  //lines 7 to 10 can be deleted
    echo "<script>document.location.href='index.php'</script>"; //Redirect to index directly.
    
  }
  else echo "<div class='center'>You cannot log out because you are not logged in</div>";
?>
    </div>
  </body>
</html>
