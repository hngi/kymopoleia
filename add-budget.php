<?php
require_once "./PHP/database.php";
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Rosarivo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/add-budget.css">
    <script src="https://kit.fontawesome.com/833e0cadb7.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css" rel="stylesheet">


    <title>Kymo Budget | Add Budget </title>
</head>

<body class="">
    <header>

        <nav>
            <div class="brandname">
                <h2 class="header-brandname"><a href="#"><img src="images/kymo.png" alt=""> </a></h2>
            </div>
            <p class="welcome_user">Hi, <span class="blueText"><?php echo "" . $_SESSION["user_id"] . "";?></span></p>
            <i class="fa fa-user user-avatar"></i>
            <div class="dropdown">
                <div class="dropdown-toggler" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-caret-down"></i>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="dashboard.php">Home</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>

        </nav>

    </header>

    <main>

        <section class="sidebar">

            <ul class="sidebar-list">
                <li> <i class="fa fa-home"></i><a href="dashboard.php" class="active"> Dashboard</a></li>
                <li><i class="fa fa-plus-circle"></i><a href="#"> Add Budget </a></li>
            </ul>
        </section>



        <section class="buget__dashboard">
            <div class="container">

                <div class="welcome__text">
                    <div>
                        <h4>Add Budget</h4>
                        <p id="total_amount_budgeted"></p>
                    </div>
                    <div class="budget__form">
                        <form action="">
                            <input type="text" placeholder="Budget title">
                            <input type="text" placeholder="Budget amount">
                            <br>
                            <input type="submit" value="Add">
                        </form>
                    </div>
                </div>

                <br><br>

                <div class="welcome__text">
                    <div>
                        <h4>Add Budget Item</h4>
                        <p id="total_amount_budgeted"></p>
                    </div>
                    <div class="budget__form">
                        <form action="">
                            <select name="item">
                                <option value="volvo">Select Item</option>
                                <option value="tax">Tax</option>
                                <option value="rent">Rent</option>
                                <option value="shopping">Shopping</option>
                                <option value="foot">Food</option>
                                <option value="drinks">Drinks</option>
                                <option value="insurance">Insurance</option>
                                <option value="allowance">Allowance</option>
                                <option value="hotel">Hotel</option>
                                <option value="transportation">Transportation</option>
                                <option value="health">Health</option>
                                <option value="baby">Baby</option>
                                <option value="pet">Pet</option>
                                <option value="investment">Investment</option>
                                <option value="others">Others</option>
                            </select>

                            <select name="budget">
                                <option value="">Select Budget</option>
                                <option value="1">Saab</option>
                                <option value="2">Fiat</option>
                                <option value="3">Audi</option>
                            </select>

                            <br>
                            <select name="priority">
                                <option value="">Set Priority</option>
                                <option value="3">High</option>
                                <option value="2">Medium</option>
                                <option value="1">Low</option>
                            </select>
                            <input type="text" placeholder="Description">
                            <br>
                            <input type="submit" value="Add">
                        </form>
                    </div>
                </div>
                <br><br><br><br>

                <div>
                    <div class="budget__headline">
                        <div>
                            <h5>Budget Title:</h5>
                        </div>
                        <div>
                            <p>Grandma's Birthday</p>
                        </div>
                    </div>
                    <br>
                    <div class="budget__headline">
                        <div>
                            <h5>Amount Allocated:</h5>
                        </div>
                        <div>
                            <p>&#8358; 1,500,000.00</p>
                        </div>
                    </div>
                    <br><br>
                </div>

                <table id="table" data-toggle="table" data-mobile-responsive="true" data-check-on-init="true">

                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>1</td>
                            <td data-value="526">Cake</td>
                            <td data-value="">3 Tier Cake</td>
                            <td>High</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>1</td>
                            <td data-value="526">Cake</td>
                            <td data-value="">3 Tier Cake</td>
                            <td>High</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>1</td>
                            <td data-value="526">Cake</td>
                            <td data-value="">3 Tier Cake</td>
                            <td>High</td>
                            <td class="amount__budgeted" data-value="50000.50">₦50,000</td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>1</td>
                            <td data-value="526">Cake</td>
                            <td data-value="">3 Tier Cake</td>
                            <td>High</td>
                            <td class="amount__budgeted" data-value="50000" data-data-value="50000">₦50,000</td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>1</td>
                            <td data-value="526">Cake</td>
                            <td data-value="">3 Tier Cake</td>
                            <td>High</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>1</td>
                            <td data-value="526">Cake</td>
                            <td data-value="">3 Tier Cake</td>
                            <td>High</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>1</td>
                            <td data-value="526">Cake</td>
                            <td data-value="">3 Tier Cake</td>
                            <td>High</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </section>

    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="dashboardNew.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
    <script
        src="https://unpkg.com/bootstrap-table@1.15.4/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>

</body>

</html>