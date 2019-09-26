<?php
	ob_start();
    session_start();
    if(!isset($_SESSION['email'])){
         header("Location: login.php");
    }
    
    
?>

<?php
require_once "./PHP/database.php";
echo($_SESSION['usernames']);

function protect_value($value){
 $secured_value = trim(stripslashes(htmlentities($value)));     
 return $secured_value;     
}
$data = array();
$error = array();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//===CREATE BUDGET AND TOTAL AMOUNT
	$total_amount = protect_value($_POST['amount']);
    $budget_name = protect_value($_POST['budget_name']);
    $startTime = protect_value($_POST['startTime']);
    $endTime = protect_value($_POST['endTime']);
	if (empty($total_amount)) {
		$error['total_amount'] = "total_amount is required";
	}
	if (empty($budget_name)) {
		$error['budget_name'] = "Budget name is required";
	}
	if (!filter_var($_POST['amount'], FILTER_VALIDATE_INT)) {
		$error['total_amount'] = "Only in integers is accepted";
	}
	$sql = "SELECT * FROM budget WHERE Budget_id = '$budget_name' AND username = '{$_SESSION['usernames']}'";
		$result = $conn->query($sql);
	if ($result->fetch(PDO::FETCH_ASSOC)) {
			$error['budget_name'] = "Budget exists with this name";
	}
	if (empty($error)) {
		$insert = "INSERT INTO budget (id,Budget_id,Amount,startTime,endTime,username)
					VALUES( null, '$budget_name',  '$total_amount','$startTime','$endTime','{$_SESSION['usernames']}')";
        $exe = $conn->exec($insert);
        $_SESSION['Budget_id'] = $budget_name;
        $_SESSION['Amount'] = $total_amount;
		$data['message'] = "Budget created.";
			
	}
	if ( !empty($error)) {
        $data['success'] = false;
        $data['errors']  = $error;
    } else {
        $data['success'] = true;
        
    }
    // return to ajax
    header("Location: addBugetItems.php");
    echo json_encode($data);
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="addBudgetAmount.css">
    <script src="https://kit.fontawesome.com/833e0cadb7.js" crossorigin="anonymous"></script>
    <title>KymoBudget</title>
</head>

<body class="">
    <header>

        <nav>
            <div class="brandname">
                <h2 class="header-brandname"><a href="#"> <span class="redText">Kymo</span>Budget</a></h2>
            </div>
            <a href="logout.php" class="dropdown-item"> Logout</a><br>

            <img class='user-avatar' src="icons/user.png" alt="">
            <div class="dropdown">
			<div class="dropdown">Welcome , <?php echo $_SESSION['firstname']	; ?><span class="login"> <a href="login.php">Log Out</a> </span></div>
                <div class="dropdown-toggler" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="icons/dropdown.svg" alt="">
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>

        </nav>

    </header>

    <main>

        <section class="sidebar">

            <ul class="sidebar-list">
                <li > <i class="fas fa-home"></i> Dashboard</li>
                <li class="active"  ><i class="fas fa-plus-circle"></i> Add Budget Amount</li>
                <li> <i class="fas fa-plus-circle"></i> Add Budget Items</li>
            </ul>
        </section>

        <section class="add-budget">
            <form class="add-budget-form" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST" >
                <h2>Add Budget Amount</h2>
                <div class="form-row margin-height">
                    <div class="form-group col-md-6">
                        <input type="text" name="budget_name" id="budget_name" class="form-control" placeholder="Enter budget title">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter amount">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text"  id="startTime" name="startTime" class="form-control" placeholder="Enter start time(dd/m/yy)">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="endTime" id="endTime" class="form-control" placeholder="Enter end time(dd/m/yy)">
                    </div>

                </div>
                <button type="submit" name="save" class="btn budget-save text-center">Save</button>
            </form>

        </section>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>