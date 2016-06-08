<?php
/**
 * @author Axoford12
 * @version 1.0.2
 * @see 847072154
 * @see Special Thanks.
 */

session_start();


// Test if User *were* log in.

$old_user = $_SESSION[ 'vaild_user'];
unset($_SESSION[ 'vaild_user']);
session_destroy();
?>
<html>
<body>
<h1>Log Out</h1>
<?php 
if(!empty($old_user)){
    echo 'Logged out.<br />';
}else{
    
    // User wasn't log in but come to this page
    
    echo 'You were not logged in, and so have not been log out.';
    
    
}


?>
<a href="authmain.php">Back to main page</a>
</body>

</html>
