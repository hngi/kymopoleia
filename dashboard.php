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
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/833e0cadb7.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css" rel="stylesheet">


    <title>Kymo Budget | Dashboard </title>
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
                    <a class="dropdown-item" href="#">Home</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>

        </nav>

    </header>

    <main>

        <section class="sidebar">

            <ul class="sidebar-list">
                <li> <i class="fa fa-home"></i><a href="#" class="active"> Dashboard</a></li>
                <li><i class="fa fa-plus-circle"></i><a href="add-budget.php"> Add Budget </a></li>
            </ul>
        </section>



        <section class="buget__dashboard">
            <div class="container">

                <div class="welcome__text">
                    <div class="budget__info">
                        <div>
                            <p>Total budget amount</p>
                            <h1 id="total_amount_budgeted">&#8358; 1,500,000.00</h1>
                        </div>
                        <div>
                            <img src="images/purse.png" width="20%" height="auto" alt="">
                        </div>
                    </div>
                </div>


                <!-- This was the way i implemented on django (JUST A GUIDE!) -->
                <!-- <table
                    id="table"
                    data-toggle="table"
                    data-height="600"
                    data-width="600"
                    data-pagination="true"
                    data-filter-control="true"
                    data-show-search-clear-button="true">
                <thead>
                  <tr>
                    <th data-field="id" data-sortable="true">Budgets</th>
                    <th data-field="hotel_name" data-sortable="true" data-filter-control="input">Date added</th>
                    <th data-field="state" data-sortable="true" data-filter-control="select">Time due</th>
                    <th data-field="state" data-sortable="true" data-filter-control="select">Number of items</th>
                  </tr>
                </thead>
                <tbody class="budgets">
                  {% for key in data %}
                  <tr class="single_budget" data-name="{{key.budget}}">
                      <td>{{data.index(key) + 1}}</td>
                      <td> {{ key.budgets }} </td>
                      <td> {{ key.date_added }} </td>
                      <td> {{ key.time_due }} </td>
                      <td> {{ key.number_of_items }} </td>
                  </tr>
                  {% endfor %}
              </tbody>
              </table> -->


                <table id="table" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true"
                    data-pagination-pre-text="Previous" data-pagination-next-text="Next" data-mobile-responsive="true"
                    data-check-on-init="true">

                    <thead>
                        <tr>
                            <th>Budgets</th>
                            <th>Date added</th>
                            <th>Time due</th>
                            <th>Number of items</th>
                            <th>Amount Budgeted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>
                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000.50">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000" data-data-value="50000">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>


                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>


                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>

                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

                        </tr>
                        <tr id="tr-id-1" class="tr-class-1" data-title="bootstrap table" data-object='{"key": "value"}'>
                            <td>
                                <a href="#">January budgets</a>
                            </td>
                            <td data-value="526">31/12/2018</td>
                            <td data-value="">1/1/2019</td>
                            <td>12</td>
                            <td class="amount__budgeted" data-value="50000">₦50,000</td>

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