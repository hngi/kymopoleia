<?php
	ob_start();
    session_start();
    if(!isset($_SESSION['email'])){
         header("Location: login.php");
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
                            Available Budget in <span class="budget__title--month">%Month%</span>:
                        </div>
                        
                        <div class="budget__value">+ 2,345.64</div>
                        
                        <div class="budget__income clearfix">
                            <div class="budget__income--text">Income</div>
                            <div class="right">
                                <div class="budget__income--value">+ 4,300.00</div>
                                <div class="budget__income--percentage">&nbsp;</div>
                            </div>
                        </div>
                        
                        <div class="budget__expenses clearfix">
                            <div class="budget__expenses--text">Expenses</div>
                            <div class="right clearfix">
                                <div class="budget__expenses--value">- 1,954.36</div>
                                <div class="budget__expenses--percentage">45%</div>
                            </div>
                        </div>
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