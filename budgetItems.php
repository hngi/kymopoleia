<?php
	ob_start();
    session_start();
    
    require_once "./PHP/database.php";
    if(!isset($_SESSION['email'])){
         header("Location: login.php");
    }else{
    echo($_SESSION['usernames']);
        $data = $_GET['value'];
    $sql = "SELECT * FROM BudgetDetails WHERE Budget_id = '$data' ";
    $result = $conn->query($sql);
    $Items= $result->fetch(PDO::FETCH_ASSOC);
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
                <h2 class="header-brandname"><a href="dashboard.php"> <span class="redText">Kymo</span>Budget</a></h2>
            </div>
            <div class="dropdown"><?php echo $_SESSION['firstname']	; ?></div>
            <img class='user-avatar' src="icons/user.png" alt="">
            <div class="dropdown">
                <div class="dropdown-toggler" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="icons/dropdown.svg" alt="">
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
            </div>

        </nav>

    </header>

    <main>

        <section class="sidebar">
            
            <ul class="sidebar-list">
                <li><a href= "dashboard.php"><i class="fas fa-home">Dashboard</i> </a></li>
                <li  class="active"> <i class="fas fa-plus-circle"></i> View Budget Items</li>
                <li><i class="fas fa-plus-circle"></i> Add Budget Amount</li>
                <li> <i class="fas fa-plus-circle"></i> Add Budget Items</li>
                
            </ul>
        </section>

        <section class="add-budget">
        <h3><input type="text"  class="form-control"  value="<?php  echo($data);?>" disabled></h3><br><br>
                <table class="table table-stripped table-bordered" id="invoice">
                    <thead>
                        <th>Item Title <span class="required">*</span></th>
                        <th>Description </th>
                        <th>Priority <span class="required">*</span></th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <?php do{?>
                            <tr > 
                                <td><?php  echo($Items['Item']);?></td>
                                <td><?php echo($Items['description']);?></td>
                                <td><?php echo($Items['Priority']);?></td>
                                <td><?php  echo($Items['Amount']);?></td>
                            </tr>    
                        <?php }while($Items =$result->fetch(PDO::FETCH_ASSOC))?>
                    </tbody>
                </table>

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