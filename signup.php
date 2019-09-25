<?php



include ('dbcon.php');
if (isset($_POST['submit'])) {
    $error = array();//Declare An Array to store any error message  
    if (empty($_POST['fullname'])) {//if no name has been supplied 
        $error[] = 'Please Enter a Full Name ';//add to array "error"
    } else {
        $fullname = $_POST['fullname'];//else assign it a variable
		$fullname = trim($fullname); //removing white space from the user input 
    }

    if (empty($_POST['email'])) {
        $error[] = 'Please Enter your Email ';
    } else {


        if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST['email'])) {
           //regular expression for email validation
            $email = $_POST['email'];//assign it a variable
			$email = trim($email);//removing white space from the user input 
        } else {
             $error[] = 'Your EMail Address is invalid  ';
        }


    }


    if (empty($_POST['password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $password1 = $_POST['password'];//assign it a variable
		$password1 = trim($password1);//removing white space from the user input 
    }
	if (empty($_POST['confirm_password'])) {
        $error[] = 'Please Enter confirmed Password ';
    } else {
        $confirm_password = $_POST['confirm_password'];//assign it a variable
		$c_password = trim($c_password);//removing white space from the user input 
    }
	if ($password1 == $confirm_password ) {
       $password = $_POST['password']; 
    } else {
		$error[] = 'Confirm password didnt matche ';
    }
	
    if (empty($error)) //send to Database if there's no error '

    { // If everything's OK...

        // Make sure the email address is available:
        $query_verify_email = "SELECT * FROM users  WHERE Email ='$email'";
        $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Database Error Occured ';
        }

        if (mysqli_num_rows($result_verify_email) == 0) { // IF no previous user is using this email .


            // Create a unique  activation code:
            //$activation = md5(uniqid(rand(), true));


            $query_insert_user = "INSERT INTO `users` ( `Fullname`, `Email`, `Password` ) VALUES ( '$fullname', '$email', '$password')";


            $result_insert_user = mysqli_query($dbc, $query_insert_user);
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }

            if (mysqli_affected_rows($dbc) == 1) { //If the Insert Query was successfull.


                // Send the email:
                // $message = " To activate your account, please click on this link:\n\n";
               //  $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($Email) . "&key=$activation";
                // mail($Email, 'Registration Confirmation', $message, 'From: ismaakeel@gmail.com');

                // Flush the buffered output.


                // Finish the page:
                echo '<div class="success">Thank you '.$fullname.' For Sign Up with us </div>';


				} 
			else { // If it did not run OK.
                echo '<div class="errormsgbox">You could not be registered due to a system error. We apologize for any inconvenience.</div>';
            }

        } 
		else { // The email address is not available.
            echo '<div class="errormsgbox" >That email address has already been registered. </div>';
        }

    } 
	else {//If the "error" array contains error msg , display them
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
  
    mysqli_close($dbc);//Close the DB Connection

} // End of the main Submit conditional.



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Budgit | Signup</title>
    <link rel = "icon" href = "images\logo2.png" type = "image/png">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="main">
            <header>
                <div id="logo-div">
                    <img src="images/logo.png" id="logo" alt=""> <span id="logo-text">BudgIt</span> 
                    <p>Making managing your finances hassle free</p>
                </div>
                <div id="nav-div" class="nav-div">
                    <p> <a href="index.php" > Home</a>
                        <a href=""> About</a>
                        <a href="login.php" id="login"> Login</a>
                        <a href="signup.php" id="signup" class="active"> Signup</a>
                        <a href=""> Contact</a>
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                                <img src="img/mdi_menu.png" alt="">
                              </a>
                    </p>
                </div>
            </header>
            <div class="content">
            
                <h1>Signup </h1>
                <p>It only takes a minute</p>

                <form id="form" action="signup.php" method="POST">
                    <input type="text" id="fullname" name="fullname"  placeholder="Full Name" required><span id="Evalid"></span><br><br>
                    
                    <input type="email" id="email" name="email"  placeholder="email" required><span id="Evalid"></span><br><br>
                   
                    <input type="password" name="password" id="password" placeholder="password" required style="width: 230px"><i class="fa fa-eye" id="view"></i><br><br>
                   
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required onkeyup='checkPassword();'>
                    <span id="message"></span><br><br>
                    
                    <button id="submit" type="submit" name="submit"  >Sign Up</button><br>
                    <span>By clicking the Sign Up button, you agree to our</span><br>
                    <span><a href="">Terms & Conditions</a> and <a href=""> Privacy Policy</a></span>
                </form>
            
            </div>
            <div class="clear"></div>
            <footer>
                <b>&copy;Copyright 2019 Kymopoleia</b>
            </footer>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>