<?php
require_once "./PHP/database.php";
session_start();
$_SESS['loginError'] =$_SESS['emailError'] =$_SESS['passError'] = "";
$password = $username="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //user clicked submit button, implement logic

$username = $_POST['username'];
$password = $_POST['password'];

if(empty($password) && empty($username)){
    $_SESS['loginError'] = "Fill in all fields". "</br>";
   
}
// else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
// 	$_SESS['emailError'] = "Username should contain only alphanumeric characters". "</br>";
    
// }
else if(empty($username)){
	$_SESS['emailError'] = "Username is a required field". "</br>";
    
}
else if(empty($password)){
    $_SESS['passError'] = "Password is a required field". "</br>";
    
}
else{
        
    $sql = "SELECT * FROM users WHERE usernames='$username'";
    
    $result = $conn->query($sql);
    
    $user = $result->fetch(PDO::FETCH_ASSOC);

    $_SESSION = $user;
	if($username !== $user['usernames'] || !password_verify($password, $user['password'])){
        $_SESS['loginError'] = "Invalid login credentials. Please crosscheck your login details or click on the Sign Up link to create an Account";
		// echo($_SESSION['loginError']);
    }elseif($username === $user['usernames']||$username === $user['email'] && password_verify($password, $user['password'])){
		header("location: dashboard.php");
		exit;
	}
      
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget App | sign in</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="techieNg.css">
</head>
<body>
    <div class="logincontainer">
        <p class="blue"><span>Kymo </span> Budget<br>
            <span>Sign in</span>
        </p>
        <form id="form" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
            <label class="blue">Email or Username</label><br>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><span class="error"><?php echo $_SESS['emailError']; ?></span><br><br>
            
           
            <label class="blue">Password</label><br>
           
            <input type="password" name="password" id="password" required ><span class="error"><?php echo $_SESS['passError']; ?></span><br><br>
           
            <span><a href="">Forgot Password?</a></span><br>
            <button id="submit" type="submit">Sign In</button><br><br>
            <center><span>New to Budget App? <a href="signup.php" > Create Account</a></span></center>
        </form>
        <?php echo $_SESS['loginError']; ?>
    </div>
</body>
</html>