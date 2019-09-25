<?php



include ('dbcon.php');
if (isset($_POST['login'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
  

    if (empty($_POST['email'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Email ';
    } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
           
            $email = $_POST['email'];
        } else {
             $error[] = 'Your EMail Address is invalid  ';
        }


    }


    if (empty($_POST['password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $password = $_POST['password'];
    }


       if (empty($error))//if the array is empty , it means no error found
    { 

       

        $query_check_credentials = "SELECT * FROM users WHERE (Email='$email' AND Password='$password')";
   
        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.

           


            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
           
            header("Location: budgetdashboard.php");
          

        }else
        { 
            
            $msg_error= 'Either Your Account is inactive or Email address /Password is Incorrect';
        }

    }  else {
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
    
    
    if(isset($msg_error)){
        
        echo '<div class="warning">'.$msg_error.' </div>';
    }
    /// var_dump($error);
    mysqli_close($dbc);

} // End of the main Submit conditional.



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
    <div class="container">
        <p class="blue"><span>Kymo </span> Budget<br>
            <span>Sign in</span>
        </p>
        <form id="form" method="POST">
            <label class="blue">Email or Username</label><br>
            <input type="text" id="email" name="email"  required><span id="Evalid"></span><br><br>
            
           
            <label class="blue">Password</label><br>
           
            <input type="password" name="password" id="password" required ><br><br>
           
            <span><a href="">Forgot Password?</a></span><br>
            <button id="submit" type="login" name="login">Sign In</button><br><br>
            <center><span>New to Budget App? <a href="signup.php"> Create Account</a></span></center>
        </form>
    </div>
</body>
</html>