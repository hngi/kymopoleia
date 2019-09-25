
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
<?php
session_start();
require_once('./PHP/database.php');
// require "database.php";
$firstname = $username=$lastname = $emailAddress =  "";
$errors = $firstError = $nameError = $lastError =$emailError =$passError ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
//user clicked submit button, implement logic
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['emailAddress'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if(empty($firstname) && empty($lastname) && empty($emailAddress) && empty($username) && empty($password) && empty($confirmPassword)){
    $errors  = "Fill in all fields". "</br>";
}else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
	$nameError = "Username should contain only alphanumeric characters". "</br>";
}
else if(empty($lastname)){
	$lastError = "Please Enter your last name". "</br>";
}
else if(empty($firstname)){
	$firstError = "Please Enter your first name". "</br>";
}
else if(empty($username)){
	$nameError = "Username is a required field". "</br>";
}
else if(empty($password)){
    $passError = "Password is a required field". "</br>";
}
else if(empty($confirmPassword)){
    $passError = "Password is a required field". "</br>";
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailError = "Email is not in a valid format". "<br>";
}
else if ($password !== $confirmPassword){
    $passError = "Passwords do not match". "<br>";
}
else{
    
$checkUser = "SELECT * FROM users WHERE usernames = '$username' OR email='$emailAddress'";
$checkUser2 = "SELECT * FROM users WHERE  email='$emailAddress'";
$result = $conn->query($checkUser);
$username = $result->fetch(PDO::FETCH_ASSOC);
if($user){
    $nameError = "Username already exists. Please choose a different username";
}else{
    $checkUser2 = "SELECT * FROM users WHERE  email='$emailAddress'";
    $result = $conn->query($checkUser);
    $emailAddress = $result->fetch(PDO::FETCH_ASSOC);
    if($emailAddress){
        $emailError = "Email already exists. Please choose a different Email";
    }
    else{
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (firstname, lastname, usernames, email, password)
    VALUES ('$firstname', '$lastname', '$username', '$email', '$passHash')";
    $done = $conn->exec($sql);
     $_SESSION['success'] = "Sign up was successful, please use your registration details to login";
    header('location:login.php');
    exit();
} 
}
   }
}
?>
    <div class="container">
       <p class="blue"><span>Kymo </span> Budget<br>
            <span>Sign up</span>
        </p>
        <form id="form" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
            <label class="blue">Firstname</label><br>
            <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>"  required><span class="error"><?php echo $firstError; ?></span><br>
            
            <label class="blue">Lastname</label><br>
            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>"  required><span class="error"><?php echo $lastError; ?></span><br>
                

            <label class="blue">Username</label><br>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><span class="error"><?php echo $nameError; ?></span><br>
            
            <label class="blue">Email</label><br>
            
            <input type="email" id="emailAddress" name="emailAddress" value="<?php echo $emailAddress; ?>" required><span class="error"><?php echo $emailError; ?></span><br>
            <label class="blue">Password</label><br>
           
            <input type="password" name="password" id="password" required ><span class="error"><?php echo $passError; ?></span><br>
           
            <label class="blue">Confirm Password</label><br>
           
            <input type="password" name="confirmPassword" id="confirmPassword" required ><span class="error"><?php echo $passError; ?></span><br>
            
            <button id="submit" name="signup-submit" type="submit">Create Account</button><br><br>
            <center><span>Already have an account? <a href="login.php"> Sign in</a></span></center>
        </form>
        <span class="error"><?php echo $errors; ?></span>
    </div>
</body>
</html>