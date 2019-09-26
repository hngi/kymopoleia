<?php
	ob_start();
    session_start();
    require_once "./PHP/database.php";
    if(!isset($_SESSION['email'])){
         header("Location: login.php");
    }else{
        // echo($_SESSION['usernames']);
        $sql = "SELECT * FROM budget WHERE username = '{$_SESSION['usernames']}' ";
        $result = $conn->query($sql);
        $Budgets= $result->fetch(PDO::FETCH_ASSOC);
       
    }

        
            
    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link type="text/css" rel="stylesheet" href="dashboard.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="addBudgetAmount.css">
        <script src="https://kit.fontawesome.com/833e0cadb7.js" crossorigin="anonymous"></script>
        <title>KymoBudget</title>
    </head>
    <body>
        <header>

            <nav>
                <div class="brandname">
                    <h2 class="header-brandname"><a href="#"> <span class="redText">Kymo</span>Budget</a></h2>
                </div>
                <a class="dropdown-item" href="logout.php">Log Out</a>
                <img class='user-avatar' src="icons/user.png" alt="">
                <div class="dropdown">
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
                    <li  class="active"><i class="fas fa-home"></i> Dashboard</li>
                    <li><a href="signup.php"><span><i class="fas fa-plus-circle"></i></span>Add Budget Amount</a></li>
                    <li> <i class="fas fa-plus-circle"></i> Add Budget Items</li>
                </ul>
            </section>
            <section class="add-budget">
            <a href="budgetdashboard.php" type="button" id="submit" type="submit">Create Budget</a><br><br>
                <div class="top">
                    <div class="budget">
                        <div class="budget__title">
                            Available Budgets in <span class="budget__title--month">%Month%</span>:
                        </div>
                        
                      
                            
                            <table class="table table-stripped table-bordered" id="invoice">
                                <thead>
                                    <th>Budgets <span class="required">*</span></th>
                                    <th>Date Added </th>
                                    <th>Time Due <span class="required">*</span></th>
                                    <th>Number of Items </th>
                                </thead>
                                <tbody>
                                    <?php do{?>
                                        <tr>
                                            <td><?php echo($Budgets['Budget_id']);?></td>
                                            <td><?php echo($Budgets['startTime']);?></td>
                                            <td><?php echo($Budgets['endTime']);?></td>
                                            <td><?php   $sq = "SELECT * FROM BudgetDetails WHERE Budget_id = '{$Budgets['Budget_id']}' ";
                                                    $res = $conn->query($sq);
                                                    $Budg =   $res->rowCount();
                                                
                                                        echo($Budg);?></td>
                                        </tr>    
                                    <?php }while($Budgets =$result->fetch(PDO::FETCH_ASSOC))?>
                                </tbody>
                            </table>
                            
                    </div>
                </div>
                
                
                
                <div class="bottom">
                    <div class="add">
                        <div class="add__container">
                            <select class="add__type">

                                <!--inc stands for income-->
                                <option value="inc" selected>+</option>

                                <!--inc stands for expenses-->
                                <option value="exp">-</option>
                            </select>
                            <input type="text" class="add__description" placeholder="Add description">
                            <input type="number" class="add__value" placeholder="Value">
                            <button class="add__btn"><i class="ion-ios-checkmark-outline"></i></button>
                        </div>
                    </div>
                    
                    <div class="container clearfix">
                        <div class="income">
                            <h2 class="income__title">Income</h2>
                            
                            <div class="income__list">
                        
                        <!--This commented part below is for a test-->        
                                <!--
                                <div class="item clearfix" id="income-0">
                                    <div class="item__description">Salary</div>
                                    <div class="right clearfix">
                                        <div class="item__value">+ 2,100.00</div>
                                        <div class="item__delete">
                                            <button class="item__delete--btn">
                                                <i class="ion-ios-close-outline"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="item clearfix" id="income-1">
                                    <div class="item__description">Sold car</div>
                                    <div class="right clearfix">
                                        <div class="item__value">+ 1,500.00</div>
                                        <div class="item__delete">
                                            <button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button>
                                        </div>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </div>
                        
                        
                        
                        <div class="expenses">
                            <h2 class="expenses__title">Expenses</h2>
                            
                            <div class="expenses__list">
                        
                                
                            </div>
                        </div>

                        <!-- change test-->
                        
                    </div>
                    
                    
                </div>
            </section>    
        </main>   
        <script src="dashboard.js"></script>
    </body>
</html>