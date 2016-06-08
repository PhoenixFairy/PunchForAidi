<?php
/**
 * @author Axoford12
 * @see 847072154
 * @version 1.0.0
 * @see Special Thanks for Aidi sending me a skirt
 */

session_start();

if (isset($_POST[ 'userid']) && isset($_POST[ 'password'])){
    // if user has just tried to login in
    $userid = $_POST[ 'userid'];
    $password = $_POST[ 'password'];
    
    $db_conn = new mysqli('localhost','webauth','webauth','auth');
    
    if(mysqli_connect_errno()){
        echo 'Connection to database faild:'.mysqli_connect_error();
        exit();
        // Cannot conn to database.
    }
    
    $query = 'select from authorized_users '
            ."where name='$userid' "
            ."and password=sha1( '$password')";
   
    $result = $db_conn->query($query);
    if($result->num_rows){
        // if they are in the database register the user id
        $_SESSION[ 'vaild_user'] = $userid;
    }
    $db_conn->close();
}


?>


<html>
<body>
<h1>Home Page</h1>
<?php 
if (isset($_SESSION[ 'vaild_user'])){
    // User has loginned in.
    echo 'You are login as: '.$_SESSION[ 'vaild_user'].'<br />';
    echo '<a href="logout.php">Log out</a><br />';
}else{
    
    
    if(isset($userid)){
        // User has tried and failed to login in
        echo 'Could not log you in.<br />';
    }else{
        // User has not tried to login in yet or has log out.
        echo 'You have not logged in.';
    }
}


?>
</body>

</html>