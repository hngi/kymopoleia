<?php



include ('dbcon.php');
if (isset($_POST['submit'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
  

    if (empty($_POST['email'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Email ';
    } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
           
            $email = $_POST['email'];// assigning user inut to variable 
			$email = trim($email);// removing white space from the user input 
        } 
		else {
             $error[] = 'Your EMail Address is invalid  ';
        }


    }


    if (empty($_POST['password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $password = $_POST['password'];// assigning user inut to variable 
		$password = trim($password);// removing white space from the user input 
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
           
            header("Location: budgetdb.php");
          

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
    <title>BudgIt | login</title>
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
                    <p> <a href="index.php"> Home</a>
                        <a href=""> About</a>
                        <a href="login.php" class="active" id="login"> Login</a>
                        <a href="signup.php" id="signup"> Signup</a>
                        <a href=""> Contact</a>
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                                <img src="img/mdi_menu.png" alt="">
                              </a>
                    </p>
                </div>
            </header>
            <div class="content">
                <h1>Login to Manage Your Finances</h1>

                <form id="form" action="login.php" method="POST">
                    <i class="fa fa-user" style="color: #182955"></i><input type="text" name="email" id="email"  placeholder="Email" required><span id="Evalid"></span><br><br>
                    <i class="fa fa-lock" style="color: #182955"></i><input type="password" name="password" id="password" placeholder="password"equired><br>
                    <span class="right" style="color: #182955">Forgot Password?</span> <br><br>
                    <button id="submit" type="submit" name="submit" value="Login">Login</button><br>
                    <span>Don't have an account? no problem Signup <a href="signup.php">here</a>.</span>
                </form>
                
               
            </div>
            <div class="clear"></div>
            <footer>
                <b>&copy;Copyright 2019 kymopoleia</b>
            </footer>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>